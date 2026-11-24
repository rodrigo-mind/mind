<?php
define('APP_LOADED', true);
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/security.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/money.php';

// Motos do estoque real, para popular os <select> com o que está realmente à venda.
$motosDisponiveis = [];
try {
    $db = getDB();
    $stmt = $db->query(
        "SELECT slug, marca, modelo, ano, cor, preco
         FROM motos
         WHERE ativo = 1
         ORDER BY marca ASC, modelo ASC"
    );
    $motosDisponiveis = $stmt->fetchAll();
} catch (PDOException $e) {
    // Estoque indisponível não pode derrubar a página de simulação;
    // o <select> cai para a opção "indisponível" tratada mais abaixo.
    $motosDisponiveis = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description"
        content="Simule seu financiamento. Aprovação rápida e condições especiais na ST Motors.">
    <meta name="theme-color" content="#1a3a2e">

    <!-- Open Graph -->
    <meta property="og:title" content="Simulação - ST Motors">
    <meta property="og:description" content="Simule agora e realize o sonho da sua moto">
    <meta property="og:type" content="website">

    <title>Simulação de Financiamento - ST</title>

    <!-- Preconnect para performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://api.whatsapp.com">

    <!-- Font (Segoe UI) -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        }

        /* Header fixo com glassmorphism */
        .header {
            top: 0;
            z-index: 100;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-img {
            height: 50px;
            width: auto;
            display: block;
            justify-self: right;
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
            letter-spacing: 0.3px;
        }

        .st-brand {
            align-self: center;
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            font-family: "Segoe UI", -apple-system, BlinkMacSystemFont, sans-serif;
            letter-spacing: -0.3px;
        }

        /* Container principal */
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

        .emoji {
            font-size: 24px;
            line-height: 1;
        }

        /* Inputs modernos */
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
            transition: color 0.2s;
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
            line-height: 1;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"],
        input[type="number"],
        select {
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
        }

        input::placeholder {
            color: var(--text-secondary);
            opacity: 0.6;
        }

        input:focus,
        select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-bottom-color: var(--st-green);
            transform: scale(1.01);
        }

        input:valid:not(:placeholder-shown) {
            border-bottom-color: var(--success);
        }

        input.error,
        select.error {
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
            line-height: 1;
        }

        input:valid:not(:placeholder-shown)~.validation-icon {
            opacity: 1;
        }

        .error-message {
            display: none;
            font-size: 12px;
            color: var(--error);
            margin-top: 6px;
            font-weight: 500;
        }

        input.error~.error-message,
        select.error~.error-message,
        .radio-group.error~.error-message,
        .privacy-check.error~.error-message {
            display: block;
        }

        /* Grupo de radio (CNH / Entrada) em estado de erro — os <input
           type="radio"> ficam ocultos (display:none), então o feedback
           visual precisa estar no wrapper, não no input em si. */
        .radio-group.error .radio-label {
            border-color: var(--error);
            animation: shake 0.3s;
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

        /* Barra de aviso no topo do formulário, exibida quando o envio
           é bloqueado por algum campo não preenchido/inválido. */
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

        /* Radio buttons customizados */
        .radio-group {
            display: flex;
            gap: 16px;
            margin-top: 12px;
        }

        .radio-option {
            flex: 1;
        }

        .radio-option input[type="radio"] {
            display: none;
        }

        .radio-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            background: var(--input-bg);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
            font-weight: 500;
        }

        .radio-option input[type="radio"]:checked+.radio-label {
            background: rgba(37, 211, 102, 0.15);
            border-color: var(--st-green);
            color: var(--st-green);
        }

        .radio-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Select customizado */
        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L6 6L11 1' stroke='%238696A0' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 40px;
            cursor: pointer;
        }

        select option {
            background: var(--st-dark);
            color: var(--text-primary);
            padding: 12px;
        }

        /* Campos condicionais */
        .conditional-field {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(-10px);
        }

        .conditional-field.active {
            max-height: 200px;
            opacity: 1;
            transform: translateY(0);
            margin-top: 16px;
        }

        /* Botão enviar */
        .submit-btn {
            width: 100%;
            background: var(--st-green);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 32px;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.3);
        }

        .submit-btn:hover {
            background: #22c55e;
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(37, 211, 102, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* Navegação secundária */
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

        /* Trust badge */
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

        /* Botão flutuante WhatsApp */
        .whatsapp-float {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            background: var(--st-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            transition: all 0.3s;
            z-index: 999;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 24px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-float svg {
            width: 28px;
            height: 28px;
            fill: #fff;
        }

        /* Responsividade tablet+ */
        @media (min-width: 768px) {
            .container {
                margin-top: 48px;
            }

            .form-bubble {
                padding: 32px 28px;
            }
        }

        /* Loading state */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .loading.active {
            display: flex;
        }

        .spinner {
            width: 48px;
            height: 48px;
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
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <img src="../../favicon.ico" alt="ST Motors" class="logo-img">
        </div>
        <div class="header-right">
            <div class="st-brand">SIMULAÇÃO</div>
            <div class="simulacao-label">(Será redirecionado para o Whatsapp)</div>
            
        </div>
    </header>

    <!-- Container principal -->
    <div class="container">
        <div class="form-bubble">
            <h1 class="form-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 0C5.373 0 0 5.373 0 12c0 2.124.561 4.113 1.536 5.832L0 24l6.312-1.536A11.949 11.949 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22.02c-1.905 0-3.699-.531-5.22-1.449l-.375-.225-3.873.942.966-3.711-.246-.387A9.954 9.954 0 012.98 12C2.98 6.465 7.465 1.98 12 1.98S21.02 6.465 21.02 12 16.535 22.02 12 22.02z"
                        fill="#25D366" />
                    <path
                        d="M17.337 14.457c-.288-.144-1.704-.84-1.968-.936-.264-.096-.456-.144-.648.144-.192.288-.768.936-.936 1.128-.168.192-.336.216-.624.072-.288-.144-1.224-.45-2.328-1.44-.864-.768-1.44-1.716-1.608-2.004-.168-.288-.018-.444.126-.588.132-.132.288-.336.432-.504.144-.168.192-.288.288-.48.096-.192.048-.36-.024-.504-.072-.144-.648-1.56-.888-2.136-.24-.576-.48-.48-.648-.48h-.552c-.192 0-.504.072-.768.36-.264.288-1.008.984-1.008 2.4s1.032 2.784 1.176 2.976c.144.192 2.04 3.12 4.944 4.368.69.3 1.224.48 1.644.612.69.216 1.32.192 1.824.12.552-.084 1.704-.696 1.944-1.368.24-.672.24-1.248.168-1.368-.072-.12-.264-.192-.552-.336z"
                        fill="#25D366" />
                </svg>
                Simulação de Financiamento
            </h1>

            <form id="financingForm" novalidate>
                <!-- Aviso de erro geral -->
                <div class="form-alert" id="formAlert" role="alert">
                    <span aria-hidden="true">⚠️</span>
                    <span id="formAlertText">Verifique os campos destacados abaixo.</span>
                </div>

                <!-- Nome completo -->
                <div class="input-group">
                    <label class="input-label" for="name">Nome completo</label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name" placeholder="Ex: João Silva Santos" required
                            pattern="[A-Za-zÀ-ÿ\s]{3,}">
                        <span class="input-icon">&#x1F464;</span>
                        <span class="validation-icon">✓</span>
                    </div>
                    <span class="error-message">Por favor, insira seu nome completo</span>
                </div>

                <!-- CPF -->
                <div class="input-group">
                    <label class="input-label" for="cpf">CPF</label>
                    <div class="input-wrapper">
                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required maxlength="14"
                            inputmode="numeric" autocomplete="off">
                        <span class="input-icon">&#x1F4C4;</span>
                        <span class="validation-icon">✓</span>
                    </div>
                    <span class="error-message">CPF inválido</span>
                </div>

                <!-- Telefone -->
                <div class="input-group">
                    <label class="input-label" for="phone">Telefone</label>
                    <div class="input-wrapper">
                        <input type="tel" id="phone" name="phone" placeholder="Ex: (16) 99999-9999" required>
                        <span class="input-icon">&#x1F4F1;</span>
                        <span class="validation-icon">✓</span>
                    </div>
                    <span class="error-message">Telefone inválido</span>
                </div>

                <!-- Data de nascimento -->
                <div class="input-group">
                    <label class="input-label" for="birthdate">Data de nascimento</label>
                    <div class="input-wrapper">
                        <input type="text" id="birthdate" name="birthdate" placeholder="dd/mm/aaaa" required
                            maxlength="10" inputmode="numeric">
                        <span class="input-icon">&#x1F4C5;</span>
                        <span class="validation-icon">✓</span>
                    </div>
                    <span class="error-message">Data inválida (formato: dd/mm/aaaa, mínimo 18 anos)</span>
                </div>

                <!-- CNH -->
                <div class="input-group">
                    <label class="input-label">Possui alguma habilitação (CNH) válida?</label>
                    <div class="radio-group" id="cnhGroup">
                        <div class="radio-option">
                            <input type="radio" id="cnhYes" name="cnh" value="sim" required>
                            <label class="radio-label" for="cnhYes">✓ Sim</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="cnhNo" name="cnh" value="nao">
                            <label class="radio-label" for="cnhNo">✗ Não</label>
                        </div>
                    </div>
                    <span class="error-message">Selecione uma opção</span>
                </div>

                <!-- Entrada -->
                <div class="input-group">
                    <label class="input-label">Pretende dar entrada?</label>
                    <div class="radio-group" id="entradaGroup">
                        <div class="radio-option">
                            <input type="radio" id="entradaYes" name="entrada" value="sim" required>
                            <label class="radio-label" for="entradaYes">✓ Sim</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="entradaNo" name="entrada" value="nao">
                            <label class="radio-label" for="entradaNo">✗ Não</label>
                        </div>
                    </div>
                    <span class="error-message">Selecione uma opção</span>

                    <!-- Campo condicional: valor entrada -->
                    <div class="conditional-field" id="valorEntradaField">
                        <label class="input-label" for="valorEntrada">Valor da entrada</label>
                        <div class="input-wrapper">
                            <input type="text" id="valorEntrada" name="valorEntrada"
                                placeholder="Informe apenas o valor" inputmode="numeric">
                            <span class="input-icon">&#x1F4B0;</span>
                        </div>
                    </div>
                </div>

                <!-- Renda -->
                <div class="input-group">
                    <label class="input-label" for="renda">Renda mensal comprovada (holerite ou por extrato
                        bancário)</label>
                    <div class="input-wrapper">
                        <input type="text" id="renda" name="renda" placeholder="Informe apenas o valor" required
                            inputmode="numeric">
                        <span class="input-icon">&#x1F4B5;</span>
                        <span class="validation-icon">✓</span>
                    </div>
                    <span class="error-message">Por favor, informe sua renda</span>
                </div>

                <!-- Escolha da moto (1ª opção) -->
                <div class="input-group">
                    <label class="input-label" for="moto1">Escolha a moto (1ª opção, opcional) <span
                            class="emoji">&#x1F3CD;&#xFE0F;</span></label>
                    <select id="moto1" name="moto1">
                        <option value="">Nenhuma / sem preferência</option>
                        <?php foreach ($motosDisponiveis as $m): ?>
                        <option
                            value="<?= htmlspecialchars($m['slug'], ENT_QUOTES, 'UTF-8') ?>"
                            data-ano="<?= htmlspecialchars($m['ano'], ENT_QUOTES, 'UTF-8') ?>"
                            data-cor="<?= htmlspecialchars($m['cor'], ENT_QUOTES, 'UTF-8') ?>"
                            data-preco="<?= htmlspecialchars(precoFormat(precoToFloat($m['preco'])), ENT_QUOTES, 'UTF-8') ?>"
                        ><?= htmlspecialchars($m['marca'] . ' ' . $m['modelo'] . ' | ' . $m['cor'] . ' | R$ ' . precoFormat(precoToFloat($m['preco'])), ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                        <?php if (empty($motosDisponiveis)): ?>
                        <option value="" disabled>Estoque indisponível no momento</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Escolha da moto (2ª opção, opcional) -->
                <div class="input-group">
                    <label class="input-label" for="moto2">Escolha a moto (2ª opção, opcional) <span
                            class="emoji">&#x1F3CD;&#xFE0F;</span></label>
                    <select id="moto2" name="moto2">
                        <option value="">Nenhuma / sem preferência</option>
                        <?php foreach ($motosDisponiveis as $m): ?>
                        <option
                            value="<?= htmlspecialchars($m['slug'], ENT_QUOTES, 'UTF-8') ?>"
                            data-ano="<?= htmlspecialchars($m['ano'], ENT_QUOTES, 'UTF-8') ?>"
                            data-cor="<?= htmlspecialchars($m['cor'], ENT_QUOTES, 'UTF-8') ?>"
                            data-preco="<?= htmlspecialchars(precoFormat(precoToFloat($m['preco'])), ENT_QUOTES, 'UTF-8') ?>"
                        ><?= htmlspecialchars($m['marca'] . ' ' . $m['modelo'] . ' | ' . $m['cor'] . ' | R$ ' . precoFormat(precoToFloat($m['preco'])), ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Aceite da Política de Privacidade -->
                <div class="input-group">
                    <label class="privacy-check" id="privacyGroup">
                        <input type="checkbox" id="privacyConsent" name="privacyConsent" required>
                        <span>
                            Li e concordo com a
                            <a href="/politica-de-privacidade/" target="_blank" rel="noopener noreferrer">Política de Privacidade</a>.
                        </span>
                    </label>
                    <span class="error-message">Você precisa aceitar a Política de Privacidade para continuar.</span>
                </div>

                <!-- Botão enviar -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M18 2L9 11M18 2L12 18L9 11M18 2L2 8L9 11" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Enviar Simulação
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

    <!-- Botão flutuante WhatsApp -->
    <a href="https://wa.me/<?= WHATSAPP_NUMERO ?>" class="whatsapp-float" target="_blank" aria-label="Falar no WhatsApp">
        <svg viewBox="0 0 32 32">
            <path
                d="M16 0C7.164 0 0 7.164 0 16c0 2.832.748 5.484 2.048 7.776L0 32l8.416-2.048A15.932 15.932 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.36c-2.54 0-4.932-.708-6.96-1.932l-.5-.3-5.164 1.256 1.288-4.948-.328-.516A13.272 13.272 0 012.64 16C2.64 8.62 8.62 2.64 16 2.64S29.36 8.62 29.36 16 23.38 29.36 16 29.36z" />
            <path
                d="M23.116 19.276c-.384-.192-2.272-1.12-2.624-1.248-.352-.128-.608-.192-.864.192-.256.384-1.024 1.248-1.248 1.504-.224.256-.448.288-.832.096-.384-.192-1.632-.6-3.104-1.92-1.152-1.024-1.92-2.288-2.144-2.672-.224-.384-.024-.592.168-.784.176-.176.384-.448.576-.672.192-.224.256-.384.384-.64.128-.256.064-.48-.032-.672-.096-.192-.864-2.08-1.184-2.848-.32-.768-.64-.64-.864-.64h-.736c-.256 0-.672.096-1.024.48-.352.384-1.344 1.312-1.344 3.2s1.376 3.712 1.568 3.968c.192.256 2.72 4.16 6.592 5.824.92.4 1.632.64 2.192.816.92.288 1.76.256 2.432.16.736-.112 2.272-.928 2.592-1.824.32-.896.32-1.664.224-1.824-.096-.16-.352-.256-.736-.448z" />
        </svg>
    </a>

    <!-- Loading overlay -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <script>
        // ==========================================
        // MÁSCARAS E VALIDAÇÕES
        // ==========================================
        const form = document.getElementById('financingForm');
        const cpfInput = document.getElementById('cpf');
        const phoneInput = document.getElementById('phone');
        const birthdateInput = document.getElementById('birthdate');
        const valorEntradaField = document.getElementById('valorEntradaField');
        const entradaYes = document.getElementById('entradaYes');
        const entradaNo = document.getElementById('entradaNo');
        const valorEntradaInput = document.getElementById('valorEntrada');
        const rendaInput = document.getElementById('renda');

        // ==========================================
        // MÁSCARA CPF
        // ==========================================
        function cpfMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }

        // Validação de CPF (algoritmo padrão dos dois dígitos verificadores)
        function validateCPF(cpf) {
            cpf = cpf.replace(/\D/g, '');

            if (cpf.length !== 11) return false;
            if (/^(\d)\1{10}$/.test(cpf)) return false; // Rejeita CPFs com todos os dígitos iguais

            let sum = 0;
            let remainder;

            // Valida primeiro dígito verificador
            for (let i = 1; i <= 9; i++) {
                sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);
            }
            remainder = (sum * 10) % 11;
            if (remainder === 10 || remainder === 11) remainder = 0;
            if (remainder !== parseInt(cpf.substring(9, 10))) return false;

            // Valida segundo dígito verificador
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

        cpfInput.addEventListener('input', (e) => {
            e.target.value = cpfMask(e.target.value);

            // Valida quando tiver 14 caracteres (formato completo: 000.000.000-00)
            if (e.target.value.length === 14) {
                if (validateCPF(e.target.value)) {
                    e.target.classList.remove('error');
                } else {
                    e.target.classList.add('error');
                }
            }
        });

        cpfInput.addEventListener('blur', (e) => {
            if (e.target.value.length === 14) {
                if (!validateCPF(e.target.value)) {
                    e.target.classList.add('error');
                }
            } else if (e.target.value.length > 0) {
                e.target.classList.add('error');
            }
        });

        // ==========================================
        // MÁSCARA TELEFONE
        // ==========================================
        function phoneMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/^(\d{2})(\d)/g, '($1) $2')
                .replace(/(\d{5})(\d)/, '$1-$2')
                .replace(/(-\d{4})\d+?$/, '$1');
        }

        phoneInput.addEventListener('input', (e) => {
            e.target.value = phoneMask(e.target.value);
        });

        // ==========================================
        // MÁSCARA DATA DE NASCIMENTO
        // ==========================================
        function dateMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{2})(\d)/, '$1/$2')
                .replace(/(\d{2})(\d)/, '$1/$2')
                .replace(/(\d{4})\d+?$/, '$1');
        }

        function validateAge(dateString) {
            const parts = dateString.split('/');
            if (parts.length !== 3) return false;

            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10);
            const year = parseInt(parts[2], 10);

            // Valida dia, mês e ano
            if (day < 1 || day > 31 || month < 1 || month > 12 || year < 1920 || year > 2010) {
                return false;
            }

            // Cria data
            const birthDate = new Date(year, month - 1, day);
            const today = new Date();

            // Calcula idade
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age >= 18;
        }

        birthdateInput.addEventListener('input', (e) => {
            e.target.value = dateMask(e.target.value);

            // Valida quando tiver formato completo
            if (e.target.value.length === 10) {
                if (validateAge(e.target.value)) {
                    e.target.classList.remove('error');
                } else {
                    e.target.classList.add('error');
                }
            }
        });

        birthdateInput.addEventListener('blur', (e) => {
            if (e.target.value.length === 10) {
                if (!validateAge(e.target.value)) {
                    e.target.classList.add('error');
                }
            } else if (e.target.value.length > 0) {
                e.target.classList.add('error');
            }
        });

        // ==========================================
        // MÁSCARA MOEDA
        // ==========================================
        function moneyMask(value) {
            value = value.replace(/\D/g, '');
            if (value === '') return '';
            value = (parseInt(value) / 100).toFixed(2);
            value = value.replace('.', ',');
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            return 'R$ ' + value;
        }

        valorEntradaInput.addEventListener('input', (e) => {
            e.target.value = moneyMask(e.target.value);
        });

        rendaInput.addEventListener('input', (e) => {
            e.target.value = moneyMask(e.target.value);
        });

        // ==========================================
        // PROGRESSIVE DISCLOSURE - CAMPO ENTRADA
        // ==========================================
        entradaYes.addEventListener('change', () => {
            valorEntradaField.classList.add('active');
            valorEntradaInput.required = true;
        });

        entradaNo.addEventListener('change', () => {
            valorEntradaField.classList.remove('active');
            valorEntradaInput.required = false;
            valorEntradaInput.value = '';
        });

        // ==========================================
        // FEEDBACK DE ERRO — banner + destaque por campo
        // ==========================================
        const formAlert = document.getElementById('formAlert');
        const formAlertText = document.getElementById('formAlertText');

        // Marca um <input>/<select> como inválido (mostra borda vermelha
        // e a .error-message logo abaixo dele).
        function markFieldError(el) {
            el.classList.add('error');
        }

        function clearFieldError(el) {
            el.classList.remove('error');
        }

        // Radios ficam com display:none — quem precisa do destaque visual
        // é o wrapper .radio-group (via CSS .radio-group.error).
        function markGroupError(groupEl) {
            groupEl.classList.add('error');
        }

        function clearGroupError(groupEl) {
            groupEl.classList.remove('error');
        }

        function showFormAlert(message) {
            formAlertText.textContent = message;
            formAlert.classList.add('active');
        }

        function hideFormAlert() {
            formAlert.classList.remove('active');
        }

        // Roda todas as validações e devolve a lista de problemas encontrados.
        // Cada item guarda o elemento a focar/scrollar em caso de erro.
        function validarFormulario() {
            const problemas = [];

            // Limpa estado visual anterior antes de revalidar
            [cpfInput, phoneInput, birthdateInput, rendaInput, document.getElementById('name')]
                .forEach(clearFieldError);
            clearGroupError(document.getElementById('cnhGroup'));
            clearGroupError(document.getElementById('entradaGroup'));
            clearGroupError(document.getElementById('privacyGroup'));

            const nameInput = document.getElementById('name');
            if (!nameInput.value.trim() || !/^[A-Za-zÀ-ÿ\s]{3,}$/.test(nameInput.value.trim())) {
                markFieldError(nameInput);
                problemas.push({ el: nameInput, msg: 'Informe seu nome completo.' });
            }

            if (cpfInput.value.length !== 14 || !validateCPF(cpfInput.value)) {
                markFieldError(cpfInput);
                problemas.push({ el: cpfInput, msg: 'CPF inválido ou incompleto.' });
            }

            const telefoneDigitos = phoneInput.value.replace(/\D/g, '');
            if (telefoneDigitos.length < 10) {
                markFieldError(phoneInput);
                problemas.push({ el: phoneInput, msg: 'Informe um telefone válido com DDD.' });
            }

            if (birthdateInput.value.length !== 10 || !validateAge(birthdateInput.value)) {
                markFieldError(birthdateInput);
                problemas.push({ el: birthdateInput, msg: 'Data de nascimento inválida (mínimo 18 anos).' });
            }

            const cnhGroup = document.getElementById('cnhGroup');
            if (!document.querySelector('input[name="cnh"]:checked')) {
                markGroupError(cnhGroup);
                problemas.push({ el: cnhGroup, msg: 'Informe se possui CNH.' });
            }

            const entradaGroup = document.getElementById('entradaGroup');
            const entradaChecked = document.querySelector('input[name="entrada"]:checked');
            if (!entradaChecked) {
                markGroupError(entradaGroup);
                problemas.push({ el: entradaGroup, msg: 'Informe se pretende dar entrada.' });
            }

            const rendaDigitos = rendaInput.value.replace(/\D/g, '');
            if (!rendaDigitos || parseInt(rendaDigitos, 10) <= 0) {
                markFieldError(rendaInput);
                problemas.push({ el: rendaInput, msg: 'Informe sua renda mensal.' });
            }

            // Moto (1ª e 2ª opção) é intencionalmente opcional — a pessoa
            // pode simular sem ter escolhido um modelo específico ainda.

            const privacyGroup = document.getElementById('privacyGroup');
            const privacyInput = document.getElementById('privacyConsent');
            if (!privacyInput.checked) {
                markGroupError(privacyGroup);
                problemas.push({ el: privacyInput, msg: 'Você precisa aceitar a Política de Privacidade para continuar.' });
            }

            return problemas;
        }

        // ==========================================
        // SUBMIT FORM
        // ==========================================
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

                // Leva o usuário até o primeiro campo com problema — sem isso,
                // se o campo estiver fora da tela, parece que nada aconteceu.
                const primeiro = problemas[0].el;
                primeiro.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (typeof primeiro.focus === 'function') {
                    primeiro.focus({ preventScroll: true });
                }
                return;
            }

            // Coleta dados
            const moto1Select = document.getElementById('moto1');
            const moto1Option = moto1Select.value ? moto1Select.selectedOptions[0] : null;
            const moto2Select = document.getElementById('moto2');
            const moto2Option = moto2Select.value ? moto2Select.selectedOptions[0] : null;

            const formData = {
                nome: document.getElementById('name').value,
                cpf: cpfInput.value,
                telefone: phoneInput.value,
                dataNascimento: birthdateInput.value,
                cnh: document.querySelector('input[name="cnh"]:checked').value,
                entrada: document.querySelector('input[name="entrada"]:checked').value,
                valorEntrada: valorEntradaInput.value || 'Não informado',
                renda: rendaInput.value,
                moto1: moto1Option ? moto1Option.text.split(' | ')[0] : '',
                moto1Ano: moto1Option ? (moto1Option.dataset.ano || '') : '',
                moto1Cor: moto1Option ? (moto1Option.dataset.cor || '') : '',
                moto1Preco: moto1Option ? (moto1Option.dataset.preco || '') : '',
                moto2: moto2Option ? moto2Option.text.split(' | ')[0] : ''
            };

            // Mostra loading
            document.getElementById('loading').classList.add('active');

            // Salva no banco PRIMEIRO — precisamos do ID gerado para usar como
            // referência na mensagem do WhatsApp, em vez de reenviar CPF/renda
            // completos por lá. Se falhar, seguimos sem ID (ver fallback abaixo);
            // o cliente nunca fica travado por uma falha nossa.
            let idSimulacao = null;
            try {
                const resposta = await fetch('/financiamento/api/salvar-simulacao.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        nome: formData.nome,
                        cpf: formData.cpf,
                        telefone: formData.telefone,
                        dataNascimento: formData.dataNascimento,
                        cnh: formData.cnh,
                        entrada: formData.entrada,
                        valorEntrada: formData.valorEntrada,
                        renda: formData.renda,
                        moto: formData.moto1,
                        motoSlug: moto1Option ? moto1Option.value : '',
                        motoAno: formData.moto1Ano,
                        motoCor: formData.moto1Cor,
                        motoPreco: formData.moto1Preco,
                        moto2: formData.moto2,
                        moto2Slug: moto2Option ? moto2Option.value : '',
                        // Chegou até aqui só se o checkbox (required) estava
                        // marcado — validarFormulario() já barrou o envio
                        // antes se não estivesse.
                        consentimento: true
                    })
                });
                if (resposta.ok) {
                    const dados = await resposta.json();
                    idSimulacao = dados && dados.id ? dados.id : null;
                } else {
                    console.error('Falha ao salvar simulação:', await resposta.text());
                }
            } catch (err) {
                // Sem internet/erro de rede: não impede o cliente de falar no WhatsApp.
                console.error('Erro ao salvar simulação:', err);
            }

            // Monta mensagem WhatsApp — só com referência + dados mascarados/não
            // sensíveis. CPF completo, data de nascimento e demais dados de
            // identificação ficam só no banco, acessíveis no painel administrativo.
            //
            // Mensagem sem emojis, propositalmente — layout sóbrio usando só
            // separadores de texto (━), negrito (*texto*) e maiúsculas para
            // os títulos de seção. Evita depender de como cada dispositivo
            // renderiza emoji (ou não renderiza, virando "?"/quadrado).
            const mensagem = `*SIMULAÇÃO DE FINANCIAMENTO - ST MOTORS*

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

${idSimulacao ? `*Nº da Simulação:* #${idSimulacao}` : '*Nº da Simulação:* não disponível no momento'}

*DADOS PESSOAIS*
*Nome:* ${formData.nome}
*CPF:* ${maskCPF(formData.cpf)}
*Telefone:* ${formData.telefone}
*CNH:* ${formData.cnh}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

*CONDIÇÕES*
*Entrada:* ${formData.entrada}
${formData.entrada === 'sim' ? `*Valor Entrada:* ${formData.valorEntrada}` : ''}
*Renda:* ${formData.renda}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

*MOTO DE INTERESSE*
${formData.moto1 ? `*1ª opção:* ${formData.moto1}${formData.moto1Ano ? ` (${formData.moto1Ano})` : ''}` : ''}
${formData.moto1Cor ? `*Cor:* ${formData.moto1Cor}` : ''}
${formData.moto1Preco ? `*Preço:* R$ ${formData.moto1Preco}` : ''}
${formData.moto2 ? `*2ª opção:* ${formData.moto2}` : ''}
${(!formData.moto1 && !formData.moto2) ? 'Nenhuma preferência informada' : ''}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Aguardo retorno. Obrigado.`;
            // Encode para URL
            const mensagemEncoded = encodeURIComponent(mensagem);

            // Remove loading
            document.getElementById('loading').classList.remove('active');

            // Abre WhatsApp
            const numeroWhatsApp = '<?= WHATSAPP_NUMERO ?>';
            window.open(`https://wa.me/${numeroWhatsApp}?text=${mensagemEncoded}`, '_blank');

            // Opcional: limpar formulário
            // form.reset();
        });

        // Remove erro ao digitar/selecionar
        const inputs = form.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
            });
        });

        // Radios: ao escolher uma opção, tira o destaque vermelho do grupo
        document.querySelectorAll('input[name="cnh"]').forEach(radio => {
            radio.addEventListener('change', () => clearGroupError(document.getElementById('cnhGroup')));
        });
        document.querySelectorAll('input[name="entrada"]').forEach(radio => {
            radio.addEventListener('change', () => clearGroupError(document.getElementById('entradaGroup')));
        });
        document.getElementById('privacyConsent').addEventListener('change', () => clearGroupError(document.getElementById('privacyGroup')));
    </script>
</body>

</html>