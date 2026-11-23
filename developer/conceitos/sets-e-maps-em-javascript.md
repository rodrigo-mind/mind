---
titulo: "Set, Map, WeakMap e WeakSet em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.1 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# `Set`, `Map`, `WeakMap` e `WeakSet` em JavaScript

## Definição

Objetos comuns servem de mapas e conjuntos, mas só com chaves de texto e herdando propriedades como `toString`. O ES6 trouxe as classes `Set` e `Map`.

- **`Set`:** coleção de valores **sem duplicatas** e sem índice. Cria-se com `new Set(iterável)` (um vetor, outro `Set`, ou um texto: `new Set("Mississippi")` tem 4 elementos). Tem `size`, `add()` (um valor por vez; devolve o próprio conjunto e permite encadear), `delete()` (devolve `true` ou `false`), `clear()` e `has()`. A pertinência usa **igualdade estrita** (`1` e `"1"` são diferentes; dois vetores iguais em conteúdo, mas distintos, são diferentes). O `has()` é rápido em qualquer tamanho, ao contrário de `includes()` em um vetor. É iterável (`for/of`, `...`) e **mantém a ordem de inserção**; `forEach` passa o valor como 1º e 2º argumentos.
- **`Map`:** conjunto de chaves, cada uma com um valor. Cria-se com um iterável de pares `[chave, valor]` (por exemplo `new Map(Object.entries(o))`). Métodos: `get()` (indefinido se não existe), `set()` (encadeável; troca o valor de uma chave existente), `has()`, `delete()`, `clear()`, `size`. **Qualquer valor pode ser chave** (objetos, `null`, `NaN`), comparado por identidade. Iteração em ordem de inserção, com pares `[chave, valor]`: `for (let [k, v] of m)`; também `keys()`, `values()`, `entries()`. No `forEach`, o valor vem antes da chave.
- **`WeakMap` e `WeakSet`:** guardam referências "fracas" aos objetos-chave, que podem ser descartados pela coleta de lixo. As chaves devem ser objetos; só `get`, `set`, `has`, `delete` (e `add`, `has`, `delete` no `WeakSet`); sem `size` e sem iteração. Uso: associar dados a objetos sem vazamento de memória (cache de um cálculo caro) ou "marcar" objetos.

## Por que importa

São estruturas de dados mais adequadas do que objetos comuns para mapas e conjuntos.

## Como se relaciona

Veja vetores e iteração em JavaScript, laços (`for/of`), objetos como vetores associativos e a classe `Histogram` em delegação em vez de herança.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[vetores-e-iteracao-em-javascript]] — iteração e vetores
- [[lacos-em-javascript-for-of-e-for-in]] — Set e Map são percorridos com for/of
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — alternativa melhor aos objetos como mapas
- [[regra-prefira-delegacao-a-heranca-em-javascript]] — o exemplo do Histogram delega a um Map
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — a pertinência usa igualdade estrita
- [[iteradores-e-geradores-em-javascript]] — Set e Map são iteráveis, como descrito na nota de iteradores
