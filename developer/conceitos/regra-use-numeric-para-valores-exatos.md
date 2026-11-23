---
titulo: "Use NUMERIC ou DECIMAL, e não FLOAT, para valores exatos como dinheiro"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 10 (Rounding Errors), p. 132-139"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use NUMERIC ou DECIMAL, e não FLOAT, para valores exatos

## Regra

Para números fracionários que precisam de valor exato, como preços e saldos, declare a coluna como `NUMERIC(precisão, escala)` ou `DECIMAL`, e não `FLOAT` nem `DOUBLE`.

## Por quê

`FLOAT` guarda números binários (padrão IEEE 754), e muitos valores decimais não têm representação exata, então são arredondados para o mais próximo. O livro faz a analogia com 1/3 em decimal: somar três vezes 0,333 não dá 1. Comparações de igualdade, somas e multiplicações com FLOAT podem falhar. `NUMERIC` e `DECIMAL` (equivalentes) guardam o valor exato até a precisão definida: com precisão 9 e escala 2 cabe 1234567,89, mas não 12345678,91.

## Quando não vale

O FLOAT serve para medidas científicas e outros valores aproximados, em que um valor arredondado é aceitável.

## Como verificar

Procure colunas `FLOAT` ou `DOUBLE` com nomes como preço, valor, saldo ou total. Teste a igualdade de um valor gravado e relido.

## Notas do Claude

Outra forma de evitar o problema é guardar centavos como inteiro (o livro menciona "armazenar preços" num mini-antipadrão no capítulo 8, que não li).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[valor-historico-em-tabela-de-associacao]] — preços pagos usam tipo numérico exato
- [[regra-nao-use-float-para-dinheiro]] — é a regra equivalente no banco de dados
- [[numeros-aleatorios-e-precisao-em-php]] — o cálculo exato também se faz no PHP, com BCMath
