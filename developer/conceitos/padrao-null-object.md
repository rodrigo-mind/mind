---
titulo: "Padrão Null Object (objeto nulo)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 11, seção The Null Object Pattern (PDF p. 436-442)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Null Object

## Definição

Em vez de devolver `null` quando um método não acha o objeto prometido, devolve um **objeto do tipo esperado que não faz nada**. Retornar `null` quebra o contrato (o método prometeu um objeto com certos métodos), e o cliente precisa checar (`is_null`) em todo lugar: no exemplo do livro, um `null` escondido no vetor de unidades de uma casa (`TileForces`) causa "Call to a member function bombardStrength() on null". Replicar a checagem em vários pontos é um mau cheiro: a resposta usual para trechos de cliente em paralelo é trocar condicionais por **polimorfismo**.

Uma classe `NullUnit` implementa o tipo `Unit` e não faz nada de útil (por exemplo, força de bombardeio zero); o código que carrega as unidades cria um `NullUnit` no lugar de `null`, e o cliente pode chamar qualquer método sem erro. Quando for preciso saber se é nulo, evite `instanceof` e use um método `isNull()` na classe-base (devolve `false`) e no objeto nulo (devolve `true`).

Se a falha for catastrófica, lance uma exceção; o objeto nulo serve a falhas brandas.

## Por que importa

Elimina checagens de `null` espalhadas pelo código.

## Como se relaciona

Ver polimorfismo no lugar de condicionais, null, void e propriedades não inicializadas em PHP e padrão Composite (o exemplo reaproveita o tipo `Unit`).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[polimorfismo-no-lugar-de-condicionais]] — esta nota cita a ideia de «Polimorfismo no lugar de condicionais» na seção sobre como se relaciona
- [[padrao-composite]] — esta nota cita a ideia de «Padrão Composite» na seção sobre como se relaciona
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — esta nota cita a ideia de «Null, void e propriedades não inicializadas em PHP» na seção sobre como se relaciona
- [[regra-use-sempre-a-comparacao-identica-em-php]] — evita a checagem de nulos com comparações
