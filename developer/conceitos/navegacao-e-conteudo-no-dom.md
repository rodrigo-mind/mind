---
titulo: "Navegar pela árvore do DOM, atributos e conteúdo de elementos"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seções 15.3.2 a 15.3.4 (PDF p. 459-466)"
  - "Adam Freeman, The Definitive Guide to HTML5, caps. 26 e 28 (PDF p. 640-665 e 692-720)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Navegar pela árvore do DOM, atributos e conteúdo de elementos

## Navegação pela árvore

- **Só elementos:** `parentNode`, `children` (só filhos que são elementos), `childElementCount`, `firstElementChild`, `lastElementChild`, `nextElementSibling` e `previousElementSibling`. Ignoram nós de texto e de comentário (e os espaços entre elementos, que também são texto).
- **Todos os nós:** `childNodes`, `firstChild`, `lastChild`, `nextSibling`, `previousSibling`, `nodeType` (9 documento, 1 elemento, 3 texto, 8 comentário), `nodeValue` e `nodeName` (nome da tag em maiúsculas). Esta API é sensível a variações do texto: uma quebra de linha a mais entre as tags muda o resultado.
- Para o texto de um elemento, use `textContent`, e não uma função recursiva.

## Atributos

- `getAttribute()`, `setAttribute()`, `hasAttribute()` e `removeAttribute()` valem para qualquer atributo, mas os atributos padrão de elementos HTML são propriedades do objeto (`img.src`, `form.action`, `form.method`). O nome da propriedade fica em minúsculas, com maiúscula nas palavras seguintes (`tabIndex`). `for` vira `htmlFor` e `class` vira `className`. Valores booleanos e numéricos viram booleano e número. Não dá para remover atributo com `delete`: use `removeAttribute()`.
- Em um `<input>`, o atributo `value` corresponde à propriedade `defaultValue`; a propriedade `value` guarda o que o usuário digitou, e mexer nela não altera o atributo.
- **`classList`:** trata o atributo `class` como conjunto de classes, com `add()`, `remove()`, `contains()` e `toggle()`; é mais cômodo que a string de `className`.
- **`dataset`:** atributos `data-*` são válidos em HTML e ficam na propriedade `dataset`, com `data-section-number` virando `dataset.sectionNumber`. Servem para anexar informações sem afetar a apresentação.

## Conteúdo

- `innerHTML` lê ou define o conteúdo como marcação HTML (o navegador analisa o texto e substitui o conteúdo). Acrescentar com `+=` é ineficiente (serializa e analisa de novo). `outerHTML` inclui o próprio elemento, e `insertAdjacentHTML()` insere marcação nas posições `beforebegin`, `afterbegin`, `beforeend` e `afterend`.
- Para texto puro, sem escapar `<` e `&`, o caminho padrão é `textContent`.

## Como se relaciona

Usa a seleção de elementos (ver selecionar elementos). A regra de nunca inserir entrada do usuário com `innerHTML` cobre o risco principal.

## Notas do Claude

Confiança média: li a navegação e os atributos com cuidado; o conteúdo como texto e a criação, inserção e exclusão de nós (15.3.5) não foram lidos por inteiro.

- Confirmado também por Freeman (caps. 26 e 28): navegação pela árvore, atributos, `innerHTML`, `outerHTML` e `insertAdjacentHTML`. `isSameNode()` diz se dois objetos são o mesmo elemento; `isEqualNode()` diz se são iguais em atributos e conteúdo, mesmo sendo elementos diferentes.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[selecao-de-elementos-no-dom]] — selecionar e percorrer a árvore são os dois passos de ler o documento
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — a regra trata do risco do innerHTML descrito aqui
- [[links-e-urls-relativas-em-html]] — a navegação por âncora e a leitura do DOM trabalham sobre os mesmos elementos
- [[criar-inserir-e-remover-nos-do-dom]] — completa a leitura e o conteúdo com a edição por nós
- [[atributos-globais-booleanos-e-data-em-html]] — os atributos data-* são lidos pelo DOM
- [[xml-imagens-e-pdf-com-php]] — o DOM do PHP para XML segue o modelo de nós do DOM do navegador
