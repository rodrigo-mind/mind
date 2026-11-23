---
titulo: "Escapar texto conforme o destino em PHP (HTML, URL, SQL e regex)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 7, seção 7.6 (PDF p. 323-333)"
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 19, seção sobre consultas (PDF p. 800-806)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Escapar texto conforme o destino em PHP

## Para que serve

Impedir que caracteres especiais de um texto, em geral vindo do usuário, sejam interpretados como código no lugar onde ele vai ser usado. Cada destino tem a sua função.

## Quando usar e quando não usar

Sempre que um valor dinâmico (de formulário, URL, cookie ou banco) for colocado dentro de HTML, de uma URL, de um SQL ou de uma expressão regular. Valores fixos, escritos no próprio código, não precisam.

## O que perguntar ao usuário antes

- Onde o valor vai aparecer: no corpo do HTML, num atributo, num link, num SQL ou num padrão de busca?
- O conteúdo pode ter formatação permitida (HTML do usuário)?

## Passos

1. **HTML:** `htmlspecialchars($texto)` converte os caracteres que têm significado em HTML (`&`, `<`, `>` e as aspas). `htmlentities()` converte também os acentos em entidades, mas isso é desnecessário numa página em UTF-8. O livro recomenda converter **sempre** a entrada do usuário antes de mostrá-la (no exemplo do livro de visitas), porque tags inseridas podem quebrar o layout ou rodar scripts maliciosos. Para voltar, use `html_entity_decode()`.
2. **Aspas em atributos:** o segundo argumento define o tratamento das aspas: `ENT_QUOTES` converte as simples e as duplas, `ENT_COMPAT` só as duplas, `ENT_NOQUOTES` nenhuma. O terceiro define o conjunto de caracteres.
3. **URL:** `urlencode()` para valores anexados à URL, como na query string, e `urldecode()` para voltar. Para separar as partes de uma URL, use `parse_url()`.
4. **SQL:** use **consultas parametrizadas** (prepared statements). O livro apresenta `addslashes()` e `mysqli_real_escape_string()`, que considera o conjunto de caracteres da conexão, mas mostra as consultas parametrizadas como o caminho que dispensa o escape manual.
5. **Regex:** para pôr texto literal dentro de um padrão, escape os metacaracteres. O livro cita `quotemeta()`.
6. **Tirar tags:** `strip_tags($texto, $permitidas)` remove tags HTML e PHP, mantendo as listadas. Não é proteção suficiente (ver Notas do Claude).

## Saída esperada

Cada valor dinâmico passa pela função própria do seu destino, no momento em que é usado.

## Erros comuns

- Usar `addslashes()` para SQL em vez de consultas parametrizadas.
- Escapar uma vez na entrada e achar que serve para todos os destinos: cada destino tem a sua regra.
- Confiar em `strip_tags()` como proteção contra XSS.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$nome = $_POST['nome'] ?? '';
echo '<p>Olá, ' . htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') . '</p>';
echo '<a href="/busca.php?q=' . urlencode($nome) . '">Buscar</a>';
$st = $pdo->prepare('INSERT INTO contatos (nome) VALUES (?)');
$st->execute([$nome]);
$padrao = '/' . preg_quote($nome, '/') . '/i';
```

## Notas do Claude

- diverge: o livro diz que o padrão do `htmlentities` é `ENT_COMPAT` e ISO-8859-1. No PHP 8.1 ou mais novo, o padrão é `ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401` e o conjunto padrão é UTF-8 desde o PHP 5.4 (conhecimento meu, a conferir no manual). Passar `ENT_QUOTES` e `'UTF-8'` explicitamente evita depender da versão.
- Para regex, `preg_quote($texto, '/')` (que também escapa o delimitador) é mais indicado que `quotemeta()`, que não escapa `/` (inferência minha).
- `strip_tags` não limpa atributos perigosos das tags permitidas (`<b onclick=...>`). Para aceitar HTML do usuário, use uma biblioteca de limpeza, como HTML Purifier (inferência minha).
- Texto em português: as funções comuns (`strlen`, `substr`, `strtoupper`) contam bytes, e `ç` e `ã` ocupam dois bytes em UTF-8. Use `mb_strlen`, `mb_substr`, `mb_strtoupper`. O livro, na seção 7.8.5, diz que o `mbstring` serve a aplicações multilíngues, mas descreve mal o motivo: o UTF-8 já é uma codificação multibyte (conhecimento meu).
- Ligado à regra escape a saída contra XSS, à regra nunca confie na entrada do usuário e a acesso ao banco com PDO.

## Conexões

- [[expressoes-regulares-em-php-com-preg]] — um dos destinos de escape é o padrão de expressão regular
- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-escape-a-saida-contra-xss]] — o escape de HTML é a defesa contra XSS
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — SQL pede consulta parametrizada, e não escape
- [[acesso-ao-banco-com-pdo]] — as consultas preparadas do PDO são o destino correto para SQL
- [[regra-nunca-confie-na-entrada-do-usuario]] — o escape por destino é a aplicação desta regra
- [[renderizar-templates-em-php-puro-com-buffer-de-saida]] — o template usa o escape de HTML para cada saída
