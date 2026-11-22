---
titulo: "Script de transação (Transaction Script) e modelo de domínio (Domain Model)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seções Transaction Script e Domain Model (PDF p. 507-519)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Script de transação e modelo de domínio

## Definição

Os dois polos da camada de lógica de negócio.

- **Script de transação:** trata cada requisição em linha, por operações procedurais, em geral numa classe que agrupa métodos e acessa o banco direto. É o jeito como muitos sistemas evoluem sozinhos: simples, intuitivo e eficaz. Dá resultado rápido, com pouco projeto prévio, e serve a projetos pequenos e urgentes. Não escala bem. Fica mais preso à camada de dados.
- **Modelo de domínio:** uma representação abstrata dos participantes e processos reais do sistema, em objetos que são "coisas que fazem coisas". Em vez de um script que grava dados de espaço e de evento, há classes `Space` e `Event`, e reservar um evento vira `Space::bookEvent()` e checar conflito vira `Event::intersects()`.

## Por que importa

Com script de transação, a duplicação cresce à medida que scripts diferentes repetem tarefas, e é fácil cair em copiar e colar. O modelo de domínio lida melhor com lógica complexa e precisa de menos condicionais, mas custa projeto e planejamento. Para um exemplo simples, o script basta.

O modelo de domínio deve ser separado da apresentação (basta que as classes "fiquem na delas") e, com mais dificuldade, do banco: é comum que as classes espelhem as tabelas, mas elas não precisam conhecê-las. O risco é modelar o banco em vez do problema. Separar o modelo do banco facilita testes e protege de mudanças de esquema. O livro usa uma superclasse de camada (Layer Supertype, `DomainObject`) e coleções tipadas (como `SpaceCollection`, pois o PHP ainda não tem genéricos).

## Como se relaciona

A persistência do modelo de domínio é tratada pelos padrões de banco de dados, a começar pelo Data Mapper (ver mapeador de dados).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[mapeador-de-dados-data-mapper]] — «Mapeador de dados» cita esta nota ao explicar suas relações
- [[arquitetura-em-camadas]] — «Arquitetura em camadas de aplicações corporativas» cita esta nota ao explicar suas relações
