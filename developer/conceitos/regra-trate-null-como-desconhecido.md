---
titulo: "Trate NULL como desconhecido, e não como zero, vazio ou falso"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 14 (Fear of the Unknown), p. 176-187"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Trate NULL como desconhecido, e não como zero, vazio ou falso

## Regra

Use `IS NULL` e `IS NOT NULL` para procurar valores nulos, e nunca `= NULL`, `<> NULL` nem `'NULL'` entre aspas. Conte com a lógica de três valores do SQL (verdadeiro, falso e desconhecido).

## Por quê

NULL em SQL é um valor especial que significa "desconhecido". Por isso:

- Aritmética com NULL dá NULL (10 mais um valor desconhecido continua desconhecido), e a concatenação padrão de uma string com NULL também dá NULL.
- `NULL = 0`, `NULL = 12345`, `NULL <> 12345` e até `NULL = NULL` e `NULL <> NULL` resultam em NULL, e não em verdadeiro ou falso. Assim, uma busca `assigned_to <> 123` não devolve as linhas em que a coluna é nula.
- `NOT (NULL)` é NULL. `NULL AND TRUE` e `NULL OR FALSE` são NULL, mas `NULL AND FALSE` é falso e `NULL OR TRUE` é verdadeiro.
- Escrever `'NULL'` entre aspas compara com um texto (que, em colunas inteiras, vira zero na maioria dos bancos) e pode dar o resultado esperado por coincidência, escondendo o erro.

O livro cita também o predicado `IS DISTINCT FROM` do SQL-99 como alternativa para comparações em que NULL conta como valor.

## Quando não vale

Quando se precisa de um valor ordinário no lugar de NULL, o livro admite usar um valor próprio, desde que isso seja deliberado.

## Como verificar

Procure `= NULL`, `!= NULL` e `'NULL'` nas consultas, e `NOT IN` com subconsultas que podem devolver NULL.

## Notas do Claude

Confiança média: li a abertura e a solução parcial (a tabela de resultados); o mini-antipadrão `NOT IN (NULL)` e as soluções com `COALESCE` não foram lidos.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-valores-permitidos-em-tabela-de-consulta]] — ambas tratam de como o banco guarda valores ausentes e conjuntos de valores
- [[modelo-relacional-juncoes-e-agregacoes]] — COUNT(coluna) ignora valores nulos
- [[regra-siga-a-regra-do-valor-unico-no-group-by]] — COUNT e outras agregações ignoram valores nulos
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — o tratamento de nulos também importa no banco
