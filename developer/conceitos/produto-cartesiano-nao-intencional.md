---
titulo: "Produto cartesiano não intencional"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 18, seção Antipattern: Solve a Complex Problem in One Step (PDF p. 225-229)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Produto cartesiano não intencional

## Definição

Quando duas tabelas de uma consulta não têm condição que as relacione, o `JOIN` pareia cada linha da primeira com todas as da segunda, e o resultado tem muito mais linhas do que o esperado. No exemplo do livro, contar etiquetas e produtos de um defeito na mesma consulta (`LEFT JOIN Tags` e `LEFT JOIN BugsProducts`) dá 8 e 8, em vez de 4 etiquetas e 2 produtos, porque as etiquetas e os produtos do defeito se multiplicam (4 × 2 = 8 linhas), já que nenhuma condição liga `Tags` a `BugsProducts`.

Como achar: rode a consulta sem o `GROUP BY` e olhe as linhas. Um sintoma típico é a contagem impossivelmente grande; outro é o conselho de "ponha outro `DISTINCT`", que apenas esconde o problema e faz o banco gerar o conjunto inflado só para descartar duplicatas (e `COUNT(DISTINCT)` não funciona quando valores repetidos são esperados).

**Uso legítimo:** `CROSS JOIN` gera de propósito todas as combinações; o livro mostra como gerar números de 0 a 99 juntando uma tabela de 10 dígitos com ela mesma duas vezes.

## Por que importa

É a causa mais comum de totais errados em relatórios com várias contagens.

## Como se relaciona

A solução é a regra de não resolver tudo em uma consulta só, e a regra do valor único no GROUP BY trata de outra fonte de resultados ambíguos.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nao-resolva-um-problema-complexo-em-uma-consulta-so]] — explica o principal defeito da consulta única
- [[modelo-relacional-juncoes-e-agregacoes]] — trata de junções sem condição
