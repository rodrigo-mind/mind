---
titulo: "Padrão Collection (coleção tipada) em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 8, seção sobre coleções (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Collection (coleção tipada)

## Definição

Uma coleção é uma classe que guarda uma ou mais instâncias de uma classe específica (em geral, entidades). Ela costuma implementar `Iterator`, para ser percorrida com `foreach`. Os ORMs a usam em relações um-para-muitos.

Como o PHP não tem vetores tipados, o livro usa o operador `...` no construtor (`__construct(CategoryEntity ...$itens)`): o PHP confere o tipo de cada argumento e os entrega como um vetor. A coleção do exemplo:

- implementa `Iterator` e `Countable`;
- de propósito **não** implementa `ArrayAccess`, para continuar imutável;
- garante no `current()` que cada valor devolvido é do tipo certo, ou lança exceção.

Também se pode torná-la mutável ou acrescentar métodos como `map` e `filter`.

## Por que importa

Quem recebe a coleção pode confiar que cada item é do tipo esperado, sem testar item por item, e os editores completam os métodos corretamente.

## Como se relaciona

O operador `...` aparece em fundamentos de classes e objetos em PHP. As interfaces de iteração estão em iteração de objetos em PHP e SPL, iteradores e classes padrão do PHP. É o que o padrão Repository devolve em buscas de vários itens.

## Notas do Claude

Exemplo mínimo, inventado por mim: `final class Produtos implements IteratorAggregate, Countable { private array $itens; public function __construct(Produto ...$itens) { $this->itens = $itens; } public function getIterator(): ArrayIterator { return new ArrayIterator($this->itens); } public function count(): int { return count($this->itens); } }`. `IteratorAggregate` é mais curto que implementar `Iterator` por inteiro.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-repository-repositorio]] — é o que o repositório devolve em buscas de vários itens
- [[iteracao-de-objetos-em-php]] — a coleção implementa Iterator e Countable
- [[spl-iteradores-e-classes-padrao-do-php]] — ArrayIterator e Iterator vêm da SPL
- [[fundamentos-de-classes-e-objetos-em-php]] — usa o operador `...` no construtor, tratado nos fundamentos
