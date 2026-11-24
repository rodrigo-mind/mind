(function () {
    'use strict';

    // ── MÁSCARA DE VALORES (custo / venda) ───────────────────
    function formatarPreco(valor) {
        const digits = valor.replace(/\D/g, '');
        if (!digits) return '';
        const num      = parseInt(digits, 10);
        const reais    = Math.floor(num / 100);
        const centavos = num % 100;
        return reais.toLocaleString('pt-BR') + ',' + String(centavos).padStart(2, '0');
    }

    function aplicarMascaraPreco(input) {
        if (!input) return;
        input.addEventListener('input', function () {
            const start  = this.selectionStart;
            const before = this.value.length;
            this.value   = formatarPreco(this.value);
            const delta  = this.value.length - before;
            this.setSelectionRange(start + delta, start + delta);
        });
        input.addEventListener('blur', function () {
            if (this.value && !this.value.includes(',')) this.value += ',00';
        });
    }

    aplicarMascaraPreco(document.getElementById('capacete-custo'));
    aplicarMascaraPreco(document.getElementById('capacete-venda'));

    // ── APENAS NÚMEROS: Quantidade ────────────────────────────
    const qtdInput = document.getElementById('capacete-quantidade');
    if (qtdInput) {
        qtdInput.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');
        });
    }

    // ── UPLOAD DE FOTO (preview + drag-and-drop) ─────────────
    const uploadArea        = document.getElementById('capacete-upload-area');
    const uploadInput       = document.getElementById('capacete-foto');
    const uploadPreview     = document.getElementById('capacete-upload-preview');
    const uploadPlaceholder = document.getElementById('capacete-upload-placeholder');
    const previewImg        = document.getElementById('capacete-preview-img');
    const previewNome       = document.getElementById('capacete-preview-filename');
    const removeBtn         = document.getElementById('capacete-upload-remove');

    function mostrarPreview(file) {
        if (!file || !file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImg.src = e.target.result;
            if (previewNome) previewNome.textContent = file.name;
            uploadPreview.hidden = false;
            uploadPlaceholder.hidden = true;
        };
        reader.readAsDataURL(file);
    }

    function mostrarPreviewUrl(url) {
        previewImg.src = url;
        if (previewNome) previewNome.textContent = url.split('/').pop();
        uploadPreview.hidden = false;
        uploadPlaceholder.hidden = true;
    }

    function limparPreview() {
        uploadInput.value = '';
        previewImg.src = '';
        if (previewNome) previewNome.textContent = '';
        uploadPreview.hidden = true;
        uploadPlaceholder.hidden = false;
    }

    if (uploadArea && uploadInput) {
        uploadInput.addEventListener('change', () => {
            if (uploadInput.files[0]) mostrarPreview(uploadInput.files[0]);
        });

        if (removeBtn) {
            removeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                limparPreview();
                const removerFotoInput = document.getElementById('capacete-remover-foto');
                if (removerFotoInput) removerFotoInput.value = '1';
            });
        }

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file) {
                const dt = new DataTransfer();
                dt.items.add(file);
                uploadInput.files = dt.files;
                mostrarPreview(file);
            }
        });
    }

    // ── MODAL ──────────────────────────────────────────────────
    window.abrirModalNovo = function () {
        const form = document.getElementById('capacete-form');
        form.reset();
        document.getElementById('capacete-id').value = '0';
        document.getElementById('capacete-remover-foto').value = '0';
        document.getElementById('capacete-modal-title').textContent = 'Novo Capacete';
        limparPreview();
        const qtdHint = document.getElementById('capacete-qtd-hint');
        if (qtdHint) qtdHint.style.display = '';
        const fotoHint = document.getElementById('capacete-foto-hint');
        if (fotoHint) fotoHint.style.display = 'none';
        document.getElementById('capacete-modal-overlay').classList.add('open');
        document.getElementById('capacete-codigo').focus();
    };

    window.abrirModalEditar = function (dados) {
        document.getElementById('capacete-id').value          = dados.id;
        document.getElementById('capacete-codigo').value      = dados.codigo;
        document.getElementById('capacete-modelo').value      = dados.modelo;
        document.getElementById('capacete-tamanho').value     = dados.tamanho;
        document.getElementById('capacete-custo').value       = dados.valor_custo;
        document.getElementById('capacete-venda').value       = dados.valor_venda;
        document.getElementById('capacete-quantidade').value  = dados.quantidade;
        document.getElementById('capacete-remover-foto').value = '0';
        document.getElementById('capacete-modal-title').textContent = 'Editar Capacete';

        limparPreview();
        if (dados.foto) mostrarPreviewUrl(dados.foto);

        // Na edição, a quantidade substitui o valor da linha — não é somada.
        const qtdHint = document.getElementById('capacete-qtd-hint');
        if (qtdHint) qtdHint.style.display = 'none';
        const fotoHint = document.getElementById('capacete-foto-hint');
        if (fotoHint) fotoHint.style.display = dados.foto ? '' : 'none';

        document.getElementById('capacete-modal-overlay').classList.add('open');
        document.getElementById('capacete-codigo').focus();
    };

    window.fecharModal = function () {
        document.getElementById('capacete-modal-overlay').classList.remove('open');
    };

    // Fecha ao clicar fora do card e com a tecla Esc
    document.addEventListener('DOMContentLoaded', function () {
        const overlay = document.getElementById('capacete-modal-overlay');
        if (overlay) {
            overlay.addEventListener('click', function (e) {
                if (e.target === overlay) window.fecharModal();
            });
        }
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') window.fecharModal();
    });
})();