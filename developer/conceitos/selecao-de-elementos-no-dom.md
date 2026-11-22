---
titulo: "Selecionar elementos do documento (DOM)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.3.1 (PDF p. 456-459)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Selecionar elementos do documento (DOM)

## Definição

O objeto `document` (propriedade de `window`) é o ponto central para ler e alterar o conteúdo de uma página. Tem `head` e `body`; para elementos mais fundos, é preciso selecioná-los.

- **`querySelector(seletor)`** devolve o primeiro elemento que casa com um seletor CSS, ou `null`. **`querySelectorAll(seletor)`** devolve todos, em uma `NodeList`: um objeto parecido com vetor, com `length`, índices e iterável (use `for/of`; para virar vetor de verdade, `Array.from()`). Os dois existem também em `Element`, e então buscam só abaixo dele. Pseudoelementos (`::first-line`) não casam, e muitos navegadores não devolvem `:link` e `:visited` (para não expor o histórico).
- **`closest(seletor)`** (em `Element`) devolve o próprio elemento, se casar, ou o ancestral mais próximo que casar, ou `null`. É o contrário de `querySelector`, que procura abaixo. Útil quando o tratador de evento está num elemento alto da árvore e o alvo do clique pode ser o texto dentro de um link.
- **`matches(seletor)`** só testa se o elemento casa e devolve `true` ou `false`.
- **Métodos antigos** (`getElementById()`, `getElementsByClassName()`, etc.) são quase obsoletos, embora `getElementById()` ainda apareça; as listas deles são "vivas" (o conteúdo muda quando o documento muda), ao contrário das do `querySelectorAll`.
- Atalhos históricos: `document.images`, `document.forms` e `document.links` (coleções `HTMLCollection`, que também se indexam por id ou nome). `document.all` está obsoleto.

## Sintaxe dos seletores (resumo do livro)

Tag (`div`), id (`#nav`), classe (`.warning`), atributo (`p[lang="fr"]`), descendente (`#log span`), filho direto (`#log>span`), irmão imediato (`img + p.caption`), irmão posterior (`h2 ~ p`) e lista com vírgula (`button, input[type="button"]`).

## Como se relaciona

Usado com eventos (ver eventos no navegador) e com a navegação pela árvore (ver navegação e conteúdo do DOM). A especificidade dos seletores em CSS também usa essa sintaxe (ver especificidade de seletores).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[eventos-no-navegador]] — esta nota cita a ideia de «Eventos no navegador» na seção sobre como se relaciona
- [[navegacao-e-conteudo-no-dom]] — selecionar e percorrer a árvore são os dois passos de ler o documento
- [[regra-carregue-scripts-com-defer-ou-async]] — um script só acha elementos que o navegador já leu
- [[criar-inserir-e-remover-nos-do-dom]] — para inserir perto de um nó é preciso selecioná-lo antes
- [[tabelas-em-html5]] — o tbody automático afeta os seletores
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — o shadow DOM esconde elementos do querySelector
