---
titulo: "WebSockets no navegador"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.11.3 (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# WebSockets no navegador

## Definição

Interface simples para um protocolo de rede complexo e poderoso: troca de mensagens de texto e **binárias, nos dois sentidos**, com um servidor, depois de uma conexão iniciada pelo cliente. O endereço é uma URL `wss://` (os navegadores costumam exigir páginas em HTTPS). A conexão começa como HTTP, com um cabeçalho `Upgrade: websocket`, e muda de protocolo; por isso o **servidor também precisa falar WebSocket** e ter código no lado servidor.

- **Criar e fechar:** `new WebSocket("wss://...")`; a conexão não está pronta de imediato: `readyState` vale `CONNECTING`, `OPEN`, `CLOSING` ou `CLOSED` (também se a conexão inicial falha). Eventos: `open`, `error`, `close` (`onopen`, `onerror`, `onclose` ou `addEventListener`); `close()` encerra.
- **Enviar:** `send()` aceita texto, `Blob`, `ArrayBuffer`, vetor tipado ou `DataView` e só põe a mensagem em um buffer (`bufferedAmount` mostra o que ainda não saiu).
- **Receber:** evento `message` com `event.data`: texto, ou `Blob` (padrão) para binários; defina `binaryType = "arraybuffer"` para receber `ArrayBuffer`. Ao contrário de outras APIs de mensagens, o WebSocket **não usa o clone estruturado**: a mensagem é um único texto Unicode ou uma sequência de bytes.
- **Protocolo da aplicação:** o WebSocket só troca mensagens; o significado delas é por conta da aplicação, e cada URL costuma ter o seu (`.../v2` para a versão nova). A negociação embutida: o segundo argumento do construtor é uma lista de protocolos que o cliente aceita, o servidor escolhe um (ou falha), e `socket.protocol` informa o escolhido.

## Por que importa

Dá comunicação em tempo real e bidirecional (chat, jogos, painéis ao vivo).

## Como se relaciona

Ver Server-Sent Events, Ajax e WebSockets com PHP (o servidor com Ratchet) e assincronia com callbacks e eventos.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[ajax-e-websockets-com-php]] — esta nota cita a ideia de «Ajax e WebSockets com PHP» na seção sobre como se relaciona
- [[server-sent-events-com-eventsource]] — «Server-Sent Events com EventSource» cita esta nota ao explicar suas relações
- [[assincronia-com-callbacks-e-eventos]] — os eventos open, message e close seguem o modelo de eventos
- [[modelo-de-seguranca-da-web-no-navegador]] — wss e a restrição a páginas HTTPS
- [[arrays-tipados-e-arraybuffer-em-javascript]] — «Arrays tipados e ArrayBuffer em JavaScript» cita esta nota ao explicar suas relações
