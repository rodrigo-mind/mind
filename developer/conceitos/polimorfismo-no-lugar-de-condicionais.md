---
titulo: "Polimorfismo no lugar de condicionais"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 6, seção Polymorphism (PDF p. 246-247)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Polimorfismo no lugar de condicionais

## Definição

Polimorfismo (troca de classes) é manter várias implementações atrás de uma interface comum. O código cliente trata os filhos de uma superclasse de modo intercambiável, desde que só use o que o pai define. O PHP faz valer a interface das classes abstratas: o filho concreto deve ter exatamente as mesmas assinaturas de método, com tipos e controle de acesso.

## Por que importa

A necessidade de polimorfismo costuma aparecer como extensas condicionais no código. No exemplo do livro, os testes de formato repetidos em duas funções sugeriram as subclasses do texto e do XML; a condicional sobre o tipo de produto sugeriu as subclasses de disco e livro.

O polimorfismo não elimina as condicionais: um método de criação ainda usa `switch` ou `if` para escolher qual objeto devolver. A diferença é que centraliza a decisão em um lugar.

## Como se relaciona

Complementa responsabilidade, coesão e ortogonalidade e é a base de composição em vez de herança. O tema de encapsulamento (esconder dados e funcionalidade do cliente), que vem a seguir no capítulo, não foi lido.

## Notas do Claude

Confiança média: li a seção sobre polimorfismo, e a de encapsulamento e a de UML do capítulo 6 ficaram sem leitura.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[padroes-de-criacao-de-objetos]] — a escolha do objeto concreto ainda usa condicional, mas centralizada
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — «Interfaces, classes abstratas, traits e classes anônimas em PHP» cita esta nota ao explicar suas relações
- [[regra-componentes-devem-expor-capacidades-nao-tipos]] — «Componentes devem expor capacidades, não tipos» cita esta nota ao explicar suas relações
- [[padrao-null-object]] — «Padrão Null Object» cita esta nota ao explicar suas relações
- [[padrao-strategy]] — «Padrão Strategy» cita esta nota ao explicar suas relações
- [[principios-de-projeto-orientado-a-objetos-resumo]] — «Princípios de projeto orientado a objetos: resumo do livro» cita esta nota ao explicar suas relações
