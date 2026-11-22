---
titulo: "Não use float para dinheiro"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 4, seção Floats (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não use float para dinheiro

## Regra

Não calcule valores monetários com `float`; use BCMath ou uma biblioteca de dinheiro (o livro indica a `moneyphp/money`, que usa BCMath por baixo, com uma camada voltada a moedas).

## Por quê

Os floats são aproximações em base 2, e somas simples podem sair erradas (`0.7 + 0.1` não é igual a `0.8`). Cobrar o valor errado e faturas que não fecham não são toleráveis. O livro chama o uso de floats para moeda de "mau uso muito comum".

## Quando não vale

Quando a exatidão absoluta não importa (medidas de interface, tempos).

## Como verificar

Procure `float`, `round(` e operadores aritméticos sobre preços; troque por BCMath, inteiros em centavos ou a biblioteca.

## Notas do Claude

No banco, o equivalente é `NUMERIC`/`DECIMAL` (ver use NUMERIC para valores exatos). Guardar em inteiros de centavos é uma alternativa comum (inferência minha, não do trecho lido).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[tipos-escalares-do-php-e-armadilhas]] — a regra tira a consequência prática dos floats
- [[regra-use-numeric-para-valores-exatos]] — é a regra equivalente no banco de dados
