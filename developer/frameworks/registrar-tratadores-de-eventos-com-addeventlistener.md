---
titulo: "Registrar tratadores de eventos com addEventListener"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seções 15.2.2 e 15.2.3 (PDF p. 448-453)"
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 30 (PDF p. 750-777)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Registrar tratadores de eventos com addEventListener

## Para que serve

Fazer o JavaScript responder a cliques, envios de formulário, teclas e outros eventos do navegador, sem apagar tratadores registrados por outro código.

## Quando usar e quando não usar

- **Use** `addEventListener()` como forma padrão em qualquer alvo (janela, documento, elemento).
- A propriedade `on<evento>` (`form.onsubmit = ...`) funciona, mas só guarda **um** tratador por tipo: um segundo registro apaga o primeiro. Serve para scripts mínimos.
- **Não use** atributos no HTML (`onclick="..."`); ver a regra não defina tratadores de evento em atributos HTML.

## O que perguntar ao usuário antes

- Qual elemento recebe o evento e qual tipo (`click`, `submit`, `input`, `change`)?
- O tratador precisa cancelar a ação padrão (por exemplo, não enviar um formulário inválido)?
- Ele deve rodar uma vez só, ou ser removido depois?

## Passos

1. Selecione o alvo (ver selecionar elementos do documento) e chame `alvo.addEventListener(tipo, funcao, opcoes)`. O tipo vai **sem** o prefixo `on` (`"click"`, não `"onclick"`).
2. Se precisar remover depois, guarde a função numa variável ou declare-a com nome: `removeEventListener()` exige a **mesma** função (e o mesmo `capture`, se foi usado).
3. Escolha as opções no terceiro argumento, um objeto:
   - `once: true` remove o tratador depois da primeira vez;
   - `passive: true` avisa que o tratador nunca chama `preventDefault()`, o que permite rolagem suave em `touchmove` e `mousewheel` (o Chrome e o Firefox já tornam esses dois passivos por padrão: se quiser cancelá-los, passe `passive: false`);
   - `capture: true` registra na fase de captura (ver propagação e cancelamento de eventos). Passar só `true` equivale a isso.
4. No corpo do tratador, use o objeto do evento recebido como argumento: `type`, `target` (onde ocorreu), `currentTarget` (onde o tratador foi registrado), `timeStamp` (relativo, bom para medir intervalos), `isTrusted` (`true` se veio do navegador, `false` se foi disparado por código) e os campos próprios do tipo (`clientX`, `clientY` em mouse e ponteiro).
5. Para cancelar a ação padrão, chame `event.preventDefault()`. Não dependa de `return false`: em código moderno os tratadores não devolvem nada.

## Saída esperada

Um ou mais tratadores ativos no elemento, chamados na ordem em que foram registrados.

## Erros comuns

- Usar função de seta e esperar que `this` seja o elemento: nas funções comuns, `this` é o alvo em que o tratador foi registrado; nas de seta, `this` é o do escopo onde ela foi escrita. Use `event.currentTarget` (ver funções de seta e o valor de this).
- Tentar remover com uma função anônima nova: ela é outra função, e nada é removido.
- Registrar o mesmo par tipo e função duas vezes achando que roda em dobro: o segundo registro é ignorado.
- Esperar que `addEventListener` e `onclick` se substituam: os dois rodam, na ordem de registro.
- Chamar `preventDefault()` num tratador registrado com `passive: true`: não tem efeito.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```js
const form = document.querySelector("#contato");
form.addEventListener("submit", (event) => {
  if (!form.checkValidity()) {
    event.preventDefault(); // não envia
  }
});
```

## Notas do Claude

- O padrão de arrastar descrito pelo livro (registrar `mousemove` e `mouseup` no `mousedown` e removê-los no `mouseup`) é um bom exemplo de quando guardar a referência da função.
- Validar no navegador não dispensa validar no PHP (ver a regra a validação no navegador não substitui a do servidor).

- Freeman (cap. 30) aponta um erro comum: registrar `tratador()` com parênteses em vez de `tratador`. Isso chama a função na hora em que o script roda, e não quando o evento ocorre.

## Conexões

- [[propagacao-e-cancelamento-de-eventos]] — o registro com `capture` e `passive` depende das fases de propagação
- [[regra-chame-preventdefault-no-inicio-do-tratador]] — o corpo do tratador deve cancelar a ação padrão cedo
- [[regra-nao-defina-tratadores-de-evento-em-atributos-html]] — a regra proíbe os atributos e manda registrar com addEventListener
- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[eventos-no-navegador]] — define o modelo e os termos usados nos passos
- [[funcoes-de-seta-e-o-valor-de-this]] — o valor de `this` no tratador depende de a função ser comum ou de seta
- [[selecao-de-elementos-no-dom]] — o alvo do tratador é obtido pela seleção de elementos
