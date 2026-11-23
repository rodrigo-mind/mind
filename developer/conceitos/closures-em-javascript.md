---
titulo: "Closures em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 8, seção 8.6 (PDF p. 199-238, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Closures em JavaScript

## Definição

JavaScript tem escopo léxico: uma função roda com o escopo em vigor **onde foi definida**, e não onde é chamada. Por isso o objeto função guarda, além do código, uma referência ao escopo da definição; essa combinação é uma closure. Tecnicamente toda função é closure, mas só fica interessante quando é chamada fora do escopo onde nasceu, o caso típico de uma função aninhada devolvida por outra: ela continua vendo as variáveis e parâmetros da função externa.

## Por que importa

Permite estado privado: um contador guardado em variável da função externa não pode ser zerado ou corrompido por código de fora, ao contrário de uma propriedade pública (o livro dá esse motivo ao contrapor com o contador guardado numa propriedade da própria função). É também a base da modularidade por função de invocação imediata, antes dos módulos ES6.

## Como se relaciona

Ver módulos no Node (CommonJS) e módulos ES6 em JavaScript; callbacks (assincronia com callbacks e eventos) usam closures para lembrar o contexto.

## Notas do Claude

Confiança média: li a definição e a regra de escopo, mas não os exemplos de captura em laços e contadores.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modulos-no-node-commonjs]] — esta nota cita a ideia de «Módulos no Node» na seção sobre como se relaciona
- [[modulos-es6-em-javascript]] — esta nota cita a ideia de «Módulos ES6 em JavaScript» na seção sobre como se relaciona
- [[funcoes-de-seta-e-o-valor-de-this]] — ambos dependem do escopo léxico
- [[callbacks-funcoes-anonimas-e-closures-em-php]] — a ideia de closure tem a contraparte em PHP, com `use` e funções de seta
