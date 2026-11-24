(function () {
    'use strict';

    // ── MÁSCARA DE PREÇO ──────────────────────────────────────
    const precoInput = document.getElementById('preco');
    if (precoInput) {
        function formatarPreco(valor) {
            const digits = valor.replace(/\D/g, '');
            if (!digits) return '';
            const num      = parseInt(digits, 10);
            const reais    = Math.floor(num / 100);
            const centavos = num % 100;
            return reais.toLocaleString('pt-BR') + ',' + String(centavos).padStart(2, '0');
        }
        precoInput.addEventListener('input', function () {
            const start  = this.selectionStart;
            const before = this.value.length;
            this.value   = formatarPreco(this.value);
            const delta  = this.value.length - before;
            this.setSelectionRange(start + delta, start + delta);
        });
        precoInput.addEventListener('blur', function () {
            if (this.value && !this.value.includes(',')) this.value += ',00';
        });
    }

    // ── MÁSCARA DE PLACA ─────────────────────────────────────
    const placaInput = document.getElementById('placa');
    if (placaInput) {
        placaInput.addEventListener('input', function () {
            let v = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
            if (v.length > 7) v = v.slice(0, 7);
            if (v.length > 3) v = v.slice(0, 3) + '-' + v.slice(3);
            this.value = v;
        });
    }

    // ── APENAS NÚMEROS: Cilindrada e KM ──────────────────────
    ['cilindrada', 'km'].forEach(function (id) {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');
        });
    });

    // ── PREVIEW DE FOTOS + DRAG & DROP ───────────────────────
    const fotosInput    = document.getElementById('fotos-input');
    const fotosPreview  = document.getElementById('fotos-preview');
    const fotosHint     = document.getElementById('fotos-hint');
    const uploadArea    = document.getElementById('fotos-upload-area');
    const MAX_FOTOS     = 8;

    function renderPreview(files) {
        if (!fotosPreview) return;
        fotosPreview.innerHTML = '';
        if (!files || files.length === 0) {
            if (fotosHint) fotosHint.textContent = '';
            return;
        }

        // Obtém quantas fotos já existem (via atributo data ou fallback 0)
        const jaExistem = parseInt(uploadArea?.dataset.existentes || '0', 10);
        const restantes = Math.max(0, MAX_FOTOS - jaExistem);

        Array.from(files).slice(0, MAX_FOTOS).forEach(function (file) {
            if (!file.type.startsWith('image/')) return;
            const wrap  = document.createElement('div');
            wrap.className = 'fotos-preview__thumb';
            const img  = document.createElement('img');
            const reader = new FileReader();
            reader.onload = function (e) { img.src = e.target.result; };
            reader.readAsDataURL(file);
            wrap.appendChild(img);
            fotosPreview.appendChild(wrap);
        });

        const info = document.createElement('span');
        info.className = 'fotos-preview__info';
        const msg = files.length > restantes
            ? `${files.length} selecionadas — apenas ${restantes} serão enviadas (limite de ${MAX_FOTOS})`
            : `${files.length} foto(s) selecionada(s)`;
        info.textContent = msg;
        fotosPreview.appendChild(info);

        if (fotosHint) fotosHint.textContent = '';
    }

    if (fotosInput) {
        fotosInput.addEventListener('change', function () {
            renderPreview(this.files);
        });
    }

    // Drag & drop na área de upload
    if (uploadArea && fotosInput) {
        uploadArea.addEventListener('dragover', function (e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });
        uploadArea.addEventListener('dragleave', function () {
            uploadArea.classList.remove('dragover');
        });
        uploadArea.addEventListener('drop', function (e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            if (fotosInput.disabled) return;
            // Transfere os arquivos arrastados para o input
            const dt = e.dataTransfer;
            if (dt && dt.files.length) {
                fotosInput.files = dt.files;
                renderPreview(dt.files);
            }
        });
    }

})();