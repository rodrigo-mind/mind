---
titulo: "Padrão Visitor (visitante)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 11, seção The Visitor Pattern (PDF p. 418-428)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Visitor

## Definição

Aplica uma operação a **todos os nós de uma estrutura** (em geral, um Composite) sem pôr a operação nas classes dos nós. Se cada operação periférica (imprimir um resumo, contar unidades, gravar no banco, calcular a comida consumida) fosse um método do composto, a interface incharia com responsabilidades que não lhe pertencem; mas se quer aproveitar a facilidade de percorrer a árvore.

- **Mecanismo:** a classe base tem `accept(ArmyVisitor $visitante)`, que monta o nome do método a partir da classe (`visit` + nome da classe, como `visitArmy` ou `visitArcher`) e o invoca no visitante, passando-se a si mesma; o composto, depois, chama `accept()` nos filhos. O visitante define um método `visit...` por classe (e um genérico `visit()` por padrão). No exemplo, `TextDumpArmyVisitor` imprime o resumo, e `TaxCollectionVisitor` cobra um imposto diferente por tipo de unidade e guarda o total.
- **Em outras linguagens:** a versão original usa sobrecarga (um `visit()` para cada subtipo); como o PHP não tem, usa-se o nome do método construído dinamicamente.
- **Cuidados:** funciona com qualquer coleção, mas externalizar operações pode **comprometer o encapsulamento** (foi preciso criar `getDepth()` para o visitante); a travessia fica separada das operações, então é difícil fazer algo antes e depois dos filhos (a solução, mover a travessia para o visitante, pode duplicar código); por padrão o autor mantém a travessia nas classes visitadas.

## Por que importa

Permite acrescentar operações sem mexer nas classes do composto.

## Como se relaciona

Veja padrão Composite e padrão Observer (que tem o mesmo dilema de expor estado).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-composite]] — «Padrão Composite» cita esta nota ao explicar suas relações
- [[padrao-observer]] — esta nota cita a ideia de «Padrão Observer» na seção sobre como se relaciona
- [[padroes-de-projeto]] — é um dos padrões do catálogo dos Quatro
