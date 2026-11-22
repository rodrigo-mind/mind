---
titulo: "Mapa de identidades (Identity Map)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 13, seção Identity Map (PDF p. 546-551)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de identidades (Identity Map)

## Definição

Um objeto cuja tarefa é acompanhar todos os objetos carregados no sistema, para que o que deveria ser um objeto não vire dois. No exemplo do livro, a mesma linha de `venue` foi carregada três vezes, alterada e salva em instâncias diferentes, com valores desencontrados.

## Por que importa

Objetos duplicados são arriscados (mudanças em uma versão podem ser sobrescritas por outra) e custam caro (idas desnecessárias ao banco para um objeto já carregado).

## Como funciona

- Cada objeto recebe uma chave única. O livro usa o nome da classe mais o identificador da tabela (`popp\ch13\batch03\Event.4`); outras opções: uma tabela global de chaves ou identificadores UUID.
- O mapa guarda os objetos em um vetor, e antes de criar um objeto, o mapeador consulta se já existe (`exists()`); se existir, devolve o mesmo.
- O exemplo do livro implementa o mapa como Singleton (`ObjectWatcher`), mas diz que poderia ser passado como instância, desde que não se criem várias.

## Como se relaciona

Atua junto do mapeador de dados e é complementar à unidade de trabalho (que cuida do outro lado: não salvar nada em duplicidade ou sem necessidade). Os dois vivem na mesma classe do exemplo.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[mapeador-de-dados-data-mapper]] — «Mapeador de dados» cita esta nota ao explicar suas relações
- [[padroes-de-banco-de-dados-visao-geral]] — «Padrões de banco de dados em PHP» cita esta nota ao explicar suas relações
- [[unidade-de-trabalho-unit-of-work]] — esta nota cita a ideia de «Unidade de trabalho» na seção sobre como se relaciona
