---
titulo: "Escape tudo que vai para o HTML (XSS)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 32, seção 32.2, p. 1195-1201"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Escape tudo que vai para o HTML (XSS)

## Regra

Antes de mostrar na página qualquer dado que veio do usuário (inclusive o que foi guardado no banco), passe-o por `htmlspecialchars()`. Em saída JSON, use as opções de escape do `json_encode`.

## Por quê

Cross-site scripting (XSS) injeta código de script na página, que o navegador trata como código do próprio site. O exemplo do livro é um livro de visitas que imprime as entradas sem filtro: um visitante pode estragar o layout, abrir janelas, redirecionar o usuário ou ler cookies não protegidos, como o identificador da sessão (sequestro de sessão).

- `htmlspecialchars()` converte os colchetes angulares, o apóstrofo, as aspas duplas e o "e comercial" em entidades HTML. O livro diz para fazê-lo na saída (ou ao gravar).
- Atenção a dados do servidor que vêm do cliente, como `$_SERVER["PHP_SELF"]`.
- **JSON:** se o endpoint serializa dados do usuário com `json_encode` e os imprime, use `JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP`.
- **Cookie de sessão** com `session.cookie_httponly = On` impede o JavaScript de lê-lo.
- **Content Security Policy (CSP):** cabeçalho HTTP, enviado com `header()`, que diz ao navegador de onde o JavaScript pode vir. O livro diz que os filtros de XSS dos navegadores deixaram de existir e que a CSP é a esperança.

## Quando não vale

Não há exceção. Em HTML que o próprio site gera sem dado externo, o escape é dispensável.

## Como verificar

Procure `echo` de variáveis sem `htmlspecialchars` e saídas de dados guardados no banco.

## Notas do Claude

Para PHP moderno, `htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')` explicita as aspas e a codificação (inferência minha, a conferir no manual).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-sessoes-seguras-em-php]] — o cookie de sessão HttpOnly reduz o dano de um XSS
- [[owasp-top-10-2021]] — o XSS faz parte da categoria de injeção da lista
- [[visao-com-modelo-e-auxiliar-de-visao]] — todo modelo de visão deve escapar a saída
- [[modelo-de-seguranca-da-web-no-navegador]] — é o mesmo problema visto do lado do navegador e do lado do servidor
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — é a mesma defesa, no cliente e no servidor
- [[criar-e-ler-cookies-em-php]] — o valor lido de $_COOKIE deve ser escapado na saída; httponly reduz o roubo por XSS
- [[links-e-urls-relativas-em-html]] — URLs de link montadas a partir de dados do usuário precisam ser validadas e escapadas
- [[criar-inserir-e-remover-nos-do-dom]] — criar nós de texto é uma forma de escapar a saída no cliente
- [[filtros-de-stream-em-php]] — o filtro com htmlspecialchars escapa a saída
- [[php-e-javascript-ordem-de-execucao-e-troca-de-dados]] — dados do PHP em script exigem escape
- [[funcoes-do-apache-no-php]] — o exemplo escapa a saída com htmlspecialchars
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[escapar-texto-conforme-o-destino-em-php]] — o escape de HTML é o passo 1 deste framework
- [[renderizar-templates-em-php-puro-com-buffer-de-saida]] — o template é o lugar em que o escape de saída precisa ser garantido
