---
titulo: "Classe URL e URLSearchParams em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.9 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Classe `URL` e `URLSearchParams` em JavaScript

## Definição

A classe `URL` (padrão WHATWG; Node e todos os navegadores, exceto o Internet Explorer) interpreta e altera URLs e trata corretamente o escape. `new URL("https://exemplo.com:8000/caminho?q=termo#fragmento")`, ou um relativo mais uma base (segundo argumento).

- **Propriedades:** `href`, `origin` (somente leitura), `protocol`, `host`, `hostname`, `port`, `pathname`, `search`, `hash`, `username`, `password`. Todas, exceto `origin`, podem ser alteradas; `href` reconstrói a URL (igual a `toString()`) e, ao receber um texto, reanalisa. Atribuir `pathname = "path with spaces"` gera `/path%20with%20spaces`; `search = "q=foo#bar"` escapa o `#`.
- **`searchParams`:** referência (somente leitura) a um **`URLSearchParams`**, com `append`, `set`, `get`, `getAll`, `has`, `delete`, `sort` e iteração; escapa valores (`&` vira `%26`) e aceita o mesmo nome várias vezes. Também se pode criar um `URLSearchParams`, acrescentar parâmetros e atribuí-lo a `url.search`.
- **Funções antigas:** `escape()` e `unescape()` estão obsoletas; `encodeURI`/`decodeURI` não escapam `/`, `?` e `#` (para URLs inteiras), e `encodeURIComponent`/`decodeURIComponent` escapam também os separadores (para componentes). O problema comum: cada parte da URL usa codificação diferente (por exemplo, espaço vira `%20` em vez de `+` na consulta). A solução do livro é usar a classe `URL` para toda manipulação.

## Por que importa

Evita montar URLs por concatenação e erros de escape.

## Como se relaciona

Veja URL, `location` e histórico de navegação, links e URLs relativas em HTML, usar a API fetch e a regra de não abrir URLs informadas pelo usuário (em PHP).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[links-e-urls-relativas-em-html]] — esta nota cita a ideia de «Links e URLs relativas em HTML» na seção sobre como se relaciona
- [[url-location-e-historico-de-navegacao]] — a URL da página e o location
- [[usar-a-api-fetch]] — montar a URL de uma requisição
- [[metodos-de-string-com-expressoes-regulares-em-javascript]] — o livro desaconselha analisar URLs com regex
