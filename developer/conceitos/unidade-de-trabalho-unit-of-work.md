---
titulo: "Unidade de trabalho (Unit of Work)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 13, seção Unit of Work (PDF p. 551-556)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Unidade de trabalho (Unit of Work)

## Definição

Padrão (descrito por David Rice no livro de Fowler) que acompanha o que aconteceu com os objetos para salvar só os que precisam ser salvos. O autor descobriu o problema ao imprimir os comandos SQL e ver que gravava os mesmos dados várias vezes numa só requisição, porque comandos compostos faziam cada um a sua limpeza e salvavam também objetos que não tinham mudado. É a contrapartida do mapa de identidades: aquele evita carregar demais, este evita salvar demais.

## Como funciona

- Mantém listas de objetos agendados para cada operação: novos (inserção), sujos (dirty, alterados desde que vieram do banco, atualização) e, em outras implementações, excluídos.
- Os métodos `addNew()`, `addDirty()` e `addClean()` registram e retiram objetos das listas (o cliente pode decidir que um objeto sujo não será atualizado).
- No fim do processo (por exemplo, quando o controlador termina), `performOperations()` executa as inserções e atualizações pendentes.
- Convenção do livro: um objeto novo, que ainda não existe no banco, nasce com identificador -1, e o mapeador o atualiza com o valor gerado pelo banco.

## Por que importa

Tira das camadas de comando e de visão a responsabilidade de mandar salvar e evita gravações duplicadas e desnecessárias.

## Como se relaciona

No exemplo do livro, a mesma classe (`ObjectWatcher`) faz de mapa de identidades e de unidade de trabalho (ver mapa de identidades). Sobrepõe-se ao mapeador de dados.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[mapeador-de-dados-data-mapper]] — «Mapeador de dados» cita esta nota ao explicar suas relações
- [[padroes-de-banco-de-dados-visao-geral]] — «Padrões de banco de dados em PHP» cita esta nota ao explicar suas relações
- [[mapa-de-identidades-identity-map]] — «Mapa de identidades» cita esta nota ao explicar suas relações
