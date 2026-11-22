---
titulo: "Não use LIKE com curinga para buscar palavras"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 17 (Poor Man's Search Engine), p. 210-223 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não use LIKE com curinga para buscar palavras

## Regra

Para buscar palavras em textos longos (descrições, artigos), não use `LIKE '%palavra%'` nem expressões regulares como método principal; use um índice de texto completo ou um mecanismo de busca.

## Por quê

- **Desempenho:** esses predicados não aproveitam um índice comum e varrem todas as linhas, e comparar padrões em texto é caro; piora conforme os dados crescem.
- **Precisão:** `%one%` acha também "money", "prone" e "lonely"; delimitar por espaços falha com pontuação e com o início e o fim do texto; formas da palavra (crash, crashed, crashing) exigem expressões complicadas. Se um problema parece difícil demais para uma expressão regular, provavelmente é.
- O SQL trata a coluna como valor atômico; comparar pedaços do valor é ineficiente ou impreciso por natureza.

## Quando não vale

Consultas raras ou de uso interno, em tabelas pequenas, em que o custo de manter um índice não compensa: o `LIKE` é simples e legítimo.

## Como verificar

Procure `LIKE '%` com variável entre curingas em telas de busca, e queixas de busca lenta conforme a base cresce. As alternativas estão em implementar busca por palavras no MySQL.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[implementar-busca-por-palavras-no-mysql]] — o framework traz as alternativas
- [[indices-com-o-metodo-mentor]] — LIKE com % inicial não usa índice comum
