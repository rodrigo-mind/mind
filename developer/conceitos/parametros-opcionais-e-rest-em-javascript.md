---
titulo: "Parâmetros opcionais, padrão e rest em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 8, seção 8.3 (PDF p. 199-238, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Parâmetros opcionais, padrão e rest

## Definição

- Se a função é chamada com menos argumentos que parâmetros, os restantes valem `undefined`. Ponha os parâmetros opcionais no **fim** da lista, para poderem ser omitidos.
- O idioma antigo usava `a = a || []`, que também troca valores falsos como `0` ou `""`; em ES6, declare o padrão na assinatura: `function f(a = [])`. O padrão é calculado a cada chamada (em Python, é diferente: o padrão é compartilhado).
- **Parâmetro rest** (`...resto`): precisa ser o último e sempre é um vetor, vazio se não há argumentos extras (nunca `undefined`; não aceita padrão). Permite funções com número variável de argumentos (varargs).

## Por que importa

Evita código defensivo repetido e deixa a assinatura da função autoexplicativa.

## Como se relaciona

Ver funções de seta e o valor de this para outras formas de definir funções.

## Notas do Claude

Confiança média: o capítulo também trata de desestruturação de argumentos e do objeto `arguments`, não lidos.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[funcoes-de-seta-e-o-valor-de-this]] — esta nota cita a ideia de «Funções de seta e o valor de this» na seção sobre como se relaciona
- [[acesso-condicional-e-invocacao-condicional-em-javascript]] — ?.() substitui o teste de função opcional
- [[operadores-logicos-e-valores-padrao-em-javascript]] — valores padrão de parâmetros substituem o idioma ||
