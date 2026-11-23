---
titulo: "Seletores CSS (atributos, combinadores, pseudoclasses e pseudoelementos)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, caps. 16 a 18 (PDF p. 389-455)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Seletores CSS

## Definição

Referência dos seletores, segundo os capítulos 17 e 18:

- **Básicos:** `*` (todos), elemento (`p`), classe (`.destaque`), id (`#topo`) e vários juntos (`h1, h2`).
- **De atributo:**
  - `[href]`: tem o atributo;
  - `[attr="v"]`: valor exato;
  - `[attr^="v"]`: começa com;
  - `[attr$="v"]`: termina com (por exemplo, `[href$=".pdf"]`);
  - `[attr*="v"]`: contém;
  - `[attr~="v"]`: uma das palavras;
  - `[attr|="v"]`: valor ou valor seguido de hífen (por exemplo, `[lang|="pt"]`).
- **Combinadores:**
  - descendente (`nav a`);
  - filho direto (`tr > th`);
  - irmão imediato (`h2 + p`);
  - irmãos seguintes (`h2 ~ p`).
- **Pseudoelementos:** `::first-line`, `::first-letter`, `::before` e `::after` (para conteúdo gerado com `content`).
- **Pseudoclasses de estrutura:** `:root`, `:first-child`, `:last-child`, `:only-child`, `:nth-child(n)`, `:nth-last-child(n)`, `:first-of-type`, `:nth-of-type(n)`, `:only-of-type` e `:empty`.
- **Pseudoclasses de interação:** `:link`, `:visited`, `:hover`, `:active`, `:focus` e `:target` (o alvo da âncora da URL).
- **Pseudoclasses de formulário:** `:enabled`, `:disabled`, `:checked`, `:default`, `:valid`, `:invalid`, `:in-range`, `:out-of-range`, `:required` e `:optional`.
- **Outras:** `:not(seletor)`, por exemplo `a:not([href*="site.com"])` para links externos, e `:lang(pt)`.

**Contexto (cap. 16):** o CSS3 é dividido em módulos, cada um com o seu ritmo. Por isso, o suporte deve ser avaliado módulo a módulo, e não "CSS3" como um todo. Recursos em teste nos navegadores usavam prefixos (`-webkit-`, `-moz-`, `-ms-`, `-o-`).

## Por que importa

Seletores de atributo e de formulário eliminam classes extras. Por exemplo, `input:invalid` pinta os campos com erro sem JavaScript.

## Como se relaciona

A especificidade de cada tipo está em especificidade de seletores, e a regra mantenha a especificidade baixa limita o uso de id. `:is()` e `:where()` estão em is e where em seletores CSS. A validação nativa está em validação nativa de formulários HTML5.

## Notas do Claude

- Confiança média: os capítulos 16 a 24 estavam marcados como `ignorar` e foram destilados a pedido do usuário. Li as tabelas de seletores e o contexto do capítulo 16. Os capítulos 19 a 24 (bordas e fundos, modelo de caixa, layouts, texto, transições e outros) repetem as notas de CSS in Depth, mais recentes, e não geraram nota própria.
- diverge: no livro de 2012, layouts usam float e um flexbox antigo, e os prefixos são necessários. O CSS in Depth (2ª ed.) trata grid, flexbox atual e camadas, e deve ser preferido (inferência minha a partir das datas).
- `:has()`, `:focus-visible` e `:user-invalid` são posteriores ao livro (conhecimento meu).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[especificidade-de-seletores]] — cada tipo de seletor tem um peso de especificidade
- [[regra-mantenha-a-especificidade-baixa]] — limita o uso de id e de seletores longos
- [[is-e-where-em-seletores-css]] — `:is()` e `:where()` são seletores posteriores ao livro
- [[validacao-nativa-de-formularios-html5]] — `:invalid` e `:required` estilizam o resultado da validação nativa
- [[selecao-de-elementos-no-dom]] — `querySelector` usa a mesma sintaxe de seletores
