---
titulo: "Classes de erro do JavaScript e erros personalizados"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.5 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Classes de erro do JavaScript e erros personalizados

## Definição

Pode-se lançar qualquer valor, mas por tradição lança-se um `Error` ou subclasse. Vantagem: o `Error` **captura a pilha de chamadas** na criação (o rastro mostra onde o objeto foi criado, não onde se lançou, por isso crie e lance juntos). Propriedades: `message`, `name` e `toString()` (`"name: message"`); `stack` não é padrão, mas existe em Node e navegadores modernos.

Subclasses nativas: `EvalError`, `RangeError`, `ReferenceError`, `SyntaxError`, `TypeError`, `URIError`. Você pode usá-las e **definir as suas** com propriedades extras: o exemplo do livro, `HTTPError extends Error`, guarda `status`, `statusText` e `url` e redefine `get name()`; igualmente, um `ParseError` com linha e coluna.

## Por que importa

Erros específicos permitem tratar cada falha de forma diferente e registrar mais contexto.

## Como se relaciona

Veja exceções em JavaScript (`throw` e `try/catch/finally`), classes com a palavra `class` e `extends`, e usar a API fetch (erros de HTTP).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — como lançar e tratar
- [[subclasses-com-extends-e-super-em-javascript]] — erros personalizados usam extends e super
- [[console-api-do-javascript]] — console.log de um Error mostra a pilha
