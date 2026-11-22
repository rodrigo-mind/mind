---
titulo: "Padrão Command (comando)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 11, seção The Command Pattern (PDF p. 429-436)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Command

## Definição

Encapsula cada tarefa do sistema em um **objeto com um único método, `execute()`**, separando o controlador (recebe e despacha a requisição) da lógica de aplicação. O autor diz ter usado o padrão em quase todo projeto web dos últimos anos. Sem ele, cada página (`login.php`, `feedback.php`) cuida de uma tarefa, mas a interface raramente coincide com as tarefas (login e feedback podem ser necessários em qualquer página).

- **Participantes:** o **comando** (`LoginCommand`, `FeedbackCommand`, de uma classe-base `Command`); o **cliente**, que cria o comando (aqui, uma `CommandFactory`, que mapeia a ação, por exemplo com `match`, a uma classe); o **invocador** (um `Controller` simples, que lê a ação, pede o comando à fábrica e chama `execute()`); e o **receptor**, sobre o qual o comando age (por exemplo, um gerenciador de acesso). O receptor pode vir pelo construtor ou por uma fábrica; com contêiner de injeção de dependências, os comandos ficam menos presos ao sistema e mais fáceis de testar.
- **Contexto:** `execute()` recebe um `CommandContext` (um invólucro de vetor associativo) com os dados da requisição e pelo qual se devolvem mensagens de erro à camada de visão; em aplicações reais, costuma-se passar um objeto `Request` e devolver um `Response`.
- **Cuidado:** os comandos devem verificar a entrada, tratar erros e chamar outros objetos, **sem lógica de negócio**; se a lógica cresce neles, mova-a para os objetos de negócio ou para uma fachada (senão ela é copiada entre comandos). Novos comandos entram sem alterar o controlador nem a fábrica.
- É uma versão simplificada do padrão Front Controller.

## Por que importa

Dá a aplicações web em PHP uma estrutura em camadas e fácil de estender.

## Como se relaciona

Veja front controller em PHP, controlador de página, request e response como objetos e padrão Facade.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-facade]] — «Padrão Facade» cita esta nota ao explicar suas relações
- [[controlador-de-pagina-page-controller]] — esta nota cita a ideia de «Controlador de página» na seção sobre como se relaciona
- [[padrao-observer]] — «Padrão Observer» cita esta nota ao explicar suas relações
- [[front-controller-em-php]] — é a versão simplificada do controlador frontal
- [[request-e-response-como-objetos]] — os comandos recebem uma requisição e devolvem uma resposta
- [[padrao-mvc-modelo-visao-controlador]] — o comando faz o papel de ação do controlador
- [[padrao-chain-of-responsibility]] — «Padrão Chain of Responsibility» cita esta nota ao explicar suas relações
