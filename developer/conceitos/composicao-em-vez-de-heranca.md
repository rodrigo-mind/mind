---
titulo: "Composição em vez de herança (favor composition over inheritance)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 8, seção Composition and Inheritance (PDF p. 270-278)"
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 2, seção sobre composição (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Composição em vez de herança

## Definição

Princípio da Gangue dos Quatro: prefira combinar objetos em tempo de execução a construir hierarquias de herança. A herança limita a flexibilidade quando as classes assumem várias responsabilidades.

O exemplo do livro: uma classe `Lesson` (aula) com duas especializações (palestra e seminário) e duas formas de cobrar (valor por hora e preço fixo). Combinar as duas variações por herança leva a uma hierarquia duplicada. Tirar a lógica de preço das subclasses e pô-la na superclasse com condicionais (`switch`) duplica as condicionais em vários métodos, o contrário do que se recomenda (trocar condicional por polimorfismo).

A saída é o padrão Estratégia (Strategy): mover os algoritmos de preço para um tipo à parte (`CostStrategy`, abstrato, com `cost()` e `chargeType()`), e fazer `Lesson` receber um objeto desse tipo e **delegar** a ele o cálculo. Delegar é invocar explicitamente um método de outro objeto para cumprir uma requisição.

## Por que importa

- Dá para mudar o cálculo de custo de uma aula passando outro objeto em tempo de execução, sem tocar nas classes de aula; novos algoritmos entram criando subclasses de `CostStrategy`.
- As responsabilidades ficam focadas: um objeto calcula o custo, outro guarda os dados da aula.
- Custo: mais tipos e relações menos fixas do que na herança, o que pode piorar a legibilidade.

## Como se relaciona

Segue o princípio de projeto de "programar para a interface, não para a implementação". A pergunta que fica, "de onde vêm esses objetos?", é respondida pelos padrões de criação (ver padrões de criação de objetos). O desacoplamento é o outro princípio do capítulo.


## Notas do Claude

- Edmonds e Mitchell (cap. 2) confirmam: hierarquias longas, feitas para não repetir código (DRY), ficam difíceis de entender e frágeis, porque uma mudança no alto da cadeia tem efeitos inesperados (o exemplo deles é o Magento). Na composição, a interface vira a peça central, e as classes concretas tendem a ser `final`. Também recomendam manter poucos níveis de herança.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-criacao-de-objetos]] — «Padrões de criação de objetos» cita esta nota ao explicar suas relações
- [[padroes-de-projeto]] — «Padrões de projeto» cita esta nota ao explicar suas relações
- [[acoplamento-e-desacoplamento]] — «Acoplamento e desacoplamento» cita esta nota ao explicar suas relações
- [[polimorfismo-no-lugar-de-condicionais]] — «Polimorfismo no lugar de condicionais» cita esta nota ao explicar suas relações
- [[responsabilidade-coesao-e-ortogonalidade]] — «Responsabilidade, coesão e ortogonalidade no projeto orientado a objetos» cita esta nota ao explicar suas relações
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — «Interfaces, classes abstratas, traits e classes anônimas em PHP» cita esta nota ao explicar suas relações
- [[fundamentos-de-classes-e-objetos-em-php]] — «Fundamentos de classes e objetos em PHP» cita esta nota ao explicar suas relações
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — «Tipos de objeto, herança de tipos, comparação e referências» cita esta nota ao explicar suas relações
- [[padrao-decorator]] — «Padrão Decorator» cita esta nota ao explicar suas relações
- [[padrao-composite]] — «Padrão Composite» cita esta nota ao explicar suas relações
- [[padrao-strategy]] — «Padrão Strategy» cita esta nota ao explicar suas relações
- [[principios-de-projeto-orientado-a-objetos-resumo]] — «Princípios de projeto orientado a objetos: resumo do livro» cita esta nota ao explicar suas relações
- [[subclasses-com-extends-e-super-em-javascript]] — «Subclasses com extends e super em JavaScript» cita esta nota ao explicar suas relações
- [[regra-prefira-delegacao-a-heranca-em-javascript]] — a mesma recomendação vinda do outro livro
