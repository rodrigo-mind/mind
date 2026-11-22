---
titulo: "Padrão Interpreter e mini-linguagens"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 11, seção The Interpreter Pattern (PDF p. 385-399)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Interpreter e mini-linguagens

## Definição

Cria uma **linguagem específica de domínio (DSL)** simples e a executa com objetos. Em vez de deixar o usuário avançado programar a aplicação em PHP (inseguro: dá acesso ao servidor; e complexo demais), oferece-se uma mini-linguagem. O exemplo do livro, a **MarkLogic**, corrige respostas de um quiz sem uso de expressões regulares: `$input equals '4' or $input equals 'four'`.

- **Gramática (EBNF):** descreve as produções (`orExpr`, `andExpr`, `eqExpr`, `variable`...) e os terminais; cada elemento vira uma classe: `VariableExpression` e `LiteralExpression` (terminais) e `BooleanOrExpression`, `BooleanAndExpression` e `BooleanEqualsExpression` (operadores, que herdam de `OperatorExpression`).
- **Funcionamento:** todas as expressões têm `interpret(InterpreterContext)`; o contexto guarda os resultados em um mapa, e cada expressão tem uma chave (`getKey()`, única; a variável usa o nome). A classe de operador interpreta os dois operandos, busca os valores no contexto e chama o método abstrato `doInterpret()` (um **Template Method**). A árvore de objetos é montada em tempo de execução (é uma instância de Composite), e a mesma instrução roda com valores diferentes (`four`, `4` e `52`).
- **Limites:** o número de classes cresce com a linguagem, então serve para linguagens pequenas (para uma de uso geral, use ferramentas prontas). O padrão **não trata do parsing** do texto: é preciso um analisador à parte (o livro dá um exemplo no apêndice B, que não li).

## Por que importa

Dá flexibilidade a produtores de conteúdo sem expor código; mostra o encaixe entre objetos e gramática.

## Como se relaciona

Veja padrão Strategy (o exemplo do quiz), padrão Composite e padrões de projeto.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-composite]] — esta nota cita a ideia de «Padrão Composite» na seção sobre como se relaciona
- [[padroes-de-projeto]] — esta nota cita a ideia de «Padrões de projeto» na seção sobre como se relaciona
- [[padrao-strategy]] — o exemplo do questionário usa as duas ideias
- [[regra-nunca-confie-na-entrada-do-usuario]] — deixar o usuário escrever PHP seria inseguro
