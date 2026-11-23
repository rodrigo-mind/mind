---
titulo: "Usar a API fetch para requisições HTTP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.11.1 (PDF p. 536-546)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Usar a API fetch para requisições HTTP

## Para que serve

Fazer requisições HTTP e HTTPS a partir do navegador, com promessas. Substitui o `XMLHttpRequest`, que o livro diz não haver motivo para usar em código novo.

## Quando usar e quando não usar

Use para ler dados de uma API do mesmo servidor. Para dados em fluxo contínuo, o livro cita Server-Sent Events e WebSockets, que não foram lidos. Requisições a outras origens esbarram na política de mesma origem e exigem CORS (ver modelo de segurança do navegador).

## O que perguntar ao usuário antes

- Qual é a URL e o método? O servidor responde JSON, texto ou binário?
- Há cabeçalhos de autenticação?

## Passos

1. Chame `fetch(url)` e espere a promessa, que se cumpre quando chegam o status e os cabeçalhos da resposta, em geral antes do corpo.
2. Confira a resposta: `response.ok` (verdadeiro para status 200 a 299), `status`, `statusText` e `response.headers` (`has()` e `get()`, sem diferenciar maiúsculas de minúsculas). Se o tipo de conteúdo não for o esperado, trate como erro.
3. Peça o corpo com `response.json()`, `response.text()`, `arrayBuffer()` (binário), `blob()` (binário grande) ou `formData()`; todos devolvem promessas.
4. Processe o resultado e termine com `.catch()`.
5. Parâmetros de consulta: use `URL` e `URLSearchParams` e passe o objeto `URL` como primeiro argumento.
6. Cabeçalhos e outras opções: segundo argumento (`{ headers: ... }`) com um objeto `Headers` (`set("Authorization", ...)`), ou monte um objeto `Request` com os mesmos dois argumentos.

Com `async`/`await`, são dois `await`: um para a resposta e outro para o corpo.

## Saída esperada

O dado da resposta tratado, com os erros de rede e de HTTP distinguidos.

## Erros comuns

- Supor que o 404 ou o 500 rejeitam a promessa: não rejeitam (ver regra do fetch).
- Esquecer o `.catch()`: falhas de rede são comuns.
- Ler o corpo duas vezes.

## Notas do Claude

Confiança média: li a abertura, o tratamento de status e cabeçalhos, os parâmetros e os métodos do corpo; o envio de corpo (POST), o cancelamento, as opções e o streaming de resposta não foram lidos por inteiro.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — a regra detalha a conferência do status da resposta
- [[promises-em-javascript]] — o fetch é baseado em promessas
- [[async-e-await]] — com async/await são dois await: resposta e corpo
- [[regra-nunca-confie-na-entrada-do-usuario]] — o servidor deve validar tudo o que o fetch envia
- [[vetores-e-iteracao-em-javascript]] — os métodos de vetor tratam as listas que o fetch devolve
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — o corpo JSON do fetch vira objeto
- [[url-location-e-historico-de-navegacao]] — o objeto URL também monta as consultas do fetch
- [[fazer-requisicoes-http-com-streams-em-php]] — é o equivalente no servidor do fetch no navegador
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — o navegador consome a API com fetch
- [[ajax-e-websockets-com-php]] — o fetch substitui o XMLHttpRequest
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[server-sent-events-com-eventsource]] — o chat usa fetch para enviar e EventSource para receber
- [[workers-threads-no-navegador]] — o fetch está disponível nos workers
- [[acesso-condicional-e-invocacao-condicional-em-javascript]] — útil para ler dados aninhados de respostas
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — as respostas de API são lidas como JSON
- [[classe-url-e-urlsearchparams-em-javascript]] — montar a URL de uma requisição
- [[apis-do-navegador-para-conhecer]] — a lista de APIs do capítulo 15 situa o fetch entre os demais recursos
- [[cors-requisicoes-entre-origens]] — o fetch obedece à mesma política de CORS
- [[xmlhttprequest-estados-eventos-e-erros]] — o fetch substitui o XMLHttpRequest em código novo
- [[enviar-formulario-por-ajax-com-formdata]] — o fetch também envia FormData
