<?php
// ============================================================
// hash/index.php — Gerador de hash bcrypt para troca de senha
//
// ISOLAMENTO TOTAL:
// - Sem require de qualquer arquivo do projeto (config, security, db)
// - Sem sessão, sem cookie, sem banco de dados
// - Headers anti-cache obrigatórios: resposta nunca armazenada
// - Sem autocompletar no navegador (autocomplete off + new-password)
// - Sem log de entrada: nenhum dado da senha chega ao servidor,
//   o hash é gerado server-side apenas quando o formulário é submetido
//   via POST, processado em memória e descartado imediatamente
//
// ONDE COLOCAR: public_html/hash/index.php
// ACESSO: stmotors.com.br/hash
// ============================================================

// Anti-cache: impede que proxy, CDN ou navegador armazene qualquer
// resposta desta página — incluindo a que contém o hash gerado.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');

$hash  = '';
$erro  = '';
$gerou = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lê o campo diretamente do POST — sem filter_input aqui porque
    // senha pode ter qualquer caractere; o que importa é não exibir
    // o valor de volta (sem echo da senha, só do hash).
    $senha = $_POST['senha'] ?? '';

    if ($senha === '') {
        $erro = 'Digite uma senha.';
    } elseif (mb_strlen($senha) < 8) {
        $erro = 'A senha deve ter pelo menos 8 caracteres.';
    } else {
        // PASSWORD_BCRYPT + cost 12: compatível com o password_verify
        // do admin/includes/auth.php (que usa o mesmo algoritmo).
        // Cost 12 é o equilíbrio padrão entre segurança e tempo de resposta
        // em hospedagem compartilhada — não sobe para 13+ sem testar antes.
        $hash  = password_hash($senha, PASSWORD_BCRYPT, ['cost' => 12]);
        $gerou = true;

        // Descarta a variável da senha da memória imediatamente após o hash.
        // PHP não garante zeramento de memória como C, mas elimina a referência.
        unset($senha);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Noindex absoluto: esta página não deve aparecer em nenhum buscador -->
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet">

    <title>Gerador de Hash</title>

    <style>
        /* =========================================================
           Design: utilitário, deliberadamente sem identidade visual
           do site. Não usa variáveis CSS do projeto, não importa
           nenhum asset externo. Objetivo: funcionar e só.
        ========================================================= */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0f1117;
            --surface:   #1a1d27;
            --border:    #2e3245;
            --accent:    #4f7cff;
            --accent-ok: #22c55e;
            --accent-er: #ef4444;
            --text:      #e2e8f0;
            --muted:     #64748b;
            --mono:      'Courier New', Courier, monospace;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100dvh;
            display: grid;
            place-items: center;
            padding: 1.5rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 2rem 2.25rem;
            width: 100%;
            max-width: 480px;
        }

        .card__eyebrow {
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: .75rem;
        }

        .card__title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: .35rem;
            color: var(--text);
        }

        .card__subtitle {
            font-size: .8rem;
            color: var(--muted);
            margin-bottom: 1.75rem;
            line-height: 1.5;
        }

        label {
            display: block;
            font-size: .8rem;
            font-weight: 500;
            color: var(--muted);
            margin-bottom: .4rem;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 1rem;
        }

        input[type="password"],
        input[type="text"] {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: .65rem .65rem .65rem .85rem;
            padding-right: 2.75rem;
            font-size: .95rem;
            color: var(--text);
            outline: none;
            transition: border-color .15s;
        }

        input:focus {
            border-color: var(--accent);
        }

        .btn-toggle {
            position: absolute;
            right: .65rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--muted);
            padding: .2rem;
            display: flex;
            align-items: center;
            transition: color .15s;
        }
        .btn-toggle:hover { color: var(--text); }

        .btn-submit {
            width: 100%;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: .7rem;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity .15s;
        }
        .btn-submit:hover { opacity: .88; }
        .btn-submit:active { opacity: .75; }

        .alert {
            border-radius: 6px;
            padding: .65rem .9rem;
            font-size: .82rem;
            margin-bottom: 1rem;
        }
        .alert--error {
            background: #2d1215;
            border: 1px solid #7f1d1d;
            color: var(--accent-er);
        }

        /* ── Bloco do hash gerado ── */
        .result {
            margin-top: 1.5rem;
            border-top: 1px solid var(--border);
            padding-top: 1.25rem;
        }

        .result__label {
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--accent-ok);
            margin-bottom: .5rem;
        }

        .result__box {
            position: relative;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: .75rem 2.75rem .75rem .85rem;
        }

        .result__hash {
            font-family: var(--mono);
            font-size: .78rem;
            color: var(--text);
            word-break: break-all;
            line-height: 1.55;
            user-select: all; /* seleção com um clique triplo */
        }

        .btn-copy {
            position: absolute;
            top: .6rem;
            right: .6rem;
            background: none;
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: .25rem .45rem;
            cursor: pointer;
            color: var(--muted);
            font-size: .7rem;
            transition: color .15s, border-color .15s;
        }
        .btn-copy:hover { color: var(--text); border-color: var(--text); }
        .btn-copy--ok   { color: var(--accent-ok) !important; border-color: var(--accent-ok) !important; }

        .result__tip {
            font-size: .75rem;
            color: var(--muted);
            margin-top: .6rem;
            line-height: 1.5;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.5rem 0;
        }

        .warning {
            font-size: .75rem;
            color: var(--muted);
            line-height: 1.55;
        }
        .warning strong { color: #f59e0b; }
    </style>
</head>
<body>

<div class="card">
    <p class="card__eyebrow">Utilitário interno</p>
    <h1 class="card__title">Gerador de Hash</h1>
    <p class="card__subtitle">
        Nenhuma informação é salva ou transmitida além desta página.
    </p>

    <?php if ($erro): ?>
        <div class="alert alert--error" role="alert">
            <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" autocomplete="off">
        <label for="senha">Nova senha</label>
        <div class="input-wrap">
            <input
                type="password"
                id="senha"
                name="senha"
                autocomplete="new-password"
                spellcheck="false"
                placeholder="mínimo 8 caracteres"
                required
                minlength="8"
            >
            <button
                type="button"
                class="btn-toggle"
                aria-label="Mostrar ou ocultar senha"
                onclick="toggleVisibility()"
            >
                <!-- Ícone olho — SVG inline, sem CDN -->
                <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                <svg id="icon-eye-off" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     style="display:none">
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8
                             a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12
                             4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07
                             a3 3 0 1 1-4.24-4.24"/>
                    <line x1="1" y1="1" x2="23" y2="23"/>
                </svg>
            </button>
        </div>

        <button type="submit" class="btn-submit">Gerar hash</button>
    </form>

    <?php if ($gerou && $hash): ?>
    <div class="result">
        <p class="result__label">✓ Hash gerado</p>
        <div class="result__box">
            <code class="result__hash" id="hash-output">
                <?= htmlspecialchars($hash, ENT_QUOTES, 'UTF-8') ?>
            </code>
            <button class="btn-copy" onclick="copiarHash(this)" aria-label="Copiar hash">
                Copiar
            </button>
        </div>
        <p class="result__tip">
            Copie e cole esse código hash.
        </p>
    </div>
    <?php endif; ?>

    <hr class="divider">

    <p class="warning">
        <strong>⚠ Lembre-se:</strong> após copiar o hash, feche esta aba.
        Não use a senha em mais de um local.
    </p>
</div>

<script>
    // ── Mostrar/ocultar senha ──────────────────────────────────
    function toggleVisibility() {
        const input   = document.getElementById('senha');
        const eyeOn   = document.getElementById('icon-eye');
        const eyeOff  = document.getElementById('icon-eye-off');
        const visible = input.type === 'text';

        input.type       = visible ? 'password' : 'text';
        eyeOn.style.display  = visible ? '' : 'none';
        eyeOff.style.display = visible ? 'none' : '';
    }

    // ── Copiar hash para clipboard ─────────────────────────────
    function copiarHash(btn) {
        const texto = document.getElementById('hash-output').textContent.trim();
        navigator.clipboard.writeText(texto).then(() => {
            btn.textContent = '✓ Copiado';
            btn.classList.add('btn-copy--ok');
            // Reverte o botão após 2s para não dar falsa sensação de
            // que o hash ainda está "fresco" na área de transferência
            setTimeout(() => {
                btn.textContent = 'Copiar';
                btn.classList.remove('btn-copy--ok');
            }, 2000);
        });
    }

    // ── Limpa o campo de senha após o submit ───────────────────
    // Garante que o valor não persista no DOM após o POST.
    // O navegador às vezes restaura valores de campos após navegação;
    // isso força a limpeza assim que a página carrega com resultado.
    document.addEventListener('DOMContentLoaded', () => {
        const campo = document.getElementById('senha');
        if (campo) campo.value = '';
    });
</script>

</body>
</html>