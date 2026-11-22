---
titulo: "Fibers em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 26, seção 26.3 (PDF p. 1023-1024)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fibers em PHP

## Definição

Introduzidas no PHP 8.1, as Fibers são funções com um "botão de pausa": podem ser interrompidas e retomadas depois. A classe `Fiber` tem três métodos principais: `start()` (inicia a função), `suspend()` (pausa) e `resume()` (retoma). O livro as apresenta como forma de fazer requisições HTTP em paralelo: cria-se uma Fiber por URL, com uma função anônima no construtor, e percorre-se a lista chamando `start()`.

## Por que importa

São a base de bibliotecas de concorrência cooperativa em PHP.

## Como se relaciona

Ver fazer requisições HTTP com streams em PHP.

## Notas do Claude

No exemplo impresso, o `file_get_contents` é bloqueante e a função da Fiber não chama `suspend()`, então cada requisição termina dentro de `start()` e, como está, não corre de fato em paralelo (inferência minha, a conferir). O livro remete à documentação (`php.net/fibers`) e ao RFC para o resto. Para o projeto, é recurso avançado e raramente necessário.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fazer-requisicoes-http-com-streams-em-php]] — esta nota cita a ideia de «Fazer requisições HTTP com streams em PHP» na seção sobre como se relaciona
