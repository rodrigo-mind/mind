---
titulo: "Confira response.ok: o fetch só rejeita em falha de rede"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 13, seção 13.2.4 (PDF p. 373-378)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Confira response.ok: o fetch só rejeita em falha de rede

## Regra

Depois de um `fetch()`, verifique a propriedade `ok` (ou o `status`) da resposta antes de ler o corpo, e trate os erros de HTTP à parte dos erros de rede.

## Por quê

A promessa do `fetch()` é rejeitada quando não dá para fazer a requisição (rede fora do ar, por exemplo). Uma resposta 404 ou 500 é uma resposta HTTP válida: a promessa é cumprida com um objeto `Response`, e o código seguinte pode tentar ler o corpo de uma página de erro como se fosse o dado esperado. Os métodos `text()` e `json()` da resposta também devolvem promessas, pois o corpo pode não ter chegado.

No exemplo do livro, o primeiro `then()` confere `response.ok` e, se falhar, devolve `null` (um caso que se trata como situação normal e não como erro); o segundo `then()` mostra um resultado alternativo quando o valor é falso, e o `.catch()` final trata os erros de rede.

## Quando não vale

Não há exceção no trecho lido.

## Como verificar

Procure `fetch(` seguido de `.json()` sem teste de `ok` ou de `status`.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[promises-em-javascript]] — o fetch devolve promessas e tem a armadilha dos erros de HTTP
- [[async-e-await]] — a conferência de response.ok vale também com await
- [[validar-formularios-em-php]] — o servidor PHP precisa validar o que o fetch envia, mesmo que o cliente valide
- [[usar-a-api-fetch]] — a regra detalha a conferência do status da resposta
- [[xmlhttprequest-estados-eventos-e-erros]] — a armadilha do status vale também para o XMLHttpRequest
