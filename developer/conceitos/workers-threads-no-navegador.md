---
titulo: "Workers: threads no navegador"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.13.1 a 15.13.4 (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Workers: threads no navegador

## Definição

O JavaScript do navegador tem uma só linha de execução: nunca roda dois tratadores de evento ao mesmo tempo, e uma função longa trava a página (por isso o `fetch` é assíncrono). A classe **`Worker`** relaxa isso: cada worker é uma thread que roda **em paralelo**, em um ambiente de execução isolado, com objeto global próprio e **sem acesso a `window` ou `document`**; só se comunica por **mensagens assíncronas**. Úteis para tarefas pesadas (processamento de imagens) e para cálculos moderados e frequentes (colorir a sintaxe de um editor a cada tecla). Criar um worker é barato, mas não é leve como uma corrotina: dezenas servem, centenas não.

- **Criar e usar:** `new Worker("arquivo.js")` (URL relativa ao documento; absoluta, só da mesma origem). `worker.postMessage(valor)` copia o valor pelo clone estruturado e o entrega como evento `message` (dados em `event.data`); `worker.onmessage` recebe as respostas; `worker.terminate()` o encerra.
- **Dentro do worker** (`WorkerGlobalScope`): `postMessage()` e `onmessage` (no sentido contrário), `self`, os temporizadores, `location` (somente leitura), `navigator`, `console`, `fetch`, IndexedDB e `Worker` (um worker pode criar outros), além do núcleo do JavaScript. `close()` o encerra.
- **Importar código:** `importScripts(url1, url2...)` (síncrono e bloqueante, o que no worker é aceitável; URLs relativas ao arquivo do worker). Com módulos: `new Worker(url, { type: "module" })` (no início de 2020, só o Chrome; sem `importScripts` nesse caso).
- **Execução:** o worker roda o código de cima a baixo e depois responde a eventos e temporizadores; **sai sozinho** quando não há mais tarefas pendentes; se registra `message`, não sai enquanto puder receber. Não há como perguntar ao `Worker` se a thread ainda roda, então combine o encerramento com a thread principal.
- **Erros:** exceção não tratada dispara `error` no escopo do worker, depois no objeto `Worker`, e por fim no console e no `onerror` da janela; `preventDefault()` interrompe a propagação. Também há `unhandledrejection`.

## Por que importa

Mantém a interface responsiva durante cálculos longos, sem concorrência sobre o DOM.

## Como se relaciona

Ver postMessage, MessageChannel e mensagens entre janelas, assincronia com callbacks e eventos, módulos ES6 em JavaScript e o clone estruturado no histórico em aplicações de uma página.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — esta nota cita a ideia de «postMessage, MessageChannel e mensagens entre janelas» na seção sobre como se relaciona
- [[modulos-es6-em-javascript]] — esta nota cita a ideia de «Módulos ES6 em JavaScript» na seção sobre como se relaciona
- [[indexeddb-banco-de-objetos-no-navegador]] — o IndexedDB está disponível dentro de workers
- [[assincronia-com-callbacks-e-eventos]] — a comunicação é por eventos assíncronos
- [[usar-a-api-fetch]] — o fetch está disponível nos workers
- [[temporizadores-settimeout-e-setinterval]] — workers também têm temporizadores
- [[arrays-tipados-e-arraybuffer-em-javascript]] — ArrayBuffers podem ser transferidos a workers
