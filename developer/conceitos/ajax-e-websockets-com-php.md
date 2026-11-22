---
titulo: "Ajax e WebSockets com PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 28, seções 28.3 e 28.4 (PDF p. 1073-1087)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Ajax e WebSockets com PHP

## Definição

- **Ajax** (nome cunhado por Jesse James Garrett; "JavaScript e XML assíncronos" é um nome impreciso, porque o XML é desnecessário): o JavaScript envia requisições HTTP ao servidor sem recarregar a página, lê o resultado e o integra ao DOM. A base é o objeto `XMLHttpRequest`, criado pela Microsoft por volta de 1998 e adotado depois pelos outros navegadores. O livro usa a biblioteca Sajax como exemplo (exporta funções PHP e gera funções JavaScript com prefixo `x_`), mas ela está sem atualização há muito tempo.
- **WebSockets:** protocolo de comunicação bidirecional (full-duplex) e de alto desempenho: o HTTP só abre a conexão, e depois o servidor pode enviar dados quando quiser (RFC 6455). O servidor precisa de um pacote externo; o livro usa o **Ratchet**, instalado com Composer, cuja interface `MessageComponentInterface` define `onOpen`, `onClose`, `onMessage` e `onError`; o servidor é um script de linha de comando (`php echo.php`) que fica rodando em uma porta. No cliente, a classe `WebSocket` (`new WebSocket("ws://...")`, `send()` e os eventos `open` e `message`).

## Por que importa

Substituem o recarregamento da página por comunicação em tempo real.

## Como se relaciona

Ver PHP e JavaScript: ordem de execução, usar a API fetch (o jeito atual de fazer o que o livro faz com `XMLHttpRequest`) e gerenciar dependências com Composer.

## Notas do Claude

Confiança média: a parte de Sajax é histórica. O WebSocket com Ratchet exige um processo PHP permanente, o que em hospedagem compartilhada com deploy por FTP em geral não é possível; para o projeto, `fetch` e polling bastam (inferência minha, a conferir).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[php-e-javascript-ordem-de-execucao-e-troca-de-dados]] — «PHP e JavaScript: ordem de execução e troca de dados» cita esta nota ao explicar suas relações
- [[gerenciar-dependencias-com-composer]] — o Ratchet se instala com Composer
- [[usar-a-api-fetch]] — o fetch substitui o XMLHttpRequest
- [[assincronia-com-callbacks-e-eventos]] — os eventos do WebSocket seguem o modelo de callbacks
- [[websockets-no-navegador]] — «WebSockets no navegador» cita esta nota ao explicar suas relações
- [[server-sent-events-com-eventsource]] — «Server-Sent Events com EventSource» cita esta nota ao explicar suas relações
