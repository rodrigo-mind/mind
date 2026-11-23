---
titulo: "XMLHttpRequest: estados, eventos e erros"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 32 (PDF p. 804-830)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# XMLHttpRequest: estados, eventos e erros

## Definição

`XMLHttpRequest` é o objeto base do Ajax: faz requisições HTTP em segundo plano. O nível 1 é o básico; o nível 2 acrescenta eventos, facilidades para formulários e suporte a CORS. O uso:

1. `const xhr = new XMLHttpRequest()`. Diferente da maioria dos objetos do DOM, ele é criado com `new` e não vem de uma variável global.
2. Registre os tratadores.
3. Chame `xhr.open(metodo, url)`. URLs relativas são resolvidas a partir do documento atual. Há argumentos opcionais para modo assíncrono, usuário e senha.
4. Chame `xhr.send()`.

**Estados (`readyState`):** `UNSENT` (0), `OPENED` (1), `HEADERS_RECEIVED` (2, cabeçalhos já disponíveis), `LOADING` (3) e `DONE` (4). O evento `readystatechange` dispara a cada mudança. `DONE` só quer dizer que **terminou**, não que deu certo: o sucesso é `readyState === 4` **e** `status === 200`. O conteúdo vem em `responseText`.

**Eventos do nível 2:** `loadstart`, `progress` (várias vezes), `load`, `error`, `abort`, `timeout` e `loadend`.

**Três tipos de erro:**

1. **Erro ao montar a requisição** (por exemplo, uma URL inválida): é lançada uma exceção. Use `try/catch`.
2. **Erro na requisição** (servidor que não resolve no DNS, ou origem diferente sem permissão): dispara o evento `error`, em geral com `status` 0 e `statusText` vazio.
3. **Erro da aplicação** (a requisição funciona, mas o recurso não existe): não há erro técnico; o `status` vem 404, ou outro código diferente de 200.

**Cabeçalhos:** `setRequestHeader(nome, valor)` só depois de `open()`, senão é lançado um erro. O exemplo do livro usa `X-HTTP-Method-Override` para pedir que o servidor trate a requisição como DELETE. A resposta oferece `getResponseHeader(nome)` e `getAllResponseHeaders()`, já no estado 2.

**Cancelar:** `xhr.abort()` interrompe uma requisição demorada e dispara `abort`.

## Por que importa

É a base de todo código Ajax antigo e o caminho para acompanhar o progresso de upload. Saber os três tipos de erro evita tratar um 404 como sucesso.

## Como se relaciona

O equivalente atual é usar a API fetch, que tem a mesma pegadinha (ver a regra fetch só rejeita em falha de rede). O envio de formulários está em enviar formulário por Ajax com FormData, e as requisições para outra origem em CORS. O lado PHP está em Ajax e WebSockets com PHP.

## Notas do Claude

- Livro de 2012: os trechos sobre o Opera (sem as constantes de estado, com eventos do nível 2 incompletos) estão defasados.
- Inferência minha: em código novo, use `fetch`, e use `XMLHttpRequest` quando precisar do progresso de upload ou ao manter código antigo.

## Conexões

- [[cors-requisicoes-entre-origens]] — erro de requisição com status 0 pode ser CORS
- [[regra-chame-preventdefault-no-inicio-do-tratador]] — um erro no código do XMLHttpRequest some se a ação padrão ocorrer
- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[usar-a-api-fetch]] — o fetch é o equivalente atual, com a mesma pegadinha do status
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — a mesma armadilha: só falha de rede é erro, e status 404 não
- [[assincronia-com-callbacks-e-eventos]] — é um exemplo clássico de assincronia por eventos
- [[ajax-e-websockets-com-php]] — o lado PHP das requisições Ajax está ali
- [[enviar-formulario-por-ajax-com-formdata]] — o envio de formulário é o uso principal descrito aqui
