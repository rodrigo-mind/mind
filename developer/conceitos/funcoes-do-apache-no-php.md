---
titulo: "Funções do Apache no PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 37 (PDF p. 1304-1312)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Funções do Apache no PHP

## Definição

Com o PHP integrado ao Apache **como módulo** (a versão CGI não tem os direitos), existem funções extras:

- `apache_get_version()` e `apache_get_modules()`: versão e módulos do servidor.
- `apache_request_headers()` e `apache_response_headers()`: **todos** os cabeçalhos HTTP da requisição e da resposta (o `$_SERVER` não traz todos).
- `apache_lookup_uri()`: informações sobre um URI (tipo MIME, caminho físico a partir do virtual).
- `virtual("/cgi-bin/script.pl")`: inclui a saída de outro recurso do Apache (por exemplo, um script em Perl), como o `<!--#include virtual-->` do servidor.
- `apache_child_terminate()`: encerra o processo filho do Apache após um script que consome muitos recursos (precisa da opção `child_terminate` ligada).

O `phpinfo()` mostra se o suporte está ativo.

## Por que importa

Dá acesso aos cabeçalhos completos e permite integrar scripts de outras tecnologias durante uma migração.

## Como se relaciona

Ver onde configurar o PHP (o `.htaccess` também só funciona com o módulo do Apache).

## Notas do Claude

Em muitas hospedagens o PHP roda em FPM ou CGI, e essas funções não existem (inferência minha, a conferir); para ler cabeçalhos, `getallheaders()` costuma estar disponível. O exemplo `apache_lookup_uri` do livro escapa a saída com `htmlspecialchars`, como deve ser.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[onde-configurar-o-php]] — o .htaccess e as funções do Apache dependem do módulo Apache
- [[regra-escape-a-saida-contra-xss]] — o exemplo escapa a saída com htmlspecialchars
