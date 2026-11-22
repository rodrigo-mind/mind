---
titulo: "Temporizadores: setTimeout e setInterval"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.10 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Temporizadores: `setTimeout` e `setInterval`

## Definição

Funções de navegadores e Node (não padronizadas na linguagem, mas de fato parte da biblioteca) para agendar código.

- **`setTimeout(função, ms)`** chama a função uma vez, depois de pelo menos `ms` milissegundos, sem argumentos; **não espera**: retorna na hora. Sem o segundo argumento vale 0, o que significa "o quanto antes", não "imediatamente" (pode levar 10 ms ou mais se o navegador está ocupado).
- **`setInterval(função, ms)`** repete a chamada a cada `ms` (aproximadamente).
- Ambos devolvem um valor opaco (número no navegador, objeto no Node) que se passa a **`clearTimeout`** ou **`clearInterval`** para cancelar. Exemplo do livro: um relógio que reimprime a hora a cada segundo com `setInterval` e para após 10 segundos com `setTimeout` e `clearInterval`.

## Por que importa

São a base da programação assíncrona simples e de animações e atualizações periódicas.

## Como se relaciona

Veja assincronia com callbacks e eventos, promises em JavaScript, workers (o código do worker também tem temporizadores), datas e horas e SSE e WebSockets (alternativas a consultas periódicas).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[promises-em-javascript]] — esta nota cita a ideia de «Promises em JavaScript» na seção sobre como se relaciona
- [[assincronia-com-callbacks-e-eventos]] — os temporizadores são callbacks assíncronos
- [[workers-threads-no-navegador]] — workers também têm temporizadores
- [[server-sent-events-com-eventsource]] — alternativa a consultas periódicas
