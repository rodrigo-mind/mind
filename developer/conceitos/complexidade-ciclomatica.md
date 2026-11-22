---
titulo: "Complexidade ciclomática"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Early return and cyclomatic complexity (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Complexidade ciclomática

## Definição

Pontuação de um método: o número de **pontos de decisão** mais um (a entrada). Contam as ramificações (`if`, `while`, `for`, `case`, `match`) e cada operador `&&`/`||` em uma condição composta. Não é o número de linhas: reduzi-la com "one-liners" cheios de operadores não resolve e prejudica a clareza. Pela escala do livro, acima de 7 é alto e acima de 10 é "obsceno". Quanto maior, mais difícil de ler e mais carga cognitiva.

Formas de reduzir, em ordem de preferência do autor:
1. **Retorno antecipado** (ver a regra correspondente): estratégia padrão.
2. Quebrar o método grande em métodos menores.
3. Remover pontos de decisão desnecessários (a forma mais curta, como `return $v > 10 && $v < 200;`), só com boa cobertura de testes ou muita certeza, porque pode alterar o comportamento sem querer.

## Por que importa

É uma medida objetiva do quanto um método é difícil de ler, testar e mudar.

## Como se relaciona

Veja regra: use retorno antecipado, nomes claros e linguagem ubíqua, dívida técnica e testes unitários com PHPUnit.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — «Nomes claros e linguagem ubíqua no código» cita esta nota ao explicar suas relações
- [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]] — o retorno antecipado é a principal forma de reduzi-la
- [[testes-unitarios-em-php-com-phpunit]] — reduzir pontos de decisão sem testes é arriscado
- [[divida-tecnica]] — métodos complexos aumentam a dívida técnica
- [[condicionais-em-javascript-if-else-if-e-switch]] — «Condicionais em JavaScript: if, else if e switch» cita esta nota ao explicar suas relações
