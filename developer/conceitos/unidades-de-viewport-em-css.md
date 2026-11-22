---
titulo: "Unidades de viewport em CSS (vh, vw, svh, lvh, dvh)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 2, seção 2.4 (PDF p. 81-88; impressa 51-54)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Unidades de viewport em CSS

## Definição

O viewport é a área do navegador onde a página aparece (sem barras de endereço e de ferramentas). Unidades relativas a ele: `vw` e `vh` (1% da largura e da altura), `vmin` e `vmax` (1% da menor e da maior dimensão; `90vmin` dá sempre um quadrado que cabe na tela) e, para escrita vertical, `vi` e `vb` (eixos inline e block). No total, são 24 unidades combinando tipo de viewport e dimensão.

- **Problema original:** em navegadores móveis, as barras se escondem ao rolar, e o viewport muda de tamanho; elementos de `100vh` pulavam e forçavam recálculo de layout (layout thrashing). A maioria dos navegadores passou a interpretar `vh` com o maior viewport possível.
- **Três famílias novas:** **grande** (`lvh`, `lvw`...): o viewport com todas as barras ocultas; **pequeno** (`svh`, `svw`...): com todas visíveis; **dinâmico** (`dvh`, `dvw`...): muda de acordo com as barras; use com parcimônia, porque causa o mesmo pulo.
- **Escolha:** se um cabeçalho de altura total deve preencher a tela mesmo passando um pouco, `100lvh`; se deve ficar inteiro visível, mesmo deixando uma faixa, `100svh`. O padrão do autor, na dúvida, é o viewport pequeno.
- **Cuidados:** viewport não considera a barra de rolagem (`100svw` com barra vertical causa rolagem horizontal); teclado virtual ora entra no cálculo, ora não; as unidades originais costumam agir como as de viewport grande, sem garantia.

## Por que importa

Dão tamanhos que acompanham a tela, para seções de altura cheia e para fontes fluidas.

## Como se relaciona

Ver fonte fluida com clamp e unidades relativas em CSS.

## Notas do Claude

O livro tem datação própria (edição recente, com unidades novas); confirme o suporte atual no navegador-alvo antes de usar `svh`, `lvh` e `dvh` (inferência minha).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[unidades-relativas-em-css]] — são os dois grupos de unidades relativas
- [[fonte-fluida-com-calc-e-clamp]] — o framework usa svw para a fonte fluida
- [[altura-de-elementos-e-overflow]] — 100svh substitui a altura em porcentagem para preencher a tela
- [[geometria-e-rolagem-do-documento]] — o viewport é a base das medidas em coordenadas de viewport
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — as unidades cq são o equivalente relativo ao contêiner
