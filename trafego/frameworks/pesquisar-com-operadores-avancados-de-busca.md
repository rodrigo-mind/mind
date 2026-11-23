---
titulo: "Pesquisar com operadores avançados de busca"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 65-73"
confianca: media
criado: 2026-11-23
atualizado: 2026-11-23
---

# Pesquisar com operadores avançados de busca

## Para que serve
Usar o próprio buscador como ferramenta de diagnóstico, pesquisa de palavras-chave, análise de concorrentes e prospecção de links, sem depender de software pago.

## Quando usar e quando não usar
Para checagens rápidas e comparações. O livro avisa que o comando `site:` é notoriamente impreciso na contagem de páginas indexadas, e que os números de resultados variam muito.

## O que perguntar ao usuário antes
- Domínio do site e dos concorrentes
- Palavras-chave de interesse
- Páginas ou seções que se quer inspecionar

## Passos
1. **Operadores básicos.** Excluir um termo com hífen; frase exata entre aspas (também para forçar palavras comuns); alternativas com OR.
2. **Operadores de diagnóstico.** `site:` restringe a um domínio ou pasta (e mostra, aproximadamente, quantas URLs estão indexadas); `inurl:` e `intitle:` procuram termos na URL e no título; `inanchor:` busca texto âncora de links; `intext:` o texto do corpo; `filetype:` o tipo de arquivo; `related:` páginas relacionadas (a "vizinhança" de links); `info:` e `cache:` mostram informações e a cópia guardada pelo buscador.
3. **Para uma contagem de indexadas mais fiel**, o livro sugere combinar `site:` com subpastas, palavras na URL ou no título, e um truque de parâmetros de URL (dependente de uma configuração antiga do Google).
4. **Combine para tarefas de SEO:**
   - **Concorrência:** mencionar o concorrente fora do site dele, usando o filtro de data.
   - **Pesquisa de palavras-chave:** estimar a concorrência de um termo comparando páginas com o termo no título e no texto âncora; achar mais frases com o curinga `*`.
   - **Auditoria:** detectar problema de canonicalização (a mesma página com e sem "www"), achar as páginas mais fortes de um site ou a mais forte para uma palavra-chave.
   - **Links:** procurar fóruns relevantes e sites de organizações, governo e educação com listas de links e favoritos.
5. **Dificuldade de uma palavra-chave.** Compare o número de resultados do termo solto, entre aspas e com `intitle:`; razões mais altas indicam mercado mais competitivo (o livro dá o exemplo de "dress boots", com razão de 290 para 1 contra o termo solto e de 5,4 para 1 na frase exata).
6. **Outros usos:** intervalos numéricos (modelos, preços, anos de copyright para achar sites abandonados), tipo de arquivo para achar documentos, idade dos resultados, conteúdo em cache, e conteúdo licenciado com Creative Commons.
7. **No Bing**, há operadores próprios: `linkfromdomain:` (links que saem de um domínio), `ip:`, `inbody:`, `loc:`, entre outros.

## Saída esperada
Anotações de diagnóstico (páginas indexadas, duplicidade por "www", páginas fortes) e listas de oportunidades (termos, concorrentes, fontes de links).

## Erros comuns
- Tomar o número de resultados como valor exato.
- Pesquisar o termo solto como medida de dificuldade, sem comparar com o termo no título.

## Notas do Claude
`confianca: media`: li as tabelas de operadores, mas elas saíram truncadas na extração do PDF. Vários operadores e parâmetros de URL citados (inclusive os que dependem de Google Instant e da exibição do cache) são de 2014 e podem ter mudado ou deixado de existir; confira a sintaxe atual antes de usar. A parte de curingas e de comparação de resultados é a mais durável.

## Conexões
- [[avaliar-valor-e-dificuldade-de-uma-palavra-chave]] — os operadores permitem estimar a dificuldade de um termo comparando resultados no título e no texto âncora
- [[auditar-um-site-existente-para-seo]] — operadores como site: e inurl: servem a checagens de indexação e de duplicidade na auditoria
- [[pesquisar-palavras-chave]] — os operadores ajudam a achar frases e a medir concorrência dos termos
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
