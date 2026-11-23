---
titulo: "Modelo de segurança do JavaScript no navegador (same-origin, XSS)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.1.8 (PDF p. 441-444)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Modelo de segurança do JavaScript no navegador

## Definição

Os navegadores buscam equilibrar APIs poderosas com a proteção de dados e privacidade do usuário.

- **O que o JavaScript do navegador não faz:** não grava nem apaga arquivos arbitrários nem lista diretórios, e não tem rede de uso geral: só HTTP (`fetch`) e WebSockets, sem acesso direto à rede.
- **Política de mesma origem (same-origin policy):** um script só lê as propriedades de janelas e documentos de mesma origem que o documento que o contém. A origem é o protocolo, o host e a porta; `http` e `https` diferem, portas diferentes diferem, e o navegador trata cada URL `file:` como origem própria (por isso é preciso um servidor estático para testar). O que conta é a origem do documento em que o script está, e não a de onde o script veio. A regra também vale para requisições HTTP feitas por script; servidores de outras origens precisam autorizar com CORS.
- **Falha de XSS (cross-site scripting):** ocorre quando a página insere conteúdo não confiável como HTML sem tratamento. No exemplo do livro, um parâmetro de URL injeta uma imagem com `onload="alert(...)"`, e o código passa a rodar no site atacado, podendo ler cookies e capturar teclas. A prevenção é remover as marcas HTML do dado não confiável, trocando os caracteres especiais (`&`, `<`, `>`, aspas, `/`) por entidades; outra é exibir conteúdo não confiável em um `<iframe sandbox>`.
- **Erros:** o `window.onerror` e o `onunhandledrejection` permitem relatar erros do cliente ao servidor (telemetria).

## Como se relaciona

É o equivalente, no navegador, da regra de escapar a saída contra XSS do livro de PHP (ver escape de saída contra XSS).

## Notas do Claude

Confiança média: li a segurança e o início do capítulo; as demais seções do capítulo 15 (CSP e outras) não foram lidas por inteiro.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[eventos-no-navegador]] — o modelo de segurança também trata de XSS em tratadores injetados
- [[regra-escape-a-saida-contra-xss]] — é o mesmo problema visto do lado do navegador e do lado do servidor
- [[regra-token-csrf-em-formularios]] — ambos tratam de requisições entre origens diferentes
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — a regra aplica a prevenção de XSS descrita no modelo de segurança
- [[armazenamento-no-navegador]] — o escopo por origem segue a política de mesma origem
- [[usar-modulos-javascript-no-navegador]] — módulos só carregam da mesma origem ou com CORS
- [[iframe-object-embed-progress-e-meter-em-html5]] — o sandbox restringe o conteúdo de terceiros
- [[websockets-no-navegador]] — wss e a restrição a páginas HTTPS
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — a política de mesma origem e a origem de destino
- [[apis-do-navegador-para-conhecer]] — a lista do capítulo 15 aponta CSP e CORS como estudo seguinte
- [[cors-requisicoes-entre-origens]] — o CORS é o meio legítimo de relaxar o isolamento por origem
- [[diferencas-entre-navegadores-e-deteccao-de-recursos]] — as diferenças entre navegadores incluem comportamentos de segurança
- [[regra-nao-defina-tratadores-de-evento-em-atributos-html]] — CSP e o fim de tratadores em atributos andam juntos
- [[geolocalizacao-no-navegador]] — a geolocalização é um recurso que exige permissão explícita
