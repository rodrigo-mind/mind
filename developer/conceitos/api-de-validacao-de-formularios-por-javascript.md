---
titulo: "API de validação de formulários por JavaScript (checkValidity e setCustomValidity)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 31, tabelas 31-25 e 31-26 e resumo (PDF p. 778-803)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# API de validação de formulários por JavaScript

## Definição

Cada elemento HTML tem um objeto próprio no DOM. Segundo o livro, a maioria desses objetos só espelha atributos, com duas exceções úteis: os de **formulário** (validação e envio) e os de **tabela** (montar conteúdo).

**Formulário (`HTMLFormElement`):**

- `elements` dá os campos; `length`, `form[nome]` e `form[indice]` acessam um campo;
- `submit()` e `reset()` enviam e limpam o formulário;
- `checkValidity()` devolve `true` só se todos os campos passam na validação;
- `noValidate` corresponde ao atributo `novalidate`.

**Campo (`HTMLInputElement`):**

- `willValidate`: se o campo será validado no envio;
- `validity`: um `ValidityState`, que diz o que está errado;
- `validationMessage`: a mensagem que o navegador mostraria;
- `checkValidity()`: valida só esse campo;
- `setCustomValidity(mensagem)`: define um erro próprio;
- `valueAsNumber` e `valueAsDate`: leem o valor já convertido;
- `stepUp()` e `stepDown()`;
- `labels`: os rótulos ligados ao campo.

**Tabela:** `createTHead()` e `insertRow(indice)`, entre outros, montam linhas sem criar cada nó à mão.

## Por que importa

Permite validações que o HTML sozinho não faz (por exemplo, "confirmar senha" igual à senha) usando a mesma interface de erro do navegador.

## Como se relaciona

Complementa a validação nativa de formulários HTML5 e a estrutura de formulários HTML5. Segue valendo a regra a validação no navegador não substitui a do servidor (ver validar formulários em PHP).

## Notas do Claude

- O livro só lista os membros em tabelas, sem exemplo. O uso a seguir é inferência minha: chame `campo.setCustomValidity("As senhas não conferem")` quando houver erro e `campo.setCustomValidity("")` quando estiver certo. Uma mensagem não vazia mantém o campo inválido até ser limpa.
- `form.reportValidity()`, que mostra as mensagens na tela, não aparece no livro (2012). Confira o suporte atual.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[validacao-nativa-de-formularios-html5]] — estende a validação nativa do HTML5 com a API de script (checkValidity, setCustomValidity)
- [[estrutura-de-formularios-html5]] — parte dos objetos de formulário e de campo descritos aqui são os do formulário HTML5
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — a validação por script é só do lado do navegador e não dispensa a do servidor
- [[validar-formularios-em-php]] — a validação do servidor continua obrigatória depois da do navegador
