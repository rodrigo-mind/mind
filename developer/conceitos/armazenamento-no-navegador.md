---
titulo: "Armazenamento no navegador (localStorage, sessionStorage, cookies e IndexedDB)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.12 (PDF p. 554-566)"
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 39 (PDF p. 966-975)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Armazenamento no navegador

## Definição

Aplicações web podem guardar dados no computador do usuário, dando uma "memória" ao navegador: preferências e até o estado completo, para retomar de onde parou. O armazenamento é separado por origem (protocolo, host e porta): páginas de sites diferentes não leem os dados umas das outras, mas duas páginas do mesmo site podem compartilhá-lo.

| Forma | Características |
|---|---|
| Web Storage (`localStorage` e `sessionStorage`) | Objetos que mapeiam chaves de texto a valores de texto; fáceis de usar; para quantidades grandes (mas não enormes) de dados |
| Cookies | Mecanismo antigo, pensado para scripts de servidor; API desajeitada; só para pouco texto; os dados vão ao servidor em toda requisição HTTP, mesmo que só o cliente os queira |
| IndexedDB | API assíncrona para um banco de objetos com índices |

## localStorage e sessionStorage

- Os valores são sempre strings: para outros tipos, codifique e decodifique (`JSON.stringify` e `JSON.parse`). Pode-se usar propriedades (`localStorage.username = nome`) ou os métodos `getItem()`, `setItem()` e a remoção; `delete`, `Object.keys()` e `clear()` também funcionam.
- **`localStorage`** é permanente: não expira, até o aplicativo ou o usuário apagar; é limitado à origem do documento (todos os documentos da mesma origem o compartilham, podem ler e sobrescrever os dados uns dos outros) e ao navegador (o que se guarda no Firefox não aparece no Chrome).
- **`sessionStorage`** vive tanto quanto a janela ou aba de topo; é limitado à origem e também por janela: duas abas da mesma origem têm dados separados. O livro lembra que navegadores modernos reabrem abas fechadas, o que pode prolongar a vida desses dados.
- **Evento `storage`:** quando o `localStorage` muda, o navegador dispara o evento nas outras janelas da mesma origem (não na que fez a mudança), com `key`, `newValue`, `oldValue`, `storageArea` e `url`. Serve como forma de difundir uma mensagem entre as abas abertas do mesmo site.

## Cookies

Pequenos dados nomeados guardados pelo navegador e associados a uma página ou site, transmitidos automaticamente entre navegador e servidor. No cliente, lê-se e grava-se pela propriedade `document.cookie` com strings formatadas, e a vida e o escopo de cada cookie se definem por atributos. O livro diz que não usam criptografia e não são seguros em si (usar HTTPS ajuda).

## Segurança e privacidade

Nenhuma forma de armazenamento do cliente é criptografada: assuma que o que se guarda fica no dispositivo em texto aberto, acessível a quem divide o aparelho e a programas maliciosos. Por isso, **nunca guarde senhas, números de contas financeiras nem outros dados sensíveis** no armazenamento do cliente.

## Como se relaciona

Os cookies de sessão e suas proteções estão em sessões seguras em PHP; o escopo por origem segue o modelo de segurança do navegador.

## Notas do Claude

Confiança média: li o panorama, o Web Storage e a abertura dos cookies; os atributos dos cookies, o exemplo de uso e o IndexedDB (a partir da p. 557) não foram lidos por inteiro.

- Confirmado também por Freeman (cap. 39): `localStorage` e `sessionStorage` guardam pares de **strings**. O evento `storage` dispara na janela de **outros** documentos que compartilham o mesmo armazenamento quando um deles o altera; no `sessionStorage`, como cada aba tem o seu, o evento quase não ocorre.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-sessoes-seguras-em-php]] — esta nota cita a ideia de «Use sessões PHP só com cookie e proteja o identificador» na seção sobre como se relaciona
- [[modelo-de-seguranca-da-web-no-navegador]] — o escopo por origem segue a política de mesma origem
- [[cookies-http]] — «Cookies HTTP: o que são, limites e mitos» cita esta nota ao explicar suas relações
- [[regra-nao-guarde-dados-sensiveis-em-cookies]] — o livro de JavaScript dá o mesmo aviso sobre armazenamento do cliente
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — o clone estruturado também é usado em outras APIs de armazenamento
- [[indexeddb-banco-de-objetos-no-navegador]] — «IndexedDB: banco de objetos no navegador» cita esta nota ao explicar suas relações
- [[cookies-no-javascript-document-cookie]] — «Cookies no JavaScript» cita esta nota ao explicar suas relações
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — «JSON em JavaScript: stringify, parse, toJSON, replacer e reviver» cita esta nota ao explicar suas relações
- [[apis-do-navegador-para-conhecer]] — a lista de APIs do capítulo 15 situa o armazenamento entre os demais recursos do navegador
- [[aplicacoes-offline-appcache-e-service-workers]] — o armazenamento local é uma das peças de uma aplicação offline
- [[mapa-the-definitive-guide-to-html5]] — o mapa acompanha a destilação do livro de que esta nota veio
