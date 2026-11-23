---
titulo: "Componentes web: templates, elementos customizados e shadow DOM"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.6 (PDF p. 427-594, capítulo 15)"
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seções 15.6.4 e 15.6.5 (PDF p. 488-494)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Componentes web: templates, elementos customizados e shadow DOM

## Definição

Alternativa nativa aos frameworks para criar componentes de interface reutilizáveis (por exemplo, uma caixa de busca com ícones, que em HTML puro exigiria vários elementos, CSS e JavaScript a cada uso). Baseia-se em três tecnologias:

- **Templates HTML (`<template>`):** o conteúdo nunca é renderizado; `template.content` é um `DocumentFragment` (um nó que agrupa irmãos sem pai e, ao ser inserido, insere só os filhos) que se clona (`cloneNode(true)`) quantas vezes for preciso. Também se pode criar um template por código, com `innerHTML`, e clonar sem o custo de reanalisar.
- **Elementos customizados:** `customElements.define("nome-com-hifen", Classe)`, com a classe estendendo `HTMLElement` (e chamando `super()` no construtor). O nome precisa ter **hífen** (o HTML futuro não usará hifens, sem conflito), e a tag não pode ser autofechada. Os elementos já existentes são "promovidos" (upgrade). Métodos de ciclo de vida: `connectedCallback()` (ao entrar no documento; inicializa), `disconnectedCallback()` e `attributeChangedCallback()` (para os atributos de `static observedAttributes`).
- **Shadow DOM:** uma **raiz de sombra** (shadow root) é uma árvore privada ligada a um elemento hospedeiro (shadow host), como um minidocumento: seus elementos não aparecem nos filhos nem em `querySelector`, os estilos de dentro e de fora não se afetam (mas a herança de fonte e as variáveis CSS passam). Modo `open` (acessível por `shadowRoot`) ou `closed`. É o que o navegador usa nos controles de `<audio>` e `<video>`.

**Mais sobre o shadow DOM (15.6.4):**

- **Criar:** `elemento.attachShadow({mode: "open"})` devolve a raiz de sombra (um `DocumentFragment`) e a guarda em `elemento.shadowRoot`; preencha com métodos do DOM ou com `innerHTML`.
- **Eventos:** alguns (como `load`) ficam presos dentro da sombra; os de foco, mouse e teclado sobem para fora, e ao cruzar a fronteira o `target` passa a ser o hospedeiro.
- **Slots:** o conteúdo da sombra sempre aparece no hospedeiro. Se houver `<slot>`, os filhos comuns (light DOM) aparecem no lugar dele; sem `<slot>`, nunca aparecem; com `<slot>` e sem filhos, aparece o conteúdo padrão do slot. Os filhos "distribuídos" continuam no light DOM (achados por `querySelector`). Com vários slots nomeados, o filho escolhe pelo atributo `slot="nome"`. Para saber quando o conteúdo de um slot muda, ouça o evento `slotchange` no próprio `<slot>` (o livro escreve "slotchanged").

**Exemplo do livro (15.6.5):** a caixa de busca reúne os três recursos (elemento customizado, template e raiz de sombra), espelha atributos (`placeholder`, `size`, `disabled`) em propriedades e no `<input>` interno e dispara eventos próprios (`search`, `clear`) que só se registram com `addEventListener`. O autor avisa que o exemplo ignora acessibilidade (ARIA) e que, na prática, muitos componentes são feitos com bibliotecas como lit-element, porque fazer componentes reutilizáveis direito é difícil.

**Usar um componente:** carregue o JavaScript (em geral um módulo, com `<script type="module">`) e use a tag, com atributos e, se previstos, filhos em **slots** nomeados (`<img slot="left">`). Como módulos rodam depois da análise do HTML, a tag aparece antes de ser definida; esconda-a por CSS até lá (`:not(:defined)`, inferência minha do trecho) para não "pular" a página.

## Por que importa

Dá componentes encapsulados sem framework, coerente com a stack do projeto.

## Como se relaciona

Veja módulos ES6 em JavaScript, usar módulos JavaScript no navegador, CSS modular (a mesma ideia de encapsulamento) e escopo em CSS com @scope (comparado ao shadow DOM).

## Notas do Claude

A seção 15.6 foi completada (shadow DOM, slots e o exemplo). O código do exemplo só foi lido nos comentários e nos métodos principais.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[escopo-em-css-com-scope]] — esta nota cita a ideia de «Escopo em CSS com @scope» na seção sobre como se relaciona
- [[modulos-es6-em-javascript]] — esta nota cita a ideia de «Módulos ES6 em JavaScript» na seção sobre como se relaciona
- [[usar-modulos-javascript-no-navegador]] — esta nota cita a ideia de «Usar módulos JavaScript no navegador» na seção sobre como se relaciona
- [[css-modular-modulos-variantes-e-bem]] — a mesma ideia de encapsulamento
- [[criar-inserir-e-remover-nos-do-dom]] — DocumentFragment e clonagem usam a API de nós
- [[selecao-de-elementos-no-dom]] — o shadow DOM esconde elementos do querySelector
- [[propagacao-e-cancelamento-de-eventos]] — a fronteira do shadow DOM altera o `target` dos eventos
- [[svg-no-html-e-por-javascript]] — templates servem para guardar ícones SVG
