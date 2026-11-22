---
titulo: "Tipos escalares do PHP e suas armadilhas"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 4, seção Scalar types (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tipos escalares do PHP e suas armadilhas

## Definição

Escalar é o tipo mais simples, não composto de outros: `string`, `int`, `float` e `bool` (`is_scalar()` testa). Toda variável tem sempre um tipo (`gettype()`).

- **Strings:** quatro formas de criar. Para texto fixo, **aspas simples** e **NOWDOC** (sem interpretar variáveis nem escapes, seguro); para embutir variáveis e escapes (`\n`, `\t`, `\$`, `\"`), **aspas duplas** e **HEREDOC** (o HEREDOC aceita `"` e `'` sem escapar); expressões complexas vão entre chaves (`{$objeto->metodo()}`). A forma certa é, em geral, questão de padrão de código. Antes de escrever uma função, procure a nativa; no PHP 8 chegaram `str_contains`, `str_starts_with` e `str_ends_with`. As funções de texto diferenciam maiúsculas, e as variantes sem diferença têm um `i` no nome. Dá para ler um caractere com a sintaxe de vetor (`$texto[0]`).
- **Strings numéricas:** em conta, o PHP tenta converter; o PHP 8 endureceu o comportamento (de aviso para exceção, conforme o caso). Evite usar texto em operações matemáticas.
- **Inteiros:** cuidado com a notação não decimal: `0100` (zero à esquerda) é octal e vale 64, e `100 === 0144` é verdadeiro.
- **Floats:** são aproximações binárias: `0.2 + 0.2 === 0.4` é verdadeiro, mas `0.7 + 0.1 === 0.8` é falso. Servem para medidas em que a exatidão absoluta não importa (a largura de um elemento, um tempo medido). Para precisão, use **BCMath** (`bcadd`, `bccomp`, com escala).
- **Bool:** só duas possibilidades, previsível e seguro; declare-o explicitamente em vez de depender da conversão de outro tipo.

## Por que importa

Muitos "bugs misteriosos" vêm de octais acidentais, floats comparados com `===` e texto usado como número.

## Como se relaciona

Veja a regra de não usar float para dinheiro, type juggling e comparação estrita em PHP e regra de strict_types.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nao-use-float-para-dinheiro]] — a regra tira a consequência prática dos floats
- [[regra-use-sempre-a-comparacao-identica-em-php]] — a comparação de escalares
- [[regra-strict-types-em-todo-arquivo-php]] — os tipos escalares se declaram com strict_types
- [[validar-formularios-em-php]] — valores de formulário chegam como texto
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — armadilhas de conversão em PHP
