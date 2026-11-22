---
titulo: "Não abra URLs ou streams informados pelo usuário"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 26, seção 26.4.1 (PDF p. 1025-1027)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não abra URLs ou streams informados pelo usuário

## Regra

Nunca passe a `fopen`, `file_get_contents` ou `include` um endereço digitado pelo usuário sem restringi-lo a uma lista de destinos permitidos.

## Por quê

O livro mostra um programa que lê a URL de um campo de formulário e a abre com um fluxo, e adverte: não deve ir à internet assim, porque o usuário pode digitar qualquer fluxo, inclusive o nome de um arquivo local como `/etc/passwd`. A saída do autor: permitir só URLs de um servidor específico.

## Quando não vale

Quando o destino é fixo no código e o usuário só escolhe parâmetros.

## Como verificar

Procure funções de arquivo e `include` cujo argumento venha de `$_GET`, `$_POST` ou do banco, e confira se há uma lista de permitidos (e o caminho de `php://` e `file://` está bloqueado).

## Notas do Claude

Essa classe de falha é chamada de inclusão de arquivo local e falsificação de requisição do lado do servidor (SSRF), em conhecimento geral meu, não do trecho lido; o `allow_url_fopen` do `php.ini` agrava o risco (ver nunca confie na entrada do usuário).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[fazer-requisicoes-http-com-streams-em-php]] — a regra limita quais URLs abrir
- [[regra-nunca-confie-na-entrada-do-usuario]] — é um caso da regra geral
- [[owasp-top-10-2021]] — a requisição forjada pelo servidor é uma classe de falha do OWASP
