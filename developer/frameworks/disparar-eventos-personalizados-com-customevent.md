---
titulo: "Disparar eventos personalizados com CustomEvent"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.2.6 (PDF p. 454-455)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Disparar eventos personalizados com CustomEvent

## Para que serve

Fazer uma parte do código avisar que algo aconteceu sem precisar saber quem vai reagir. No exemplo do livro, um módulo de rede anuncia que está ocupado, e o módulo da interface decide onde mostrar o indicador de carregamento.

## Quando usar e quando não usar

- **Use** para desacoplar módulos do front-end, como rede e interface, ou um componente e a página que o usa.
- **Não use** quando uma chamada direta de função resolve: o evento esconde quem depende de quem (inferência minha).

## O que perguntar ao usuário antes

- Qual nome de evento usar, e que dados ele carrega?
- Em que alvo disparar: no `document`, que todos podem ouvir, ou num elemento específico?

## Passos

1. Escolha um alvo de eventos. Todo objeto com `addEventListener()` também tem `dispatchEvent()`.
2. Crie o evento: `new CustomEvent("nome", { detail: valor })`. O dado vai em `detail` (texto, objeto ou outro valor).
3. Se o alvo for um elemento e o evento deve subir pela árvore, acrescente `bubbles: true`.
4. Dispare: `alvo.dispatchEvent(evento)`.
5. Em outro ponto do código, ouça com `alvo.addEventListener("nome", e => ... e.detail ...)`.

## Saída esperada

Um evento próprio que qualquer módulo pode ouvir, com os dados em `event.detail`.

## Erros comuns

- Esquecer `bubbles: true` e ouvir no ancestral: o evento não chega.
- Pôr os dados fora de `detail`.
- Confiar num evento que outro script pode disparar: eventos criados por código chegam com `isTrusted` igual a `false`.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```js
// rede.js
document.dispatchEvent(new CustomEvent("carregando", { detail: true }));
fetch("/api/produtos.php")
  .finally(() => document.dispatchEvent(new CustomEvent("carregando", { detail: false })));

// interface.js
document.addEventListener("carregando", (e) => {
  document.querySelector("#spinner").hidden = !e.detail;
});
```

## Notas do Claude

É o padrão Observer aplicado ao DOM.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[padrao-observer]] — é o Observer aplicado ao DOM
- [[eventos-no-navegador]] — usa o modelo de eventos e a propagação
- [[propagacao-e-cancelamento-de-eventos]] — `bubbles: true` faz o evento subir pela árvore
- [[acoplamento-e-desacoplamento]] — o evento desacopla o módulo que avisa do que reage
