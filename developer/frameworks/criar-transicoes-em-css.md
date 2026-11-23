---
titulo: "Criar transições em CSS (transition)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 15 (PDF p. 441-460)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Criar transições em CSS

## Para que serve

Fazer uma mudança de estilo acontecer aos poucos, como a cor de um link no hover ou um menu que abre, em vez de mudar de uma vez.

## Quando usar e quando não usar

- **Use** para mudanças entre dois estados: hover, foco, ou uma classe adicionada por JavaScript.
- Para movimentos com vários passos, ou que voltam ao começo, use animações com keyframes.

## O que perguntar ao usuário antes

- Que propriedade muda, e entre quais estados?
- A transição deve ser sutil (uma interface) ou chamar atenção?

## Passos

1. Ponha as propriedades `transition-*` no estado **normal** do elemento, e não no `:hover`. Assim a transição vale na ida e na volta.
2. Use o atalho `transition: propriedade duração função atraso`. Por exemplo, `transition: background-color 0.3s ease-out`. Para várias, separe por vírgula. `all` é o padrão.
3. **Duração:** como regra prática do livro, a maioria das transições fica entre **200 e 500 ms**. Tempo exige unidade: `0s`, e não `0`.
4. **Função de tempo:**
   - `linear`: ritmo constante;
   - `ease-in`: começa devagar e acelera;
   - `ease-out`: começa rápido e desacelera;
   - `ease-in-out`: devagar nas duas pontas;
   - `cubic-bezier()`: curva própria;
   - `steps()`: saltos.
5. **Propriedades que não interpolam:** propriedades "discretas", como `display`, mudam de uma vez. `visibility` é animável, mas não esmaece: ela obedece ao atraso. Para esmaecer, combine `opacity` com `visibility`.
6. **Altura até `auto`:** não dá para transicionar de `0` para `auto`. O livro mede a altura do conteúdo com JavaScript (`scrollHeight`) e aplica o valor. Cuidado: `scrollHeight` vale 0 se o elemento estiver com `display: none`.
7. Para agir quando a transição terminar, use o evento `transitionend` no JavaScript.
8. Respeite a regra de movimento reduzido (ver a regra respeite prefers-reduced-motion).

## Saída esperada

Uma mudança de estado suave, com duração e ritmo escolhidos, que funciona na ida e na volta.

## Erros comuns

- Pôr a transição só no `:hover`: a volta fica brusca.
- Escrever `0` sem unidade no tempo: a declaração é inválida.
- Transicionar `width`, `height`, `top` ou `left` em elementos grandes: fica lento (ver a regra anime só transform e opacity).
- Fazer em JavaScript o que o CSS faz: o livro diz que o CSS é mais otimizado no navegador.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
.botao {
  background-color: #0a7;
  transition: background-color 0.2s ease-out, transform 0.2s ease-out;
}
.botao:hover { background-color: #086; transform: translateY(-2px); }
```

## Notas do Claude

O livro também mostra como registrar propriedades personalizadas com `@property`, informando a sintaxe (`<color>`, `<length>`...). Isso permite transicionar variáveis CSS, que normalmente não interpolam.

## Conexões

- [[animacoes-com-keyframes-em-css]] — a animação por keyframes é o recurso para movimentos com vários passos
- [[filtros-mascaras-e-recortes-em-css]] — as transições são usadas nos filtros de galeria
- [[regra-anime-so-transform-e-opacity]] — as transições devem animar só propriedades baratas
- [[regra-respeite-prefers-reduced-motion]] — as transições devem respeitar a preferência de movimento reduzido
- [[transformacoes-em-css]] — as transformações são o que a transição anima nos efeitos de hover
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[eventos-no-navegador]] — `transitionend` é o evento do fim da transição
- [[propriedades-personalizadas-do-css]] — `@property` permite transicionar variáveis CSS
- [[controlar-css-por-javascript]] — o JavaScript dispara a transição ao trocar uma classe
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
