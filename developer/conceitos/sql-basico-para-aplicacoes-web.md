---
titulo: "SQL básico para aplicações web: criar, inserir, consultar e filtrar"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 17, seções 17.1 a 17.3 (PDF p. 738-751)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# SQL básico para aplicações web

## Definição

Introdução do livro ao SQL, que ele diz bastar, em poucos comandos, para as tarefas essenciais da programação web. Os fabricantes de bancos criam variações, então vale ficar nos tipos e comandos padrão para ter portabilidade.

- **Vocabulário:** um servidor de banco pode ter vários bancos, e um banco contém tabelas (como planilhas: colunas e linhas, cada linha é um registro). O livro sugere nomes de colunas sem caracteres especiais e em minúsculas.
- **Chave primária:** coluna de valor único na tabela. Como nome, e-mail, data e texto não são únicos, é comum acrescentar uma coluna numérica sequencial gerada pelo banco (autovalor: `AUTO_INCREMENT`, `IDENTITY`, `SERIAL`, conforme o banco).
- **Tipos de dados** padrão: `BLOB`, `BOOLEAN`, `CHAR(n)`, `DATE`, `DECIMAL`, `INT`, `TIMESTAMP` e `VARCHAR(n)`.
- **Criar:** `CREATE DATABASE` e `CREATE TABLE` com colunas e tipos.
- **Inserir:** `INSERT INTO tabela (colunas) VALUES (...)`, com textos entre aspas simples. A forma curta sem lista de colunas exige a ordem exata das colunas.
- **Consultar:** `SELECT * FROM tabela` traz tudo; é melhor listar as colunas necessárias. `ORDER BY coluna ASC|DESC` ordena (por várias colunas também). `WHERE` filtra, com `AND` e `OR`. A comparação de texto costuma diferenciar maiúsculas; `LIKE` não, e aceita `_` (um caractere) e `%` (vários).

## Por que importa

Dá o vocabulário comum a todos os capítulos de banco do livro (PDO, MySQL e outros).

## Como se relaciona

Para ligar tabelas e agrupar resultados, ver modelo relacional, junções e agregações. Para executar o SQL a partir do PHP, ver acesso ao banco com PDO; para os erros mais comuns de modelagem, ver as regras de SQL Antipatterns (por exemplo, chave primária sob medida).

## Notas do Claude

Sobre datas, os autores preferem guardar um carimbo de data em texto (`CHAR(14)` como `20251231123456`) para fugir de problemas de formato entre países. Para a stack do projeto, o tipo `DATETIME` ou `TIMESTAMP` do MySQL com formato ISO, e a formatação só na exibição, evita esse problema sem perder o tipo (inferência minha). Confiança média: li o que interessa; os exemplos de todos os operadores não foram lidos por inteiro.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[acesso-ao-banco-com-pdo]] — esta nota cita a ideia de «Acesso ao banco com PDO» na seção sobre como se relaciona
- [[modelo-relacional-juncoes-e-agregacoes]] — o modelo relacional continua o SQL básico
- [[regra-chave-primaria-sob-medida]] — o livro de SQL Antipatterns discute a escolha da chave primária
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — ao escrever INSERT e WHERE com dados do usuário, use consultas preparadas
- [[antipadrao-de-sql-o-que-e]] — os antipadrões partem do uso comum de SQL descrito aqui
