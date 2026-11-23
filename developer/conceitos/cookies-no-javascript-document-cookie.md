---
titulo: "Cookies no JavaScript (document.cookie)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.12.2 (PDF p. 427-594, capítulo 15)"
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 26 (PDF p. 640-665)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Cookies no JavaScript (document.cookie)

## Definição

Cookies são pequenos dados nomeados, guardados pelo navegador, associados a uma página ou site e **enviados automaticamente ao servidor** em cada requisição (feitos para scripts de servidor). No cliente, não há métodos: lê-se e grava-se pela propriedade `document.cookie`, com textos formatados. O livro lembra que não há criptografia: o HTTPS ajuda na transmissão, mas os cookies não são seguros em si.

- **Ler:** `document.cookie` devolve um único texto com todos os cookies do documento, no formato `nome=valor; nome2=valor2` (sem os atributos); separe com `split("; ")` e divida cada par no primeiro `=`; aplique `decodeURIComponent` (e, se for o caso, `JSON.parse`).
- **Gravar:** `document.cookie = "nome=valor"`, o que **não apaga** os outros. Os valores não podem ter ponto e vírgula, vírgula nem espaços: codifique com `encodeURIComponent`.
- **Atributos:** por padrão, o cookie é **transitório** (some ao fechar o navegador). `max-age=segundos` o torna persistente; `path=/` o estende ao site todo (o padrão é a pasta da página e as subpastas); `domain=.exemplo.com` o compartilha entre subdomínios (só um domínio pai do servidor); `secure` só o envia por HTTPS.
- **Alterar e apagar:** regrave com o mesmo nome, `path` e `domain`; para apagar, `max-age=0`.
- **Limites:** o padrão pede só 300 cookies no total, 20 por servidor e 4 KB por cookie (nome e valor); na prática, os navegadores permitem mais cookies, mas o limite de tamanho pode valer.

## Por que importa

Mostra o que o JavaScript enxerga dos cookies e como os atributos definem o escopo.

## Como se relaciona

O lado do servidor está em criar e ler cookies em PHP; ver também armazenamento no navegador (alternativas) e não guarde dados sensíveis em cookies.

## Notas do Claude

Cookies marcados como `httponly` pelo servidor não aparecem em `document.cookie` (conhecimento geral meu, a conferir: o trecho lido não trata desse atributo); e o `SameSite` também não é tratado ali.

- Confirmado também por Freeman (cap. 26): ler `document.cookie` devolve todos os cookies em `nome=valor` separados por ponto e vírgula; cada atribuição grava um cookie só.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[armazenamento-no-navegador]] — esta nota cita a ideia de «Armazenamento no navegador» na seção sobre como se relaciona
- [[criar-e-ler-cookies-em-php]] — esta nota cita a ideia de «Criar e ler cookies em PHP» na seção sobre como se relaciona
- [[cookies-http]] — o conceito de cookie e seus limites
- [[regra-nao-guarde-dados-sensiveis-em-cookies]] — cookies não são seguros nem criptografados
