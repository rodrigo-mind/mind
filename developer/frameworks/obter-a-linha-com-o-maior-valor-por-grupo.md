---
titulo: "Obter a linha com o maior valor por grupo"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 15, seção Solution: Use Columns Unambiguously (PDF p. 193-198)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Obter a linha com o maior valor por grupo

## Para que serve

Responder perguntas como "qual o último defeito de cada produto?", devolvendo a linha inteira (o `bug_id`) e não só a data máxima.

## Quando usar e quando não usar

Use quando a consulta precisa de colunas além da agregada. Se basta a data máxima, a consulta simples com `GROUP BY` resolve ("não ignore a solução simples").

## O que perguntar ao usuário antes

- Pode haver empate no valor máximo? Quantas linhas por grupo se aceita?
- Qual a versão do banco (funções de janela exigem, por exemplo, MySQL 8.0)?

## Passos

1. **Função de janela** (a mais clara, onde existir): subconsulta com `ROW_NUMBER() OVER (PARTITION BY produto ORDER BY data DESC) AS linha`, e `WHERE linha = 1` fora.
2. **Subconsulta correlacionada:** `WHERE NOT EXISTS (outra linha do mesmo grupo com data maior)`. Simples de ler, mas executada uma vez por linha externa (pode ser lenta).
3. **Tabela derivada:** subconsulta que calcula `MAX(data)` por grupo, e um `JOIN` com ela pela data. Pode devolver várias linhas em empate (use outra agregação, como `MAX(bug_id)`, para uma só). Escala melhor, mas cria uma tabela temporária.
4. **`LEFT JOIN` contra linhas maiores:** une cada linha a outras do grupo com data maior (desempatando com o id) e filtra `WHERE outra.id IS NULL`. Mais difícil de entender e manter, mas costuma escalar melhor.
5. **Outro agregado na coluna extra** (`MAX(bug_id)`), só se o maior id for sempre o mais recente.
6. **Concatenar** (`GROUP_CONCAT` no MySQL e SQLite; funções próprias em outros bancos): traz todos os valores, sem dizer qual é o da data máxima; não é padrão SQL.
7. **Proprietário:** `ANY_VALUE()` do MySQL, se a coluna tem um valor só por grupo ou tanto faz.
8. **Meça** o desempenho de mais de uma forma, em vez de supor.

## Saída esperada

Uma linha por grupo, com a coluna que se quer, sem ambiguidade.

## Erros comuns

- Pedir a coluna extra sem agregá-la (ver a regra do valor único).
- Esquecer o desempate e receber várias linhas por grupo.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```sql
SELECT t.produto_id, t.data, t.id
FROM (
  SELECT produto_id, data, id,
         ROW_NUMBER() OVER (PARTITION BY produto_id ORDER BY data DESC, id DESC) AS n
  FROM defeitos
) t
WHERE t.n = 1;
```

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-siga-a-regra-do-valor-unico-no-group-by]] — o framework resolve o caso de querer a linha do máximo
- [[indices-com-o-metodo-mentor]] — os índices ajudam as subconsultas e os joins
- [[numerar-linhas-do-resultado-com-row-number]] — «Numerar linhas do resultado com ROW_NUMBER e GUIDs como chave» cita esta nota ao explicar suas relações
