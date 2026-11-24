(function () {
  'use strict';

  // ================================
  // HERO SEARCH — autocomplete real via /estoque/api/search.php
  // ================================
  const searchInput        = document.getElementById('search-input');
  const searchForm         = document.querySelector('.hero__search');
  const suggestionsBox     = document.getElementById('search-suggestions');

  let debounceTimer;
  let currentFocus = -1;

  if (searchInput && suggestionsBox) {

    searchInput.addEventListener('input', (e) => {
      clearTimeout(debounceTimer);
      const q = e.target.value.trim();
      if (q.length < 2) { hideSuggestions(); return; }
      debounceTimer = setTimeout(() => fetchSuggestions(q), 280);
    });

    searchInput.addEventListener('keydown', (e) => {
      if (suggestionsBox.hidden) return;
      const items = suggestionsBox.querySelectorAll('[role="option"]');
      if (e.key === 'ArrowDown')  { e.preventDefault(); currentFocus++; activateItem(items); }
      else if (e.key === 'ArrowUp')   { e.preventDefault(); currentFocus--; activateItem(items); }
      else if (e.key === 'Enter') {
        e.preventDefault();
        if (currentFocus > -1 && items[currentFocus]) items[currentFocus].click();
        else if (searchForm) searchForm.submit();
      } else if (e.key === 'Escape') { hideSuggestions(); searchInput.blur(); }
    });
  }

  async function fetchSuggestions(q) {
    try {
      const res  = await fetch('/estoque/api/search.php?q=' + encodeURIComponent(q));
      if (!res.ok) return;
      const data = await res.json();
      if (data.length > 0) renderSuggestions(data);
      else hideSuggestions();
    } catch (_) { hideSuggestions(); }
  }

  function renderSuggestions(items) {
    suggestionsBox.innerHTML = '';
    currentFocus = -1;
    items.slice(0, 7).forEach((item, i) => {
      const div = document.createElement('div');
      div.className = 'hero__search-suggestion-item';
      div.setAttribute('role', 'option');
      div.setAttribute('id', 'sug-' + i);
      div.setAttribute('aria-selected', 'false');
      div.setAttribute('tabindex', '0');
      div.innerHTML =
        '<span class="suggestion-name">' + escHtml(item.marca + ' ' + item.modelo) + '</span>' +
        (item.ano ? '<span class="suggestion-year">' + escHtml(item.ano) + '</span>' : '') +
        '<span class="suggestion-price">R$ ' + escHtml(item.preco) + '</span>';
      div.addEventListener('click', () => {
        window.location.href = '/estoque/motos/' + item.slug;
      });
      div.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); div.click(); }
      });
      suggestionsBox.appendChild(div);
    });
    suggestionsBox.hidden = false;
    searchInput.setAttribute('aria-expanded', 'true');
  }

  function hideSuggestions() {
    if (!suggestionsBox) return;
    suggestionsBox.hidden = true;
    suggestionsBox.innerHTML = '';
    if (searchInput) searchInput.setAttribute('aria-expanded', 'false');
    currentFocus = -1;
  }

  function activateItem(items) {
    if (!items.length) return;
    items.forEach(el => { el.classList.remove('active'); el.setAttribute('aria-selected', 'false'); });
    if (currentFocus >= items.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = items.length - 1;
    items[currentFocus].classList.add('active');
    items[currentFocus].setAttribute('aria-selected', 'true');
    searchInput.setAttribute('aria-activedescendant', items[currentFocus].id);
    items[currentFocus].scrollIntoView({ block: 'nearest', behavior: 'smooth' });
  }

  function escHtml(str) {
    return String(str).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]));
  }

  document.addEventListener('click', (e) => {
    if (searchForm && !searchForm.contains(e.target)) hideSuggestions();
  });

  // ================================
  // SMOOTH SCROLL
  // ================================
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const id = this.getAttribute('href');
      if (!id || id === '#' || !/^#[\w-]+$/.test(id)) return;
      const target = document.querySelector(id);
      if (!target) return;
      e.preventDefault();
      const offset = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--header-height')) || 72;
      window.scrollTo({ top: target.offsetTop - offset, behavior: 'smooth' });
      setTimeout(() => target.focus({ preventScroll: true }), 500);
    });
  });

  // ================================
  // CLEANUP
  // ================================
  window.addEventListener('beforeunload', () => clearTimeout(debounceTimer));

})();

// ================================
// TESTIMONIALS SLIDER
// ================================
(function () {
  const slider       = document.getElementById('testimonials-slider');
  const prevBtn      = document.getElementById('testimonials-prev');
  const nextBtn      = document.getElementById('testimonials-next');
  const dotsContainer = document.getElementById('testimonials-dots');
  if (!slider || !prevBtn || !nextBtn || !dotsContainer) return;

  const cards = slider.querySelectorAll('.testimonial-card');
  let idx = 0;
  let perView = getPerView();

  function getPerView() { return window.innerWidth >= 768 ? 2 : 1; }

  function buildDots() {
    dotsContainer.innerHTML = '';
    const total = Math.ceil(cards.length / perView);
    for (let i = 0; i < total; i++) {
      const btn = document.createElement('button');
      btn.className = 'testimonial-dot' + (i === 0 ? ' active' : '');
      btn.type = 'button'; btn.setAttribute('role','tab');
      btn.setAttribute('aria-label', 'Depoimento ' + (i+1));
      btn.setAttribute('aria-selected', i === 0 ? 'true' : 'false');
      btn.addEventListener('click', () => go(i));
      dotsContainer.appendChild(btn);
    }
  }

  function go(i) {
    const total = Math.ceil(cards.length / perView);
    idx = Math.max(0, Math.min(i, total - 1));
    render();
  }

  function render() {
    const w   = cards[0].offsetWidth;
    const gap = parseInt(getComputedStyle(slider).gap) || 16;
    slider.style.transform = 'translateX(-' + (idx * perView * (w + gap)) + 'px)';
    const dots  = dotsContainer.querySelectorAll('.testimonial-dot');
    const total = Math.ceil(cards.length / perView);
    dots.forEach((d, i) => { d.classList.toggle('active', i === idx); d.setAttribute('aria-selected', i === idx ? 'true' : 'false'); });
    prevBtn.disabled = idx === 0;
    nextBtn.disabled = idx >= total - 1;
  }

  prevBtn.addEventListener('click', () => go(idx - 1));
  nextBtn.addEventListener('click', () => go(idx + 1));

  let tx = 0;
  slider.addEventListener('touchstart', e => { tx = e.changedTouches[0].screenX; }, { passive: true });
  slider.addEventListener('touchend',   e => {
    const d = tx - e.changedTouches[0].screenX;
    if (Math.abs(d) > 50) go(d > 0 ? idx + 1 : idx - 1);
  }, { passive: true });

  let resizeT;
  window.addEventListener('resize', () => {
    clearTimeout(resizeT);
    resizeT = setTimeout(() => {
      const nv = getPerView();
      if (nv !== perView) { perView = nv; idx = 0; buildDots(); render(); }
    }, 150);
  });

  buildDots();
  render();

  let auto;
  const start = () => { auto = setInterval(() => { const t = Math.ceil(cards.length/perView); go(idx >= t-1 ? 0 : idx+1); }, 5000); };
  const stop  = () => clearInterval(auto);
  start();
  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', start);
})();