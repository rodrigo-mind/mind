---
titulo: "Regra: não adicione métodos aos protótipos dos tipos nativos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seção 9.4 (PDF p. 239-266, capítulo 9)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não adicione métodos aos protótipos dos tipos nativos

## Regra

Não acrescente métodos a `Number.prototype`, `String.prototype`, `Array.prototype` ou, pior, `Object.prototype`.

## Por quê

O protótipo é dinâmico, então é possível, mas gera confusão e problemas de compatibilidade futura se uma nova versão da linguagem definir um método com o mesmo nome. Propriedades em `Object.prototype` aparecem em laços `for/in` (a menos que sejam não enumeráveis, com `Object.defineProperty`). O livro mostra o uso legítimo: implementar uma função nova da linguagem em um ambiente antigo só se ela ainda não existir (`if (!String.prototype.startsWith) {...}`).

## Quando não vale

Para preencher funções padrão ausentes em navegadores antigos (polyfill), com teste de existência.

## Como verificar

Procure atribuições a `X.prototype.nome` onde `X` é um tipo nativo.

## Notas do Claude

Acrescentar métodos às suas próprias classes (como `Complex.prototype.conj`, no livro) é normal; a regra vale só para tipos nativos.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[classes-e-prototipos-em-javascript]] — a herança dinâmica permite alterar protótipos
- [[vetores-e-iteracao-em-javascript]] — Array.prototype é um dos protótipos nativos
- [[regra-use-for-of-e-nao-for-in-para-vetores]] — propriedades acrescentadas ao protótipo aparecem no for/in
- [[metaprogramacao-em-javascript]] — a metaprogramação oferece as ferramentas que a regra pede para não usar nos tipos nativos
