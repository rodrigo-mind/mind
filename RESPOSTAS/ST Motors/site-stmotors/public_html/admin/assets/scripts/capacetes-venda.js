(function () {
    'use strict';

    // ── MÁSCARA DE VALORES (R$) — mesmo padrão do módulo de estoque ──
    function formatarPreco(valor) {
        const digits = valor.replace(/\D/g, '');
        if (!digits) return '';
        const num      = parseInt(digits, 10);
        const reais    = Math.floor(num / 100);
        const centavos = num % 100;
        return reais.toLocaleString('pt-BR') + ',' + String(centavos).padStart(2, '0');
    }
    function aplicarMascaraPreco(input) {
        input.addEventListener('input', function () {
            const start  = this.selectionStart;
            const before = this.value.length;
            this.value   = formatarPreco(this.value);
            const delta  = this.value.length - before;
            this.setSelectionRange(start + delta, start + delta);
        });
    }

    // ── DINHEIRO EM CENTAVOS (inteiros) ───────────────────────
    // Mesmo princípio do módulo de referência: nunca somar/subtrair
    // reais em float (gera sobra de centavo quando há várias formas
    // de pagamento). Todo cálculo é feito em centavos inteiros; a
    // conversão pra reais só acontece na hora de exibir.

    // "1.234,56" / "1234,56" -> 123456 (centavos)
    function paraCentavos(txt) {
        if (txt == null) return 0;
        let s = String(txt).trim().replace(/[^0-9,.\-]/g, '');
        if (s === '') return 0;
        if (s.includes(',') && s.includes('.')) {
            s = s.replace(/\./g, '').replace(',', '.');
        } else if (s.includes(',')) {
            s = s.replace(',', '.');
        }
        const n = parseFloat(s);
        return isNaN(n) ? 0 : Math.round(n * 100);
    }
    // "199.9" (decimal do banco, vindo de data-valor) -> 19990 (centavos)
    function centavosDoDataset(str) {
        const n = parseFloat(str);
        return isNaN(n) ? 0 : Math.round(n * 100);
    }
    // 123456 -> "R$ 1.234,56"
    function brl(centavos) {
        return 'R$ ' + (centavos / 100).toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });
    }
    // 123456 -> "1234,56" (pra preencher inputs de valor)
    function centavosParaInput(centavos) {
        return (centavos / 100).toFixed(2).replace('.', ',');
    }

    // ── MÁSCARAS: CPF e Telefone ──────────────────────────────
    const cpfInput = document.getElementById('cv-cpf');
    if (cpfInput) {
        cpfInput.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            v = v.replace(/(\d{3})(\d)/, '$1.$2')
                 .replace(/(\d{3})(\d)/, '$1.$2')
                 .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            this.value = v;
        });
    }
    const telInput = document.getElementById('cv-telefone');
    if (telInput) {
        telInput.addEventListener('input', function () {
            let v = this.value.replace(/\D/g, '').slice(0, 11);
            if (v.length > 10) {
                v = v.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else {
                v = v.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            }
            this.value = v;
        });
    }

    // ── VALIDAÇÃO DE CAMPOS OBRIGATÓRIOS ──────────────────────
    // Nenhum campo obrigatório deve deixar o form ser enviado (e a página
    // recarregar) sem avisar antes. Cada campo tem seu próprio aviso, e
    // some assim que o usuário corrige o valor.
    const nomeInput  = document.getElementById('cv-nome');
    const formErroEl = document.getElementById('cv-form-erro');

    function marcarInvalido(input, hintEl) {
        if (input) input.classList.add('campo-invalido');
        if (hintEl) hintEl.hidden = false;
    }
    function limparInvalido(input, hintEl) {
        if (input) input.classList.remove('campo-invalido');
        if (hintEl) hintEl.hidden = true;
    }
    function mostrarErroGeral(msg) {
        if (!formErroEl) return;
        formErroEl.textContent = msg;
        formErroEl.hidden = false;
    }
    function limparErroGeral() {
        if (!formErroEl) return;
        formErroEl.hidden = true;
        formErroEl.textContent = '';
    }

    if (nomeInput) {
        nomeInput.addEventListener('input', function () {
            limparInvalido(this, document.getElementById('cv-nome-erro'));
        });
    }
    if (cpfInput) {
        cpfInput.addEventListener('input', function () {
            limparInvalido(this, document.getElementById('cv-cpf-erro'));
        });
    }
    if (telInput) {
        telInput.addEventListener('input', function () {
            limparInvalido(this, document.getElementById('cv-telefone-erro'));
        });
    }

    // ── PRODUTOS DISPONÍVEIS (lidos das options do template) ──
    const tplItem   = document.getElementById('cv-tpl-item');
    const listaItens = document.getElementById('cv-itens-lista');
    const btnAddItem = document.getElementById('cv-btn-add-item');

    function coletarProdutos() {
        const opts = tplItem.content.querySelectorAll('.cv-it-produto option[value]:not([value=""])');
        return Array.from(opts).map(o => ({
            id:       o.value,
            codigo:   o.dataset.codigo,
            valor:    o.dataset.valor,
            custo:    o.dataset.custo,
            estoque:  parseInt(o.dataset.estoque, 10) || 0,
        }));
    }
    const produtos = coletarProdutos();

    function atualizarLinhaItem(linha) {
        const select = linha.querySelector('.cv-it-produto');
        const opt    = select.selectedOptions[0];
        const unit   = linha.querySelector('.cv-it-unit');
        const qtdEl  = linha.querySelector('.cv-it-qtd');
        const descEl = linha.querySelector('.cv-it-desconto');
        const gorjEl = linha.querySelector('.cv-it-gorjeta');
        const totEl  = linha.querySelector('.cv-it-total');

        if (opt && opt.value) {
            const valorCent = centavosDoDataset(opt.dataset.valor);
            unit.value  = centavosParaInput(valorCent);
            qtdEl.max   = opt.dataset.estoque;
        } else {
            unit.value = '';
        }

        const valorUnitCent = opt ? centavosDoDataset(opt.dataset.valor) : 0;
        const qtd      = parseInt(qtdEl.value, 10) || 0;
        const descCent = paraCentavos(descEl.value);
        const gorjCent = paraCentavos(gorjEl.value);
        const totalCent = Math.max(0, (valorUnitCent * qtd) - descCent + gorjCent);
        totEl.textContent = brl(totalCent);

        recalcularTotais();
    }

    function criarLinhaItem() {
        const frag  = tplItem.content.cloneNode(true);
        const linha = frag.querySelector('.cv-linha-item');

        const selectProduto = linha.querySelector('.cv-it-produto');
        const inputCodigo   = linha.querySelector('.cv-it-codigo');
        const descEl        = linha.querySelector('.cv-it-desconto');
        const gorjEl         = linha.querySelector('.cv-it-gorjeta');
        const qtdEl          = linha.querySelector('.cv-it-qtd');

        aplicarMascaraPreco(descEl);
        aplicarMascaraPreco(gorjEl);

        // Produto -> completa o código
        selectProduto.addEventListener('change', function () {
            const opt = this.selectedOptions[0];
            inputCodigo.value = opt && opt.value ? opt.dataset.codigo : '';
            atualizarLinhaItem(linha);
        });

        // Código -> completa/seleciona o produto
        inputCodigo.addEventListener('input', function () {
            const codigo = this.value.trim().toUpperCase();
            const match  = produtos.find(p => p.codigo.toUpperCase() === codigo);
            if (match) {
                selectProduto.value = match.id;
                atualizarLinhaItem(linha);
            }
        });

        qtdEl.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');
            atualizarLinhaItem(linha);
        });
        descEl.addEventListener('input', () => atualizarLinhaItem(linha));
        gorjEl.addEventListener('input', () => atualizarLinhaItem(linha));

        // Assim que um capacete é escolhido, o aviso de erro (se houver) some.
        selectProduto.addEventListener('change', function () {
            const erroEl = linha.querySelector('.cv-it-erro');
            if (this.value && erroEl) erroEl.hidden = true;
        });

        linha.querySelector('.cv-btn-remover').addEventListener('click', function () {
            linha.remove();
            recalcularTotais();
        });

        listaItens.appendChild(linha);
    }

    btnAddItem.addEventListener('click', criarLinhaItem);
    criarLinhaItem(); // primeira linha já vem pronta

    // ── PAGAMENTOS ──────────────────────────────────────────────
    const tplPagto        = document.getElementById('cv-tpl-pagamento');
    const listaPagtos      = document.getElementById('cv-pagamentos-lista');
    const btnAddPagamento  = document.getElementById('cv-btn-add-pagamento');
    const obsTextarea      = document.getElementById('cv-observacoes');
    const obsHint          = document.getElementById('cv-observacoes-hint');

    function totalVendaCent() {
        let total = 0;
        listaItens.querySelectorAll('.cv-linha-item').forEach(linha => {
            const opt      = linha.querySelector('.cv-it-produto').selectedOptions[0];
            const valorCent = opt ? centavosDoDataset(opt.dataset.valor) : 0;
            const qtd      = parseInt(linha.querySelector('.cv-it-qtd').value, 10) || 0;
            const descCent = paraCentavos(linha.querySelector('.cv-it-desconto').value);
            const gorjCent = paraCentavos(linha.querySelector('.cv-it-gorjeta').value);
            total += Math.max(0, (valorCent * qtd) - descCent + gorjCent);
        });
        return total;
    }

    function criarLinhaPagamento(principal) {
        const frag  = tplPagto.content.cloneNode(true);
        const linha = frag.querySelector('.cv-linha-pagto');
        const valorEl = linha.querySelector('.cv-pg-valor');
        const formaEl = linha.querySelector('.cv-pg-forma');
        const vencWrap = linha.querySelector('.cv-campo-venc');
        const vencInput = linha.querySelector('.cv-pg-vencimento');
        const btnRemover = linha.querySelector('.cv-btn-remover');

        aplicarMascaraPreco(valorEl);
        linha.dataset.prevValorCent = '0'; // rastreia o valor anterior (em centavos) desta linha

        if (principal) {
            linha.dataset.principal = '1';
            btnRemover.remove();
            valorEl.readOnly = true;
        }

        function limparErroVencimento() {
            vencInput.classList.remove('campo-invalido');
            const erroEl = linha.querySelector('.cv-venc-erro');
            if (erroEl) erroEl.hidden = true;
        }

        function atualizarVencimento() {
            const ehReceber = formaEl.value === 'A_RECEBER';
            vencWrap.hidden = !ehReceber;
            if (!ehReceber) vencInput.value = '';
            limparErroVencimento();

            if (principal) {
                valorEl.readOnly = !ehReceber;
                if (!ehReceber) recalcularPrincipal();
            }
        }

        // Assim que o usuário preenche a data, o aviso de erro some.
        vencInput.addEventListener('input', limparErroVencimento);

        // Assim que o usuário digita um valor, o aviso de erro (se houver) some.
        valorEl.addEventListener('input', function () {
            const erroEl = linha.querySelector('.cv-pg-valor-erro');
            if (erroEl) erroEl.hidden = true;
            this.classList.remove('campo-invalido');
        });

        // Ao digitar um valor nesta linha, o montante é retirado da linha
        // IMEDIATAMENTE ACIMA (não sempre da principal) — mantém o total
        // da venda sempre igual, só redistribui em cascata.
        valorEl.addEventListener('input', function () {
            redistribuirParaCima(linha);
        });

        formaEl.addEventListener('change', () => { atualizarVencimento(); atualizarObservacaoObrigatoria(); });
        valorEl.addEventListener('input', recalcularTotais);
        if (!principal) {
            btnRemover.addEventListener('click', function () {
                linha.remove();
                recalcularTotais();
            });
        }

        atualizarVencimento();
        listaPagtos.appendChild(linha);
        // Recalcula assim que a linha entra no DOM: garante que a principal
        // absorva o restante imediatamente ao incluir uma nova forma
        // (mesmo antes de o usuário digitar qualquer valor nela).
        recalcularTotais();
        return linha;
    }

    // ── PREV-VALOR: guarda o último valor (em centavos) de cada linha de
    // pagamento, pra dar pra calcular o delta digitado a cada input ──
    function pegarValorAnteriorCent(linha) {
        return parseInt(linha.dataset.prevValorCent || '0', 10) || 0;
    }
    function definirValorAnteriorCent(linha, cent) {
        linha.dataset.prevValorCent = String(cent);
    }

    // Ao editar o valor de uma linha secundária, o delta digitado (novo
    // valor menos o valor anterior dessa mesma linha) é subtraído da linha
    // IMEDIATAMENTE ACIMA — e não sempre da principal fixa lá no topo.
    // Isso faz o total da venda nunca se mover: o dinheiro só troca de
    // lugar entre a linha editada e a linha vizinha de cima.
    //
    // Exceção: se a linha de cima for a principal em modo automático
    // (readOnly), não mexemos nela aqui — a própria recalcularPrincipal()
    // já absorve a diferença normalmente, porque ela é calculada como
    // "total - soma de todas as outras linhas".
    function redistribuirParaCima(linhaAtual) {
        if (linhaAtual.dataset.principal === '1') return; // a principal não "empurra", ela é o topo

        const linhas = Array.from(listaPagtos.querySelectorAll('.cv-linha-pagto'));
        const idx    = linhas.indexOf(linhaAtual);
        const novoCent = paraCentavos(linhaAtual.querySelector('.cv-pg-valor').value);

        if (idx > 0) {
            const anterior        = linhas[idx - 1];
            const valorAnteriorEl = anterior.querySelector('.cv-pg-valor');

            if (!valorAnteriorEl.readOnly) {
                const antesCent = pegarValorAnteriorCent(linhaAtual);
                const delta     = novoCent - antesCent;

                if (delta !== 0) {
                    const anteriorNovoCent = paraCentavos(valorAnteriorEl.value) - delta;
                    valorAnteriorEl.value = centavosParaInput(anteriorNovoCent);
                    valorAnteriorEl.classList.toggle('cv-pg-valor--negativo', anteriorNovoCent < 0);
                    definirValorAnteriorCent(anterior, anteriorNovoCent);
                }
            }
        }

        definirValorAnteriorCent(linhaAtual, novoCent);
    }

    function recalcularPrincipal() {
        const linhas = Array.from(listaPagtos.querySelectorAll('.cv-linha-pagto'));
        const principal = linhas.find(l => l.dataset.principal === '1');
        if (!principal) return;
        if (principal.querySelector('.cv-pg-forma').value === 'A_RECEBER') return; // editável nesse caso

        const outrasCent = linhas.filter(l => l !== principal)
            .reduce((soma, l) => soma + paraCentavos(l.querySelector('.cv-pg-valor').value), 0);
        // Não trava em zero: se as demais formas somarem mais que o total,
        // mostramos o valor negativo para o operador perceber o erro
        // (mesma lógica do módulo de referência de vendas).
        const restanteCent = totalVendaCent() - outrasCent;
        const valorEl = principal.querySelector('.cv-pg-valor');
        valorEl.value = centavosParaInput(restanteCent);
        valorEl.classList.toggle('cv-pg-valor--negativo', restanteCent < 0);
    }

    function atualizarObservacaoObrigatoria() {
        const temFinanciamento = Array.from(listaPagtos.querySelectorAll('.cv-pg-forma'))
            .some(s => s.value === 'FINANCIAMENTO');
        obsHint.style.display = temFinanciamento ? '' : 'none';
        obsTextarea.required  = temFinanciamento;
        obsTextarea.placeholder = temFinanciamento
            ? 'De qual financiamento essa venda faz parte?'
            : 'Observações da venda (opcional)';
        if (!temFinanciamento) {
            limparInvalido(obsTextarea, document.getElementById('cv-observacoes-erro'));
        }
    }
    obsTextarea.addEventListener('input', function () {
        limparInvalido(this, document.getElementById('cv-observacoes-erro'));
    });

    // ── TOTAIS (resumo) ──────────────────────────────────────────
    // Precisa vir ANTES da criação das linhas de pagamento: criarLinhaPagamento()
    // já chama recalcularTotais() internamente para que a principal absorva o
    // restante assim que uma linha entra no DOM.
    const elTotal    = document.getElementById('cv-resumo-total');
    const elPago     = document.getElementById('cv-resumo-pago');
    const elRestante = document.getElementById('cv-resumo-restante');
    const elTotalGeral = document.getElementById('cv-total-geral');

    function recalcularTotais() {
        recalcularPrincipal();
        const totalCent = totalVendaCent();
        const pagoCent  = Array.from(listaPagtos.querySelectorAll('.cv-pg-valor'))
            .reduce((soma, el) => soma + paraCentavos(el.value), 0);
        const restanteCent = totalCent - pagoCent;

        elTotal.textContent      = brl(totalCent);
        elPago.textContent       = brl(pagoCent);
        elRestante.textContent   = brl(restanteCent);
        elTotalGeral.textContent = brl(totalCent);

        // Com tudo em centavos inteiros a comparação é exata — sem
        // precisar de tolerância pra erro de arredondamento de float.
        elRestante.parentElement.classList.toggle('cv-resumo__linha--ok', restanteCent === 0);
    }

    btnAddPagamento.addEventListener('click', function () {
        criarLinhaPagamento(false); // já recalcula a principal internamente
    });
    criarLinhaPagamento(true); // linha principal, fixa — dispara o 1º recalcularTotais()

    // ── SUBMIT: valida tudo e só então monta os JSON de itens/pagamentos ──
    const form = document.getElementById('venda-form');
    form.addEventListener('submit', function (e) {
        limparErroGeral();
        let primeiroInvalido = null;
        const errosGerais = [];
        function registrarInvalido(el) {
            if (!primeiroInvalido) primeiroInvalido = el;
        }

        // -- Cliente --
        const nomeOk = nomeInput.value.trim() !== '';
        if (!nomeOk) {
            marcarInvalido(nomeInput, document.getElementById('cv-nome-erro'));
            registrarInvalido(nomeInput);
        }

        const cpfDigits = cpfInput.value.replace(/\D/g, '');
        if (cpfDigits.length !== 11) {
            marcarInvalido(cpfInput, document.getElementById('cv-cpf-erro'));
            registrarInvalido(cpfInput);
        }

        const telDigits = telInput.value.replace(/\D/g, '');
        if (telDigits.length < 10 || telDigits.length > 11) {
            marcarInvalido(telInput, document.getElementById('cv-telefone-erro'));
            registrarInvalido(telInput);
        }

        // -- Capacetes: cada linha precisa ter um produto selecionado --
        const linhasItem = Array.from(listaItens.querySelectorAll('.cv-linha-item'));
        if (linhasItem.length === 0) {
            errosGerais.push('Adicione ao menos um capacete.');
        }
        const itens = linhasItem.map(linha => {
            const opt = linha.querySelector('.cv-it-produto').selectedOptions[0];
            const erroEl = linha.querySelector('.cv-it-erro');
            if (!opt || !opt.value) {
                marcarInvalido(null, erroEl);
                registrarInvalido(linha.querySelector('.cv-it-produto'));
            }
            return {
                capacete_id: opt ? opt.value : '',
                quantidade:  linha.querySelector('.cv-it-qtd').value,
                desconto:    linha.querySelector('.cv-it-desconto').value || '0',
                gorjeta:     linha.querySelector('.cv-it-gorjeta').value || '0',
            };
        });

        // -- Pagamentos: forma + valor > 0, e vencimento nas linhas "A Receber" --
        const linhasPagto = Array.from(listaPagtos.querySelectorAll('.cv-linha-pagto'));
        if (linhasPagto.length === 0) {
            errosGerais.push('Informe ao menos uma forma de pagamento.');
        }
        const pagamentos = linhasPagto.map(linha => {
            const valorInput = linha.querySelector('.cv-pg-valor');
            const valorCent  = paraCentavos(valorInput.value);
            if (valorCent <= 0) {
                marcarInvalido(valorInput, linha.querySelector('.cv-pg-valor-erro'));
                registrarInvalido(valorInput);
            }

            const forma = linha.querySelector('.cv-pg-forma').value;
            const vencInput = linha.querySelector('.cv-pg-vencimento');
            if (forma === 'A_RECEBER' && !vencInput.value) {
                marcarInvalido(vencInput, linha.querySelector('.cv-venc-erro'));
                registrarInvalido(vencInput);
            }

            return {
                forma,
                valor:            valorInput.value || '0',
                data_vencimento:  vencInput.value || '',
            };
        });

        // -- Observações obrigatórias quando há Financiamento --
        if (obsTextarea.required && obsTextarea.value.trim() === '') {
            marcarInvalido(obsTextarea, document.getElementById('cv-observacoes-erro'));
            registrarInvalido(obsTextarea);
        }

        // -- Soma dos pagamentos precisa bater com o total da venda --
        // (tudo em centavos inteiros: a comparação é exata, sem tolerância)
        if (linhasItem.length > 0 && linhasPagto.length > 0) {
            const totalCent = totalVendaCent();
            const pagoCent  = linhasPagto.reduce((soma, l) => soma + paraCentavos(l.querySelector('.cv-pg-valor').value), 0);
            if (totalCent !== pagoCent) {
                errosGerais.push(
                    'A soma dos pagamentos (' + brl(pagoCent) + ') difere do total da venda (' + brl(totalCent) + ').'
                );
            }
        }

        if (errosGerais.length > 0) {
            mostrarErroGeral(errosGerais.join(' '));
        }

        if (primeiroInvalido || errosGerais.length > 0) {
            e.preventDefault();
            if (primeiroInvalido) {
                primeiroInvalido.focus();
                primeiroInvalido.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                formErroEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }

        document.getElementById('itens_json').value      = JSON.stringify(itens);
        document.getElementById('pagamentos_json').value = JSON.stringify(pagamentos);
    });
})();