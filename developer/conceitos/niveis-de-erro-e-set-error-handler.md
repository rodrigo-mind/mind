---
titulo: "Níveis de erro e set_error_handler"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seção 11.4.1 (PDF p. 503-506)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Níveis de erro e set_error_handler

## Definição

Os níveis de erro mudaram várias vezes: o `E_STRICT` surgiu no PHP 5.0, entrou no `E_ALL` no 5.4 e foi removido no PHP 7, dividido entre os demais; o `E_DEPRECATED` (PHP 5.3) avisa sobre funções em desuso; desde o PHP 8, `E_ALL` é o padrão. Para exibir tudo, qualquer que seja a versão, use `error_reporting(-1)`. O nível se define no `php.ini` ou por script.

`set_error_handler(função, nível)` registra uma função que recebe o número do erro, o texto, o arquivo e a linha; o segundo argumento limita a quais níveis ela reage (por exemplo, `E_WARNING`), e os outros seguem o tratamento normal. **Não captura** erros fatais, de núcleo e de análise (parse).

## Por que importa

Permite registrar ou transformar erros de forma controlada, sem expô-los ao usuário.

## Como se relaciona

A configuração do que exibir está em não exiba erros na tela em produção e opções importantes do php.ini; a depuração, em depurar PHP com var_dump e Xdebug.

## Notas do Claude

O livro não trata, neste trecho, de exceções (`try`/`catch`) e do uso de `set_error_handler` para convertê-las em `ErrorException`; é um padrão comum, a conferir na documentação (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[opcoes-importantes-do-php-ini]] — esta nota cita a ideia de «Opções importantes do php.ini» na seção sobre como se relaciona
- [[regra-nao-exiba-erros-na-tela-em-producao]] — trata do que exibir e do que registrar
- [[depurar-php-com-var-dump-e-xdebug]] — os níveis de erro orientam a depuração
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — modelo de erros em PHP
