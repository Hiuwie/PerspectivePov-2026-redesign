(() => {
  'use strict';
  if (window.ppvMarketing) return;

  // Owner: use numeric IDs from Meta Events Manager.
  // Invalid or empty IDs are ignored and generate no Meta requests.
  const pixelIds = ['4352910478258597', '2085771235359767'].filter(pixelId => /^\d{5,20}$/.test(pixelId));
  const consentKey = 'ppv.marketing-consent.v1';
  let pixelInitialized = false;

  function hasMarketingConsent() {
    try { return localStorage.getItem(consentKey) === 'accepted'; } catch { return false; }
  }

  function loadMarketingTools() {
    if (pixelInitialized || !hasMarketingConsent()) return;
    pixelInitialized = true;

    if (pixelIds.length > 0) {
      // Standard Meta Pixel loader. The external library is always asynchronous.
    !function(f,b,e,v,n,t,s) {
      if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;
      s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s);
    }(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
    for (const pixelId of pixelIds) {
      window.fbq('init', pixelId);
      window.fbq('trackSingle', pixelId, 'PageView');
    }
    }

    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function(){ window.dataLayer.push(arguments); };
    window.gtag('js', new Date());
    window.gtag('config', 'G-GE1MPYF2PQ');
    const analyticsScript = document.createElement('script');
    analyticsScript.async = true;
    analyticsScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-GE1MPYF2PQ';
    document.head.append(analyticsScript);
  }

  function trackLead(type, placement) {
    if (!pixelInitialized || typeof window.fbq !== 'function') return;
    try {
      // A WhatsApp click is intent, not a confirmed conversation. Keep it distinct.
      for (const pixelId of pixelIds) {
        window.fbq('trackSingle', pixelId, 'Lead', {
          lead_type: type,
          content_name: 'Website enquiry',
          placement: placement || 'contact'
        });
      }
    } catch {
      // A blocked analytics library must not interrupt an enquiry.
    }
  }

  function showConsentBanner() {
    if (hasMarketingConsent() || document.querySelector('.ppv-consent-banner')) {
      loadMarketingTools();
      return;
    }
    const banner = document.createElement('aside');
    banner.className = 'ppv-consent-banner';
    banner.setAttribute('aria-label', 'Cookie and marketing consent');
    banner.innerHTML = '<div><strong>Privacy choices</strong><p>We use optional analytics and advertising cookies to understand site visits and measure campaigns. Read our <a href="privacy.html">Privacy Policy</a>.</p></div><div class="ppv-consent-actions"><button type="button" data-consent="reject">Decline optional</button><button type="button" data-consent="accept">Accept optional</button></div>';
    document.body.append(banner);
    banner.addEventListener('click', event => {
      const choice = event.target.closest('[data-consent]')?.dataset.consent;
      if (!choice) return;
      try { localStorage.setItem(consentKey, choice === 'accept' ? 'accepted' : 'declined'); } catch { /* Consent can remain session-only. */ }
      banner.remove();
      if (choice === 'accept') loadMarketingTools();
    });
  }

  showConsentBanner();

  const campaignKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'utm_id', 'gclid', 'gbraid', 'wbraid', 'fbclid'];
  const storageKey = 'ppv.campaign.v2';
  const current = new URL(window.location.href);
  const incoming = {};
  for (const key of campaignKeys) {
    const value = current.searchParams.get(key);
    if (value) incoming[key] = value.slice(0, 512);
  }

  let attribution = {};
  try {
    const stored = JSON.parse(sessionStorage.getItem(storageKey) || '{}');
    for (const key of ['landing_url', ...campaignKeys]) {
      if (typeof stored?.[key] === 'string') attribution[key] = key === 'landing_url' ? stored[key] : stored[key].slice(0, 512);
    }
  } catch {
    // Navigation and enquiries still work when browser storage is unavailable.
  }

  const newCampaign = Object.keys(incoming).some(key => incoming[key] !== attribution[key]);
  if (!attribution.landing_url || newCampaign) {
    // Retain the complete initial URL, including its query and fragment.
    attribution = { landing_url: current.href, ...incoming };
  }
  try { sessionStorage.setItem(storageKey, JSON.stringify(attribution)); } catch { /* Storage is optional. */ }

  for (const form of document.querySelectorAll('form[action="Contact-form-handler.php"]')) {
    for (const key of ['landing_url', ...campaignKeys]) {
      let input = form.querySelector(`input[name="${key}"]`);
      if (!input) {
        input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        form.append(input);
      }
      input.defaultValue = attribution[key] || '';
      input.value = input.defaultValue;
    }
  }

  for (const link of document.querySelectorAll('a[href]')) {
    const href = link.getAttribute('href');
    if (href.startsWith('#') || link.hasAttribute('download') || link.dataset.socialUrl) continue;
    const url = new URL(href, current.href);
    if (url.origin !== current.origin || !/^https?:$/.test(url.protocol)) continue;
    if (!url.pathname.endsWith('.html') && !url.pathname.endsWith('/')) continue;
    for (const key of campaignKeys) {
      if (attribution[key] && !url.searchParams.has(key)) url.searchParams.set(key, attribution[key]);
    }
    link.href = url.href;
  }

  for (const link of document.querySelectorAll('[data-social-url]')) {
    try {
      const url = new URL(link.dataset.socialUrl);
      if (url.protocol !== 'https:') continue;
      link.href = url.href;
      link.target = '_blank';
      link.rel = 'noopener';
      link.removeAttribute('aria-disabled');
      link.title = link.getAttribute('aria-label') || 'Studio profile';
    } catch { /* Unresolved social placeholders remain visibly present but inactive. */ }
  }

  for (const year of document.querySelectorAll('[data-copyright-year]')) year.textContent = new Date().getFullYear();

  document.addEventListener('click', event => {
    const link = event.target.closest('a');
    if (!link) return;
    if (link.dataset.socialUrl && link.getAttribute('aria-disabled') === 'true') {
      event.preventDefault();
      return;
    }
    if (link.href.startsWith('https://wa.me/')) {
      const placement = link.classList.contains('ppv-floating-whatsapp') ? 'floating_button' : link.closest('section')?.id || 'footer';
      trackLead('whatsapp_click', placement);
    }
  });

  window.ppvMarketing = { trackLead };
})();
