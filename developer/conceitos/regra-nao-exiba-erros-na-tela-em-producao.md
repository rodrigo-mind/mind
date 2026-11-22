---
titulo: "Não exiba erros na tela em produção"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 34, seção 34.2 (PDF p. 1275-1276)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não exiba erros na tela em produção

## Regra

No servidor de produção, deixe `display_errors = Off` e `log_errors = On` (com um `error_log`); mostre erros no navegador só em desenvolvimento e teste.

## Por quê

O livro explica que não enviar a mensagem de erro ao navegador é desfavorável no desenvolvimento e nos testes, mas extremamente útil em produção; o registro em arquivo preserva as informações. (O motivo de segurança, que as mensagens revelam caminhos e detalhes internos, é inferência minha.) O arquivo de produção do PHP traz esses valores.

## Quando não vale

Em desenvolvimento e teste, ligue `display_errors` e use `error_reporting = E_ALL` para ver tudo.

## Como verificar

Em produção, force um erro de teste e confirme que nada aparece na tela e que a linha chegou ao `error_log`. Confira `phpinfo()` (e apague o arquivo depois).

## Notas do Claude

Combina com os erros de PDO (não deixar a exceção mostrar usuário e senha) e com a conferência de segurança do projeto (ver acesso ao banco com PDO).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[onde-configurar-o-php]] — a regra usa display_errors e log_errors
- [[acesso-ao-banco-com-pdo]] — erros de conexão do PDO podem expor credenciais
- [[owasp-top-10-2021]] — mensagens de erro detalhadas facilitam ataques
- [[niveis-de-erro-e-set-error-handler]] — trata do que exibir e do que registrar
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — registrar o erro e mostrar mensagem amigável
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — não exibir detalhes de erros ao usuário
- [[console-api-do-javascript]] — cuidado com detalhes em produção
