<?php

$pageTitle = "Negociação Segura e Garantia | ST Motors";
$pageDescription = "Compre sua moto com segurança. Na ST Motors você conta com negociação segura, 3 meses de garantia mecânica e garantia documental vitalícia.";

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title><?= $pageTitle ?></title>
    <meta name="description" content="<?= $pageDescription ?>">

    <!-- Favicon -->
    <link rel="icon" href="/assets/images/favicon.ico" sizes="any">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= $pageTitle ?>">
    <meta property="og:description" content="<?= $pageDescription ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">

    <!-- Preconnect para performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="stylesheet" href="/assets/styles/components/header.css">
    <link rel="stylesheet" href="/assets/styles/components/footer.css">
    <link rel="stylesheet" href="/assets/styles/negociacao-garantia.css">
</head>
<body>

<main>

    <section class="hero">

        <div class="container">

            <span class="tag">
                SEGURANÇA EM PRIMEIRO LUGAR
            </span>

            <h1>
                Compre sua moto sem medo de golpes
            </h1>

            <p class="subtitle">
                Comprar uma moto de um desconhecido pode trazer muitas dúvidas.
                Documentação irregular, restrições, golpes, problemas mecânicos...
                Na ST Motors você negocia com uma empresa estabelecida e recebe garantia de verdade.
            </p>

            <div class="hero-buttons">

                <a
                    href="/estoque/"
                    class="btn-primary"
                >
                    Ver Estoque
                </a>

                <a
                    href="https://wa.me/5516997305602?text=Ol%C3%A1.%20Tenho%20uma%20d%C3%BAvida"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-secondary"
                >
                    Tirar dúvidas
                </a>

            </div>

        </div>

    </section>


    <section class="cards-section container">

        <div class="cards">

            <article>

                <h2>
                    Negociação Segura
                </h2>

                <p>
                    Você não precisa correr o risco de negociar com desconhecidos.
                    Conferimos toda a documentação da motocicleta antes da venda,
                    garantindo que o processo aconteça com transparência e segurança.
                </p>

            </article>

            <article>

                <h2>
                    Garantia Mecânica
                </h2>

                <p>
                    Após a compra você conta com
                    <strong>3 meses de garantia mecânica</strong>,
                    oferecendo muito mais tranquilidade caso ocorra algum problema coberto pela garantia.
                </p>

            </article>

            <article>

                <h2>
                    Garantia Documental Vitalícia
                </h2>

                <p>
                    Toda documentação permanece garantida pela ST Motors.
                    Se surgir qualquer problema relacionado à documentação da moto vendida por nós,
                    estaremos à disposição para resolver.
                </p>

            </article>

        </div>

    </section>


    <section class="gray">

        <div class="container">

            <h2>
                Por que comprar na ST Motors?
            </h2>

            <div class="reasons">

                <div>
                    <h3>Você evita golpes</h3>
                    <p>
                        Nada de PIX para desconhecidos, documentos falsificados ou anúncios enganosos.
                    </p>
                </div>

                <div>
                    <h3>Procedência</h3>
                    <p>
                        Cada motocicleta passa por conferência antes de entrar em nosso estoque.
                    </p>
                </div>

                <div>
                    <h3>Suporte após a venda</h3>
                    <p>
                        Nosso relacionamento não termina quando você leva a moto embora.
                    </p>
                </div>

                <div>
                    <h3>Empresa física</h3>
                    <p>
                        Você sabe onde nos encontrar caso precise de atendimento.
                    </p>
                </div>

            </div>

        </div>

    </section>


    <section class="faq-section container">

        <h2>
            Perguntas Frequentes
        </h2>

        <details>

            <summary>
                A moto possui garantia?
            </summary>

            <p>
                Sim.
                Todas as motos possuem 3 meses de garantia mecânica conforme as condições da venda.
            </p>

        </details>

        <details>

            <summary>
                E se aparecer algum problema na documentação?
            </summary>

            <p>
                Você conta com garantia documental vitalícia da ST Motors.
            </p>

        </details>

        <details>

            <summary>
                Posso confiar na negociação?
            </summary>

            <p>
                Sim.
                Toda documentação é conferida antes da venda e você negocia diretamente com uma empresa estabelecida.
            </p>

        </details>

    </section>


    <section class="cta">

        <div class="container">

            <h2>
                Mais segurança.
                Mais tranquilidade.
                Mais confiança.
            </h2>

            <p>
                Escolha sua próxima moto sabendo que existe uma equipe pronta para atender você antes e depois da compra.
            </p>

            <a
                href="/estoque/"
                class="btn-primary"
            >
                Ver motos disponíveis
            </a>

        </div>

    </section>

</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
</body>
</html>