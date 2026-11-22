---
titulo: "Modo estrito em JavaScript (use strict)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 5, seção 5.6.3 (PDF p. 115-146)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Modo estrito em JavaScript (`"use strict"`)

## Definição

Subconjunto restrito da linguagem que corrige deficiências e dá mais verificação de erros e segurança. A diretiva `"use strict"` é uma instrução de expressão com um texto literal, só valendo no **início de um script ou do corpo de uma função**. O código é estrito se está sob a diretiva, ou **dentro de um corpo de `class` ou de um módulo ES6** (módulos e classes são sempre estritos). Código passado a `eval` é estrito se quem chama é estrito ou se o texto começa com a diretiva.

Diferenças, as três principais primeiro:
1. `with` é proibido.
2. Atribuir a identificador não declarado lança `ReferenceError` (no modo normal, cria variável global).
3. Em funções chamadas como função, `this` é `undefined` (no modo normal, o objeto global); com `call` e `apply`, `this` é exatamente o primeiro argumento.

Outras: atribuir a propriedades não graváveis ou criar propriedades em objetos não extensíveis lança `TypeError`; `eval` não declara variáveis no escopo de quem chama; o objeto `arguments` é uma cópia estática; `delete` de identificador é erro de sintaxe; objetos literais com propriedades repetidas, parâmetros de função com o mesmo nome e literais octais são erro de sintaxe; `eval` e `arguments` são tratados como palavras-chave; `arguments.caller` e `arguments.callee` lançam erro.

## Por que importa

Se todo o código é módulo ou classe, já é estrito e a diretiva é dispensável.

## Como se relaciona

Veja módulos ES6 em JavaScript, classes com a palavra class (corpo estrito), `eval()` em JavaScript e declaração de variáveis (let, const e var).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modulos-es6-em-javascript]] — esta nota cita a ideia de «Módulos ES6 em JavaScript» na seção sobre como se relaciona
- [[eval-em-javascript]] — «eval» cita esta nota ao explicar suas relações
- [[classes-com-a-palavra-class-em-javascript]] — o corpo de classe é estrito
- [[funcoes-de-seta-e-o-valor-de-this]] — em modo estrito, this é undefined em chamadas simples
- [[regra-strict-types-em-todo-arquivo-php]] — equivalente em espírito em PHP
- [[declaracao-de-variaveis-let-const-e-var]] — atribuir a variável não declarada é erro
