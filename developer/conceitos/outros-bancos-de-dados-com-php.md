---
titulo: "Outros bancos de dados com PHP (SQLite, SQL Server, Oracle, PostgreSQL e MongoDB)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, caps. 20 a 24 (PDF p. 839-974)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Outros bancos de dados com PHP

## Definição

Panorama dos capítulos 20 a 24, cada um sobre um banco e a extensão PHP que o acessa:

- **SQLite (cap. 20):** banco em **arquivo**, sem servidor, com a biblioteca já incluída no PHP. É muito rápido para **ler**. Ao **gravar**, o arquivo inteiro fica travado, o que o torna bem mais lento que MySQL ou SQL Server com muitas gravações ao mesmo tempo. Se guardar dados sensíveis, ponha o arquivo do banco **fora da pasta pública** ou impeça o servidor de entregar arquivos com extensões como `.db`.
- **Microsoft SQL Server (cap. 21):** há versões gratuitas (Developer, para testes, e Express, com limites de uso). A Microsoft mantém uma extensão PHP própria, que roda também fora do Windows.
- **Oracle (cap. 22):** tem versão gratuita. A extensão `oci8` exige o cliente da Oracle (Instant Client) instalado, a variável `ORACLE_HOME` e, no exemplo do livro, até reiniciar o computador.
- **PostgreSQL (cap. 23):** banco livre e popular, com extensão própria (`pgsql`), que no Windows depende da biblioteca `libpq.dll`. Os valores dinâmicos devem ser escapados ou ir em consultas parametrizadas.
- **MongoDB (cap. 24):** banco **sem SQL** (NoSQL), que guarda documentos num formato derivado do JSON. Exige a extensão PHP e a instalação do servidor. O livro pede para pensar bem antes de escolhê-lo.

## Por que importa

Ajuda a escolher o banco quando o MySQL não é o caminho. Por exemplo, SQLite para um protótipo, uma configuração local ou um site pequeno com poucas gravações.

## Como se relaciona

Com PDO, a mesma interface serve a vários desses bancos (ver acesso ao banco com PDO). O modelo relacional está em modelo relacional, junções e agregações. A extensão do MySQL está em mysqli.

## Notas do Claude

- Confiança média: o mapa marca esses capítulos como `ignorar`, e eles foram destilados a pedido do usuário, em leitura dirigida (para que serve cada banco, instalação e cuidados). Os exemplos de código de cada extensão não foram lidos.
- Para a stack do projeto, o PDO já tem drivers para SQLite e PostgreSQL (`pdo_sqlite`, `pdo_pgsql`). Trocar de banco muda pouco o código, desde que o SQL siga o padrão (inferência minha).
- Na hospedagem compartilhada da Hostinger, os bancos oferecidos costumam ser MySQL ou MariaDB (inferência minha, a conferir no plano).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[acesso-ao-banco-com-pdo]] — o PDO tem drivers para vários desses bancos
- [[mysqli-extensao-do-mysql-para-php]] — é a extensão específica do MySQL, em contraste com as dos outros bancos
- [[modelo-relacional-juncoes-e-agregacoes]] — os bancos relacionais compartilham o modelo ali descrito
