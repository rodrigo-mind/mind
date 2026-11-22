---
titulo: "postMessage, MessageChannel e mensagens entre janelas"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.13.5 e 15.13.6 (PDF p. 427-594, capítulo 15)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# postMessage, MessageChannel e mensagens entre janelas

## Definição

- **`MessageChannel`:** cria um par de portas conectadas (`port1` e `port2`); uma mensagem postada em uma porta chega como evento `message` na outra. As mensagens ficam em fila até se definir `onmessage` ou chamar `start()` (necessário se usar `addEventListener`). O `postMessage` de um worker usa um par de portas criado junto com ele.
- **Transferência:** o segundo argumento de `postMessage(mensagem, [itens])` lista itens que **são transferidos em vez de copiados**: `MessagePort` e `ArrayBuffer` (outros, como `ImageBitmap`, dependem do navegador). A porta transferida passa a funcionar só no outro lado; um `ArrayBuffer` transferido deixa de ser utilizável na origem (sem acesso concorrente), o que evita copiar grandes volumes (imagens). Usos: um segundo canal para mensagens urgentes a um worker, ou conversa direta entre dois workers.
- **Entre janelas (`window.postMessage`):** com um `<iframe>`, a política de mesma origem impede ler o conteúdo de outra origem, mas dá para **enviar mensagens**, que disparam `message` na janela de destino. A forma difere: o 2º argumento, **obrigatório**, é a **origem de destino esperada** (por exemplo, `"https://bom.exemplo.com"`); se o conteúdo da janela for de outra origem, a mensagem não é entregue; `"*"` aceita qualquer origem. Os itens a transferir passam ao 3º argumento. O evento recebido traz `data`, `source` (a janela de origem, para responder com `event.source.postMessage()`) e `origin` (a origem de quem enviou).

## Por que importa

É o canal seguro de comunicação entre contextos isolados (threads e origens diferentes).

## Como se relaciona

Veja workers: threads no navegador, modelo de segurança da web no navegador e histórico em aplicações de uma página (o clone estruturado).

## Notas do Claude

Confiança média: o trecho final sobre o uso de `event.origin` ficou truncado na extração. Em produção, **evite `"*"`** e **confira `event.origin`** ao receber mensagens, antes de agir sobre elas (recomendação minha, a conferir).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[workers-threads-no-navegador]] — «Workers: threads no navegador» cita esta nota ao explicar suas relações
- [[modelo-de-seguranca-da-web-no-navegador]] — a política de mesma origem e a origem de destino
- [[iframe-object-embed-progress-e-meter-em-html5]] — o postMessage conversa com o conteúdo de iframes
- [[regra-nunca-confie-na-entrada-do-usuario]] — mensagens recebidas devem ter a origem e o conteúdo conferidos
- [[arrays-tipados-e-arraybuffer-em-javascript]] — transferência de ArrayBuffer sem cópia
