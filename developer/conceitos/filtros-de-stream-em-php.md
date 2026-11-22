---
titulo: "Filtros de stream em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 26, seções 26.2.3 e 26.2.4 (PDF p. 1015-1021)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Filtros de stream em PHP

## Definição

O fluxo `php://filter` aplica filtros automaticamente: `php://filter/read=filtro1|filtro2/resource=arquivo.txt` (também `write=`). Filtros embutidos: `string.rot13`, `string.strip_tags`, `string.tolower`, `string.toupper`, e os de conversão `convert.base64-encode` e `-decode`, `convert.quoted-printable-encode` e `-decode`.

**Filtro próprio:** crie uma classe que estenda `php_user_filter`, com o método `filter($in, $out, &$consumed, $closing): int` (o tipo de retorno `int` evita aviso de descontinuação). Em um laço com `stream_bucket_make_writeable($in)`, altere `$bucket->data` (por exemplo, com `htmlspecialchars`), some `$bucket->datalen` ao `$consumed`, chame `stream_bucket_append($out, $bucket)` e termine com `PSFS_PASS_ON`. Registre com `stream_filter_register("nome", "Classe")`, confira com `stream_get_filters()`, e use em `php://filter/read=nome/resource=...`. As funções `stream_filter_append()` e `stream_filter_prepend()` acrescentam filtros a um fluxo aberto.

## Por que importa

Transformam dados na leitura ou na gravação sem código extra no ponto de uso.

## Como se relaciona

Parte de streams em PHP. O exemplo "versão em texto de uma página web" do livro usa um filtro próprio e exige cuidado (ver regra de streams informados pelo usuário).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[streams-em-php]] — «Streams em PHP: protocolos, contexto e metadados» cita esta nota ao explicar suas relações
- [[regra-escape-a-saida-contra-xss]] — o filtro com htmlspecialchars escapa a saída
