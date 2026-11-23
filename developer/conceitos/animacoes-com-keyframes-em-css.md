---
titulo: "Animações com keyframes em CSS (@keyframes e animation)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 17 (PDF p. 489-510)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Animações com keyframes em CSS

## Definição

Uma animação define vários **quadros-chave** (keyframes), e o navegador preenche os quadros intermediários. A diferença para a transição: a transição vai de um estado a outro; a animação pode ter vários passos e voltar ao ponto de partida.

- **Duas partes:** `@keyframes nome { 0% {...} 50% {...} 100% {...} }` define os quadros, e `animation` aplica ao elemento.
- **Propriedades:** `animation-name`, `animation-duration`, `animation-timing-function`, `animation-delay`, `animation-iteration-count` (um número ou `infinite`), `animation-direction` e `animation-fill-mode`.
- Uma propriedade que não aparece num quadro é interpolada entre os quadros vizinhos.
- **Precedência:** enquanto uma propriedade está sendo animada, o valor da animação vence qualquer outra regra da folha de estilo, independentemente da especificidade. Para o livro, as animações são uma origem de prioridade mais alta na cascata.
- **`animation-fill-mode`:**
  - `none` (padrão): os estilos da animação não valem antes nem depois dela;
  - `backwards`: aplica o primeiro quadro antes de a animação começar. Evita o "pulo" quando há atraso, como no exemplo do livro, em que itens surgem um depois do outro com `animation-delay` escalonado;
  - `forwards`: mantém o último quadro depois do fim;
  - `both`: as duas coisas.
- **3D:** no exemplo do livro, cartões entram "voando" com `perspective` no contêiner, `translateZ` e `rotateY` nos quadros, e `opacity` para surgir.

## Por que importa

Dá movimentos de entrada, indicadores de carregamento e chamadas de atenção sem JavaScript.

## Como se relaciona

Use só propriedades baratas (ver a regra anime só transform e opacity) e respeite a regra de movimento reduzido. As transformações estão em transformações em CSS, e as transições simples em criar transições em CSS.

## Notas do Claude

Confiança média: li a definição, as propriedades, a precedência e o `fill-mode`. O exemplo completo da página, com a grade e os detalhes do 3D, foi só folheado.

## Conexões

- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[criar-transicoes-em-css]] — a transição vai de um estado a outro, e a animação tem vários passos
- [[transformacoes-em-css]] — os quadros da animação costumam usar transform
- [[regra-anime-so-transform-e-opacity]] — a regra diz quais propriedades animar com custo baixo
- [[regra-respeite-prefers-reduced-motion]] — as animações devem respeitar o pedido de movimento reduzido
- [[cascata-do-css]] — o valor de uma propriedade animada vence qualquer outra regra, como origem de maior prioridade na cascata
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
