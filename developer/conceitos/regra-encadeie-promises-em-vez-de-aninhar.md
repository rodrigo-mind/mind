---
titulo: "Encadeie promises em vez de aninhar e trate os erros com catch"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 13, seções 13.2.2 a 13.2.4 (PDF p. 369-378)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Encadeie promises em vez de aninhar e trate os erros com catch

## Regra

Escreva operações assíncronas em sequência como uma cadeia linear de `.then()`, devolvendo a próxima promessa de dentro de cada callback, e termine a cadeia com um `.catch()`.

## Por quê

- O livro chama de ingênuo aninhar um `.then()` dentro de outro (por exemplo, chamar `response.json().then(...)` dentro do callback do `fetch`): isso reproduz a pirâmide de callbacks e derrota o objetivo das promessas. O idioma preferido encadeia: `fetch(url).then(r => r.json()).then(mostrar)`.
- Cada `then()` devolve uma nova promessa, e devolver uma promessa de dentro do callback faz a cadeia esperar por ela.
- Sem tratamento, os erros em código assíncrono podem passar em silêncio. Um único `.catch()` no fim trata a falha de qualquer etapa e de qualquer callback; use `.finally()` para a limpeza.
- Detalhe de HTTP: o `fetch()` só rejeita a promessa em falhas de rede; uma resposta 404 chega como resposta normal (ver regra do fetch).

## Quando não vale

Quando várias operações são independentes, não as encadeie em série: dispare-as juntas com `Promise.all`.

## Como verificar

Procure `.then(` dentro de callbacks de `.then(` e cadeias sem `.catch()`. No navegador, um tratador de `unhandledrejection` na janela ajuda a detectar rejeições sem tratamento.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[promises-em-javascript]] — a regra dá o idioma de uso das promessas
