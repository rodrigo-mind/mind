---
titulo: Mapa de JavaScript, The Definitive Guide (7ª edição)
tipo: mapa-do-livro
origem: destilar
livro: JavaScript-The-Definitive-Guide-7th-Edition-(David-Flanagan).pdf
assunto: developer
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de JavaScript, The Definitive Guide (7ª edição)

## Tese

Referência extensa de JavaScript (7ª edição, 2020): linguagem (tipos, expressões, objetos, arrays, funções, classes, módulos), biblioteca padrão, iteradores, assincronia, metaprogramação, JavaScript no navegador e em Node.

## Como aproveitar

- Vale destilar: tipos e valores, funções, classes, módulos, assincronia (promessas e async/await) e JavaScript no navegador (DOM, eventos, rede e armazenamento), que formam a camada de front-end sem frameworks.
- Ignorar: metaprogramação, Node.js no servidor (a stack usa PHP) e ferramentas de desenvolvimento, a não ser sob demanda.
- Limites: a numeração abaixo é a impressa no livro. O PDF tem 707 páginas; converter antes de ler.

## Capítulos

| Cap. | Título | Páginas | Prioridade | Estado | Notas geradas |
|---|---|---|---|---|---|
| 1 | Introduction to JavaScript | 19-32 | baixa | pendente |  |
| 2 | Lexical Structure | 33-40 | baixa | pendente |  |
| 3 | Types, Values, and Variables | 41-78 | alta | destilado | [[regra-prefira-igualdade-estrita-em-javascript]], [[declaracao-de-variaveis-let-const-e-var]] |
| 4 | Expressions and Operators | 79-114 | media | destilado | [[acesso-condicional-e-invocacao-condicional-em-javascript]], [[operadores-logicos-e-valores-padrao-em-javascript]], [[regra-use-nullish-em-vez-de-ou-para-valores-padrao]], [[igualdade-comparacao-e-operador-mais-em-javascript]], [[precedencia-associatividade-e-ordem-de-avaliacao-em-javascript]], [[typeof-delete-e-outros-operadores-de-javascript]], [[eval-em-javascript]], [[regra-nunca-passe-texto-do-usuario-a-eval]] |
| 5 | Statements | 115-146 | media | destilado | [[condicionais-em-javascript-if-else-if-e-switch]], [[lacos-em-javascript-for-of-e-for-in]], [[regra-use-for-of-e-nao-for-in-para-vetores]], [[excecoes-em-javascript-throw-e-try-catch-finally]], [[modo-estrito-em-javascript]] |
| 6 | Objects | 147-172 | alta | destilado | [[objetos-como-vetores-associativos-e-copia-de-objetos]] |
| 7 | Arrays | 173-198 | alta | destilado | [[vetores-e-iteracao-em-javascript]] |
| 8 | Functions | 199-238 | alta | destilado | [[funcoes-de-seta-e-o-valor-de-this]], [[closures-em-javascript]], [[parametros-opcionais-e-rest-em-javascript]] |
| 9 | Classes | 239-266 | media | destilado | [[classes-e-prototipos-em-javascript]], [[classes-com-a-palavra-class-em-javascript]], [[campos-publicos-privados-e-estaticos-em-classes-javascript]], [[subclasses-com-extends-e-super-em-javascript]], [[classes-abstratas-e-hierarquias-de-classes-em-javascript]], [[regra-prefira-delegacao-a-heranca-em-javascript]], [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] |
| 10 | Modules | 267-284 | alta | destilado | [[modulos-es6-em-javascript]], [[usar-modulos-javascript-no-navegador]], [[modulos-no-node-commonjs]] |
| 11 | The JavaScript Standard Library | 285-344 | media | pendente  [[sets-e-maps-em-javascript]], [[datas-e-horas-com-date-em-javascript]], [[classes-de-erro-do-javascript-e-erros-personalizados]], [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]], [[internacionalizacao-com-intl-em-javascript]], [[console-api-do-javascript]], [[classe-url-e-urlsearchparams-em-javascript]], [[temporizadores-settimeout-e-setinterval]], [[expressoes-regulares-em-javascript-sintaxe-e-flags]], [[metodos-de-string-com-expressoes-regulares-em-javascript]], [[arrays-tipados-e-arraybuffer-em-javascript]], [[regra-nao-reutilize-regex-global-em-lacos-sem-controlar-lastindex]], [[regra-ordene-textos-para-pessoas-com-intl-collator]] |
| 12 | Iterators and Generators | 345-358 | baixa | pendente |  |
| 13 | Asynchronous JavaScript | 359-396 | alta | destilado | [[assincronia-com-callbacks-e-eventos]], [[promises-em-javascript]], [[async-e-await]], [[regra-encadeie-promises-em-vez-de-aninhar]], [[regra-fetch-so-rejeita-em-falha-de-rede]] |
| 14 | Metaprogramming | 397-426 | ignorar | pendente |  |
| 15 | JavaScript in Web Browsers | 427-594 | alta | pendente | [[modelo-de-seguranca-da-web-no-navegador]], [[eventos-no-navegador]], [[selecao-de-elementos-no-dom]], [[navegacao-e-conteudo-no-dom]], [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]], [[usar-a-api-fetch]], [[armazenamento-no-navegador]], [[criar-inserir-e-remover-nos-do-dom]], [[controlar-css-por-javascript]], [[geometria-e-rolagem-do-documento]], [[url-location-e-historico-de-navegacao]], [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]], [[regra-leia-tamanho-e-posicao-com-getboundingclientrect]], [[server-sent-events-com-eventsource]], [[websockets-no-navegador]], [[cookies-no-javascript-document-cookie]], [[indexeddb-banco-de-objetos-no-navegador]], [[workers-threads-no-navegador]], [[postmessage-messagechannel-e-mensagens-entre-janelas]], [[componentes-web-templates-elementos-customizados-e-shadow-dom]] (o capítulo foi lido só em parte) |
| 16 | Server-Side JavaScript with Node | 595-652 | ignorar | pendente |  |
| 17 | JavaScript Tools and Extensions | 653-? | baixa | pendente |  |

Prioridade: `alta`, `media`, `baixa` ou `ignorar` (o usuário pode mudar). Estado: `pendente` ou `destilado`. Páginas: numeração do leitor de PDF, salvo indicação nas observações.

## Observações

- 2026-11-22: as páginas da tabela foram convertidas para a numeração do leitor de PDF somando 18 à impressa (conferido em três capítulos: 3, 13 e 15). O limite do capítulo 17 continua desconhecido ("?").
- 2026-11-22: mapa criado a partir do sumário (páginas impressas); nenhum capítulo foi destilado. O capítulo 15 é o mais extenso e pode ser dividido em lotes por seção.

## Conexões

- [[developer]] — acompanha a destilação de um livro-base deste assunto
- [[JavaScript-The-Definitive-Guide-7th-Edition-(David-Flanagan) (pdf)]] — o mapa acompanha a destilação do livro representado por esta ficha
- 2026-11-22: primeiro lote, com o capítulo 13 (assincronia, promessas e async/await; a seção 13.4 de iteradores assíncronos foi lida só no início) e, do capítulo 15, só a seção 15.1.8 (segurança) e as definições da 15.2 (eventos). O capítulo 15 continua `pendente`: faltam o DOM (15.3), CSS por script, componentes web, rede (`fetch`, 15.11), armazenamento (15.12) e workers.
- [[assincronia-com-callbacks-e-eventos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[promises-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[async-e-await]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-encadeie-promises-em-vez-de-aninhar]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — o mapa do livro lista esta nota como gerada pela destilação
- [[modelo-de-seguranca-da-web-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[eventos-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: segundo lote, com as seções 15.3.1 a 15.3.4 (DOM) e 15.11.1 (`fetch`) do capítulo 15. O capítulo continua `pendente`: faltam a criação e inserção de nós (15.3.5), CSS por script (15.4), geometria, componentes web, SVG, canvas, o restante da rede (SSE e WebSockets), os cookies em detalhe e o IndexedDB (15.12) e os workers.
- [[selecao-de-elementos-no-dom]] — o mapa do livro lista esta nota como gerada pela destilação
- [[navegacao-e-conteudo-no-dom]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — o mapa do livro lista esta nota como gerada pela destilação
- [[usar-a-api-fetch]] — o mapa do livro lista esta nota como gerada pela destilação
- [[armazenamento-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: lote dos capítulos 3, 6, 7, 8 e 10, por leitura dirigida: o capítulo 10 foi lido por quase inteiro (alta); nos capítulos 3, 6, 7 e 8 li só as seções centrais (media). Faltam, por exemplo, tipos e conversões (3), protótipos e JSON (6), sort e criação de vetores (7), call/apply/bind e funções de ordem superior (8).
- [[regra-prefira-igualdade-estrita-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[declaracao-de-variaveis-let-const-e-var]] — o mapa do livro lista esta nota como gerada pela destilação
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[vetores-e-iteracao-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[funcoes-de-seta-e-o-valor-de-this]] — o mapa do livro lista esta nota como gerada pela destilação
- [[closures-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[parametros-opcionais-e-rest-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[modulos-es6-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[usar-modulos-javascript-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[modulos-no-node-commonjs]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: terceiro lote do capítulo 15, com as seções 15.3.5 (criação de nós), 15.4 (CSS por script), 15.5 (geometria e rolagem; o final truncado, por isso confiança média) e 15.10 (location e histórico). O capítulo segue `pendente`: faltam componentes web (15.6), SVG (15.7), canvas (15.8), áudio (15.9), SSE e WebSockets (15.11.2 e 15.11.3), o detalhe de cookies e IndexedDB (15.12), workers (15.13) e o restante dos eventos (15.2).
- [[criar-inserir-e-remover-nos-do-dom]] — o mapa do livro lista esta nota como gerada pela destilação
- [[controlar-css-por-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[geometria-e-rolagem-do-documento]] — o mapa do livro lista esta nota como gerada pela destilação
- [[url-location-e-historico-de-navegacao]] — o mapa do livro lista esta nota como gerada pela destilação
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-leia-tamanho-e-posicao-com-getboundingclientrect]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: quarto lote do capítulo 15, com as seções 15.6 (componentes web, até o começo do shadow DOM), 15.11.2 e 15.11.3 (SSE e WebSockets), 15.12.2 e 15.12.3 (cookies e IndexedDB, sem o exemplo completo) e 15.13 (workers e mensagens). O capítulo segue `pendente`: faltam o fim do shadow DOM e o exemplo da caixa de busca, SVG (15.7), canvas (15.8), áudio (15.9), o resto dos eventos (15.2) e os exemplos finais.
- [[server-sent-events-com-eventsource]] — o mapa do livro lista esta nota como gerada pela destilação
- [[websockets-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[cookies-no-javascript-document-cookie]] — o mapa do livro lista esta nota como gerada pela destilação
- [[indexeddb-banco-de-objetos-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[workers-threads-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: capítulo 9 (classes) lido por inteiro. A seção 9.3.3 (campos) é tratada como o livro a trata, ainda não padrão em 2020, com ressalva nas notas. Os exemplos `Complex`, `TypedMap`, `Histogram` e `Sets` só foram resumidos.
- [[classes-e-prototipos-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[classes-com-a-palavra-class-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[campos-publicos-privados-e-estaticos-em-classes-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[subclasses-com-extends-e-super-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[classes-abstratas-e-hierarquias-de-classes-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-prefira-delegacao-a-heranca-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: capítulos 4 e 5 lidos, com ressalvas. Do 4 ficaram sem leitura integral os operadores bit a bit (4.8.3), o fim de `delete`, `await`, `void` e vírgula (4.13.5 a 4.13.7). Do 5, `while`, `do/while`, `for` clássico, `break`, `continue`, rótulos, `with` e `debugger` foram vistos de relance e não geraram nota. As fontes citam o capítulo todo.
- [[acesso-condicional-e-invocacao-condicional-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[operadores-logicos-e-valores-padrao-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-nullish-em-vez-de-ou-para-valores-padrao]] — o mapa do livro lista esta nota como gerada pela destilação
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[precedencia-associatividade-e-ordem-de-avaliacao-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[typeof-delete-e-outros-operadores-de-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[eval-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nunca-passe-texto-do-usuario-a-eval]] — o mapa do livro lista esta nota como gerada pela destilação
- [[lacos-em-javascript-for-of-e-for-in]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-for-of-e-nao-for-in-para-vetores]] — o mapa do livro lista esta nota como gerada pela destilação
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — o mapa do livro lista esta nota como gerada pela destilação
- [[modo-estrito-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: capítulo 11 lido em parte e por isso segue `pendente`. Lidos: conjuntos e mapas (11.1), datas (11.4), erros (11.5), JSON (11.6), `Intl` (parcial, 11.7), console (11.8), URL (11.9), temporizadores (11.10), e a sintaxe inicial e os métodos `search`, `replace` e `match` das expressões regulares (11.3). Faltam: arrays tipados e `DataView` (11.2), o resto da sintaxe de regex (repetição, âncoras, grupos), `RegExp.exec`/`test`, `matchAll`/`split` e o `Collator`. As páginas do PDF vão de 285 a 344.
- [[condicionais-em-javascript-if-else-if-e-switch]] — o mapa do livro lista esta nota como gerada pela destilação
- [[sets-e-maps-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[datas-e-horas-com-date-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[classes-de-erro-do-javascript-e-erros-personalizados]] — o mapa do livro lista esta nota como gerada pela destilação
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — o mapa do livro lista esta nota como gerada pela destilação
- [[internacionalizacao-com-intl-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[console-api-do-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[classe-url-e-urlsearchparams-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[temporizadores-settimeout-e-setinterval]] — o mapa do livro lista esta nota como gerada pela destilação
- [[expressoes-regulares-em-javascript-sintaxe-e-flags]] — o mapa do livro lista esta nota como gerada pela destilação
- [[metodos-de-string-com-expressoes-regulares-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: capítulo 11 completado: expressões regulares inteiras (sintaxe, `exec`, `test`, `matchAll`, `split`), `Collator` e arrays tipados (11.2.1 a 11.2.4). Faltam a 11.2.5 (`DataView`) e a lista de opções de datas do `DateTimeFormat`.
- [[arrays-tipados-e-arraybuffer-em-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-reutilize-regex-global-em-lacos-sem-controlar-lastindex]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-ordene-textos-para-pessoas-com-intl-collator]] — o mapa do livro lista esta nota como gerada pela destilação
