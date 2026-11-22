---
titulo: "Controlar CSS por JavaScript: classes, estilos em linha e estilos computados"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.4 (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Controlar CSS por JavaScript

## Definição

- **Classes (o jeito mais simples):** adicionar e remover nomes de classe com `classList` (o CSS define a aparência, o JavaScript só escolhe a classe). Uma transição CSS declarada na classe é disparada ao mudar a propriedade, sem código de animação.
- **Estilos em linha:** `elemento.style` é um objeto `CSSStyleDeclaration` (não um texto) que corresponde ao atributo `style`. Os nomes viram camelCase (`font-size` vira `fontSize`); os valores são **textos com unidade** (`"300px"`, e não `300`, nem `"300"`); no cálculo, concatene a unidade. Atalhos como `margin` existem. O `cssText` lê ou grava tudo como um texto. Serve para valores únicos e dinâmicos, como a posição de uma dica (tooltip). Só reflete o que está em linha, e o que se lê vem no formato escrito.
- **Estilos computados:** `getComputedStyle(elemento)` (opcionalmente com um pseudoelemento) devolve o que de fato vale, somando folhas e estilo em linha; é **somente leitura**, com unidades relativas convertidas em absolutas (tamanhos em `px`, cores em `rgb()`), sem atalhos (leia `marginLeft`, não `margin`), sem `cssText`. Cuidado: `font-family` devolve a lista declarada, e `top`/`left` de elemento não posicionado dão `auto`. Para tamanho e posição, o livro prefere `getBoundingClientRect` (ver geometria e rolagem do documento).
- **Folhas de estilo:** `<style>` e `<link rel="stylesheet">` têm a propriedade `disabled` (alternar temas); dá para inserir novas folhas por DOM. A API para ler e alterar regras (`CSSStyleSheet`) não é coberta.
- **Eventos de transição e animação:** `transitionrun`, `transitionstart`, `transitionend` (com `propertyName` e `elapsedTime`) e `animationstart`, `animationiteration`, `animationend` (com `animationName`), disparados no elemento animado.

## Por que importa

Separa o estilo (CSS) do comportamento (JavaScript) e evita lógica de aparência no script.

## Como se relaciona

Ver transições e animações no CSS (design responsivo e cascata), eventos no navegador e a regra de não inserir entrada do usuário em `innerHTML`.

## Notas do Claude

Preferir classes a estilos em linha é a recomendação implícita do livro (a "mais simples"); valores calculados em tempo de execução, como posições, justificam o estilo em linha (inferência minha).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[eventos-no-navegador]] — esta nota cita a ideia de «Eventos no navegador» na seção sobre como se relaciona
- [[cascata-do-css]] — o estilo computado resulta da cascata
- [[regra-leia-tamanho-e-posicao-com-getboundingclientrect]] — a regra dá a alternativa ao estilo computado para medidas
- [[unidades-relativas-em-css]] — o estilo computado converte unidades relativas em pixels
- [[contextos-de-empilhamento-e-z-index]] — opacity, transform e filter, usados por script, criam contextos
