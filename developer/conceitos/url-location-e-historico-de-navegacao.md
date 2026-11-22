---
titulo: "URL, location e histórico de navegação"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.10 (início) (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# URL, location e histórico de navegação

## Definição

- **`location`** (em `window` e `document`) representa a URL atual e parece com um objeto `URL`: `href`, `protocol`, `hostname`, `port`, `pathname`, `search` (do `?`) e `hash` (do `#`). Para ler os parâmetros da consulta, crie um `URL` a partir de `location` e use `searchParams`. `document.URL` é só um texto.
- **Carregar:** atribuir um texto a `location` carrega a URL e substitui o documento; URLs relativas funcionam. Só um fragmento (`#id`) rola até o elemento (`#top` vai ao início) sem recarregar. As propriedades são graváveis.
- **`assign()` e `replace()`:** o primeiro equivale à atribuição e deixa a página atual no histórico; o segundo **a substitui no histórico**, então o botão Voltar não retorna ao ponto de um redirecionamento automático. Para um script que sempre carrega outra página, `replace()` é a melhor escolha. `reload()` recarrega.
- **`history`:** `back()`, `forward()` e `go(n)` percorrem o histórico; `go(0)` recarrega. Os scripts só leem o tamanho (`length`), nunca as URLs guardadas, por segurança. Com iframes, os históricos se intercalam.

## Por que importa

A navegação e a URL são a base para links compartilháveis e para o botão Voltar funcionar.

## Como se relaciona

Para aplicações que mudam de estado sem recarregar, ver gerenciar o histórico em aplicações de uma página; e links e URLs relativas em HTML para a resolução de URLs.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[links-e-urls-relativas-em-html]] — esta nota cita a ideia de «Links e URLs relativas em HTML» na seção sobre como se relaciona
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — esta nota cita a ideia de «Gerenciar o histórico em aplicações de uma página» na seção sobre como se relaciona
- [[usar-a-api-fetch]] — o objeto URL também monta as consultas do fetch
- [[classe-url-e-urlsearchparams-em-javascript]] — a URL da página e o location
