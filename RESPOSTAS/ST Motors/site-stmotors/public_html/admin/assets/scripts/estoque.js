(function () {
    'use strict';

    // Impede seleção duplicada nos slots de destaque
    const selects = document.querySelectorAll('.destaque-slot__select');

    selects.forEach(sel => {
        sel.addEventListener('change', () => {
            const val = sel.value;
            if (val === '0') return;

            selects.forEach(other => {
                if (other !== sel && other.value === val) {
                    other.value = '0';
                }
            });
        });
    });
})();