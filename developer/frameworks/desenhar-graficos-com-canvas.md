---
titulo: "Desenhar gráficos com canvas (API 2D)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.8 (PDF p. 502-524)"
  - "Adam Freeman, The Definitive Guide to HTML5, caps. 35 e 36 (PDF p. 879-937)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Desenhar gráficos com canvas

## Para que serve

Desenhar por código numa superfície de pixels: gráficos, miniaturas, efeitos sobre imagens, jogos simples.

## Quando usar e quando não usar

- **Canvas:** desenho por **chamadas de métodos**. É bom quando se redesenha tudo a cada quadro ou quando é preciso mexer em pixels.
- **SVG:** desenho por **árvore de elementos**, fácil de editar (basta remover um elemento) e nítido em qualquer zoom. No canvas, remover algo costuma exigir apagar e redesenhar tudo. Os dois têm a mesma capacidade; um simula o outro.
- O 3D (`getContext("webgl")`) fica fora do livro, que recomenda usar bibliotecas.

## O que perguntar ao usuário antes

- O que vai ser desenhado, em que tamanho na tela e se precisa ser nítido em telas de alta densidade?
- O desenho muda com frequência (animação) ou é estático?
- Precisa exportar como imagem?

## Passos

1. Ponha `<canvas>` no HTML e pegue o contexto: `const c = canvas.getContext("2d")`. Cada canvas tem um **único** contexto: chamar `getContext` de novo devolve o mesmo objeto.
2. **Tamanho:** defina o tamanho visível por CSS (`width`, `height`) e, antes de desenhar, ajuste `canvas.width` e `canvas.height` multiplicando esse tamanho por `devicePixelRatio`. Mudar `width` ou `height` (mesmo para o valor atual) apaga o canvas e zera o estado. Cada pixel ocupa 4 bytes de memória.
3. **Estado gráfico:** antes de desenhar, ajuste as propriedades do contexto: `fillStyle`, `strokeStyle` (cor CSS, gradiente de `createLinearGradient`/`createRadialGradient` com `addColorStop`, ou padrão de `createPattern`), `lineWidth`, `lineCap`, `lineJoin`, `setLineDash()`, `font` (sintaxe do CSS), `textAlign`, `textBaseline`, sombras (`shadowColor`, `shadowOffsetX/Y`, `shadowBlur`) e `globalAlpha`. O valor vale no momento de `stroke()` ou `fill()`.
4. **Caminho:** `beginPath()`, depois `moveTo()` (novo subcaminho), `lineTo()`, curvas (`arc`, `ellipse`, `arcTo`, `bezierCurveTo`, `quadraticCurveTo`) ou `rect()`, e `closePath()` para fechar a figura. Definir o caminho não desenha nada.
5. **Desenhar:** `stroke()` traça o contorno e `fill()` preenche; os dois agem sobre todos os subcaminhos e não apagam o caminho. Atalhos que não mexem no caminho: `fillRect`, `strokeRect`, `clearRect`, `fillText`, `strokeText` (com `measureText()` para medir a largura) e `drawImage()` (com 3, 5 ou 9 argumentos: posição; posição e tamanho; ou recorte de origem e destino).
6. **Transformações:** `translate()`, `rotate()` (sempre em radianos) e `scale()` mudam o sistema de coordenadas; a ordem importa. `setTransform(1,0,0,1,0,0)` volta ao padrão.
7. **Isolar mudanças:** `save()` empilha o estado (propriedades, transformação, recorte) e `restore()` o recupera. O caminho atual não faz parte do estado.
8. **Recorte e pixels, se precisar:** `clip()` limita a área de desenho. `getImageData()` e `putImageData()` leem e gravam pixels RGBA, sempre no sistema padrão e ignorando os atributos gráficos.
9. **Exportar:** `canvas.toDataURL()` devolve o desenho como PNG em URL `data:`, pronto para um `<img>`.

## Saída esperada

Um desenho no `<canvas>`, nítido na densidade da tela e, se pedido, exportável como PNG.

## Erros comuns

- Esquecer o `beginPath()` ao começar outra figura: os subcaminhos antigos são redesenhados juntos.
- Usar os atributos `width` e `height` como tamanho de tela: o desenho fica borrado em telas com `devicePixelRatio` 2.
- Chamar `clip()` sem `save()` antes: o recorte só diminui e não há como desfazê-lo, só com `restore()`.
- Chamar `drawImage()` com um `<img>` que ainda está carregando: não desenha nada. Espere o `load`.
- Preencher fora dos limites de um gradiente: aparece só a cor da ponta.
- Fechar o triângulo com `lineTo()` até o início em vez de `closePath()`: com linhas grossas, a junção fica feia.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```js
const canvas = document.querySelector("#grafico");
const ladoCss = 200;
canvas.style.width = canvas.style.height = ladoCss + "px";
canvas.width = canvas.height = ladoCss * devicePixelRatio;
const c = canvas.getContext("2d");
c.scale(devicePixelRatio, devicePixelRatio);
c.fillStyle = "#2a7";
c.fillRect(20, 20, 160, 100);
```

## Notas do Claude

- Na seção 15.15.5, o livro recomenda `requestAnimationFrame()` para mudanças visuais repetidas ou animadas, para que o navegador desenhe de forma suave.
- A regra de preenchimento é a "nonzero winding": subcaminhos sobrepostos traçados em sentidos opostos deixam um furo. É detalhe; consulte o livro se precisar.

- Também em Freeman (caps. 35 e 36), com a mesma API 2D: retângulos, caminhos, estado com `save`/`restore`, gradientes, sombras, imagens, texto, transformações e composição. Nada novo em relação a Flanagan.

## Conexões

- [[regra-crie-elementos-svg-com-createelementns]] — o SVG por elementos é a alternativa ao canvas
- [[svg-no-html-e-por-javascript]] — o canvas é a alternativa por métodos ao SVG por elementos
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[geometria-e-rolagem-do-documento]] — o tamanho do canvas em CSS e em pixels depende de medidas do documento
- [[apis-do-navegador-para-conhecer]] — `requestAnimationFrame` e as demais APIs de janela aparecem na lista
- [[transformacoes-em-css]] — a ideia de transformações no canvas tem a mesma ordem
- [[mapa-the-definitive-guide-to-html5]] — o mapa acompanha a destilação do livro de que esta nota veio
