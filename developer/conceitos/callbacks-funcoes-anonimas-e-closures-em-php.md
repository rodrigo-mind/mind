---
titulo: "Callbacks, funções anônimas e closures em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4, seção Callbacks, Anonymous Functions, and Closures (PDF p. 164-172)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Callbacks, funções anônimas e closures em PHP

## Definição

Um **callback** é um bloco de código guardado numa variável ou passado a uma função, para ser chamado depois. No exemplo do livro, `ProcessSale` aceita callbacks com o tipo `callable` e chama cada um com `call_user_func()` a cada venda.

**Formas de callback:**

- **Função anônima:** `function ($produto) { ... };`. Por ser uma expressão, termina com ponto e vírgula.
- **Função de seta (PHP 7.4):** `fn($produto) => expressão`. É compacta e tem uma só expressão, boa para callbacks pequenos, como ordenações.
- **Função ou método com nome:** o nome da função como texto, ou um vetor `[$objeto, "metodo"]` (o PHP reconhece esse vetor como `callable`).
- **Método que devolve uma função anônima:** funciona como fábrica de callbacks.

**Closures:**

- A função anônima pode usar variáveis do contexto onde foi criada, listadas em `use ($valor, &$contador)`. Com `&`, a variável vai por referência e o estado se mantém entre as chamadas (no exemplo, um total de vendas acumulado).
- A função de seta captura **automaticamente** todas as variáveis do contexto, mas **por valor**: mudar a variável dentro dela não muda a de fora.
- As duas viram objetos da classe `Closure`.

**Callable de primeira classe (PHP 8.1):** `$this->processarPreco(...)` não chama o método; devolve uma `Closure` que mantém acesso ao objeto. Tem duas vantagens sobre `[$this, "metodo"]`: dá acesso controlado a métodos `private` ou `protected` e é mais rápida, porque o PHP não precisa verificar se o valor é chamável. O antecessor é `Closure::fromCallable()` (7.1).

**Classes anônimas (PHP 7):** `new class (...) implements Interface { ... }` cria e instancia uma classe pequena e local. Não capturam variáveis do contexto; os valores precisam ir pelo construtor.

## Por que importa

Callbacks deixam encaixar funções num componente sem mexer no código dele. No exemplo, um log de vendas entra sem alterar `sale()`. Assim o componente não perde o foco e a mudança não se perde na próxima atualização do pacote.

## Como se relaciona

Interfaces, classes abstratas e traits cobre as classes anônimas do ponto de vista dos tipos. A ideia de encaixar comportamento aparece em padrão observer e padrão strategy. Em JavaScript, a ideia equivalente está em closures em JavaScript.

## Notas do Claude

- No dia a dia: `usort($itens, fn($a, $b) => $a['preco'] <=> $b['preco'])` e `array_map(fn($p) => $p['nome'], $produtos)` (exemplos inventados por mim).
- Esquecer o `&` no `use` é um erro comum: a função recebe uma cópia, e o contador não acumula (inferência minha a partir do exemplo do livro).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[closures-em-javascript]] — é o equivalente em JavaScript da captura de variáveis por closures
- [[funcoes-de-seta-e-o-valor-de-this]] — as funções de seta do PHP 7.4 têm a mesma forma compacta, mas capturam por valor
- [[padrao-observer]] — callbacks são a forma mais simples de encaixar comportamento, como no Observer
- [[padrao-strategy]] — passar uma função como argumento é uma versão leve do Strategy
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — a nota trata as classes anônimas pelo lado dos tipos
- [[estilos-de-programacao-procedural-funcional-e-orientado-a-objetos]] — callbacks e closures são o lado funcional do PHP descrito nos estilos
- [[funcoes-de-vetores-em-php]] — as funções de vetores são o uso mais comum de callbacks
