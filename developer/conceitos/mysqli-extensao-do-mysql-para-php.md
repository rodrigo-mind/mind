---
titulo: "mysqli, a extensão do MySQL para PHP (e quando preferir o PDO)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 19 (PDF p. 790-838)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# mysqli, a extensão do MySQL para PHP

## Definição

`mysqli` é a extensão específica do MySQL. A antiga extensão `mysql` (sem o "i") foi descontinuada no PHP 5.5 e removida depois. O cliente padrão por baixo é o `mysqlnd`, configurável na seção `[mysqlnd]` do `php.ini`.

- **Dois estilos:**
  - procedural: `mysqli_connect()`, `mysqli_query()`, `mysqli_close()`;
  - orientado a objetos: `new MySQLi(...)`, `$db->query()`, `$db->close()`. A regra é tirar o prefixo `mysqli_`, e a conexão vira o construtor.
- **Valores dinâmicos:** dados de formulário, URL ou cookie precisam de proteção.
  - `mysqli_real_escape_string($db, $valor)` escapa levando em conta o conjunto de caracteres da conexão (por isso precisa dela);
  - as **consultas parametrizadas** são igualmente seguras e dispensam o escape manual: `mysqli_prepare($db, "INSERT ... VALUES (?)")`, depois `mysqli_stmt_bind_param($cmd, "s", $valor)` (os tipos são `s` texto, `i` inteiro, `d` decimal e `b` binário, na ordem dos `?`) e `mysqli_stmt_execute()`;
  - o valor é passado **por referência**, então precisa estar numa variável, e não pode ser um literal.
- **Erros:** `mysqli_errno()` e `mysqli_error()`, ou `$db->errno` e `$db->error`. O número 0 quer dizer sem erro. O livro alerta que o tratamento de erros dos exemplos não basta para produção.
- **Outros recursos:** transações, campos binários (BLOB) com o tipo `b` e consultas múltiplas.

## Por que importa

Muito código legado em hospedagem compartilhada usa `mysqli`. Saber lê-lo ajuda a mantê-lo e migrá-lo.

## Como se relaciona

A stack do projeto usa acesso ao banco com PDO (ver a nota de PHP e diretrizes do projeto). A proteção contra injeção de SQL está em regra nunca confie na entrada do usuário e escapar texto conforme o destino em PHP. As transações estão em transações e ACID.

## Notas do Claude

- Confiança média: li as seções de conexão, consultas, segurança e erros; a instalação, o MySQL Workbench e os exemplos longos (livro de visitas, upload de imagens) foram só folheados.
- Preferência do projeto: código novo com PDO, que tem uma interface só para vários bancos e parâmetros nomeados. Quando encontrar `mysqli` com valores concatenados no SQL, priorize trocar por consultas parametrizadas (inferência minha).
- Desde o PHP 8.1, o `mysqli` lança exceções por padrão (`mysqli_sql_exception`). Código antigo que testa `false` pode se comportar diferente (conhecimento meu, a conferir no manual).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[acesso-ao-banco-com-pdo]] — a stack do projeto usa PDO, e o mysqli é a alternativa que aparece em código legado
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — as consultas parametrizadas do mysqli aplicam a regra
- [[transacoes-e-acid]] — o mysqli oferece transações
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — o tratamento de erros do mysqli (errno, error) é um caso da regra
- [[outros-bancos-de-dados-com-php]] — cada banco tem a sua extensão, como o mysqli para MySQL
