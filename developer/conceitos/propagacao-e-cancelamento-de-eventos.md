---
titulo: "Propagação e cancelamento de eventos (bubbling, capturing e delegação)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seções 15.2.4 e 15.2.5 (PDF p. 453-454)"
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 30 (PDF p. 750-777)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Propagação e cancelamento de eventos

## Definição

Quando o alvo de um evento é a janela ou outro objeto isolado, só os tratadores dele rodam. Quando o alvo é o documento ou um elemento, o evento percorre a árvore do DOM em três fases:

1. **Captura (capturing):** do `Window` para baixo, passando pelo documento, pelo `body` e pelos ancestrais até o pai do alvo, rodando só os tratadores registrados com `capture: true`. Os de captura registrados no próprio alvo não rodam.
2. **Alvo:** rodam os tratadores do próprio elemento.
3. **Borbulha (bubbling):** o evento sobe pelo pai, pelo avô e assim por diante até o documento e a janela.

A maioria dos eventos de elementos borbulha. As exceções citadas pelo livro são `focus`, `blur` e `scroll`. O `load` de um elemento sobe até o documento, mas não chega à janela: o `load` da janela só dispara quando o documento inteiro carregou.

**Cancelamento:**

- `preventDefault()` cancela a **ação padrão** do navegador (seguir o link, digitar a tecla, rolar a tela). Não funciona em tratadores registrados como passivos.
- `stopPropagation()` impede que o evento chegue a tratadores de **outros** objetos (funciona em qualquer fase). Os demais tratadores do mesmo objeto ainda rodam.
- `stopImmediatePropagation()` faz o mesmo e também bloqueia os tratadores seguintes do **mesmo** objeto.

## Por que importa

- A borbulha permite a **delegação**: em vez de um tratador por elemento, registre um só no ancestral comum. O exemplo do livro é um `change` no `<form>`, em vez de um em cada campo.
- A captura permite olhar um evento antes do alvo: para depurar, para filtrar eventos (junto com o cancelamento) ou para arrastar, quando os movimentos do mouse devem ir para o objeto arrastado e não para os elementos por onde ele passa.

## Como se relaciona

Os termos (alvo, tratador, ação padrão) estão em eventos no navegador; o registro está em registrar tratadores de eventos com addEventListener. Eventos que saem de um shadow DOM chegam com o hospedeiro como alvo (ver componentes web).

## Notas do Claude

- Na delegação, use `event.target.closest("seletor")` para descobrir qual item foi clicado. Isso também cobre itens inseridos depois no DOM, como linhas de uma tabela carregadas por `fetch`. É inferência minha: o livro só descreve a ideia de registrar no ancestral.
- Use `stopPropagation()` com parcimônia: ele quebra outros tratadores que dependem da borbulha, como os que fecham um menu ao clicar fora (inferência minha).

- Confirmado também por Freeman (cap. 30): as três fases, `target` e `currentTarget`, `stopPropagation` e `stopImmediatePropagation`. No texto dele, a captura começa no `body`; no de Flanagan, começa no `Window`.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[eventos-no-navegador]] — define os termos (alvo, tratador, ação padrão) que esta nota aprofunda
- [[registrar-tratadores-de-eventos-com-addeventlistener]] — a opção `capture` do registro escolhe a fase de captura
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — eventos que saem de um shadow DOM chegam com o hospedeiro como alvo
- [[regra-chame-preventdefault-no-inicio-do-tratador]] — trata do momento certo de chamar preventDefault
- [[disparar-eventos-personalizados-com-customevent]] — eventos personalizados só sobem pela árvore se pedirem borbulha
- [[arrastar-e-soltar-com-a-api-nativa-do-html5]] — o cancelamento da ação padrão é o que habilita o soltar
