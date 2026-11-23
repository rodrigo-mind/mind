---
titulo: "Iteradores e geradores em JavaScript (Symbol.iterator, function* e yield)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 12 (PDF p. 345-358)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Iteradores e geradores em JavaScript

## Definição

**Iteráveis:** vetores (inclusive os tipados), strings, `Set` e `Map` são iteráveis. Isso permite usá-los com:

- `for/of`;
- o operador `...` (por exemplo, `[...texto]`);
- desestruturação;
- funções que aceitam iteráveis, como `new Set("abc")`.

Ao percorrer um `Map`, cada item é um par `[chave, valor]`.

**Os três tipos envolvidos:**

1. **Objeto iterável:** tem um método com o nome `Symbol.iterator` que devolve um iterador.
2. **Iterador:** tem um método `next()`.
3. **Resultado:** cada `next()` devolve `{ value, done }`. Os iteradores nativos também são iteráveis (devolvem a si mesmos).

**Tornar uma classe iterável:** implemente `[Symbol.iterator]()`, que devolve um objeto com `next()`. O autor recomenda tornar iterável todo tipo de dado que represente algo percorrível.

**Preguiça (lazy):** o valor seguinte só é calculado quando pedido. No exemplo do livro, `words()` separa as palavras de um texto longo sem montar o vetor inteiro na memória.

**Fechar o iterador:** se o laço acabar antes, por `break`, `return`, exceção ou desestruturação parcial, o interpretador chama `return()` no iterador, se existir. É ali que se fecham arquivos e se libera memória.

**Geradores:**

- `function* nome() { ... yield valor; ... }` devolve um objeto gerador, que é um iterador.
- Cada `next()` roda a função até o próximo `yield`.
- Em classes e objetos, a forma curta é `*metodo() {}` e `*[Symbol.iterator]() {}`. Esta última é o jeito mais curto de tornar uma classe iterável.
- Não existe gerador com função de seta.

## Por que importa

Permite percorrer listas longas ou geradas sob demanda (paginação, faixas de números) com `for/of`, sem criar vetores enormes.

## Como se relaciona

O uso básico está em vetores e iteração em JavaScript e em laços em JavaScript, for/of e for/in. Os `Set` e `Map` estão em sets e maps em JavaScript. Em PHP, a ideia equivalente está em vetores, iteráveis e geradores em PHP.

## Notas do Claude

O capítulo também trata de `yield*`, `return()` e `throw()` em geradores e da versão assíncrona, `for await`. Esses trechos foram só folheados.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[vetores-e-iteracao-em-javascript]] — o uso básico de iteração está ali
- [[lacos-em-javascript-for-of-e-for-in]] — for/of é o laço que consome iteráveis
- [[sets-e-maps-em-javascript]] — Set e Map são iteráveis nativos
- [[vetores-iteraveis-e-geradores-em-php]] — é o equivalente em PHP dos geradores
- [[metaprogramacao-em-javascript]] — `Symbol.iterator` é um dos símbolos conhecidos que mudam o comportamento da linguagem
