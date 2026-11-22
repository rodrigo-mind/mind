---
titulo: "Princípios de projeto orientado a objetos: resumo do livro"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 14 (PDF p. 588-596)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Princípios de projeto orientado a objetos: resumo do livro

## Definição

O capítulo final recapitula as ideias do livro:

- **Objetos em PHP:** nos primeiros tempos, os objetos eram quase vetores associativos; o PHP 5 os pôs em primeiro plano, e o PHP 7 completou o quadro com tipos escalares e de retorno. A lista de recursos acrescentados desde o PHP 5 (reflexão, exceções, classes abstratas, interfaces, iteradores, métodos interceptadores, declarações de tipo, ligação estática tardia, namespaces, classes anônimas) mostra que o futuro da linguagem está ligado à orientação a objetos; ainda assim, alguns frameworks populares (como o WordPress) continuam essencialmente procedurais.
- **Escolha:** não há lei que obrigue a usar só objetos; um código orientado a objetos bem projetado oferece uma interface limpa que qualquer cliente, procedural ou não, usa.
- **Encapsulamento e delegação:** os objetos cuidam das suas tarefas e expõem uma interface; o controlador de um projeto orientado a objetos costuma ser enxuto (algumas instanciações e chamadas), enquanto o procedural desce à implementação.
- **Desacoplamento:** remover a interdependência para que mudar um componente não obrigue a mudar outros. Objetos guardam o próprio estado, o que reduz **variáveis globais** (causa clássica de acoplamento). A **duplicação de código** também acopla (é preciso lembrar de alterar tudo), e a causa comum é o **condicional paralelo** (os mesmos `if/else` por sistema operacional em vários lugares): troque-o por **polimorfismo**. O condicional não some, mas se minimiza e se centraliza, em um só lugar que escolhe qual subtipo entregar.
- **Princípios dos padrões:** prefira composição à herança (herança pura gera estruturas rígidas e duplicação); evite o acoplamento forte (duplicação, globais e *singletons*, subclasses concretas onde bastaria um tipo abstrato); **programe para uma interface, não para uma implementação** (mas pelo YAGNI, se só há uma implementação, uma interface clara em uma classe concreta basta; quando ela passar a fazer mais de uma coisa, ou aparecerem condicionais, vire pai abstrato de duas subclasses); **encapsule o conceito que varia** (em vez de `FtpUpdatableThing`, `HttpUpdatableThing` e `FileSystemUpdatableThing`, extraia um tipo `UpdateMechanism`, que é uma Estratégia).

## Por que importa

Resume o critério com que escolher e aplicar os padrões do restante do livro.

## Como se relaciona

Veja composição em vez de herança, acoplamento e desacoplamento, polimorfismo no lugar de condicionais, padrões de projeto e padrão Strategy.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[polimorfismo-no-lugar-de-condicionais]] — esta nota cita a ideia de «Polimorfismo no lugar de condicionais» na seção sobre como se relaciona
- [[padroes-de-projeto]] — esta nota cita a ideia de «Padrões de projeto» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[principios-solid]] — comparar com os princípios SOLID
- [[padrao-strategy]] — o exemplo de encapsular o que varia é uma Estratégia
- [[fundamentos-de-classes-e-objetos-em-php]] — a evolução dos objetos em PHP
- [[regra-container-de-di-so-nas-bordas]] — menos acoplamento reduz o uso do contêiner nas classes
- [[regra-prefira-delegacao-a-heranca-em-javascript]] — princípio de favorecer composição
