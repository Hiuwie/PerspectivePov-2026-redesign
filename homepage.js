(() => {
  'use strict';

  const form = document.getElementById('contact-form');
  const status = document.getElementById('message');
  const packageSelect = document.getElementById('quote-package');
  const submit = form.querySelector('[type="submit"]');
  const submitText = submit.querySelector('.ppv-button-label');
  const submitLabel = submitText.textContent;
  let submitting = false;
  let formStarted = false;

  if ('IntersectionObserver' in window) {
    const floatingChat = document.querySelector('.ppv-floating-whatsapp');
    const visibleContactAreas = new Set();
    const observer = new IntersectionObserver(entries => {
      for (const entry of entries) {
        if (entry.isIntersecting) visibleContactAreas.add(entry.target);
        else visibleContactAreas.delete(entry.target);
      }
      floatingChat.hidden = visibleContactAreas.size > 0;
    });
    for (const area of document.querySelectorAll('.ppv-hero, .ppv-final-cta, .ppv-contact')) observer.observe(area);
  }

  // Send only fixed labels to analytics, never enquiry text or contact details.
  function track(eventName, parameters) {
    try {
      if (typeof window.gtag === 'function') window.gtag('event', eventName, parameters);
    } catch { /* Tracking must not interrupt the form or navigation. */ }
  }

  function showStatus(message, state) {
    status.textContent = message;
    status.dataset.state = state;
    status.hidden = false;
    status.focus({ preventScroll: true });
    status.scrollIntoView({ behavior: 'auto', block: 'center' });
  }

  document.addEventListener('click', (event) => {
    const link = event.target.closest('a');
    if (!link) return;
    const placement = link.closest('section')?.id || (link.closest('nav') ? 'navigation' : 'page');
    if (link.dataset.package) {
      packageSelect.value = link.dataset.package;
      track('select_package', { package_name: packageSelect.value, placement });
    } else if (link.hash === '#contact') {
      track('quote_click', { placement });
    }
    if (link.href.startsWith('https://wa.me/')) {
      track('contact_click', { contact_method: 'whatsapp', placement: link.classList.contains('ppv-floating-whatsapp') ? 'floating_button' : placement });
    } else if (link.protocol === 'mailto:' || link.protocol === 'tel:') {
      track('contact_click', { contact_method: link.protocol === 'mailto:' ? 'email' : 'phone', placement });
    }
    const menu = document.getElementById('navbarTogglerDemo02');
    if (link.closest('#navbarTogglerDemo02') && menu.classList.contains('show')) {
      if (window.jQuery?.fn.collapse) window.jQuery(menu).collapse('hide');
      else {
        menu.classList.remove('show');
        document.querySelector('.navbar-toggler').setAttribute('aria-expanded', 'false');
      }
    }
  });

  // Keep the mobile menu usable if the Bootstrap CDN is unavailable.
  document.querySelector('.navbar-toggler').addEventListener('click', (event) => {
    if (window.jQuery?.fn.collapse) return;
    event.stopPropagation();
    const open = document.getElementById('navbarTogglerDemo02').classList.toggle('show');
    event.currentTarget.setAttribute('aria-expanded', String(open));
  });

  form.addEventListener('input', () => {
    if (!formStarted) {
      track('quote_form_start', { form_id: 'website_quote' });
      formStarted = true;
    }
  });

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (submitting || !form.reportValidity()) return;
    submitting = true;
    submit.disabled = true;
    submitText.textContent = 'Sending your enquiry...';
    form.setAttribute('aria-busy', 'true');
    status.hidden = true;
    const body = new FormData(form);
    const controller = new AbortController();
    const timeout = window.setTimeout(() => controller.abort(), 20000);
    try {
      const response = await fetch(form.action, {
        method: 'POST', body, headers: { Accept: 'application/json' }, signal: controller.signal
      });
      const result = await response.json();
      if (!response.ok || result.status !== 'success') throw new Error('Enquiry not accepted');
      track('generate_lead', { method: 'quote_form', package_name: body.get('package') || 'Undecided' });
      window.ppvMarketing?.trackLead('quote_form', 'contact');
      form.reset();
      formStarted = false;
      showStatus('Thank you. Your enquiry has been sent. We will reply by email to discuss your website.', 'success');
    } catch {
      track('quote_form_error', { form_id: 'website_quote' });
      showStatus('We could not confirm your enquiry was sent. Your details are still here. Please try again, email design@perspectivepov.co.za, or use the WhatsApp link below.', 'error');
    } finally {
      window.clearTimeout(timeout);
      submitting = false;
      submit.disabled = false;
      submitText.textContent = submitLabel;
      form.removeAttribute('aria-busy');
    }
  });

  const result = new URLSearchParams(window.location.search).get('status');
  if (result === 'success') {
    showStatus('Thank you. Your enquiry has been sent. We will reply by email to discuss your website.', 'success');
  } else if (result === 'error' || result === 'invalid') {
    showStatus('Your enquiry could not be sent. Check your details and try again, or contact us by email or WhatsApp.', 'error');
  }
})();
