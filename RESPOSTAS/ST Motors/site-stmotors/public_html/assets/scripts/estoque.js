// estoque.js — submete form ao mudar qualquer select
(function () {
  'use strict';
  const form = document.querySelector('.filtros-form');
  if (!form) return;
  form.querySelectorAll('select').forEach(sel => {
    sel.addEventListener('change', () => form.submit());
  });
})();

// Toggle painel de filtros
(function () {
  'use strict';
  const btn  = document.getElementById('filtro-toggle');
  const wrap = document.getElementById('filtros-wrap');
  if (!btn || !wrap) return;

  // Se há filtro ativo, abre automaticamente
  if (btn.querySelector('.filtro-toggle-badge')) {
    wrap.hidden = false;
    btn.setAttribute('aria-expanded', 'true');
  }

  btn.addEventListener('click', function () {
    const aberto = !wrap.hidden;
    wrap.hidden = aberto;
    btn.setAttribute('aria-expanded', String(!aberto));
  });
})();