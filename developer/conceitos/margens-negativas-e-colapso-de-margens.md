---
titulo: "Margens negativas e colapso de margens"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seções 3.4 e 3.5 (PDF p. 108-112; impressa 78-82)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Margens negativas e colapso de margens

## Definição

**Margens negativas** (só margens podem ser negativas; padding e borda não): à esquerda ou acima, deslocam o elemento e podem sobrepor o anterior; embaixo, não movem o elemento, mas puxam o que vem depois; à direita em bloco, alargam o elemento, e com a esquerda negativa também, ele extravasa o contêiner (para "sangrar" uma imagem além da coluna de texto). Cuidado: elementos interativos escondidos atrás de outros ficam sem clique, e conteúdo pode ultrapassar o viewport em telas pequenas. Para sobrepor, em geral é melhor usar `position`.

**Colapso de margens:** margens superior e inferior **adjacentes** se fundem em uma só, do tamanho da maior (um título com 19,92 px embaixo e um parágrafo com 16 px em cima ficam a 19,92 px, não 36). É a "bolha de espaço pessoal": cada elemento pode ter a sua margem sem se preocupar com o vizinho. O colapso vale para margens verticais (as laterais não colapsam, exceto em escrita vertical, em que se inverte), e também entre pai e filho: o `h1` dentro de um `header` sem padding tem a margem fundida com a do `header`, o que cria um espaço fora do fundo colorido, em vez de dentro.

**Como impedir o colapso:** `overflow: auto` (ou qualquer valor diferente de `visible`) no contêiner (o menos intrusivo); borda ou padding entre as margens; contêiner `inline-block`, flutuante, com posição absoluta ou fixa; itens de flexbox ou grid (nunca colapsam); elementos `table-cell`.

## Por que importa

Quando houver espaço inesperado acima ou abaixo de um contêiner, ou texto colado na borda, o colapso é a causa mais provável.

## Como se relaciona

Ver espaçamento entre elementos com o seletor coruja e fluxo normal do documento.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modelo-de-caixa-do-css]] — a margem é a camada externa do modelo
- [[espacar-elementos-com-o-seletor-coruja]] — o framework evita problemas de margem entre irmãos
- [[espacamento-preciso-ao-implementar-um-design]] — as margens do título e do parágrafo colapsam
