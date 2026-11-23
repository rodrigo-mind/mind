---
titulo: "Onde configurar o PHP: php.ini, .htaccess e ini_set"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 34, seção 34.1 (PDF p. 1266-1271)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Onde configurar o PHP

## Definição

Quase todas as opções do PHP ficam no `php.ini`, mas há outros lugares:

- **`php.ini`:** a localização varia (no Windows, na pasta do PHP; no Linux, por exemplo `/etc/php8/apache2`). Dá para ter arquivos separados para a linha de comando (`php-cli.ini`) e para CGI (`php-cgi.ini`). O livro mostra um truque no Windows para alternar versões do PHP: manter cada versão em uma pasta (`php82`, `php83`), com seu `php.ini`, e renomear a pasta da versão desejada para `php`.
- **`.htaccess`** (com Apache, se permitido): `php_value opcao valor` e `php_flag opcao On` (para valores lógicos); só funcionam com o PHP como módulo do Apache.
- **`httpd.conf`:** aceita as mesmas diretivas e também `php_admin_value` e `php_admin_flag`, que **não podem ser sobrescritas** pelo `.htaccess`.
- **No script:** `ini_set("opcao", "valor")`.

**Quatro categorias de opções** limitam onde cada uma pode ser alterada: `PHP_INI_USER` (só `ini_set()`), `PHP_INI_PERDIR` (`.htaccess`, `httpd.conf`, `php.ini`), `PHP_INI_SYSTEM` (`httpd.conf` e `php.ini`) e `PHP_INI_ALL` (todos). Isso é necessário: seria desastroso que um script mudasse `auto_prepend_file`, que vale antes de o script rodar. Algumas só podem ser definidas no `php.ini`, como `disable_functions` e `disable_classes`. A categoria de cada opção está no manual do PHP.

## Por que importa

Em hospedagem compartilhada, nem sempre se tem acesso ao `php.ini` principal; saber que `.htaccess` e `ini_set` existem (e quais opções aceitam) evita tempo perdido.

## Como se relaciona

As opções mais importantes estão em opções importantes do php.ini; a regra sobre erros, em não exiba erros na produção.

## Notas do Claude

Em muitas hospedagens (inclusive com painel próprio), o PHP não roda como módulo do Apache, e as diretivas `php_value` do `.htaccess` não valem; nesses casos, existe um arquivo de configuração por usuário (por exemplo, `.user.ini`) ou um painel (inferência minha, a conferir no provedor).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[opcoes-importantes-do-php-ini]] — esta nota cita a ideia de «Opções importantes do php.ini» na seção sobre como se relaciona
- [[funcoes-do-apache-no-php]] — o .htaccess e as funções do Apache dependem do módulo Apache
- [[regra-nao-exiba-erros-na-tela-em-producao]] — a regra usa display_errors e log_errors
- [[diagnosticar-erros-de-ambiente-php]] — saber onde configurar o PHP ajuda a achar o php.ini carregado
