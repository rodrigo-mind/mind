---
titulo: "Aplicações offline (o AppCache do livro e o que o substituiu)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 40 (PDF p. 976-1053)"
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.15.7 (PDF p. 589-590)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Aplicações offline

## Definição

**O que o livro de HTML5 ensina (2012), o cache de aplicação (AppCache):**

- Um arquivo de **manifesto**, ligado pela tag `<html manifest="...">`, lista os recursos que o navegador deve guardar para funcionar sem rede.
- Na seção `CACHE` ficam os arquivos guardados; na `FALLBACK`, a página alternativa quando um recurso não está disponível; na `NETWORK`, o que sempre exige conexão.
- Os eventos `online` e `offline` e o objeto `applicationCache` acompanham o estado.
- O próprio autor pede para tratar o capítulo como uma indicação do rumo das aplicações offline, e não como algo pronto.

**O que substituiu, segundo Flanagan (2020):**

- Os **service workers** interceptam as requisições da aplicação e podem guardar respostas na **API Cache**, o que permite iniciar rápido e funcionar offline.
- O **manifesto web** (`<link rel="manifest">`, em JSON) dá nome e ícones para instalar o site na tela inicial.
- Essas APIs exigem HTTPS.

## Por que importa

Um painel de pedidos ou um catálogo pode continuar abrindo com a conexão ruim, como costuma acontecer no celular.

## Como se relaciona

A lista de APIs, inclusive as de PWA, está em APIs do navegador para conhecer. Os dados locais estão em armazenamento no navegador e em IndexedDB. As threads estão em workers.

## Notas do Claude

- diverge: o AppCache do livro de HTML5 foi descontinuado e removido dos navegadores. Não use. O caminho atual são os service workers com a API Cache (conhecimento meu; Flanagan já os apresenta como a tecnologia atual).
- Confiança média: o capítulo 40 foi lido na introdução e na estrutura do manifesto. Os capítulos 35 e 36 (canvas) e 39 (web storage) entraram como fonte nas notas que já existiam.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[apis-do-navegador-para-conhecer]] — a lista traz as APIs de PWA, como service workers e manifesto
- [[armazenamento-no-navegador]] — os dados locais complementam o cache de recursos offline
- [[indexeddb-banco-de-objetos-no-navegador]] — guarda dados estruturados para uso sem rede
- [[workers-threads-no-navegador]] — o service worker é um tipo de worker, que roda fora da página
