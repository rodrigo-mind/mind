---
titulo: "Módulos no Node (require e module.exports)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 10, seções 10.1 e 10.2 (PDF p. 267-284, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Módulos no Node (require e module.exports)

## Definição

No Node, cada arquivo é um módulo com espaço de nomes privado. Exporta-se atribuindo a propriedades do objeto `exports` ou substituindo `module.exports` por um único valor; importa-se com `require("nome")` (módulos embutidos e instalados) ou `require("./arquivo")` (caminho relativo). É o sistema que antecedeu os módulos ES6, nunca foi parte oficial da linguagem, e com ferramentas como webpack também se usa na web.

Antes dos dois sistemas, a modularidade vinha de classes, objetos e funções de invocação imediata: os detalhes ficam privados dentro da função, e só a API pública é devolvida. Empacotadores automatizam esse padrão.

## Por que importa

Ajuda a ler código antigo e a entender por que existem dois sistemas (ES6 e Node) lado a lado.

## Como se relaciona

Para código novo do projeto, ver módulos ES6 em JavaScript.

## Notas do Claude

Confiança média: li a visão geral, não todos os detalhes. O projeto não usa Node no servidor (a base é PHP), então esta nota é só de referência.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modulos-es6-em-javascript]] — esta nota cita a ideia de «Módulos ES6 em JavaScript» na seção sobre como se relaciona
- [[closures-em-javascript]] — «Closures em JavaScript» cita esta nota ao explicar suas relações
- [[node-js-javascript-fora-do-navegador]] — o Node é o ambiente em que o CommonJS nasceu
