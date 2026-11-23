---
titulo: "Omita a tag de fechamento em arquivos só com PHP"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 4, seção 4.1 (PDF p. 141-143)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Omita a tag de fechamento em arquivos só com PHP

## Regra

Em arquivos que só têm PHP, sem HTML (classes, configuração, funções, bootstrap), não escreva o `?>` final. Abra sempre com `<?php`, e não com `<?`.

## Por quê

- Depois do `?>` pode sobrar um espaço ou uma linha em branco por engano. Esse espaço vai para a saída e provoca o erro "Cannot modify header information" quando o script tenta enviar cabeçalhos (sessão, cookie, `header('Location: ...')`). Os livros citam projetos como Symfony e Zend Framework, que já omitem o `?>`.
- A tag curta `<?` pode ser desligada no `php.ini` (`short_open_tag = Off`) e não é compatível com XML. Os autores desaconselham usá-la. A forma `<?=` para imprimir funciona sempre desde o PHP 5.4.

## Quando não vale

Em templates e páginas que misturam PHP e HTML, onde o `?>` é necessário para voltar ao HTML.

## Como verificar

Nos `.php` sem HTML, o arquivo não termina em `?>` (por exemplo, `grep -lZ '?>\s*$' *.php` mostra os que terminam). Procure também `<?` seguido de espaço ou quebra de linha, sem `php` nem `=`.

## Notas do Claude

Um BOM (marca de ordem de bytes) do UTF-8 no início do arquivo causa o mesmo erro de cabeçalho. Salve os `.php` como UTF-8 sem BOM (inferência minha, fora do livro).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-use-require-para-arquivos-essenciais]] — os arquivos incluídos são os que não devem terminar em `?>`
- [[regra-sessoes-seguras-em-php]] — espaço depois do `?>` impede o envio de cabeçalhos, como o de sessão
- [[criar-e-ler-cookies-em-php]] — setcookie também precisa ser chamado antes de qualquer saída
- [[estrutura-basica-de-um-documento-html5]] — em templates com HTML o `?>` continua necessário
