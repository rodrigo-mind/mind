---
titulo: "Objetos de requisição e de resposta (Request e Response)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Front Controller, subseções Request e Response (PDF p. 466-470)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Objetos de requisição e de resposta

## Definição

Em vez de ler `$_REQUEST`, `$_POST` ou `$_GET` diretamente, o sistema recebe um objeto `Request`, que traz atributos, caminho e método HTTP (um enum com GET e POST), e devolve um objeto `Response`, que encapsula o código de resposta, os cabeçalhos e o conteúdo.

## Por que importa

- Variáveis globais podem ser alteradas ou apagadas de qualquer lugar e prendem componentes ao sistema.
- Com um objeto, dá para filtrar a entrada, obter parâmetros de outras fontes (a linha de comando ou um teste) e usar o objeto de requisição como contexto. O livro evita usá-lo para passar valores entre ações e visões, pois isso dá ao objeto mais de uma responsabilidade.
- Num script simples, imprimir com `echo` esconde que há um código de resposta e cabeçalhos por trás.

O exemplo do livro usa uma fábrica estática que devolve `HttpRequest` ou `CliRequest`, e advertências: a mistura de atributos de POST e GET no mesmo vetor equivale ao `$_REQUEST`.

## Como se relaciona

O padrão PSR-7 define interfaces para requisição e resposta; Slim e o pacote Nyholm/psr7 as implementam. São parte do controlador frontal.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[front-controller-em-php]] — esta nota cita a ideia de «Controlador frontal» na seção sobre como se relaciona
- [[regra-nunca-confie-na-entrada-do-usuario]] — um objeto de requisição é o lugar natural para filtrar a entrada
- [[padrao-command]] — os comandos recebem uma requisição e devolvem uma resposta
