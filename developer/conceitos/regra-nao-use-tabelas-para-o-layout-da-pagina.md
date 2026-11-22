---
titulo: "Não use tabelas para o layout da página"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 11, introdução e conclusão (PDF p. 248-276)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não use tabelas para o layout da página

## Regra

Use `table` só para dados em grade; para posicionar blocos na página, use flexbox, grade (CSS Grid) ou as propriedades de tabela do CSS.

## Por quê

Nas versões anteriores do HTML, tabelas eram usadas para controlar o layout; o HTML5 deixou de permitir isso, porque a tabela deve representar o significado (dados tabulares). Sem o atributo `border`, o navegador pode supor que a tabela é de layout e exibi-la de modo inesperado; e células sobrepostas para "arrumar" outros elementos são um uso errado.

## Quando não vale

Não há exceção para o layout da página; as tabelas do CSS (`display: table`) se usam para o layout, e não o elemento `table`.

## Como verificar

Procure `table` sem cabeçalhos (`th`) ou com elementos de layout dentro, `colspan` usado para posicionar blocos e `table` aninhada.

## Como se relaciona

Veja tabelas em HTML5, flexbox e layout em grade com CSS Grid.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[tabelas-em-html5]] — esta nota cita a ideia de «Tabelas em HTML5» na seção sobre como se relaciona
- [[layout-em-grade-css-grid]] — esta nota cita a ideia de «Layout em grade» na seção sobre como se relaciona
- [[flexbox]] — o flexbox é uma alternativa para layout
