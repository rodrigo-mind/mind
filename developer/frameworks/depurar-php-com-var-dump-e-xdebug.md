---
titulo: "Depurar PHP: echo, var_dump e Xdebug"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 35 (PDF p. 1282-1295)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Depurar PHP: echo, var_dump e Xdebug

## Para que serve

Achar a causa de um comportamento errado em um script (não de erros de sintaxe, que o PHP aponta com a linha, às vezes uma a mais, porque as instruções podem se estender por várias linhas e só terminam no ponto e vírgula).

## Quando usar e quando não usar

Comece pelo manual para um problema pequeno; use o Xdebug quando a busca manual fica cansativa.

## O que perguntar ao usuário antes

- Há acesso ao `php.ini` e a um editor com suporte a depuração?

## Passos

1. **Manual:** coloque `echo`, `print_r` ou `var_dump` antes e depois das chamadas críticas, para estreitar a causa. Prefira `var_dump`, que mostra também o **tipo** (foi o que revelou o `0` contra `false` do exemplo). Remova o código de depuração antes de publicar (o livro nota que é embaraçoso esquecê-lo no ar).
2. **Xdebug (depurador mais conhecido, de Derick Rethans):** instale a extensão (no Windows, `zend_extension=` com o caminho absoluto do DLL da versão certa; na compilação, `phpize`, `./configure --enable-xdebug`, `make`; ou `pecl install xdebug`; o assistente em `xdebug.org/wizard.php` dá instruções para o seu sistema). Confira em `phpinfo()`.
3. **Configure:** `xdebug.mode = debug` e `xdebug.client_port = 9003`.
4. **Conecte:** um cliente (o `dbgpClient` do site do Xdebug, ou o editor, como o PHPStorm) fica escutando; abra o script com `?XDEBUG_SESSION_START=nome`, e o PHP envia um cookie, sinal para a sessão começar. Depois use os comandos do depurador (passo a passo, inspeção).
5. **Perfil (profiling):** `xdebug.mode = profile` e `xdebug.output_dir`; os dados precisam de um visualizador, como o KCachegrind ou o QCachegrind.

## Saída esperada

A causa do defeito localizada sem código de depuração deixado no site.

## Erros comuns

- Deixar `echo` e `var_dump` no código publicado.
- Ligar o depurador ou o perfilador em produção (peso e exposição de dados, inferência minha).

## Notas do Claude

O exemplo do livro termina com a correção do `strpos` (ver compare o retorno de strpos com === false).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-compare-o-retorno-de-strpos-com-estrito]] — o exemplo de depuração termina nesta correção
- [[testes-unitarios-em-php-com-phpunit]] — os testes automatizam a detecção de erros que a depuração acha
- [[divida-tecnica]] — código de depuração esquecido é uma forma de dívida
- [[niveis-de-erro-e-set-error-handler]] — os níveis de erro orientam a depuração
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — ambos tratam de depuração em PHP
- [[console-api-do-javascript]] — depuração no lado do servidor
