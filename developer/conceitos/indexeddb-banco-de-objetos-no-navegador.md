---
titulo: "IndexedDB: banco de objetos no navegador"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.12.3 (PDF p. 427-594, capítulo 15)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# IndexedDB: banco de objetos no navegador

## Definição

Um banco de **objetos** (não relacional) para guardar objetos JavaScript de modo persistente no computador do usuário; é mais poderoso, eficiente e robusto que o par chave/valor do `localStorage`, mas bem mais simples que um banco SQL. Como no `localStorage`, o escopo é a **origem**; cada origem pode ter vários bancos, com nomes únicos.

- **Estrutura:** um banco é um conjunto de **repositórios de objetos** (object stores). Os objetos entram **serializados pelo clone estruturado** (aceitam `Map`, `Set`, vetores tipados). Cada objeto tem uma **chave única e ordenável** (texto, número ou `Date`), gerada automaticamente ou tirada de uma propriedade (o `keyPath`).
- **Índices:** chaves secundárias, não necessariamente únicas, para buscar por outras propriedades (daí o nome). A consulta usa `get()`, `getAll()` ou `openCursor()` no repositório ou no índice, com uma chave ou uma faixa (`IDBRange`).
- **Transações:** consultas e alterações vão em uma transação, atômica: tudo ou nada. Ela é confirmada sozinha quando acabam os tratadores de `success` e não há mais requisições pendentes (não há `commit()`).
- **Fluxo:** abrir o banco por nome e versão (`indexedDB.open(nome, versão)`), criar a transação, obter o repositório e chamar `get()`, `put()` (grava e sobrescreve) ou `add()` (não sobrescreve).
- **Assíncrono, por eventos:** abrir, alterar e consultar devolvem um objeto de requisição, com eventos `success` e `error` (`onsuccess`, `onerror`; o resultado está em `request.result`); a API é anterior às Promises e **não funciona com `async` e `await`**. Criar transação e obter repositórios é síncrono.
- **`upgradeneeded`:** disparado ao abrir pela primeira vez ou ao aumentar a versão; é o **único momento** em que se podem criar repositórios e índices (o esquema).

## Por que importa

É a opção do navegador para volumes grandes de dados, com busca e consistência (por exemplo, 40 mil registros de CEPs no exemplo do livro).

## Como se relaciona

Veja armazenamento no navegador, usar a API fetch (para carregar os dados) e promises em JavaScript (por que a API de eventos é desajeitada).

## Notas do Claude

Confiança média: li a visão geral e a descrição do funcionamento, mas não o exemplo de código completo (a base de CEPs).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[armazenamento-no-navegador]] — esta nota cita a ideia de «Armazenamento no navegador» na seção sobre como se relaciona
- [[promises-em-javascript]] — esta nota cita a ideia de «Promises em JavaScript» na seção sobre como se relaciona
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — ambos usam o clone estruturado
- [[transacoes-e-acid]] — as transações do IndexedDB são atômicas
- [[workers-threads-no-navegador]] — o IndexedDB está disponível dentro de workers
- [[aplicacoes-offline-appcache-e-service-workers]] — o IndexedDB é a opção de dados estruturados para aplicações offline
