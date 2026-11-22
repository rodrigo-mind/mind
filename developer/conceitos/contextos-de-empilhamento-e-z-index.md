---
titulo: "Contextos de empilhamento e z-index"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 6, seção 6.4 (PDF p. 195-205; impressa 165-175)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Contextos de empilhamento e z-index

## Definição

O navegador pinta os elementos em uma ordem; o que é pintado depois aparece na frente. Sem posicionamento, vale a ordem do HTML. Com posicionamento, **os elementos posicionados vão à frente dos não posicionados**, e entre os posicionados continua valendo a ordem do HTML.

- **`z-index`:** inteiro (positivo ou negativo); maior fica na frente; negativo fica atrás dos elementos estáticos. **Só funciona em elementos posicionados.**
- **Contexto de empilhamento (stacking context):** grupo de elementos pintados juntos. Um elemento posicionado com `z-index` é a raiz de um contexto novo, e todos os seus descendentes pertencem a ele. A consequência: **nada dentro de um contexto pode ser levado à frente de algo que está à frente do contexto**, nem ficar atrás de algo que está atrás dele; um filho com `z-index: 100` dentro de uma caixa que está atrás de outra continua atrás dela.
- **O que cria um contexto:** `z-index` em elemento posicionado; `opacity` menor que 1; `transform` e `filter`; posicionamento `fixed` e `sticky` (sempre, mesmo sem `z-index`); o elemento raiz `<html>`.
- **Ordem dentro de um contexto, do fundo à frente:** a raiz do contexto; posicionados com `z-index` negativo; não posicionados; posicionados com `z-index: auto`; posicionados com `z-index` positivo.

## Por que importa

É a causa da maioria dos casos de "o elemento aparece atrás do outro apesar do `z-index` altíssimo".

## Como se relaciona

Ver tipos de posicionamento em CSS e a regra de organizar os `z-index`.

## Notas do Claude

Para diagnosticar, suba pela árvore até o ancestral que cria um contexto e mude o `z-index` dele (o livro recomenda).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[tipos-de-posicionamento-em-css]] — «Tipos de posicionamento em CSS: fixed, absolute, relative e sticky» cita esta nota ao explicar suas relações
- [[regra-organize-os-z-index-e-posicione-o-minimo]] — a regra evita a guerra de z-index
- [[controlar-css-por-javascript]] — opacity, transform e filter, usados por script, criam contextos
