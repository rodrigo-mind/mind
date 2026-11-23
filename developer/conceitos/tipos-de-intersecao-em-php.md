---
titulo: "Tipos de interseção em PHP 8.1"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 12, seção Intersection types (EPUB, sem páginas)"
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 3 (PDF p. 64-66)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tipos de interseção em PHP 8.1

## Definição

Tipo de parâmetro, propriedade ou retorno em que o valor deve ser **todos** os tipos listados, unidos por `&` (o oposto do tipo união, em que basta um dos listados, unidos por `|`). Os dois símbolos seguem o sentido lógico de E e OU: a união afrouxa a tipagem; a interseção a aperta.

Caso de uso: um método precisa de um objeto que implemente duas interfaces separadas (`HelloInterface` e `WorldInterface`, no exemplo do livro). Antes do PHP 8.1 era preciso criar uma interface composta que apenas estendesse as duas e fazer cada classe implementá-la, o que o autor chama de inchaço e ofuscação. No 8.1, a função declara `HelloInterface&WorldInterface $x` e a classe só implementa as interfaces reais.

## Por que importa

Combina bem com interfaces pequenas e focadas (segregação de interfaces): pede-se só a combinação exigida, sem interfaces compostas, e o código fica mais flexível e fácil de testar.

## Como se relaciona

Veja princípios SOLID, interfaces, classes abstratas e traits em PHP, tipos de objeto e herança de tipos, e a regra de expor capacidades em vez de tipos.

## Notas do Claude

Pelo trecho lido, a interseção cobre tipos de classe e de interface; o livro não detalha limites (por exemplo, não misturar com tipos escalares). Confira o manual do PHP.

- Também em Zandstra (cap. 3), que acrescenta os tipos DNF do PHP 8.2 (ver declarações de tipo em PHP).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[principios-solid]] — interfaces pequenas combinadas atendem à segregação de interfaces
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — a interseção combina interfaces
- [[regra-componentes-devem-expor-capacidades-nao-tipos]] — pedir capacidades combinadas em vez de um tipo concreto
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — regras de tipos de objeto e covariância
- [[declaracoes-de-tipo-em-php-uniao-anulavel-mixed-e-dnf]] — os tipos de interseção entram nas combinações DNF
