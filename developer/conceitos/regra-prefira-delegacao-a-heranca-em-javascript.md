---
titulo: "Regra: prefira delegação à herança em JavaScript"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seção 9.5.3 (PDF p. 239-266, capítulo 9)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Prefira delegação à herança em JavaScript

## Regra

Para reaproveitar o comportamento de outra classe, em vez de criar uma subclasse, crie uma classe que guarda uma instância da outra e delega a ela.

## Por quê

O livro cita a máxima "favoreça a composição sobre a herança". No exemplo, uma classe `Histogram`, com API parecida com `Set`, conta quantas vezes cada valor foi adicionado. Ela se parece mais com `Map`; então implementa métodos como `add`, `has`, `count` e `delete` chamando um `Map` interno, em geral em uma linha. O custo: um `Histogram` não é `instanceof Set` nem `Map`, mas em uma linguagem sem tipos estáticos ter os mesmos métodos costuma bastar.

## Quando não vale

Quando uma biblioteca ou framework exige estender as classes-base, ou quando a hierarquia é de fato um "é um" com vários níveis (como o exemplo dos conjuntos).

## Como verificar

Se a subclasse sobrescreve a maioria dos métodos do pai ou só usa uma parte da API dele, prefira delegar.

## Notas do Claude

Concorda com a nota de composição em vez de herança (do livro de PHP).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[subclasses-com-extends-e-super-em-javascript]] — quando evitar subclasses
- [[composicao-em-vez-de-heranca]] — a mesma recomendação vinda do outro livro
- [[principios-de-projeto-orientado-a-objetos-resumo]] — princípio de favorecer composição
- [[sets-e-maps-em-javascript]] — o exemplo do Histogram delega a um Map
