---
titulo: "Construir um modal e um menu suspenso com posicionamento"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 6, seções 6.1 a 6.3 (PDF p. 183-197; impressa 153-167)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Construir um modal e um menu suspenso com posicionamento

## Para que serve

Criar os dois componentes de interface mais comuns que dependem de posicionamento, controlando o estado por uma classe, com pouco JavaScript.

## Quando usar e quando não usar

Use quando precisar do comportamento e da aparência personalizados. O livro lembra que o HTML tem o elemento `<dialog>`, com muito do comportamento de modal pronto; o exemplo não o usa para ilustrar o posicionamento fixo (inferência minha: conferir o `<dialog>` em código novo).

## O que perguntar ao usuário antes

- O modal bloqueia a página? O menu precisa funcionar por teclado e por toque?

## Passos

**Modal (posicionamento fixo):**
1. Marque o modal com um fundo (`modal-backdrop`) vazio e um corpo (`modal-body`); esconda com `display: none` e mostre com `display: block` por uma classe (`is-open`) que o JavaScript acrescenta e remove.
2. O fundo é `position: fixed; inset: 0` com cor semitransparente (`rgb(0 0 0 / 0.5)`, em que o quarto valor é o canal alfa); o corpo, `position: fixed` com os lados definidos para centralizar, e fundo branco.
3. Para impedir a rolagem da página, aplique `overflow: hidden` ao `body` por uma classe (`no-scroll`) que o JavaScript liga e desliga; em navegadores com `:has()`, dá para fazer só no CSS.
4. Botão de fechar: `position: absolute` dentro do corpo (que é posicionado, logo vira o bloco contêiner), com `top` e `right` pequenos. Para mostrar um ×, esconda o texto empurrando-o com `text-indent` e ponha o × em `::after` (o caractere de multiplicação, `\00D7`): o texto "fechar" fica no HTML para os leitores de tela.
5. Resolva a ordem de empilhamento com `z-index` (fundo 1, corpo 2) ou deixando o modal no fim do `body`.

**Menu suspenso (relative + absolute):**
1. O contêiner do menu é `position: relative` (âncora); o menu é `position: absolute`, com `left: 0` e `min-width: 100%`, oculto até `is-open`.
2. Um pequeno JavaScript alterna `is-open` ao clicar no botão.
3. **Seta triangular só com CSS:** uma borda grossa em um elemento sem largura nem altura vira quatro triângulos; deixe só a borda superior colorida e as laterais `transparent` (o `::after` posicionado de forma absoluta no rótulo), e inverta (borda inferior) quando o menu está aberto.
4. **Acessibilidade:** tudo deve funcionar só com o teclado (Tab para chegar ao botão, espaço para abrir, Tab para percorrer os itens).

## Saída esperada

Um modal que bloqueia a página e um menu que abre sob o botão, ambos controlados por classes.

## Erros comuns

- Deixar o menu suspenso à frente do modal por ordem do HTML (use `z-index`).
- Substituir o texto do botão por um ×, sem texto acessível.
- Menu no canto direito que vaza da tela: alinhe-o à direita, estendendo-o para a esquerda.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
.modal { display: none; }
.modal.is-open { display: block; }
.modal-backdrop { position: fixed; inset: 0; background: rgb(0 0 0 / 0.5); z-index: 1; }
.modal-body { position: fixed; inset: 20% 10% auto; background: #fff; z-index: 2; }
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[tipos-de-posicionamento-em-css]] — o framework aplica fixed, absolute e relative
- [[eventos-no-navegador]] — o JavaScript do modal responde a eventos de clique
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — as dimensões do modal em unidades relativas
- [[elementos-de-secao-semanticos-html5]] — o elemento dialog é a alternativa nativa de modal
- [[css-modular-modulos-variantes-e-bem]] — o dropdown e o menu do capítulo 9 refazem o exemplo de posicionamento
