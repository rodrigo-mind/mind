---
titulo: "Estrutura básica de um documento HTML5"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 7, seção Setting Up the Basic Document Structure e elementos title e base (PDF p. 115-148)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Estrutura básica de um documento HTML5

## Definição

Todo documento tem quatro elementos de estrutura, sempre exigidos:

- **`doctype`:** primeira linha, com uma só tag e sem tag de fechamento; avisa ao navegador que é HTML. No HTML5 a forma é curta e dispensa o número de versão e o DTD do HTML4. Sem ele, a maioria dos navegadores ainda mostra o conteúdo, mas o autor considera má prática depender disso.
- **`html`:** o elemento raiz; contém um `head` e um `body`.
- **`head`:** metadados (informação sobre o conteúdo, scripts e recursos externos, como folhas de estilo). Exige um elemento `title`.
- **`body`:** o conteúdo em si; é sempre o segundo filho de `html`, depois do `head`. Atributos de aparência antigos (`bgcolor`, `text`, margens) são obsoletos: use CSS.

O **`title`** deve ser único e significativo: o navegador o mostra na janela ou aba, e é como o usuário distingue as abas da sua aplicação.

O **`base`** (no máximo um por documento, de preferência entre os primeiros no `head`) define a URL base contra a qual as URLs relativas são resolvidas, e o `target` padrão dos links. Sem ele, a base é a URL do próprio documento.

## Por que importa

É o esqueleto que todo o resto assume; erros aqui (sem `doctype`, sem `title`) causam comportamento imprevisível ou páginas difíceis de identificar.

## Como se relaciona

Os metadados do `head` estão em metadados do documento HTML, e o carregamento de scripts, em regra de defer e async. As URLs relativas e o `base` se ligam a links e URLs relativas em HTML.

## Notas do Claude

O livro é de 2011. A escolha do conjunto de caracteres e do atributo `lang` pertence à mesma base mínima, mas o atributo `lang` ficou fora do que li (inferência minha: confira na documentação atual).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[links-e-urls-relativas-em-html]] — esta nota cita a ideia de «Links e URLs relativas em HTML» na seção sobre como se relaciona
- [[elementos-de-secao-semanticos-html5]] — «Elementos de seção semânticos do HTML5» cita esta nota ao explicar suas relações
- [[metadados-do-documento-html]] — «Metadados do documento HTML: meta, link e style» cita esta nota ao explicar suas relações
- [[agrupar-conteudo-em-html]] — o corpo do documento recebe esses elementos
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[regra-omita-a-tag-de-fechamento-em-arquivos-so-php]] — a regra vale para arquivos só PHP, e não para o documento HTML
- [[atributos-globais-booleanos-e-data-em-html]] — os atributos globais, como lang, complementam a estrutura do documento
