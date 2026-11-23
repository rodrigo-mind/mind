---
titulo: "SVG no HTML e por JavaScript (scalable vector graphics)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.7 (PDF p. 494-502)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# SVG no HTML e por JavaScript

## Definição

SVG (scalable vector graphics) é um formato de imagem **vetorial**: em vez de uma matriz de pixels, como GIF, JPEG e PNG, descreve em texto (XML, parecido com HTML) os passos para desenhar a figura. Por isso não depende de resolução. O livro cita três formas de usar SVG no navegador:

1. **Arquivo `.svg` em `<img>`**, como qualquer imagem.
2. **Embutido no HTML:** as tags `<svg>`, `<circle>`, `<line>`, `<text>`, `<g>` e `<path>` vão direto no documento, sem declarar namespace. Assim o CSS da página pode estilizar o desenho, mas com propriedades próprias do SVG (`fill`, `stroke`, `stroke-width`, `text-anchor`). O atalho `font` não funciona: use `font-family`, `font-size` e `font-weight` separados. Em `<svg>`, `width` e `height` dão o tamanho na tela e `viewBox` dá o sistema de coordenadas interno.
3. **Gerado por JavaScript com a API do DOM**, para criar imagens sob demanda, como gráficos de dados carregados dinamicamente.

**Manipular SVG embutido:** como os elementos estão no DOM, dá para achá-los com `querySelector()` e mudar atributos com `setAttribute()`. No exemplo do relógio, os ponteiros giram com `transform="rotate(ângulo, cx, cy)"`. Ícones em SVG podem ficar dentro de um `<template>` e ser clonados quando necessário; reações simples, como mudar de cor ao passar o mouse, muitas vezes se fazem só com CSS.

**Formas livres:** `<path>` desenha linhas e curvas pelo atributo `d`, uma minilinguagem de letras e números (`M` move, `L` traça linha, `A` traça arco).

## Por que importa

Ícones e gráficos simples nítidos em qualquer tamanho e zoom, estilizáveis por CSS e manipuláveis por JavaScript, sem biblioteca.

## Como se relaciona

Para criar elementos SVG por código, siga a regra crie elementos SVG com createElementNS. A alternativa por métodos de desenho é desenhar gráficos com canvas. Os templates estão em componentes web.

## Notas do Claude

- O livro avisa que a gramática do SVG é grande (curvas, texto, animação, até scripts e CSS internos) e não a cobre por inteiro.
- Inferência minha: um `.svg` enviado por usuário pode conter scripts. Não aceite upload de SVG sem tratamento, ou sirva-o apenas por `<img>`, onde os scripts não rodam.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-crie-elementos-svg-com-createelementns]] — a regra trata da criação de SVG por código
- [[desenhar-graficos-com-canvas]] — é a alternativa por métodos de desenho
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — ícones SVG podem ficar num `<template>` e ser clonados
- [[regra-upload-seguro-em-php]] — um SVG enviado por usuário pode conter scripts
- [[imagens-e-mapas-de-imagem-em-html]] — o SVG em `<img>` é uma das formas de usar imagem na página
