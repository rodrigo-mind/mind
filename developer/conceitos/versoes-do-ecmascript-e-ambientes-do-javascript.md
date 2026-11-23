---
titulo: "Versões do ECMAScript e ambientes do JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., caps. 1 e 2 (PDF p. 19-40)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Versões do ECMAScript e ambientes do JavaScript

## Definição

- **ECMAScript (ES):** é o nome oficial do padrão da linguagem, adotado por questões de marca registrada. Na prática, todos chamam de JavaScript.
  - O livro trata o ES5 como base de compatibilidade (suportado por todos os navegadores nos anos 2010).
  - O ES6, de 2015, trouxe as grandes mudanças: classes, módulos, `let` e `const`, funções de seta, iteradores, promessas.
  - Desde então sai uma versão por ano (ES2016, ES2017...).
- **Compatibilidade e modo estrito:** como a linguagem não pode quebrar código antigo, os erros do começo continuam lá. O modo estrito (`"use strict"`) corrige vários deles. Classes e módulos do ES6 já são estritos automaticamente.
- **Ambiente hospedeiro (host):** a linguagem em si tem poucos recursos de entrada e saída. Quem fornece isso é o ambiente:
  - o **navegador** dá o DOM, os eventos e a rede;
  - o **Node.js** dá arquivos, rede e processos no sistema operacional.
- **Estrutura léxica (cap. 2):**
  - diferencia maiúsculas de minúsculas;
  - ignora espaços e, quase sempre, as quebras de linha;
  - comentários com `//` e `/* */`;
  - identificadores começam com letra, `_` ou `$`;
  - há palavras reservadas que não devem ser usadas como nome (o mais simples é evitar todas, inclusive `let`, `await` e `yield`);
  - o código é Unicode, com escapes como `é` e `\u{1F600}`;
  - o mesmo caractere pode ter mais de uma codificação, e por isso se normaliza o texto antes de comparar.

## Por que importa

Saber a versão do ES diz quais recursos dá para usar sem conversão. Saber o ambiente diz quais APIs existem: o DOM só existe no navegador.

## Como se relaciona

O modo estrito está em modo estrito em JavaScript. O Node está em Node.js, JavaScript fora do navegador. Os módulos estão em módulos ES6 em JavaScript. O cuidado com quebras de linha está na regra não quebre a linha depois de return.

## Notas do Claude

- Confiança média: o capítulo 1 é um passeio pela linguagem e foi só folheado; o capítulo 2 foi lido por inteiro.
- Hoje, os navegadores atuais suportam ES2020 ou mais novo sem conversão (inferência minha; confira em tabelas de compatibilidade).

## Conexões

- [[node-js-javascript-fora-do-navegador]] — o Node é um dos ambientes hospedeiros do JavaScript
- [[regra-nao-quebre-a-linha-depois-de-return]] — a estrutura léxica trata de quebras de linha, tema da regra
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modo-estrito-em-javascript]] — o modo estrito corrige erros que a compatibilidade preservou
- [[modulos-es6-em-javascript]] — os módulos chegaram com o ES6
- [[declaracao-de-variaveis-let-const-e-var]] — `let` e `const` vieram com o ES6
- [[diferencas-entre-navegadores-e-deteccao-de-recursos]] — a versão do ES suportada pelo navegador define o que se pode usar
