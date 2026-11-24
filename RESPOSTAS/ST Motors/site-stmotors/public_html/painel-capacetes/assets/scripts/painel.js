(function () {
  'use strict';

  // ============================================================
  // LOGIN — mostrar/ocultar senha
  // ============================================================
  const toggleBtn = document.querySelector('.input-toggle-password');
  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      const input = document.getElementById('password');
      if (!input) return;
      input.type = input.type === 'password' ? 'text' : 'password';
    });
  }

  // ============================================================
  // LOGIN — contagem regressiva de bloqueio (movido para fora do
  // inline <script> por causa da Content-Security-Policy)
  // ============================================================
  const lockoutEl = document.getElementById('lockout-timer');
  if (lockoutEl) {
    let s = parseInt(lockoutEl.dataset.lockoutSeconds || lockoutEl.textContent, 10) || 0;
    const timer = setInterval(() => {
      s--;
      if (s <= 0) { clearInterval(timer); location.reload(); return; }
      lockoutEl.textContent = s;
    }, 1000);
  }

  if (!document.body.classList.contains('painel-page')) return;

  // ============================================================
  // HELPERS
  // ============================================================
  const fmtMoney = (v) => 'R$ ' + Number(v || 0).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  const fmtPct1  = (v) => Number(v || 0).toLocaleString('pt-BR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '%';

  function escapeHtml(str) {
    const d = document.createElement('div');
    d.textContent = str ?? '';
    return d.innerHTML;
  }

  let inicial = {};
  const dadosScript = document.getElementById('painel-dados');
  if (dadosScript) {
    try { inicial = JSON.parse(dadosScript.textContent); } catch (e) { console.error('Falha ao ler dados iniciais do painel', e); }
  }
  const mesCache = {}; // ym -> resumo (evita refazer fetch ao reabrir o mesmo mês)

  const state = {
    busca: '',
    filtroEstoque: '',
    ordenar: 'mais_lucrativo',
    periodoCapacetes: 'tudo',
    margemMedia: inicial.margemMedia || 0,
  };

  // ============================================================
  // TABS
  // ============================================================
  const tabBtns = document.querySelectorAll('.tabs__btn');
  tabBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      tabBtns.forEach((b) => {
        b.classList.remove('tabs__btn--active');
        b.setAttribute('aria-selected', 'false');
      });
      btn.classList.add('tabs__btn--active');
      btn.setAttribute('aria-selected', 'true');

      document.querySelectorAll('.tab-panel').forEach((p) => {
        p.hidden = true;
        p.classList.remove('tab-panel--active');
      });
      const target = document.getElementById('tab-' + btn.dataset.tab);
      if (target) {
        target.hidden = false;
        target.classList.add('tab-panel--active');
      }
    });
  });

  // ============================================================
  // RESUMO FINANCEIRO — usado no "Geral" e em cada mês expandido
  // ============================================================
  /**
   * Resumo em lista "indicativo — valor", com 3 níveis de importância
   * (tamanho de fonte): 1 = dinheiro em caixa · 2 = números principais ·
   * 3 = detalhes. Usado no "Geral" e em cada mês expandido.
   */
  function indicadorHtml(nivel, label, value, opts) {
    opts = opts || {};
    const neg = opts.negativo ? ' ind-item--neg' : '';
    const dica = opts.dica ? `<span class="ind-dica">${opts.dica}</span>` : '';
    return `
      <div class="ind-item ind-item--n${nivel}${neg}">
        <span class="ind-label">${label}${dica}</span>
        <span class="ind-valor">${value}</span>
      </div>`;
  }

  function formasHtml(formas) {
    if (!formas || !formas.length) {
      return '<div class="empty-state">Sem pagamentos registrados neste período.</div>';
    }
    return formas.map((f) => indicadorHtml(
      3,
      escapeHtml(f.forma),
      `${fmtMoney(f.valor)}<span class="ind-valor__qtd">${f.qtd} venda${f.qtd === 1 ? '' : 's'}</span>`
    )).join('');
  }

  function resumoBlockHtml(r) {
    return `
      <div class="ind-list">
        ${indicadorHtml(1, 'Dinheiro em caixa', fmtMoney(r.saldo_caixa), {
          negativo: Number(r.saldo_caixa) < 0,
          dica: 'Faturamento em caixa − saídas',
        })}

        <div class="ind-grupo">
          ${indicadorHtml(2, 'Faturamento', fmtMoney(r.faturamento))}
          ${indicadorHtml(2, 'Gastos (saídas de caixa)', fmtMoney(r.total_saidas))}
          ${indicadorHtml(2, 'Lucro total', fmtMoney(r.lucro_total))}
        </div>

        <div class="ind-grupo">
          ${indicadorHtml(3, 'Custo total', fmtMoney(r.custo_total))}
          ${indicadorHtml(3, 'Margem de lucro', fmtPct1(r.margem_pct))}
          ${indicadorHtml(3, 'Faturamento em caixa', fmtMoney(r.faturamento_caixa))}
          ${indicadorHtml(3, 'Lucro em caixa', fmtMoney(r.lucro_caixa))}
          ${indicadorHtml(3, 'Vendido a prazo', fmtMoney(r.total_a_prazo))}
          ${indicadorHtml(3, 'Pendente de recebimento', fmtMoney(r.pendente_receber))}
          ${indicadorHtml(3, 'Ticket médio', fmtMoney(r.ticket_medio))}
          ${indicadorHtml(3, 'Vendas', r.vendas_ativas + (r.vendas_ativas === 1 ? ' ativa' : ' ativas') + ' · ' + r.vendas_canceladas + (r.vendas_canceladas === 1 ? ' cancelada' : ' canceladas'))}
        </div>

        <div class="ind-grupo">
          <div class="ind-subtitulo">Formas de pagamento</div>
          ${formasHtml(r.formas)}
        </div>
      </div>`;
  }

  function renderResumoGeral(resumo) {
    const el = document.getElementById('resumo-geral');
    if (el) el.innerHTML = resumoBlockHtml(resumo);
  }

  // ============================================================
  // MESES — lista colapsada, expande com fetch sob demanda
  // ============================================================
  function renderMesesLista(meses) {
    const el = document.getElementById('meses-lista');
    if (!el) return;

    if (!meses || !meses.length) {
      el.innerHTML = '<div class="empty-state">Nenhuma venda registrada ainda.</div>';
      return;
    }

    el.innerHTML = meses.map((m) => `
      <div class="mes-item" data-ym="${escapeHtml(m.ym)}">
        <div class="mes-item__row">
          <span class="mes-item__label">${escapeHtml(m.label)}</span>
          <span class="mes-item__chevron">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </span>
        </div>
        <div class="mes-item__detail">
          <div class="mes-item__detail-inner"><div class="mes-item__loading">Carregando…</div></div>
        </div>
      </div>`).join('');

    el.querySelectorAll('.mes-item').forEach((item) => {
      const row = item.querySelector('.mes-item__row');
      row.addEventListener('click', () => toggleMes(item));
    });
  }

  async function toggleMes(item) {
    const abrindo = !item.classList.contains('mes-item--open');
    item.classList.toggle('mes-item--open');
    if (!abrindo) return;
    await loadMes(item);
  }

  async function loadMes(item) {
    const ym = item.dataset.ym;
    const inner = item.querySelector('.mes-item__detail-inner');

    if (mesCache[ym]) {
      inner.innerHTML = resumoBlockHtml(mesCache[ym]);
      return;
    }

    try {
      const res = await fetch('/painel-capacetes/api/vendas.php?ym=' + encodeURIComponent(ym));
      if (!res.ok) throw new Error('Falha ao carregar mês');
      const data = await res.json();
      mesCache[ym] = data.resumo;
      inner.innerHTML = resumoBlockHtml(data.resumo);
    } catch (e) {
      console.error(e);
      inner.innerHTML = '<div class="empty-state">Não foi possível carregar este mês.</div>';
    }
  }

  // ============================================================
  // ABA "CAPACETES"
  // ============================================================
  const listaEl = document.getElementById('capacetes-lista');
  const buscaInput = document.getElementById('capacetes-busca');
  const ordenarSelect = document.getElementById('capacetes-ordenar');
  const periodoSelect = document.getElementById('capacetes-periodo');
  const filtroChips = document.querySelectorAll('#capacetes-filtro-estoque .chip');

  function iconeCapacete() {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 18c1.5-1.5 2.5-3.5 2.5-6.5 0-4.5-3.5-8-8.5-8C8 3.5 5 5 4 8c-.8 2.5-.8 5 .5 7.5l2 2.5C8 19 10 20 12.5 20h2.5c1.5 0 3-1 4-2z"/><path d="M4 11h9.5c1.5 0 2-1 2-2.5S14.5 6 12 6H7.5"/></svg>';
  }

  function renderCapacetes(lista, margemMedia) {
    if (!listaEl) return;
    if (!lista.length) {
      listaEl.innerHTML = '<div class="empty-state">Nenhum capacete encontrado para os filtros atuais.</div>';
      return;
    }

    listaEl.innerHTML = lista.map((item, idx) => {
      const semEstoque = item.descontinuado || item.estoque_atual <= 0;
      const thumb = item.foto ? `<img src="${item.foto}" alt="">` : iconeCapacete();
      const estoqueTexto = item.descontinuado ? 'Fora de linha' : `${item.estoque_atual} un. em estoque`;
      const markerPos = Math.max(0, Math.min(100, margemMedia));
      const fillPos = Math.max(0, Math.min(100, item.margem_pct));

      return `
        <div class="capacete-item" data-idx="${idx}">
          <div class="capacete-item__row">
            <div class="capacete-item__thumb">${thumb}</div>
            <div class="capacete-item__info">
              <span class="capacete-item__nome">${escapeHtml(item.modelo)} — ${escapeHtml(item.tamanho)}${item.descontinuado ? '<span class="badge">Descontinuado</span>' : ''}</span>
              <span class="capacete-item__estoque ${semEstoque ? 'capacete-item__estoque--baixo' : ''}">${estoqueTexto}</span>
            </div>
            <div></div>
            <div class="capacete-item__lucro">
              <span class="capacete-item__lucro-valor">${fmtMoney(item.lucro_total)}</span>
              <span class="capacete-item__lucro-label">lucro total</span>
            </div>
            <span class="capacete-item__chevron">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </div>
          <div class="capacete-item__detail">
            <div class="capacete-item__detail-inner">
              <div class="detail-stat"><span class="detail-stat__label">Código</span><span class="detail-stat__value">${escapeHtml(item.codigo)}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Custo unitário</span><span class="detail-stat__value">${fmtMoney(item.valor_custo)}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Venda unitária</span><span class="detail-stat__value">${fmtMoney(item.valor_venda)}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Lucro unitário</span><span class="detail-stat__value">${fmtMoney(item.lucro_unitario)}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Margem</span><span class="detail-stat__value">${item.margem_pct.toLocaleString('pt-BR', { maximumFractionDigits: 1 })}%</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Qtd. vendida</span><span class="detail-stat__value">${item.qtd_vendida}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Receita total</span><span class="detail-stat__value">${fmtMoney(item.receita_total)}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Custo total</span><span class="detail-stat__value">${fmtMoney(item.custo_total)}</span></div>
              <div class="detail-stat"><span class="detail-stat__label">Lucro total</span><span class="detail-stat__value">${fmtMoney(item.lucro_total)}</span></div>
              <div class="margin-bar-wrap detail-stat">
                <span class="detail-stat__label">Margem vs. média geral (${margemMedia.toLocaleString('pt-BR', { maximumFractionDigits: 1 })}%)</span>
                <div class="margin-bar">
                  <div class="margin-bar__fill" style="width:${fillPos}%"></div>
                  <div class="margin-bar__marker" style="left:${markerPos}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>`;
    }).join('');

    listaEl.querySelectorAll('.capacete-item__row').forEach((row) => {
      row.addEventListener('click', () => {
        row.closest('.capacete-item').classList.toggle('capacete-item--open');
      });
    });
  }

  let buscaTimeout = null;
  async function carregarCapacetes() {
    const params = new URLSearchParams({
      busca: state.busca,
      filtro: state.filtroEstoque,
      ordenar: state.ordenar,
      ym: state.periodoCapacetes,
    });
    try {
      const res = await fetch('/painel-capacetes/api/capacetes.php?' + params.toString());
      if (!res.ok) throw new Error('Falha ao carregar capacetes');
      const data = await res.json();
      state.margemMedia = data.margem_media;
      renderCapacetes(data.capacetes, data.margem_media);
    } catch (e) {
      console.error(e);
    }
  }

  buscaInput?.addEventListener('input', () => {
    state.busca = buscaInput.value;
    clearTimeout(buscaTimeout);
    buscaTimeout = setTimeout(carregarCapacetes, 300);
  });

  ordenarSelect?.addEventListener('change', () => {
    state.ordenar = ordenarSelect.value;
    carregarCapacetes();
  });

  periodoSelect?.addEventListener('change', () => {
    state.periodoCapacetes = periodoSelect.value;
    carregarCapacetes();
  });

  filtroChips.forEach((chip) => {
    chip.addEventListener('click', () => {
      filtroChips.forEach((c) => c.classList.remove('chip--active'));
      chip.classList.add('chip--active');
      state.filtroEstoque = chip.dataset.filtro || '';
      carregarCapacetes();
    });
  });

  // ============================================================
  // ABA "ESTOQUE"
  // ============================================================
  function renderEstoque(e) {
    const el = document.getElementById('estoque-resumo');
    if (!el || !e) return;

    const plural = (n, um, varios) => n + ' ' + (n === 1 ? um : varios);
    const top = (e.maior_capital || []).map((t) => indicadorHtml(
      3,
      escapeHtml(t.modelo) + ' — ' + escapeHtml(t.tamanho),
      `${fmtMoney(t.investido)}<span class="ind-valor__qtd">${plural(t.quantidade, 'un.', 'un.')}</span>`
    )).join('');

    el.innerHTML = `
      <div class="ind-list">
        ${indicadorHtml(1, 'Investido em estoque', fmtMoney(e.investido), {
          dica: 'Soma dos valores de compra (custo × quantidade)',
        })}

        <div class="ind-grupo">
          ${indicadorHtml(2, 'Valor de venda do estoque', fmtMoney(e.valor_venda))}
          ${indicadorHtml(2, 'Lucro potencial', fmtMoney(e.lucro_potencial))}
          ${indicadorHtml(2, 'Capacetes em estoque', plural(e.unidades, 'unidade', 'unidades'))}
        </div>

        <div class="ind-grupo">
          ${indicadorHtml(3, 'Margem potencial', fmtPct1(e.margem_potencial))}
          ${indicadorHtml(3, 'Custo médio por unidade', fmtMoney(e.custo_medio))}
          ${indicadorHtml(3, 'Preço médio de venda por unidade', fmtMoney(e.preco_medio))}
          ${indicadorHtml(3, 'Modelos diferentes', String(e.modelos))}
          ${indicadorHtml(3, 'Itens cadastrados (modelo/tamanho)', String(e.registros))}
          ${indicadorHtml(3, 'Esgotados (0 un.)', String(e.sem_estoque))}
          ${indicadorHtml(3, 'Estoque baixo (1 a ' + e.baixo_max + ' un.)', String(e.estoque_baixo))}
        </div>

        <div class="ind-grupo">
          <div class="ind-subtitulo">Maior capital parado em estoque</div>
          ${top || '<div class="empty-state">Nenhum capacete em estoque.</div>'}
        </div>
      </div>`;
  }

  // ============================================================
  // CARGA INICIAL (usa dados já renderizados pelo PHP)
  // ============================================================
  if (inicial.resumoGeral) renderResumoGeral(inicial.resumoGeral);
  if (inicial.meses) renderMesesLista(inicial.meses);
  if (inicial.capacetes) renderCapacetes(inicial.capacetes, inicial.margemMedia);
  if (inicial.estoque) renderEstoque(inicial.estoque);

})();
