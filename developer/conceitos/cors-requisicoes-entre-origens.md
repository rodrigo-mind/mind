---
titulo: "CORS, requisições entre origens (cross-origin resource sharing)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 32, seção sobre requisições Ajax entre origens (PDF p. 804-830)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# CORS, requisições entre origens

## Definição

Por padrão, um script só faz requisições Ajax para a **mesma origem** de onde foi carregado (mesmo protocolo, host e porta; no exemplo do livro, uma porta diferente já é outra origem). O CORS (cross-origin resource sharing) é o meio legítimo de liberar outras origens:

- O navegador inclui na requisição o cabeçalho **`Origin`**, com a origem do documento.
- O servidor responde com **`Access-Control-Allow-Origin`**, indicando qual origem pode ler a resposta. Se bater com a origem do documento, o navegador entrega os dados ao script. O servidor pode usar o `Origin` recebido para decidir o valor dessa resposta.
- Ponto importante do livro: com CORS, a política é aplicada **depois** que o navegador contata o servidor e lê os cabeçalhos. A requisição **chega ao servidor** mesmo quando a resposta acaba descartada.

## Por que importa

Uma API PHP chamada por um site em outro domínio, ou por `localhost` durante o desenvolvimento, só funciona se o servidor mandar os cabeçalhos CORS. E como a requisição chega ao servidor mesmo quando é bloqueada, CORS **não** protege o servidor contra requisições indesejadas: só controla quem pode **ler** a resposta.

## Como se relaciona

O isolamento por origem está em modelo de segurança da web no navegador. O cliente aparece em XMLHttpRequest: estados, eventos e erros e em usar a API fetch.

## Notas do Claude

- Inferência minha, fora do livro: em PHP, `header('Access-Control-Allow-Origin: https://site-do-cliente.com.br');` antes de qualquer saída. Evite `*` em APIs que usam cookies ou sessão. Métodos e cabeçalhos não simples (PUT, DELETE, `Content-Type: application/json`) disparam uma requisição prévia `OPTIONS` ("preflight"), que o script precisa responder com `Access-Control-Allow-Methods` e `Access-Control-Allow-Headers`. O livro não cobre o preflight; confira na documentação atual.
- Proteja ações que mudam dados com token CSRF e sessão, porque o CORS não as bloqueia (ver a regra do token CSRF em formulários).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modelo-de-seguranca-da-web-no-navegador]] — o CORS libera, de forma controlada, o isolamento por origem descrito ali
- [[xmlhttprequest-estados-eventos-e-erros]] — requisições entre origens bloqueadas aparecem como o erro de rede do XMLHttpRequest
- [[usar-a-api-fetch]] — o fetch também depende dos cabeçalhos CORS para ler respostas de outra origem
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — uma API PHP chamada de outro domínio precisa enviar os cabeçalhos CORS
- [[regra-token-csrf-em-formularios]] — o CORS não impede a requisição de chegar ao servidor, então ações que mudam dados precisam de token CSRF
