<?php
define('APP_LOADED', true);
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/security.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Formulário de cadastro completo. Preencha todos os dados para prosseguir.">
    <meta name="theme-color" content="#1a3a2e">

    <!-- iOS specific -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Android specific -->
    <meta name="mobile-web-app-capable" content="yes">

    <title>Cadastro de Financiamento - ST</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        :root {
            --st-green: #25D366;
            --st-dark: #0d1418;
            --st-teal: #1a3a2e;
            --text-primary: #E9EDEF;
            --text-secondary: #8696A0;
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.18);
            --error: #f36159;
            --success: #34C759;
            --input-bg: rgba(255, 255, 255, 0.05);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, var(--st-dark) 0%, var(--st-teal) 100%);
            min-height: 100vh;
            color: var(--text-primary);
            line-height: 1.6;
            padding-bottom: 80px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-img {
            height: 50px;
            width: auto;
        }

        .header-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            margin: auto;
        }

        .simulacao-label {
            font-size: 15px;
            color: var(--text-secondary);
            font-weight: 400;
        }

        .st-brand {
            align-self: center;
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
        }

        .container {
            max-width: 480px;
            margin: 24px auto;
            padding: 0 16px;
        }

        .form-bubble {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 24px 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .form-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 24px;
            color: var(--text-primary);
        }

        .whatsapp-icon {
            width: 28px;
            height: 28px;
            fill: var(--st-green);
        }

        .section-header {
            font-size: 16px;
            font-weight: 600;
            color: var(--st-green);
            margin: 28px 0 16px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-header:first-of-type {
            margin-top: 0;
        }

        .input-group {
            margin-bottom: 24px;
            position: relative;
        }

        .input-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            font-size: 18px;
            opacity: 0.5;
            pointer-events: none;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            background: var(--input-bg);
            border: none;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            font-size: 16px;
            padding: 12px 40px 12px 12px;
            border-radius: 8px 8px 0 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            -webkit-appearance: none;
        }

        input::placeholder {
            color: var(--text-secondary);
            opacity: 0.6;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-bottom-color: var(--st-green);
            transform: scale(1.01);
        }

        input:valid:not(:placeholder-shown) {
            border-bottom-color: var(--success);
        }

        input.error {
            border-bottom-color: var(--error);
            animation: shake 0.3s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-8px);
            }

            75% {
                transform: translateX(8px);
            }
        }

        .validation-icon {
            position: absolute;
            right: 40px;
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        input:valid:not(:placeholder-shown)~.validation-icon.check {
            opacity: 1;
        }

        input.error~.validation-icon.cross {
            opacity: 1;
        }

        /* Checkbox de aceite da Política de Privacidade */
        .privacy-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.8rem;
            color: #888;
            line-height: 1.5;
            margin-top: 16px;
            cursor: pointer;
        }

        .privacy-check a {
            color: inherit;
            text-decoration: underline;
        }

        .privacy-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
            accent-color: var(--st-green);
            cursor: pointer;
        }

        .privacy-check.error {
            color: var(--error);
            animation: shake 0.3s;
        }

        .privacy-check.error input[type="checkbox"] {
            outline: 2px solid var(--error);
            outline-offset: 2px;
            border-radius: 3px;
        }

        /* Banner de aviso quando o envio é bloqueado por campo inválido */
        .form-alert {
            display: none;
            align-items: center;
            gap: 10px;
            background: rgba(243, 97, 89, 0.12);
            border: 1px solid var(--error);
            color: #ffb4af;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            animation: slideDown 0.25s ease-out;
        }

        .form-alert.active {
            display: flex;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .submit-button {
            width: 100%;
            background: linear-gradient(135deg, var(--st-green) 0%, #20ba5a 100%);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 16px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.3);
            margin-top: 32px;
        }

        .submit-button:active {
            transform: translateY(0);
        }

        /* Navegação — mesmo padrão da página de simulação */
        .nav-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-link:hover {
            color: var(--st-green);
        }

        /* Trust badge — mesmo padrão da página de simulação */
        .trust-badge {
            text-align: center;
            font-size: 12px;
            color: var(--text-secondary);
            margin-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        #loading {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        #loading.active {
            opacity: 1;
            pointer-events: all;
        }

        .loader {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top-color: var(--st-green);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 16px auto;
            }

            .form-bubble {
                padding: 20px 16px;
            }

            .header {
                position: relative;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-left">
            <img src="../../favicon.ico" alt="ST Motors" class="logo-img">
        </div>
        <div class="header-right">
            <span class="st-brand">FINANCIAMENTO</span>
            <span class="simulacao-label">(Será redirecionado para o Whatsapp)</span>
            
        </div>
    </header>

    <div class="container">
        <div class="form-bubble">
            <h1 class="form-title">
                <svg class="whatsapp-icon" viewBox="0 0 32 32">
                    <path
                        d="M16 0C7.164 0 0 7.164 0 16c0 2.832.748 5.484 2.048 7.776L0 32l8.416-2.048A15.932 15.932 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.36c-2.54 0-4.932-.708-6.96-1.932l-.5-.3-5.164 1.256 1.288-4.948-.328-.516A13.272 13.272 0 012.64 16C2.64 8.62 8.62 2.64 16 2.64S29.36 8.62 29.36 16 23.38 29.36 16 29.36z" />
                    <path
                        d="M23.116 19.276c-.384-.192-2.272-1.12-2.624-1.248-.352-.128-.608-.192-.864.192-.256.384-1.024 1.248-1.248 1.504-.224.256-.448.288-.832.096-.384-.192-1.632-.6-3.104-1.92-1.152-1.024-1.92-2.288-2.144-2.672-.224-.384-.024-.592.168-.784.176-.176.384-.448.576-.672.192-.224.256-.384.384-.64.128-.256.064-.48-.032-.672-.096-.192-.864-2.08-1.184-2.848-.32-.768-.64-.64-.864-.64h-.736c-.256 0-.672.096-1.024.48-.352.384-1.344 1.312-1.344 3.2s1.376 3.712 1.568 3.968c.192.256 2.72 4.16 6.592 5.824.92.4 1.632.64 2.192.816.92.288 1.76.256 2.432.16.736-.112 2.272-.928 2.592-1.824.32-.896.32-1.664.224-1.824-.096-.16-.352-.256-.736-.448z" />
                </svg>
                Formulário de Financiamento
            </h1>

            <form id="cadastroForm" novalidate>
                <!-- Aviso de erro geral -->
                <div class="form-alert" id="formAlert" role="alert">
                    <span aria-hidden="true">⚠️</span>
                    <span id="formAlertText">Verifique os campos destacados abaixo.</span>
                </div>

                <div class="section-header"><span>&#x1F464;</span> Dados Pessoais</div>

                <!-- 1- Nome completo -->
                <div class="input-group">
                    <label class="input-label" for="nomeCompleto">1- Nome Completo</label>
                    <div class="input-wrapper">
                        <input type="text" id="nomeCompleto" placeholder="Digite seu nome completo" required
                            pattern="[A-Za-zÀ-ÿ\s]{3,}">
                        <span class="input-icon">&#x1F464;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- 2- CPF -->
                <div class="input-group">
                    <label class="input-label" for="cpf">2- CPF</label>
                    <div class="input-wrapper">
                        <input type="text" id="cpf" placeholder="000.000.000-00" maxlength="14" required
                            inputmode="numeric" autocomplete="off">
                        <span class="input-icon">&#x1F4C4;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- 3- RG -->
                <div class="input-group">
                    <label class="input-label" for="rg">3- RG</label>
                    <div class="input-wrapper">
                        <input type="text" id="rg" placeholder="00.000.000-0" maxlength="12" required
                            autocapitalize="characters">
                        <span class="input-icon">&#x1F4B3;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- 4- Nome da mãe -->
                <div class="input-group">
                    <label class="input-label" for="nomeMae">4- Nome da Mãe</label>
                    <div class="input-wrapper">
                        <input type="text" id="nomeMae" placeholder="Digite o nome completo da mãe" required
                            pattern="[A-Za-zÀ-ÿ\s]{3,}">
                        <span class="input-icon">&#x1F469;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <div class="section-header"><span>&#x1F3E0;</span> Endereço Residencial</div>

                <!-- 4- CEP da residência -->
                <div class="input-group">
                    <label class="input-label" for="cep">5- CEP da Residência</label>
                    <div class="input-wrapper">
                        <input type="text" id="cep" placeholder="00000-000" maxlength="9" required
                            inputmode="numeric">
                        <span class="input-icon">&#x1F4EE;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- 5- Número da residência -->
                <div class="input-group">
                    <label class="input-label" for="numeroResidencia">6- Número da Residência</label>
                    <div class="input-wrapper">
                        <input type="text" id="numeroResidencia" placeholder="Número ou S/N" required>
                        <span class="input-icon">&#x1F522;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <div class="section-header"><span>&#x1F4BC;</span> Informações Profissionais</div>

                <!-- 6- Profissão -->
                <div class="input-group">
                    <label class="input-label" for="profissao">7- Profissão</label>
                    <div class="input-wrapper">
                        <input type="text" id="profissao" placeholder="Digite sua profissão" required>
                        <span class="input-icon">&#x1F454;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- 7- Nome da empresa -->
                <div class="input-group">
                    <label class="input-label" for="nomeEmpresa">8- Nome da Empresa</label>
                    <div class="input-wrapper">
                        <input type="text" id="nomeEmpresa" placeholder="Digite o nome da empresa" required>
                        <span class="input-icon">&#x1F3E2;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- 8- Data de admissão -->
                <div class="input-group">
                    <label class="input-label" for="dataAdmissao">9- Data de Admissão</label>
                    <div class="input-wrapper">
                        <input type="text" id="dataAdmissao" placeholder="DD/MM/AAAA" maxlength="10" required
                            inputmode="numeric">
                        <span class="input-icon">&#x1F4C5;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <div class="section-header"><span>&#x1F4DE;</span> Contato</div>

                <!-- 9- E-mail -->
                <div class="input-group">
                    <label class="input-label" for="email">10- E-mail</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" placeholder="seuemail@exemplo.com" required
                            inputmode="email">
                        <span class="input-icon">&#x1F4E7;</span>
                        <span class="validation-icon check">&#x2713;</span>
                        <span class="validation-icon cross">&#x2715;</span>
                    </div>
                </div>

                <!-- Aceite da Política de Privacidade -->
                <label class="privacy-check" id="privacyGroup">
                    <input type="checkbox" id="privacyConsent" name="privacyConsent" required>
                    <span>
                        Li e concordo com a
                        <a href="/politica-de-privacidade/" target="_blank" rel="noopener noreferrer">Política de Privacidade</a>.
                    </span>
                </label>

                <button type="submit" class="submit-button">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M18 2L9 11M18 2L12 18L9 11M18 2L2 8L9 11" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Enviar</span>
                </button>

                <!-- Navegação -->
                <div class="nav-links">
                    <a href="https://stmotors.com.br/financiamento" class="nav-link">
                        ← Voltar
                    </a>
                    <a href="https://stmotors.com.br" class="nav-link" target="_blank">
                        Ir para o site →
                    </a>
                </div>
            </form>

            <!-- Trust badge -->
            <div class="trust-badge">
                &#x1F512; Dados protegidos SSL · Suas informações são confidenciais
            </div>
        </div>
    </div>

    <div id="loading">
        <div class="loader"></div>
    </div>

    <script>
        const form = document.getElementById('cadastroForm');
        const rgInput = document.getElementById('rg');
        const cpfInput = document.getElementById('cpf');
        const cepInput = document.getElementById('cep');
        const dataAdmissaoInput = document.getElementById('dataAdmissao');
        const formAlert = document.getElementById('formAlert');
        const formAlertText = document.getElementById('formAlertText');

        // Máscara para CPF (000.000.000-00)
        function cpfMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }

        // Validação de CPF (algoritmo padrão dos dois dígitos verificadores) —
        // idêntica à usada na página de simulação de financiamento.
        function validateCPF(cpf) {
            cpf = cpf.replace(/\D/g, '');

            if (cpf.length !== 11) return false;
            if (/^(\d)\1{10}$/.test(cpf)) return false; // Rejeita CPFs com todos os dígitos iguais

            let sum = 0;
            let remainder;

            for (let i = 1; i <= 9; i++) {
                sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);
            }
            remainder = (sum * 10) % 11;
            if (remainder === 10 || remainder === 11) remainder = 0;
            if (remainder !== parseInt(cpf.substring(9, 10))) return false;

            sum = 0;
            for (let i = 1; i <= 10; i++) {
                sum += parseInt(cpf.substring(i - 1, i)) * (12 - i);
            }
            remainder = (sum * 10) % 11;
            if (remainder === 10 || remainder === 11) remainder = 0;
            if (remainder !== parseInt(cpf.substring(10, 11))) return false;

            return true;
        }

        // Máscara de PRIVACIDADE para o CPF que vai na mensagem do WhatsApp —
        // diferente da máscara visual do input (000.000.000-00). Aqui o
        // objetivo é ocultar a maior parte dos dígitos, mostrando só um
        // trecho para conferência rápida (o registro completo fica no banco).
        function maskCPF(cpfComMascara) {
            const digits = (cpfComMascara || '').replace(/\D/g, '');
            if (digits.length !== 11) return '***.***.***-**';
            return `***.***.${digits.slice(6, 9)}-**`;
        }

        // Máscara de PRIVACIDADE para o e-mail na mensagem do WhatsApp —
        // mantém identificável o suficiente para conferência, sem expor o
        // endereço completo num canal de terceiros.
        function maskEmail(email) {
            const partes = (email || '').split('@');
            if (partes.length !== 2 || !partes[0] || !partes[1]) return '***';
            const usuario = partes[0];
            const visiveis = usuario.slice(0, 2);
            return `${visiveis}${'*'.repeat(Math.max(usuario.length - 2, 1))}@${partes[1]}`;
        }

        cpfInput.addEventListener('input', (e) => { e.target.value = cpfMask(e.target.value); });

        // Máscara para RG (00.000.000-0 ou X) - ACEITA LETRA X NO FINAL
        function rgMask(value) {
            value = value.replace(/[^\dXx]/g, '').toUpperCase().substring(0, 9);
            if (value.length <= 2) return value;
            if (value.length <= 5) return value.replace(/(\d{2})(\d)/, '$1.$2');
            if (value.length <= 8) return value.replace(/(\d{2})(\d{3})(\d)/, '$1.$2.$3');
            return value.replace(/(\d{2})(\d{3})(\d{3})([0-9X])/, '$1.$2.$3-$4');
        }

        // Máscara para CEP (00000-000)
        function cepMask(value) {
            return value.replace(/\D/g, '').replace(/(\d{5})(\d)/, '$1-$2').replace(/(-\d{3})\d+?$/, '$1');
        }

        // Máscara para data (DD/MM/AAAA)
        function dateMask(value) {
            return value.replace(/\D/g, '').replace(/(\d{2})(\d)/, '$1/$2').replace(/(\d{2})(\d)/, '$1/$2').replace(/(\d{4})\d+?$/, '$1');
        }

        // Validar RG (aceita X no final) — RG não tem dígito verificador
        // padronizado nacionalmente (cada estado emite do seu jeito), então
        // aqui só validamos formato/tamanho, nunca um "checksum" como o CPF.
        function validateRG(rg) {
            rg = rg.replace(/[^\dXx]/g, '').toUpperCase();
            if (rg.length < 8 || rg.length > 9) return false;
            if (rg.length === 9) {
                const lastChar = rg.charAt(8);
                if (!/[0-9X]/.test(lastChar)) return false;
            }
            return true;
        }

        function validateCEP(cep) {
            return /^\d{5}-?\d{3}$/.test(cep);
        }

        function validateDate(dateString) {
            const parts = dateString.split('/');
            if (parts.length !== 3) return false;
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10);
            const year = parseInt(parts[2], 10);
            if (day < 1 || day > 31 || month < 1 || month > 12 || year < 1900 || year > 2100) return false;
            const d = new Date(year, month - 1, day);
            return d.getFullYear() === year && d.getMonth() === month - 1 && d.getDate() === day;
        }

        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        rgInput.addEventListener('input', (e) => { e.target.value = rgMask(e.target.value); });
        cepInput.addEventListener('input', (e) => { e.target.value = cepMask(e.target.value); });
        dataAdmissaoInput.addEventListener('input', (e) => { e.target.value = dateMask(e.target.value); });

        function showFormAlert(message) {
            formAlertText.textContent = message;
            formAlert.classList.add('active');
        }

        function hideFormAlert() {
            formAlert.classList.remove('active');
        }

        // Validação explícita de cada campo — não depende só do
        // checkValidity() nativo, porque o form usa novalidate (sem isso,
        // o navegador mostraria o próprio balão nativo por baixo do nosso).
        function validarFormulario() {
            const problemas = [];
            form.querySelectorAll('input').forEach(i => i.classList.remove('error'));
            document.getElementById('privacyGroup').classList.remove('error');

            const nomeCompleto = document.getElementById('nomeCompleto');
            if (!/^[A-Za-zÀ-ÿ\s]{3,}$/.test(nomeCompleto.value.trim())) {
                nomeCompleto.classList.add('error');
                problemas.push({ el: nomeCompleto, msg: 'Informe seu nome completo.' });
            }

            if (!validateCPF(cpfInput.value)) {
                cpfInput.classList.add('error');
                problemas.push({ el: cpfInput, msg: 'CPF inválido ou incompleto.' });
            }

            if (!validateRG(rgInput.value)) {
                rgInput.classList.add('error');
                problemas.push({ el: rgInput, msg: 'RG inválido. Verifique o número digitado.' });
            }

            const nomeMae = document.getElementById('nomeMae');
            if (!/^[A-Za-zÀ-ÿ\s]{3,}$/.test(nomeMae.value.trim())) {
                nomeMae.classList.add('error');
                problemas.push({ el: nomeMae, msg: 'Informe o nome completo da mãe.' });
            }

            if (!validateCEP(cepInput.value)) {
                cepInput.classList.add('error');
                problemas.push({ el: cepInput, msg: 'CEP inválido.' });
            }

            const numeroResidencia = document.getElementById('numeroResidencia');
            if (!numeroResidencia.value.trim()) {
                numeroResidencia.classList.add('error');
                problemas.push({ el: numeroResidencia, msg: 'Informe o número da residência (ou S/N).' });
            }

            const profissao = document.getElementById('profissao');
            if (!profissao.value.trim()) {
                profissao.classList.add('error');
                problemas.push({ el: profissao, msg: 'Informe sua profissão.' });
            }

            const nomeEmpresa = document.getElementById('nomeEmpresa');
            if (!nomeEmpresa.value.trim()) {
                nomeEmpresa.classList.add('error');
                problemas.push({ el: nomeEmpresa, msg: 'Informe o nome da empresa.' });
            }

            if (!validateDate(dataAdmissaoInput.value)) {
                dataAdmissaoInput.classList.add('error');
                problemas.push({ el: dataAdmissaoInput, msg: 'Data de admissão inválida.' });
            }

            const emailInput = document.getElementById('email');
            if (!validateEmail(emailInput.value.trim())) {
                emailInput.classList.add('error');
                problemas.push({ el: emailInput, msg: 'Informe um e-mail válido.' });
            }

            const privacyGroup = document.getElementById('privacyGroup');
            const privacyInput = document.getElementById('privacyConsent');
            if (!privacyInput.checked) {
                privacyGroup.classList.add('error');
                problemas.push({ el: privacyInput, msg: 'Você precisa aceitar a Política de Privacidade para continuar.' });
            }

            return problemas;
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            hideFormAlert();

            const problemas = validarFormulario();

            if (problemas.length > 0) {
                showFormAlert(
                    problemas.length === 1
                        ? problemas[0].msg
                        : `Existem ${problemas.length} campos para corrigir. Verifique os destaques em vermelho.`
                );
                const primeiro = problemas[0].el;
                primeiro.scrollIntoView({ behavior: 'smooth', block: 'center' });
                primeiro.focus({ preventScroll: true });
                return;
            }

            const formData = {
                nomeCompleto: document.getElementById('nomeCompleto').value,
                cpf: cpfInput.value,
                rg: rgInput.value,
                nomeMae: document.getElementById('nomeMae').value,
                cep: cepInput.value,
                numeroResidencia: document.getElementById('numeroResidencia').value,
                profissao: document.getElementById('profissao').value,
                nomeEmpresa: document.getElementById('nomeEmpresa').value,
                dataAdmissao: dataAdmissaoInput.value,
                email: document.getElementById('email').value,
                // Chegou até aqui só se o checkbox (required) estava marcado —
                // validarFormulario() já barrou o envio antes se não estivesse.
                consentimento: true
            };

            document.getElementById('loading').classList.add('active');

            // Salva no banco PRIMEIRO — precisamos do ID gerado para usar como
            // referência na mensagem do WhatsApp, em vez de reenviar
            // CPF/RG/nome da mãe/endereço completos por lá. Se falhar,
            // seguimos sem ID (fallback abaixo); o cliente que já preencheu
            // tudo nunca fica travado por uma falha nossa.
            let idCadastro = null;
            try {
                const resposta = await fetch('/financiamento/api/salvar-cadastro-financiamento.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });
                if (resposta.ok) {
                    const dados = await resposta.json();
                    idCadastro = dados && dados.id ? dados.id : null;
                } else {
                    console.error('Falha ao salvar cadastro:', await resposta.text());
                }
            } catch (err) {
                console.error('Erro ao salvar cadastro:', err);
            }

            // Monta mensagem WhatsApp — só com referência + dados mascarados/
            // não sensíveis. RG, nome da mãe, endereço completo e CPF/e-mail
            // integrais ficam só no banco, acessíveis no painel administrativo.
            // Isso evita que dados de identidade (usados como "pergunta de
            // segurança" por instituições financeiras) trafeguem em texto
            // puro por um canal de terceiro (WhatsApp/Meta).
            //
            // Mensagem sem emojis, propositalmente — layout sóbrio usando só
            // separadores de texto (━), negrito (*texto*) e maiúsculas para
            // os títulos de seção. Evita depender de como cada dispositivo
            // renderiza emoji (ou não renderiza, virando "?"/quadrado).
            const mensagem = `*FORMULÁRIO DE FINANCIAMENTO - ST MOTORS*

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

${idCadastro ? `*Nº do Cadastro:* #${idCadastro}` : '*Nº do Cadastro:* não disponível no momento'}

*DADOS PESSOAIS*
*Nome Completo:* ${formData.nomeCompleto}
*CPF:* ${maskCPF(formData.cpf)}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

*INFORMAÇÕES PROFISSIONAIS*
*Profissão:* ${formData.profissao}
*Nome da Empresa:* ${formData.nomeEmpresa}
*Data de Admissão:* ${formData.dataAdmissao}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

*CONTATO*
*E-mail:* ${maskEmail(formData.email)}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Aguardo retorno. Obrigado.`;

            const mensagemEncoded = encodeURIComponent(mensagem);
            const numeroWhatsApp = '<?= WHATSAPP_NUMERO ?>';
            const whatsappURL = `https://wa.me/${numeroWhatsApp}?text=${mensagemEncoded}`;

            document.getElementById('loading').classList.remove('active');
            window.location.href = whatsappURL;
        });

        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', () => { input.classList.remove('error'); });
        });

        document.getElementById('privacyConsent').addEventListener('change', () => {
            document.getElementById('privacyGroup').classList.remove('error');
        });
    </script>
</body>

</html>