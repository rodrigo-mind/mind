---
titulo: Mapa de The Definitive Guide to HTML5
tipo: mapa-do-livro
origem: destilar
livro: The-Definitive-Guide-to-HTML5-(Adam-Freeman).pdf
assunto: developer
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de The Definitive Guide to HTML5

## Tese

Referência de HTML5 (2011), com mais de mil páginas, em cinco partes: introdução, elementos HTML, CSS, DOM e recursos avançados (Ajax, multimídia, canvas, armazenamento e outros).

## Como aproveitar

- Vale destilar: elementos semânticos, formulários e validação nativa, e o essencial de DOM e eventos.
- Ignorar: partes sobre CSS (cobertas por um livro mais atual) e recursos hoje defasados.
- Limites: o livro é de 2011, anterior a muitas práticas atuais (flexbox, grid, módulos). Confira cada recurso na documentação atual antes de usar. A numeração abaixo é a impressa; o PDF tem 1.053 páginas.

## Capítulos

| Cap. | Título | Páginas | Prioridade | Estado | Notas geradas |
|---|---|---|---|---|---|
| 1-5 | Putting HTML5 in Context, Getting Ready, Getting Started with HTML, CSS and JavaScript | 3-102 | baixa | destilado | [[atributos-globais-booleanos-e-data-em-html]] (os caps. 4 e 5 repetem CSS in Depth e Flanagan) |
| 6 | HTML Elements in Context | 104-114 | media | destilado | [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] |
| 7 | Creating HTML Documents | 115-148 | alta | destilado | [[estrutura-basica-de-um-documento-html5]], [[metadados-do-documento-html]], [[regra-carregue-scripts-com-defer-ou-async]] |
| 8 | Marking Up Text | 149-188 | alta | destilado | [[links-e-urls-relativas-em-html]], [[escolher-o-elemento-html-de-texto-pelo-significado]] |
| 9 | Grouping Content | 189-214 | media | destilado | [[agrupar-conteudo-em-html]], [[listas-e-figuras-em-html]] |
| 10 | Creating Sections | 215-247 | alta | destilado | [[elementos-de-secao-semanticos-html5]] |
| 11 | Table Elements | 248-276 | baixa | destilado | [[tabelas-em-html5]], [[regra-nao-use-tabelas-para-o-layout-da-pagina]] |
| 12 | Working with Forms | 281-310 | alta | destilado | [[estrutura-de-formularios-html5]] |
| 13 | Customizing the Input Element | 311-350 | alta | destilado | [[tipos-do-elemento-input]] |
| 14 | Other Form Elements and Input Validation | 351-370 | alta | destilado | [[validacao-nativa-de-formularios-html5]], [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]], [[outros-elementos-de-formulario-html5]] |
| 15 | Embedding Content | 365-389 | media | destilado | [[imagens-e-mapas-de-imagem-em-html]], [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]], [[iframe-object-embed-progress-e-meter-em-html5]] |
| 16-24 | CSS (contexto, seletores, bordas, modelo de caixa, layouts, texto, transições e outras) | 397-632 | ignorar | destilado | [[seletores-css-atributos-combinadores-e-pseudoclasses]] (os caps. 19 a 24 repetem notas de CSS in Depth, mais recentes) |
| 25-31 | DOM (contexto, documento, janela, elementos, estilo, eventos, objetos específicos) | 620-803 (PDF) | media | destilado | [[diferencas-entre-navegadores-e-deteccao-de-recursos]], [[api-de-validacao-de-formularios-por-javascript]] (os demais temas já tinham notas do livro de JavaScript; Freeman entrou como segunda fonte nelas) |
| 32-33 | Ajax, partes I e II | 804-854 (PDF) | media | destilado | [[xmlhttprequest-estados-eventos-e-erros]], [[cors-requisicoes-entre-origens]], [[enviar-formulario-por-ajax-com-formdata]], [[regra-chame-preventdefault-no-inicio-do-tratador]] |
| 34-40 | Multimídia, canvas, arrastar e soltar, geolocalização, web storage e aplicações offline | 873-1052 | baixa | destilado | [[audio-e-video-em-html5]], [[arrastar-e-soltar-com-a-api-nativa-do-html5]], [[geolocalizacao-no-navegador]], [[aplicacoes-offline-appcache-e-service-workers]] (canvas e web storage entraram como fonte em [[desenhar-graficos-com-canvas]] e [[armazenamento-no-navegador]]) |

Prioridade: `alta`, `media`, `baixa` ou `ignorar` (o usuário pode mudar). Estado: `pendente` ou `destilado`. Páginas: numeração do leitor de PDF, salvo indicação nas observações.

## Observações

- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 1 a 5, 16 a 24 e 34 a 40 destilados a pedido do usuário, inclusive os marcados `ignorar` (16 a 24), em leitura dirigida (confiança média). Aberturas no PDF: 16 em 389, 17 em 403, 18 em 429, 19 em 456, 20 em 487, 21 em 521, 22 em 545, 23 em 570, 24 em 599, 34 em 855, 35 em 879, 36 em 910, 37 em 938, 38 em 955, 39 em 966, 40 em 976; nos capítulos 1 a 5 o PDF fica 1 página à frente da impressa. Uma divergência registrada: o AppCache (cap. 40) foi removido dos navegadores e foi substituído pelos service workers. Com isso, todos os capítulos do livro estão destilados.
- 2026-11-22: as páginas da tabela continuam sendo as IMPRESSAS. A busca no PDF não deu um deslocamento confiável; confira o deslocamento antes de ler.
- 2026-11-22: mapa criado a partir do sumário (páginas impressas); nenhum capítulo foi destilado.
- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 25 a 33 lidos na prosa; as tabelas de referência foram consultadas e as listagens de código, puladas. Páginas do PDF conferidas pela abertura de cada capítulo (25 em 620, 26 em 640, 27 em 666, 28 em 692, 29 em 721, 30 em 750, 31 em 778, 32 em 804, 33 em 831; deslocamento de -13 em relação à impressa). Os capítulos 26 a 30 se sobrepõem ao livro de JavaScript (Flanagan, 2020): em vez de notas novas, Freeman entrou como fonte em 13 notas (inclusive as três de eventos criadas hoje a partir de Flanagan), com uma divergência registrada (atributos de evento no HTML). Livro de 2012: avisos sobre Opera, IE e jQuery estão defasados e foram marcados nas notas.

## Conexões

- [[developer]] — acompanha a destilação de um livro-base deste assunto
- [[The-Definitive-Guide-to-HTML5-(Adam-Freeman) (pdf)]] — o mapa acompanha a destilação do livro representado por esta ficha
- 2026-11-22: primeiro lote, com os capítulos 12 a 14 (formulários), lidos nas tabelas-resumo, nas seções centrais e na validação. Os três ficam destilados em parte: faltam os detalhes de atributos e de cada tipo de campo. As páginas da tabela do mapa são as IMPRESSAS; o PDF tem os capítulos 12 a 14 em torno das páginas 275 a 369 do leitor (cerca de 5 a menos que a impressa; no capítulo 7 a diferença medida foi de cerca de 3, então o deslocamento varia).
- [[estrutura-de-formularios-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tipos-do-elemento-input]] — o mapa do livro lista esta nota como gerada pela destilação
- [[validacao-nativa-de-formularios-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — o mapa do livro lista esta nota como gerada pela destilação
- [[outros-elementos-de-formulario-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: segundo lote, com os capítulos 7, 8 e 10, lidos por inteiro (os de formulários 12 a 14 seguem em parte). Páginas de PDF confirmadas pelo cabeçalho de cada capítulo: cap. 7 em 115-148, cap. 8 em 149-188, cap. 9 em 189-214, cap. 10 em 215-247, cap. 11 em 248-. As demais linhas da tabela ainda usam a numeração impressa. Falta o capítulo 9 (listas e agrupamento), que o capítulo 8 só introduz.
- [[estrutura-basica-de-um-documento-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[metadados-do-documento-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-carregue-scripts-com-defer-ou-async]] — o mapa do livro lista esta nota como gerada pela destilação
- [[links-e-urls-relativas-em-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — o mapa do livro lista esta nota como gerada pela destilação
- [[elementos-de-secao-semanticos-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: terceiro lote, com os capítulos 6, 9, 11 e 15, lidos por inteiro (o começo do capítulo 9 e o final do 15, sobre áudio, vídeo e canvas, remetem a capítulos posteriores). Páginas de PDF conferidas pelas aberturas: cap. 6 em 104-114, cap. 9 em 189-214, cap. 11 em 248-276, cap. 15 em 365-389. Restam, dos capítulos de média prioridade, o DOM (25 a 31) e o Ajax (32 e 33), que se sobrepõem ao livro de JavaScript.
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — o mapa do livro lista esta nota como gerada pela destilação
- [[agrupar-conteudo-em-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[listas-e-figuras-em-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tabelas-em-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-use-tabelas-para-o-layout-da-pagina]] — o mapa do livro lista esta nota como gerada pela destilação
- [[imagens-e-mapas-de-imagem-em-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — o mapa do livro lista esta nota como gerada pela destilação
- [[iframe-object-embed-progress-e-meter-em-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[api-de-validacao-de-formularios-por-javascript]] — o mapa do livro lista esta nota como gerada pela destilação
- [[cors-requisicoes-entre-origens]] — o mapa do livro lista esta nota como gerada pela destilação
- [[diferencas-entre-navegadores-e-deteccao-de-recursos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[propagacao-e-cancelamento-de-eventos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-chame-preventdefault-no-inicio-do-tratador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-defina-tratadores-de-evento-em-atributos-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[xmlhttprequest-estados-eventos-e-erros]] — o mapa do livro lista esta nota como gerada pela destilação
- [[enviar-formulario-por-ajax-com-formdata]] — o mapa do livro lista esta nota como gerada pela destilação
- [[registrar-tratadores-de-eventos-com-addeventlistener]] — o mapa do livro lista esta nota como gerada pela destilação
- [[aplicacoes-offline-appcache-e-service-workers]] — o mapa do livro lista esta nota como gerada pela destilação
- [[atributos-globais-booleanos-e-data-em-html]] — o mapa do livro lista esta nota como gerada pela destilação
- [[audio-e-video-em-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[geolocalizacao-no-navegador]] — o mapa do livro lista esta nota como gerada pela destilação
- [[seletores-css-atributos-combinadores-e-pseudoclasses]] — o mapa do livro lista esta nota como gerada pela destilação
- [[arrastar-e-soltar-com-a-api-nativa-do-html5]] — o mapa do livro lista esta nota como gerada pela destilação
