---
titulo: "Componentes devem expor capacidades, não tipos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 10, seção Composite, Consequences (PDF p. 366-369)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Componentes devem expor capacidades, não tipos

## Regra

Para saber o que um objeto de um grupo polimórfico pode fazer, pergunte a ele (um método como `canBoardVehicle()` ou `getComposite()`), em vez de testar a classe com `instanceof`.

## Por quê

O autor chama o `instanceof` de má prática: amarra o chamador a classes concretas e quebra quando se acrescenta um novo tipo. Um método de capacidade é uma melhoria, mas não perfeita: se houver muitos casos especiais desse tipo, as desvantagens do padrão Composite passam a superar as vantagens, e o Composite funciona melhor quando os componentes são intercambiáveis.

## Quando não vale

Não há exceção no texto; mesmo o método de capacidade tem limites.

## Como verificar

Procure `instanceof` em código que decide o fluxo conforme a classe de objetos de um mesmo grupo e substitua por um método do próprio tipo.

## Como se relaciona

Veja padrão Composite e polimorfismo no lugar de condicionais.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[polimorfismo-no-lugar-de-condicionais]] — esta nota cita a ideia de «Polimorfismo no lugar de condicionais» na seção sobre como se relaciona
- [[padrao-composite]] — esta nota cita a ideia de «Padrão Composite» na seção sobre como se relaciona
- [[regra-use-tipos-de-retorno-precisos-em-vez-de-interfaces-vagas]] — diverge: aqui o tipo preciso é preferido ao vago, ali a capacidade vale mais que o tipo; as duas valem em contextos diferentes
- [[tipos-de-intersecao-em-php]] — pedir capacidades combinadas em vez de um tipo concreto
