(() => {
  'use strict';
  if (window.ppvMarketing) return;

  // Owner: replace {{META_PIXEL_ID}} with the numeric ID from Meta Events Manager.
  // Leaving it empty or unresolved makes no Meta requests and sends no events.
  const pixelId = '4352910478258597';
  const pixelEnabled = /^\d{5,20}$/.test(pixelId);
  if (pixelEnabled) {
    // Standard Meta Pixel loader. The external library is always asynchronous.
    !function(f,b,e,v,n,t,s) {
      if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;
      s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s);
    }(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
    window.fbq('init', pixelId);
    window.fbq('trackSingle', pixelId, 'PageView');
  }

  function trackLead(type, placement) {
    if (!pixelEnabled || typeof window.fbq !== 'function') return;
    try {
      // A WhatsApp click is intent, not a confirmed conversation. Keep it distinct.
      window.fbq('trackSingle', pixelId, 'Lead', {
        lead_type: type,
        content_name: 'Website enquiry',
        placement: placement || 'contact'
      });
    } catch {
      // A blocked analytics library must not interrupt an enquiry.
    }
  }

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
