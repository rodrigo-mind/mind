---
titulo: "Índices com o método MENTOR (Measure, Explain, Nominate, Test, Optimize, Rebuild)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 13 (Index Shotgun), p. 160-175"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Índices com o método MENTOR

## Para que serve

Decidir quais índices criar, manter ou apagar com base em medição, em vez de chute (o "tiro de espingarda": índices criados ou removidos sem motivo).

## Quando usar e quando não usar

Use quando há consultas lentas ou ao desenhar tabelas que crescerão. O livro lembra que índice tem custo de manutenção a cada escrita, mas que o custo se paga: numa aplicação típica rodam centenas de consultas para cada atualização, e o índice também acelera `UPDATE` e `DELETE` que procuram linhas.

## O que perguntar ao usuário antes

- Que consultas rodam mais, e quais são as mais lentas?
- Qual banco e versão são usados?
- Há um registro de consultas lentas habilitado?

## Passos

1. **Medir (Measure):** registre o tempo das consultas (no MySQL, o registro de consultas lentas, com `long_query_time`; no PostgreSQL, `log_min_duration_statement`). O foco é o custo total, que inclui consultas simples muito frequentes, e não só a mais lenta. Desligue cache de resultado de consultas ao medir.
2. **Explicar (Explain):** peça o plano de execução (`EXPLAIN` no MySQL e no PostgreSQL) e veja quais índices o otimizador usa e em que ordem lê as tabelas.
3. **Nomear candidatos (Nominate):** a partir do plano, procure índices que faltam. Considere índices de cobertura (covering index), que contêm todas as colunas da consulta, e o banco lê só o índice. Há ferramentas de assessoria em alguns bancos.
4. **Testar (Test):** crie o índice e meça de novo, confirmando que valeu a pena.
5. **Otimizar (Optimize):** índices ficam bem em memória; aumente o cache de buffer do banco (no MySQL, `innodb_buffer_pool_size`), mais do que o padrão baixo, sem passar da memória do servidor.
6. **Reconstruir (Rebuild):** índices se desequilibram com o tempo; faça manutenção periódica (`OPTIMIZE TABLE` no MySQL).

## Saída esperada

Um conjunto de índices justificado por medidas de antes e depois, e o cache ajustado.

## Erros comuns

- Eliminar índices por medo do custo de manutenção.
- Criar índices demais, ou que nenhuma consulta usa (o livro cita o mini-antipadrão de indexar toda coluna).
- Rodar consultas que índice nenhum ajuda (um caso: busca com `LIKE '%texto%'`).

## Exemplo mínimo (inventado pelo Claude, não do livro)

Consulta lenta em `pedidos WHERE cliente_id = ? ORDER BY criado_em`: `EXPLAIN` mostra leitura da tabela inteira; índice composto `(cliente_id, criado_em)`; medir de novo e comparar.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[particionamento-de-tabelas]] — os índices vêm antes de particionar
- [[obter-a-linha-com-o-maior-valor-por-grupo]] — os índices ajudam as subconsultas e os joins
- [[regra-nao-use-like-com-curinga-para-buscar-palavras]] — LIKE com % inicial não usa índice comum
- [[regra-normalize-primeiro-e-desnormalize-so-com-medicao]] — a medição antes e depois é do método Mentor
- [[antipadrao-de-sql-o-que-e]] — os índices fazem parte do projeto físico que o livro organiza
- [[regra-nao-ordene-por-rand-em-tabelas-grandes]] — a ordenação por RAND() é um caso em que o índice não ajuda
