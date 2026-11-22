---
titulo: "Notações de cor em CSS: gamute, espaços de cor e OKLCH"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 11, seções 11.2.1 e 11.2.2 (PDF p. 337-343; impressa 307-313)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Notações de cor em CSS: gamute, espaços de cor e OKLCH

## Definição

- **Gamute:** a faixa de cores que um dispositivo ou notação consegue representar. O sRGB era o padrão há uma década; o **Display P3** tem cerca de 25% mais cores (celulares e laptops de ponta); o **Rec2020**, cerca de 75% das cores visíveis. As notações antigas só chegam ao sRGB. `@media (color-gamut: p3)` detecta o suporte.
- **Espaço de cor:** o arranjo das cores (retangular, como o RGB; cilíndrico, como o HSL e o OKLCH). Os cilíndricos são mais intuitivos (subir a luminosidade ou girar o matiz é previsível).
- **Notações:** `#rrggbb` e `rgb()` (crípticas, sRGB); `hsl(matiz saturação luminosidade)` (matiz em graus: 0 vermelho, 60 amarelo, 120 verde, 180 ciano, 240 azul, 300 magenta; sRGB); `hwb()` (matiz, brancura, negrura; sRGB); `lab()` e `oklab()` (luminosidade e dois eixos); `lch()` e `oklch()` (luminosidade, croma, matiz); `color(display-p3 ...)` (verboso). As quatro últimas são de gamute amplo e **perceptualmente lineares** (a mesma luminosidade parece igual em todos os matizes; no HSL, o verde a 50% parece mais claro que o azul). **OKLAB e OKLCH substituem o LAB e o LCH**, que têm inconsistências em azuis e roxos.
- **OKLCH:** `oklch(64% 0.12 233deg)`; luminosidade de 0% a 100%; croma (vivacidade) de 0 (cinza) a, na prática, no máximo 0,5 (0,33 no sRGB); matiz em ângulo (vermelho 30, amarelo 90, verde 140, ciano 195, azul 260, magenta 330). O navegador arredonda uma cor fora do gamute para a mais próxima que o hardware mostra; mantenha o croma abaixo de 0,5.
- **Sintaxe sem vírgulas** (recomendada) e **transparência com barra:** `rgb(136 0 0 / 0.7)`; os formatos `rgba()` e `hsla()` não são mais necessários. Hex tem forma de oito dígitos com alfa e abreviada de três ou quatro. A palavra `none` pode substituir um parâmetro irrelevante.
- **Suporte:** `hwb`, `lab`, `lch`, `oklab`, `oklch` chegaram entre o fim de 2022 e meados de 2023. O autor prefere `hsl()` pela compatibilidade hoje e `oklch()` como a notação do futuro; use valor reserva em formato antigo até o suporte ser suficiente.

## Por que importa

Em OKLCH, o matiz comum de uma paleta fica evidente (três verdes com matiz 165), e achar tons relacionados é fácil, o que é impossível de ver em hexadecimal.

## Como se relaciona

A aplicação prática está em organizar cores com propriedades personalizadas; sobre acessibilidade, ver contraste mínimo do texto.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[organizar-cores-com-propriedades-personalizadas]] — esta nota cita a ideia de «Organizar cores com propriedades personalizadas» na seção sobre como se relaciona
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — a escolha de cores deve respeitar o contraste
