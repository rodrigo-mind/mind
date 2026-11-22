---
titulo: "Listas e figuras em HTML"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 9, seções Grouping Content into Lists e Dealing with Figures (PDF p. 203-214)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Listas e figuras em HTML

## Definição

- **`ol` (ordenada):** itens `li`; atributos `start` (primeiro número), `type` (`1`, `a`, `A`, `i`, `I`; restaurado no HTML5, com sentido semântico) e `reversed` (ordem decrescente; sem suporte na época do livro).
- **`ul` (não ordenada):** sem atributos; a aparência do marcador vem do CSS (`list-style-type`; o padrão é o disco).
- **`li`:** item; o atributo `value` (só dentro de `ol`) define o número do item e permite listas **não consecutivas**.
- **Listas de descrição:** `dl` com pares `dt` (termo) e `dd` (descrição); um termo pode ter vários `dd`. Sem atributos e sem mudanças no HTML5.
- **Listas personalizadas:** com `ul` sem marcador, o recurso `counter` do CSS e o seletor `:before` (e `:after`), dá para numerar de 7 em 7, continuar a numeração em listas aninhadas sem conhecer o número de itens de antemão, e outras combinações que o `ol` não permite.
- **`figure` e `figcaption`:** `figure` é uma unidade de conteúdo autocontida, em geral referenciada do texto principal e que pode ser movida sem alterar o sentido do documento (ilustração, diagrama, bloco de código), com legenda opcional `figcaption`, que deve ser o primeiro ou o último filho.

## Por que importa

Listas semânticas ajudam leitores de tela e o CSS; as listas de navegação costumam ser `ul` dentro de `nav`.

## Como se relaciona

Ver agrupar conteúdo em HTML e elementos de seção semânticos do HTML5 (o `nav` usa listas).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[elementos-de-secao-semanticos-html5]] — esta nota cita a ideia de «Elementos de seção semânticos do HTML5» na seção sobre como se relaciona
- [[agrupar-conteudo-em-html]] — completam o agrupamento do capítulo 9
- [[propriedades-personalizadas-do-css]] — os contadores de CSS são o outro recurso das listas personalizadas
