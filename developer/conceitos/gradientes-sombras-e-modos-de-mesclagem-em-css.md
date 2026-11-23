---
titulo: "Gradientes, sombras e modos de mesclagem em CSS (gradients, shadows, blend modes)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 13 (PDF p. 387-412)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Gradientes, sombras e modos de mesclagem em CSS

## Definição

**Gradientes:** são imagens de fundo, usadas em `background-image`. Por si só, não dão tamanho ao elemento.

- `linear-gradient(direção, cor1, cor2, ...)`: a direção é uma palavra (`to right`, `to bottom right`) ou um ângulo (`0deg` aponta para cima, `90deg` para a direita).
- Aceita várias **paradas de cor**, com posição em % ou em comprimento. Duas paradas na mesma posição trocam a cor de uma vez, o que cria listras.
- `repeating-linear-gradient()` repete o padrão (barras listradas). Nele, prefira comprimentos a porcentagens, porque o valor define o tamanho do padrão.
- `radial-gradient()` parte de um ponto (elipse ou `circle`). `conic-gradient(from 90deg at x y, ...)` gira em volta de um ponto.
- **Espaço de cor:** `linear-gradient(to right in oklch, ...)`. Em sRGB, cores opostas passam por uma "zona cinza morta". Para tons bem diferentes, use espaços polares (`oklch`, `hsl`); para ir de uma cor viva a uma neutra (branco, preto, cinza, transparente), use um retangular (`srgb`). `longer hue` dá a volta longa no círculo de cores (arco-íris). O livro aponta bugs de navegador em OKLCH e HSL com branco ou cinza e recomenda pôr um gradiente sem espaço de cor antes, como alternativa.
- Use as propriedades separadas (`background-image`, `background-size`...): o atalho `background` zera as que você não informou.

**Sombras:**

- `box-shadow: x y desfoque espalhamento cor`. `x`, `y` e a cor devem sempre ser informados. O espalhamento positivo aumenta a sombra; o negativo diminui.
- `inset` desenha a sombra por dentro (no exemplo do livro, para o botão parecer pressionado). Várias sombras vão separadas por vírgula.
- `text-shadow` faz o mesmo para o texto.
- Sombra sem desfoque serve como "borda" que respeita os cantos arredondados.
- O livro compara o estilo esqueumórfico (gradiente e sombra imitando objetos reais), o plano (cores uniformes) e um meio-termo comum hoje.

**Modos de mesclagem (blend modes):**

- `background-blend-mode` mistura as camadas de fundo do próprio elemento; `mix-blend-mode` mistura o elemento com o que está atrás dele.
- São 15 modos, em cinco grupos (escurecer, clarear, contraste, comparação e componentes).
- Usos do livro: tingir uma foto com uma cor (`luminosity` ou `color`), aplicar textura sobre uma imagem e mesclar um título sobre uma faixa colorida. O conselho é usar com moderação.

## Por que importa

Dá profundidade e identidade visual a botões, faixas e fotos sem usar imagens extras.

## Como se relaciona

As cores e os espaços de cor estão nas notas de cor do livro. Animar sombras custa repintura (ver a regra anime só transform e opacity). Os filtros estão em filtros, máscaras e recortes em CSS.

## Notas do Claude

Confiança média: li a parte de gradientes por inteiro; sombras e modos de mesclagem, nas explicações e nos exemplos principais.

## Conexões

- [[filtros-mascaras-e-recortes-em-css]] — os gradientes são usados como máscara, tema da nota de filtros e máscaras
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[notacoes-de-cor-em-css-e-oklch]] — o espaço de cor do gradiente usa OKLCH e HSL
- [[regra-anime-so-transform-e-opacity]] — animar sombras custa repintura
- [[organizar-cores-com-propriedades-personalizadas]] — as cores do gradiente podem vir de propriedades personalizadas
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — gradientes e sombras sob o texto afetam o contraste
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
