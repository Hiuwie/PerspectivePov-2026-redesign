(() => {
  'use strict';

  // Fixed, read-only sources. Never increment the tools counter from this site.
  const publishingUrl = new URL('https://10minuteswiththestar.co.za/');
  publishingUrl.searchParams.set('ppv_preview', String(Date.now()));
  const exportsUrl = 'https://tools.perspectivepov.co.za/api/exports';
  const slides = [
    ['Assets/Images/music-interface-preview.webp', 'Music discovery interface concept'],
    ['Assets/Images/eyewear-interface-preview.webp', 'Eyewear shopping interface concept'],
    ['Assets/Images/travel-interface-preview.webp', 'Travel discovery interface concept'],
    ['Assets/Images/vpn-interface-preview.webp', 'VPN service interface concept']
  ];

  for (const viewport of document.querySelectorAll('[data-live-preview]')) {
    function loadPreview() {
      const frame = document.createElement('iframe');
      frame.title = '10 Minutes with the Star homepage preview';
      frame.tabIndex = -1;
      frame.setAttribute('aria-hidden', 'true');
      frame.setAttribute('inert', '');
      frame.setAttribute('sandbox', 'allow-scripts allow-same-origin');
      frame.referrerPolicy = 'no-referrer';
      const resize = () => { frame.style.transform = `scale(${viewport.clientWidth / 1440})`; };
      resize();
      if ('ResizeObserver' in window) new ResizeObserver(resize).observe(viewport);
      else window.addEventListener('resize', resize);
      frame.addEventListener('load', () => { viewport.dataset.loaded = ''; });
      frame.addEventListener('error', () => { frame.remove(); });
      frame.src = publishingUrl.href;
      viewport.append(frame);
    }
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(entries => {
        if (!entries.some(entry => entry.isIntersecting)) return;
        observer.disconnect();
        loadPreview();
      }, { rootMargin: '100px' });
      observer.observe(viewport);
    } else loadPreview();
  }

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  for (const gallery of document.querySelectorAll('[data-gallery-preview]')) {
    const image = gallery.querySelector('[data-gallery-image]');
    const controls = gallery.querySelector('.ppv-preview-controls');
    const toggle = gallery.querySelector('[data-gallery-action="toggle"]');
    let index = 0;
    let request = 0;
    let timer;
    let paused = reducedMotion.matches;
    let visible = !('IntersectionObserver' in window);
    let hovered = false;

    function schedule() {
      clearTimeout(timer);
      if (paused || !visible || hovered || document.hidden || gallery.contains(document.activeElement)) return;
      timer = setTimeout(() => showSlide(index + 1), 6000);
    }

    function updateToggle() {
      toggle.toggleAttribute('data-paused', paused);
      const label = paused ? 'Play interface slideshow' : 'Pause interface slideshow';
      toggle.setAttribute('aria-label', label);
      toggle.title = label;
      schedule();
    }

    async function showSlide(next) {
      const requestId = ++request;
      const nextIndex = (next + slides.length) % slides.length;
      const [src, alt] = slides[nextIndex];
      const preload = new Image();
      preload.src = src;
      try {
        await preload.decode();
        if (requestId !== request) return;
        image.src = src;
        image.alt = alt;
        index = nextIndex;
      } catch { /* Keep the current interface if the next asset cannot load. */ }
      schedule();
    }

    controls.hidden = false;
    updateToggle();
    controls.addEventListener('click', event => {
      const button = event.target.closest('button');
      if (!button) return;
      if (button.dataset.galleryAction === 'toggle') paused = !paused;
      else {
        paused = true;
        showSlide(index + (button.dataset.galleryAction === 'next' ? 1 : -1));
      }
      updateToggle();
    });
    gallery.addEventListener('mouseenter', () => { hovered = true; schedule(); });
    gallery.addEventListener('mouseleave', () => { hovered = false; schedule(); });
    gallery.addEventListener('focusin', schedule);
    gallery.addEventListener('focusout', () => setTimeout(schedule, 0));
    document.addEventListener('visibilitychange', schedule);
    reducedMotion.addEventListener('change', () => {
      if (reducedMotion.matches) paused = true;
      updateToggle();
    });
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(([entry]) => {
        visible = entry.isIntersecting;
        schedule();
      }).observe(gallery);
    }
  }

  const counts = document.querySelectorAll('[data-export-count]');
  const labels = document.querySelectorAll('[data-export-label]');
  const summary = document.querySelector('[data-export-summary]');
  let refreshing = false;

  async function refreshExports() {
    if (!counts.length || refreshing || document.hidden) return;
    refreshing = true;
    const controller = new AbortController();
    const timeout = setTimeout(() => controller.abort(), 8000);
    try {
      const response = await fetch(exportsUrl, {
        method: 'GET', cache: 'no-store', credentials: 'omit',
        referrerPolicy: 'no-referrer', signal: controller.signal
      });
      if (!response.ok) throw new Error('Counter unavailable');
      const { value } = await response.json();
      if (!Number.isSafeInteger(value) || value < 0) throw new Error('Invalid counter');
      const formatted = new Intl.NumberFormat('en-ZA').format(value);
      for (const count of counts) count.textContent = formatted;
      for (const label of labels) label.textContent = 'Forms exported';
      if (summary) summary.hidden = false;
    } catch {
      // Never show a made-up or stale total when the public API is unavailable.
      for (const count of counts) count.textContent = 'PDF';
      for (const label of labels) label.textContent = 'Document tools';
      if (summary) summary.hidden = true;
    } finally {
      clearTimeout(timeout);
      refreshing = false;
    }
  }

  refreshExports();
  setInterval(refreshExports, 60000);
  window.addEventListener('focus', refreshExports);
  document.addEventListener('visibilitychange', refreshExports);
})();
