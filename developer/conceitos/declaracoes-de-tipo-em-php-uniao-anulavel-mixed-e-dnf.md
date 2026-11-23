---
titulo: "Declarações de tipo em PHP (união, anulável, mixed e DNF)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 3, seção sobre tipos (PDF p. 57-70)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Declarações de tipo em PHP

## Definição

O PHP tem tipagem fraca: uma variável pode guardar um número e depois um texto. As declarações de tipo nos parâmetros e nos retornos restringem isso. O autor recomenda **declarar tipos sempre que puder**, para ter código mais claro e seguro.

**Tipos isolados (tabela 3-3 do livro):** `array` (5.1), `int`, `float`, `bool` (7.0), `string`, `self`, um nome de classe, interface ou enum (5.0), `callable` (5.4), `iterable` (7.1, qualquer coisa percorrível por `foreach`), `object` (7.2), `mixed` (8.0) e `true`, `false` e `null` (8.2).

- **`mixed`:** aceita qualquer tipo, como um parâmetro sem declaração. A diferença é a intenção: diz que o parâmetro aceita tudo de propósito, e não por esquecimento.
- **União (`string|bool`, PHP 8):** aceita um dos tipos listados. Substitui os testes de tipo dentro do método, que são difíceis de ler. Funciona com classes (`ShopProduct|null`). `false` pode entrar numa união (`ShopProduct|false`), o que é mais preciso que `|bool` quando o método nunca devolve `true`.
- **Anulável (`?string`):** atalho para `string|null`.
- **Interseção (`Traversable&Stringable`, PHP 8.1):** o valor precisa ser de todos os tipos ao mesmo tempo. Só aceita classes e interfaces; com `int` ou `mixed`, dá erro fatal.
- **DNF (PHP 8.2):** combina união e interseção com parênteses: `(Traversable&Stringable)|Loggable|null`.
- **Retorno:** vem depois dos parênteses, com dois-pontos (`function getPrice(): int|float`). Aceita os mesmos tipos e mais três só de retorno: `void` (não devolve nada), `never` (precisa lançar exceção ou chamar `exit()`) e `static`. Se o método não cumprir o tipo, o PHP lança `TypeError`.
- **Classe e tipo não são a mesma coisa:** definir uma classe define um tipo, mas um tipo pode cobrir uma família de classes, por herança e interfaces.

## Por que importa

Os erros de tipo aparecem na hora, no ponto da chamada, e quem chama pode confiar no tipo do retorno.

## Como se relaciona

Para o PHP não converter tipos por conta própria, siga a regra strict_types em todo arquivo PHP. Detalhes de interseção, `never` e `void` estão em tipos de interseção em PHP, tipo de retorno never em PHP e null, void e propriedades não inicializadas em PHP. As armadilhas dos escalares estão em tipos escalares do PHP e armadilhas.

## Notas do Claude

- Em PHP com PDO, `fetch()` devolve `array|false`: é o caso típico da união com `false` (inferência minha).
- Antes de usar `true`, `false` ou `null` isolados (8.2) ou DNF, confirme a versão do PHP na Hostinger do cliente (inferência minha).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[tipos-de-intersecao-em-php]] — detalha os tipos de interseção, que a união e o DNF combinam
- [[tipo-de-retorno-never-em-php]] — detalha o tipo de retorno `never`, citado entre os tipos de retorno
- [[regra-strict-types-em-todo-arquivo-php]] — a regra faz o PHP respeitar as declarações de tipo sem converter por conta própria
- [[tipos-escalares-do-php-e-armadilhas]] — as armadilhas dos escalares são o que as declarações de tipo ajudam a evitar
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — trata do null e do void, que aparecem nos tipos anuláveis e de retorno
- [[regra-use-tipos-de-retorno-precisos-em-vez-de-interfaces-vagas]] — a regra aplica a precisão dos tipos de retorno
