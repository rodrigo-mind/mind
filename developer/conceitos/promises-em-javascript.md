---
titulo: "Promises em JavaScript (promessas)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 13, seção 13.2 (PDF p. 365-384)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Promises em JavaScript

## Definição

Uma Promise é um objeto que representa o resultado de uma computação assíncrona, que pode ou não estar pronto. Não há como obter o valor de forma síncrona: só se pode pedir que uma função seja chamada quando o valor estiver pronto. Serve para resultados únicos; não substitui `setInterval` nem o evento `click`, que ocorrem várias vezes.

**Terminologia do livro:**

| Estado | Significado |
|---|---|
| Pendente (pending) | Nem cumprida nem rejeitada |
| Cumprida (fulfilled) | O primeiro callback foi chamado; tem um valor |
| Rejeitada (rejected) | O segundo callback foi chamado; tem um motivo, em geral um `Error` |
| Estabelecida (settled) | Cumprida ou rejeitada; não muda mais |
| Resolvida (resolved) | "Presa" a outra promessa: sua sorte depende dela, e isso não é o mesmo que cumprida ou estabelecida |

## Uso

- `promessa.then(aoCumprir)` registra um callback; invocado sempre de forma assíncrona, mesmo que a promessa já esteja pronta. Cada `then()` devolve uma **nova** promessa.
- **Encadear:** uma sequência de operações assíncronas se expressa em `.then().then().then()`, de forma linear, em vez de aninhar callbacks. Aninhar `then()` dentro de `then()` imita os callbacks e perde o ponto (ver regra encadeie promessas).
- Quando o callback devolve outra promessa `v`, a promessa do `then()` fica **resolvida** (presa a `v`) e só se estabelece quando `v` se estabelecer. Se devolve um valor comum, é cumprida na hora.
- **Erros:** `.catch(f)` equivale a `.then(null, f)` e é o idioma preferido; o erro "desce" pela cadeia até achar um `.catch()`. `.finally(f)` (ES2018) roda em ambos os casos, sem argumentos, ótimo para limpeza. Em código assíncrono, exceções não tratadas muitas vezes passam em silêncio, por isso o tratamento é essencial.
- **Em paralelo:** `Promise.all([...])` cumpre com um vetor dos valores e rejeita ao primeiro erro; `Promise.allSettled()` (ES2020) nunca rejeita e devolve, para cada uma, `status` e `value` ou `reason`; `Promise.race()` conclui com a primeira que se estabelecer.
- **Criar promessas:** a partir de outra promessa (`fetch(...).then(r => r.json())`); a partir de valores síncronos, com `Promise.resolve()` e `Promise.reject()`.

## Por que importa

Promessas deixam o código mais linear, padronizam e propagam erros e substituem a pirâmide de callbacks. O autor adverte que parecem simples, mas ficam confusas além do básico, e vale entendê-las a fundo.

## Como se relaciona

O `async`/`await` as esconde (ver async e await). A API `fetch()` é baseada em promessas (ver regra do fetch e erros de HTTP).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[async-e-await]] — «async e await em JavaScript» cita esta nota ao explicar suas relações
- [[assincronia-com-callbacks-e-eventos]] — as promessas resolvem os problemas dos callbacks aninhados e das exceções
- [[regra-encadeie-promises-em-vez-de-aninhar]] — a regra dá o idioma de uso das promessas
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — o fetch devolve promessas e tem a armadilha dos erros de HTTP
- [[usar-a-api-fetch]] — o fetch é baseado em promessas
- [[modulos-es6-em-javascript]] — «Módulos ES6 em JavaScript» cita esta nota ao explicar suas relações
- [[php-e-javascript-ordem-de-execucao-e-troca-de-dados]] — o retorno do fetch usa promessas
- [[indexeddb-banco-de-objetos-no-navegador]] — «IndexedDB: banco de objetos no navegador» cita esta nota ao explicar suas relações
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — «Exceções em JavaScript: throw e try/catch/finally» cita esta nota ao explicar suas relações
- [[temporizadores-settimeout-e-setinterval]] — «Temporizadores: setTimeout e setInterval» cita esta nota ao explicar suas relações
