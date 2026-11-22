---
tipo: ficha-de-arquivo
arquivo: PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra).pdf
formato: pdf
leitura: parcial
lido_em: 2026-11-22
---

# PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra) (pdf)

Original: [[PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra).pdf]]

## Resumo

*PHP 8 Objects, Patterns, and Practice: Volume 1 — Mastering OO Enhancements and Design Patterns*, sétima edição, de Matt Zandstra (Apress, 2024, 639 páginas, em inglês). Esta edição foi dividida em dois volumes: o Volume 1 trata de objetos e padrões, e o Volume 2 (que não está no projeto) trata de ferramentas e boas práticas. Parte I, Objetos (capítulos 1 a 6): PHP e objetos, tipos, herança, propriedades e classes `readonly`, enums, traits, interfaces, namespaces e pacotes, reflexão e projeto de classes. Parte II, Padrões (capítulos 7 a 14): o que são padrões, geração de objetos, padrões de organização, de tarefas e corporativos, injeção de dependência e **padrões de banco de dados** (capítulo 13: Data Mapper, Lazy Load, Identity Map, Unit of Work, entre outros).

**Sobre PDO e segurança:** PDO aparece como ferramenta nos exemplos de acesso a dados (por exemplo, `ShopProduct::getInstance(int $id, \PDO $pdo)` e os padrões do capítulo 13), com consultas preparadas, mas o livro não ensina PDO nem segurança como assunto. Busca no texto inteiro não achou injeção de SQL, XSS, CSRF, `password_hash` nem `htmlspecialchars`, e o Volume 2 não está presente.

Leitura parcial: li a capa, os créditos, o sumário e a introdução, e fiz buscas no texto inteiro (639 páginas); os capítulos não foram lidos. Não há trecho dirigido ao Claude. O arquivo não tem JavaScript embutido.

## Conexões

- [[developer]] — referência de PHP orientado a objetos para a camada de back-end da stack; no que toca ao banco, só traz padrões de acesso a dados com PDO, e não o tema de PDO nem o de segurança do checklist
- [[The-Art-of-Modern-PHP-8-(Joseph-Edmonds-Lorna-Jane-Mitchell) (epub)]] — os dois cobrem PHP 8 moderno, orientação a objetos, tipos, padrões, MVC e injeção de dependência; este aprofunda os padrões de projeto (inclusive de banco) e o outro traz Composer e PHP 8.1
- [[php-diretrizes-e-referencias]] — a nota indica o OWASP e o PHP The Right Way para segurança e PDO, temas que este livro não cobre
- [[PHP-and-MySQL-The-Comprehensive-Guide-(Christian-Wenz-Tobias-Hauser) (pdf)]] — os dois tratam de orientação a objetos, padrões de projeto e MVC; aquele traz a base da linguagem e o banco de dados, e este aprofunda a arquitetura
- [[mapa-php-8-objects-patterns-and-practice]] — o mapa acompanha a destilação deste livro
