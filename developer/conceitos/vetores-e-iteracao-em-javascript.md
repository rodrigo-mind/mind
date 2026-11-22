---
titulo: "Vetores (arrays) em JavaScript: iteração e métodos úteis"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 7, seções 7.6, 7.8 e 7.9 (PDF p. 173-198, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Vetores (arrays) em JavaScript: iteração e métodos úteis

## Definição

- **Iterar:** o jeito mais simples é `for/of`; para obter o índice junto, use `entries()`.
- **Métodos de iteração** (`forEach`, `map`, `filter`, `find`, `every`, `some`, `reduce`): recebem uma função como primeiro argumento e a chamam para cada elemento com três valores (elemento, índice, o vetor). Em vetor esparso, pulam os elementos inexistentes. Um segundo argumento opcional vira o `this` da função.
- **Mutam ou não:** alguns métodos alteram o vetor original e outros devolvem um vetor novo; confira antes de usar.
- **Busca:** `indexOf`, `lastIndexOf` e `includes` comparam como `===` (com objetos, comparam a referência, não o conteúdo); para olhar o conteúdo, use `find()` com a sua função. Devolvem `-1` se não acham.
- **Nivelar:** `flat(n)` nivela `n` níveis (padrão 1); `flatMap(f)` equivale a `map(f).flat()`, e permite mapear um elemento para zero ou vários.
- **Objetos tipo vetor (array-like):** têm `length` numérico e índices inteiros, mas não herdam os métodos de `Array`.

## Por que importa

Substituem laços manuais por transformações curtas e legíveis, comuns em manipulação de listas vindas de `fetch`.

## Como se relaciona

Ver usar a API fetch e objetos como vetores associativos.

## Notas do Claude

Confiança média: não li ordenação (`sort`), criação de vetores, vetores esparsos e `length` em detalhe.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — o espalhamento vale para objetos e vetores
- [[usar-a-api-fetch]] — os métodos de vetor tratam as listas que o fetch devolve
- [[vetores-iteraveis-e-geradores-em-php]] — o equivalente em JavaScript
- [[classes-com-a-palavra-class-em-javascript]] — métodos geradores e Symbol.iterator tornam a classe iterável
- [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] — Array.prototype é um dos protótipos nativos
- [[lacos-em-javascript-for-of-e-for-in]] — iteração de vetores
- [[sets-e-maps-em-javascript]] — iteração e vetores
- [[arrays-tipados-e-arraybuffer-em-javascript]] — comparação com vetores comuns
- [[regra-ordene-textos-para-pessoas-com-intl-collator]] — sort() de vetores
