---
titulo: "Imutabilidade: DateTime e DateTimeImmutable"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Favor immutability (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Imutabilidade: DateTime e DateTimeImmutable

## Definição

Um objeto é mutável se seus valores podem mudar depois de criado. Para reduzir surpresas, prefira manter a mutabilidade no mínimo: propriedades privadas, valores recebidos só no construtor e só métodos de leitura, sem `set`. O objeto imutável ou impede a mudança ou devolve uma **nova instância** com o novo valor.

O exemplo clássico do livro: `DateTime::add()` altera o próprio objeto (e, como objetos são passados por referência, `$start` e `$end` passam a ser o mesmo), de modo que a diferença entre os dois dá zero. Com `DateTimeImmutable`, `$start->add(...)` devolve outro objeto e o original fica intacto.

## Por que importa

Evita bugs de efeito colateral por referência compartilhada.

## Como se relaciona

Veja propriedades readonly em PHP, tipos de objeto, herança de tipos, comparação e referências, e criar instâncias por clone.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[propriedades-readonly-em-php]] — esta nota cita a ideia de «Propriedades readonly em PHP 8.1» na seção sobre como se relaciona
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — esta nota cita a ideia de «Tipos de objeto, herança de tipos, comparação e referências» na seção sobre como se relaciona
- [[regra-encapsule-propriedades-como-privadas]] — propriedades privadas e só leitura sustentam a imutabilidade
- [[padrao-fluent-interface-fluente]] — a variante imutável devolve cópias
- [[datas-e-horas-com-date-em-javascript]] — o Date do JavaScript é mutável, como o DateTime do PHP
