---
titulo: "Criar, inserir e remover nós do DOM"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.3.5 (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Criar, inserir e remover nós do DOM

## Definição

Além de alterar o conteúdo por texto ou HTML, dá para mexer no documento nó a nó:

- **Criar:** `document.createElement("p")` devolve um elemento vazio.
- **Acrescentar dentro:** `append()` (no fim) e `prepend()` (no início) aceitam qualquer número de argumentos, nós ou textos; os textos viram nós de texto automaticamente (`createTextNode` raramente é preciso).
- **Inserir ao lado:** com uma referência a um irmão, `before()` e `after()` inserem antes e depois; funcionam também em nós de texto.
- **Mover, não copiar:** um elemento só existe em um lugar; inserido em outro ponto, ele é **movido**. Para copiar, use `cloneNode(true)` (o `true` copia todo o conteúdo).
- **Remover e trocar:** `remove()` tira o nó; `replaceWith(...)` o troca por textos ou elementos.
- **Métodos antigos:** `appendChild()`, `insertBefore()`, `replaceChild()` e `removeChild()` são mais difíceis de usar, e segundo o livro nunca deveriam ser necessários.

## Por que importa

Montar a interface por nós evita a injeção de HTML, porque o texto vira nó de texto e não é interpretado como marcação.

## Como se relaciona

Complementa seleção de elementos no DOM e navegação e conteúdo no DOM; a regra sobre `innerHTML` está em nunca insira entrada do usuário com innerHTML.

## Notas do Claude

O livro mostra um exemplo longo (geração de um sumário de documento) que não li em detalhe.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[selecao-de-elementos-no-dom]] — para inserir perto de um nó é preciso selecioná-lo antes
- [[navegacao-e-conteudo-no-dom]] — completa a leitura e o conteúdo com a edição por nós
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — nós de texto evitam a injeção de HTML
- [[regra-escape-a-saida-contra-xss]] — criar nós de texto é uma forma de escapar a saída no cliente
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — DocumentFragment e clonagem usam a API de nós
