---
titulo: "Agrupar conteúdo em HTML: p, div, pre, blockquote e hr"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 9, primeiras seções (PDF p. 189-203)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Agrupar conteúdo em HTML: p, div, pre, blockquote e hr

## Definição

O HTML recolhe vários espaços e quebras de linha em um só espaço, o que separa o layout do documento do layout do conteúdo no navegador. Para dar estrutura, agrupam-se regiões relacionadas:

- **`p`:** parágrafo (frases relacionadas a um mesmo ponto ou tema); só conteúdo de frase; o atributo `align` é obsoleto.
- **`div`:** sem significado próprio; é o equivalente em fluxo do `span`. Dê o significado com os atributos globais (`class`, `id`). O livro é enfático: **só em último caso**, depois de considerar elementos com significado como `article` e `section`, porque a estrutura criada é específica da sua página e não evidente para quem a processa. Também serve para agrupar elementos de tipos diferentes e estilizá-los em bloco por herança.
- **`pre`:** preserva os espaços e quebras de linha; útil quando a formatação original é significativa (código, em conjunto com `code`); evite fora disso, para não perder a flexibilidade do CSS.
- **`blockquote`:** bloco citado de outra fonte (a versão longa do `q`); o atributo `cite` traz a URL da fonte; dentro dele, `p` e `hr` dão estrutura (o navegador ignora outras formatações).
- **`hr`:** no HTML5, não é mais "linha horizontal", e sim uma **quebra temática** no nível de parágrafo (uma mudança de cena, de assunto dentro de uma seção); a linha é só a convenção de estilo.

## Por que importa

A estrutura do documento deve vir de elementos, e não de espaços no código.

## Como se relaciona

Estende listas em HTML e escolha do elemento mais específico (o `div` como último recurso); ver também elementos de seção semânticos do HTML5.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[elementos-de-secao-semanticos-html5]] — esta nota cita a ideia de «Elementos de seção semânticos do HTML5» na seção sobre como se relaciona
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — o div é último recurso
- [[listas-e-figuras-em-html]] — completam o agrupamento do capítulo 9
- [[estrutura-basica-de-um-documento-html5]] — o corpo do documento recebe esses elementos
- [[fluxo-normal-do-documento]] — parágrafos e divs são elementos de bloco do fluxo normal
