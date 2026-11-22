---
titulo: "Mapeador de dados (Data Mapper)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 13, seção Data Mapper (PDF p. 520-535)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapeador de dados (Data Mapper)

## Definição

Uma classe responsável pela passagem do banco de dados para objetos e de volta. Em outras fontes aparece como Data Access Object; o autor diz que não é idêntico (o DAO gera objetos de transferência de dados), mas é próximo. O problema é a "incompatibilidade de impedância objeto-relacional": tabelas são grades de linhas e colunas ligadas por chaves estrangeiras, e objetos se relacionam de forma orgânica, combinando-se de modos novos em tempo de execução. O modelo de domínio (por exemplo, `Venue`) deve cuidar da lógica de negócio e ignorar o trabalho de persistência.

## Como funciona (exemplo do livro)

- Em geral há um mapeador para cada classe importante do domínio, com uma superclasse abstrata (`Mapper`) que guarda o que é comum e delega aos filhos o que é específico, usando o padrão Template Method: `insert()` chama `doInsert()` e assim por diante, o que permite acrescentar rotinas antes e depois.
- O construtor exige um objeto `PDO` (que um contêiner de DI pode fornecer); os comandos SQL preparados ficam nos filhos, e o `find()` roda o comando, obtém a linha e chama `createObject()`, que delega ao filho (`doCreateObject()`) a conversão da linha em objeto.
- O mapeador de `Venue` prepara comandos como `SELECT * FROM venue WHERE id=?`, `UPDATE` e `INSERT` com parâmetros.
- Os filhos podem declarar tipos de retorno mais específicos que o pai (`Venue`, no lugar de `DomainObject`); as ferramentas de análise estática podem reclamar.
- Um comando preparado compartilhado em uma propriedade deve ser usado atomicamente: outro método pode usá-lo antes de você executar (cuidado com o carregamento tardio).
- Para uma coleção, `findAll()` chama `getCollection()` com os dados; consultas de relações um-para-muitos (os espaços de um local) pedem novos métodos no mapeador e nas classes de domínio.

## Por que importa

Esconde o banco do modelo de domínio e concentra as asperezas da tradução. O autor prefere o Data Mapper com Identity Object, e admite poder fugir para o código manual (otimizar SQL, usar junções) sem estragar a interface.

## Como se relaciona

Persiste o modelo de domínio (ver script de transação e modelo de domínio). Os padrões de apoio são o mapa de identidades (identity map), a unidade de trabalho (unit of work) e o objeto de identidade (identity object). O acesso ao banco usa PDO (ver acesso ao banco com PDO).

## Notas do Claude

Confiança média: li a abertura, a estrutura básica e o mapeador de `Venue`; as seções de carregamento tardio, da fábrica de objetos de domínio e do montador não foram lidas por inteiro.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[objeto-de-identidade-identity-object]] — esta nota cita a ideia de «Objeto de identidade» na seção sobre como se relaciona
- [[mapa-de-identidades-identity-map]] — esta nota cita a ideia de «Mapa de identidades» na seção sobre como se relaciona
- [[script-de-transacao-e-modelo-de-dominio]] — esta nota cita a ideia de «Script de transação» na seção sobre como se relaciona
- [[unidade-de-trabalho-unit-of-work]] — esta nota cita a ideia de «Unidade de trabalho» na seção sobre como se relaciona
- [[acesso-ao-banco-com-pdo]] — esta nota cita a ideia de «Acesso ao banco com PDO» na seção sobre como se relaciona
- [[padroes-de-banco-de-dados-visao-geral]] — «Padrões de banco de dados em PHP» cita esta nota ao explicar suas relações
- [[acoplamento-e-desacoplamento]] — o mapeador isola o modelo do banco, aplicando o desacoplamento
- [[padrao-composite]] — o composto é difícil de gravar em banco relacional
