---
titulo: "Padrão Strategy (estratégia) com o exemplo do questionário"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 11, seção The Strategy Pattern (PDF p. 400-406)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Strategy

## Definição

Quando uma classe precisa suportar **várias implementações de uma mesma tarefa**, extraia essas implementações para um tipo próprio, em vez de criar subclasses. Exemplo: uma `Question` precisa de diferentes formas de correção (comparação exata, expressão regular, a linguagem MarkLogic) e também de tipos de pergunta (texto, áudio e vídeo). Subclassificar por "forma de corrigir" e por "tipo de pergunta" multiplica as classes e repete a lógica de correção em cada ramo. Com o Strategy, a pergunta guarda um objeto `Marker` (com o método `mark($resposta)`) e **delega** a ele: `RegexpMarker`, `MatchMarker`, `MarkLogicMarker`; trocar um por outro não afeta a classe `Question`. É o princípio "prefira composição à herança".

- **Quando perceber:** o mesmo algoritmo repetido entre irmãos de uma árvore de herança, ou condicionais repetidas, é o sinal para extraí-lo para um tipo.
- **Como escolher a estratégia:** o livro viu duas formas na prática: o produtor escolhe por botões de opção, ou a própria condição indica (um texto simples é correspondência exata; começar com dois-pontos é MarkLogic; entre barras é expressão regular).
- **Passar dados:** o cliente pode passar à estratégia só o dado necessário (`$resposta`) ou uma referência a si mesmo, para a estratégia buscar o que precisar.
- **Cuidado:** instanciar o analisador dentro da estratégia amarra uma implementação e dificulta o teste; é melhor injetar a dependência.

## Por que importa

Evita explosão de subclasses e permite acrescentar algoritmos sem tocar nas classes existentes.

## Como se relaciona

Veja composição em vez de herança (onde o Strategy aparece com o custo da aula), polimorfismo no lugar de condicionais e padrão Interpreter.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[polimorfismo-no-lugar-de-condicionais]] — esta nota cita a ideia de «Polimorfismo no lugar de condicionais» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[padrao-interpreter-e-mini-linguagens]] — o exemplo do questionário usa as duas ideias
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — a dependência do analisador deve ser injetada
- [[principios-de-projeto-orientado-a-objetos-resumo]] — o exemplo de encapsular o que varia é uma Estratégia
