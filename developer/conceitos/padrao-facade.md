---
titulo: "Padrão Facade (fachada)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 10, seção The Facade Pattern (PDF p. 379-384)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Facade

## Definição

Um ponto de entrada único e simples para um subsistema ou camada complexa. O exemplo do livro envolve um conjunto de funções procedurais que leem um arquivo de log e o transformam em objetos `Product` (várias chamadas, em ordem); uma classe fachada expõe um método como `getProducts($arquivo)` e esconde a sequência.

- **Benefícios:** desacopla áreas distintas do projeto; dá ao programador-cliente métodos simples; reduz erros ao concentrar o uso do subsistema em um só lugar (mudanças no subsistema falham em um local previsível, e ficam menos expostas funções internas usadas errado).
- **Equilíbrio:** o padrão é simples, mas fácil de esquecer por quem conhece bem o subsistema; também há quem abstraia tudo "com abandono" e abstraia as abstrações. Vale quando a simplificação beneficia claramente o cliente ou protege contra um sistema que muda. No PHP, serve também para empacotar código procedural em objetos.
- **Camadas:** as camadas (lógica, banco, apresentação) devem ser o mais independentes possível; a fachada é o portão de cada uma.

## Por que importa

Reduz o acoplamento com bibliotecas de terceiros e legadas, que o projeto pode precisar trocar.

## Como se relaciona

Ver acoplamento e desacoplamento, arquitetura em camadas e padrão Command (a lógica que "vaza" para os comandos pode ir para uma fachada).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-command]] — esta nota cita a ideia de «Padrão Command» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[padrao-decorator]] — «Padrão Decorator» cita esta nota ao explicar suas relações
- [[arquitetura-em-camadas]] — é o ponto de entrada de uma camada
- [[padrao-strangler]] — «Padrão Strangler» cita esta nota ao explicar suas relações
- [[padrao-builder]] — «Padrão Builder» cita esta nota ao explicar suas relações
- [[regra-evite-o-singleton-classico]] — as facades do Laravel não são o padrão Facade
