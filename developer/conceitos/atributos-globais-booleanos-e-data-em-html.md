---
titulo: "Atributos globais, booleanos e data-* em HTML"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 3 (PDF p. 14-39) e cap. 1 (PDF p. 4-9)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Atributos globais, booleanos e data-* em HTML

## Definição

- **Elementos vazios (void):** alguns elementos não aceitam conteúdo, como `hr`, `br`, `img` e `input`. Podem ser escritos só com a tag de abertura (`<hr>`) ou com a barra (`<hr />`).
- **Atributos booleanos:** basta o nome para ligar (`<input disabled>`), ou o valor vazio (`disabled=""`). Para desligar, remova o atributo: qualquer valor o liga, inclusive `disabled="false"` (conhecimento meu; o livro mostra o nome sozinho e o valor vazio).
- **Atributos próprios com `data-`:** você pode criar atributos com o prefixo `data-` (`data-produto-id="42"`). O prefixo evita conflito com atributos que versões futuras do HTML venham a criar. É a forma oficial de algo que no HTML4 se fazia sem padrão, porque os navegadores ignoravam atributos desconhecidos.
- **Atributos globais** (valem em qualquer elemento):
  - `id`, que identifica o elemento de forma única, e `class`, que agrupa elementos para o CSS e o JavaScript;
  - `style` (estilo direto) e `title` (informação extra, mostrada como dica);
  - `lang` (idioma do conteúdo) e `dir` (direção do texto, `ltr` ou `rtl`);
  - `hidden` (o elemento não é relevante agora e não aparece);
  - `tabindex` (ordem do foco com a tecla Tab) e `accesskey` (atalho de teclado);
  - `contenteditable` (o usuário pode editar o conteúdo) e `spellcheck` (correção ortográfica);
  - `draggable` (pode ser arrastado; ver arrastar e soltar).

**Contexto (cap. 1):** o HTML5 tenta trazer para o navegador o conteúdo rico que dependia de plug-ins como o Flash, e continua o esforço de separar o **significado** dos elementos da sua **apresentação**, deixando a aparência com o CSS. O autor diz que HTML e JavaScript estão tão ligados que não faz sentido separá-los: a especificação do HTML5 já conta com o JavaScript.

## Por que importa

`data-*` liga o HTML gerado pelo PHP ao JavaScript sem inventar atributos fora do padrão. `lang="pt-BR"` ajuda leitores de tela e buscadores.

## Como se relaciona

A estrutura do documento está em estrutura básica de um documento HTML5. O acesso pelo JavaScript (`elemento.dataset.produtoId`) está em navegação e conteúdo no DOM. A escolha dos elementos está na regra escolha o elemento HTML mais específico.

## Notas do Claude

- Confiança média: o capítulo 3 foi lido nas seções de elementos, atributos e atributos globais; os capítulos 1 e 2 (história e preparação) foram folheados. Os capítulos 4 e 5 (introdução ao CSS e ao JavaScript) repetem o que as notas de CSS in Depth e de JavaScript já cobrem e não geraram nota.
- Livro de 2012: os atributos `contextmenu` e `dropzone` da tabela do livro foram abandonados pelos navegadores (conhecimento meu).
- Atenção: `tabindex` com número maior que 0 bagunça a ordem natural do foco; use só `0` ou `-1` (conhecimento meu).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[estrutura-basica-de-um-documento-html5]] — os atributos globais valem nos elementos do documento descrito ali
- [[navegacao-e-conteudo-no-dom]] — o JavaScript lê os atributos `data-*` por `dataset`
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — atributos globais, como `hidden` e `lang`, entram na decisão de marcação
- [[arrastar-e-soltar-com-a-api-nativa-do-html5]] — `draggable` é o atributo global que habilita o arrasto
