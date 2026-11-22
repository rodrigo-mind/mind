---
titulo: "Server-Sent Events com EventSource"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.11.2 (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Server-Sent Events com EventSource

## Definição

O HTTP é feito de requisições do cliente e respostas do servidor. Para o servidor avisar o cliente quando algo acontece, a técnica é o cliente abrir uma requisição e **nenhum dos dois fechar a conexão**: o servidor escreve dados quando tem algo a dizer, em rajadas, e, se a conexão cair, o cliente simplesmente refaz a requisição. É eficaz, mas pode custar caro no servidor, que mantém uma conexão ativa para cada cliente.

No navegador, a API é o **`EventSource`**: `new EventSource(url)` abre a conexão; cada dado bem formatado que o servidor escreve vira um evento (`message` por padrão, ou o nome que o servidor indicar), cujo `event.data` traz o texto. No protocolo, o servidor responde com `Content-Type: text/event-stream` e escreve linhas como `event: bid` (tipo do evento) e `data: GOOG` (dados; várias linhas `data` se juntam com quebra de linha). Há também identificadores de eventos, para o cliente que reconecta dizer o último que recebeu e o servidor reenviar os perdidos, mas isso é invisível ao código do cliente.

Aplicação típica: um chat. O cliente usa `fetch()` (POST) para enviar mensagens e um `EventSource` para receber o fluxo; o servidor (no exemplo, Node) guarda as respostas abertas dos clientes que fizeram GET em `/chat` e escreve cada mensagem postada a todas elas.

## Por que importa

É a forma mais simples de ter notificações do servidor para o navegador, só em um sentido, em cima do HTTP comum; se o servidor não fala WebSocket, é a alternativa.

## Como se relaciona

Ver WebSockets no navegador, Ajax e WebSockets com PHP e usar a API fetch (o envio no sentido contrário).

## Notas do Claude

Em PHP com hospedagem compartilhada, uma conexão que fica aberta ocupa um processo do servidor por cliente e costuma esbarrar em limites de tempo (inferência minha, a conferir no provedor); para o projeto, uma consulta periódica com `fetch` costuma bastar.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[websockets-no-navegador]] — esta nota cita a ideia de «WebSockets no navegador» na seção sobre como se relaciona
- [[ajax-e-websockets-com-php]] — esta nota cita a ideia de «Ajax e WebSockets com PHP» na seção sobre como se relaciona
- [[usar-a-api-fetch]] — o chat usa fetch para enviar e EventSource para receber
- [[eventos-no-navegador]] — as mensagens chegam como eventos do navegador
- [[temporizadores-settimeout-e-setinterval]] — alternativa a consultas periódicas
