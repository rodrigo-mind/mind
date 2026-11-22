---
titulo: "Módulos ES6 em JavaScript (import e export)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 10, seção 10.3 (PDF p. 267-284, seção indicada dentro do capítulo)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Módulos ES6 em JavaScript

## Definição

Cada arquivo é um módulo com contexto privado: o que ele declara fica nele, a menos que seja exportado. Quem quer usar precisa importar de modo explícito.

- **Exportar:** `export` antes da declaração, ou uma única linha `export { a, b }` no fim (as chaves aqui não são objeto literal). `export default` serve ao módulo com um valor só, e cada módulo tem no máximo um. `export` e `import` só aparecem no nível superior, nunca dentro de função, laço ou condição, o que permite análise estática.
- **Importar:** `import x from './m.js'` (padrão), `import { a, b } from './m.js'` (nomeados), `import * as m from './m.js'` (tudo, como propriedades de um objeto) e `import './m.js'` (só executa o módulo, que roda uma vez, na primeira importação). `as` renomeia para resolver conflitos. Os valores importados se comportam como constantes e sofrem içamento (hoisting).
- **Especificador:** precisa ser texto literal fixo, e um caminho absoluto (`/`), relativo (`./` ou `../`) ou uma URL completa; nomes soltos como `util.js` não valem no navegador (ferramentas de empacotamento aceitam).
- **Diferenças para scripts comuns:** o código do módulo roda em modo estrito automaticamente, `this` é `undefined` no nível superior, e as declarações não viram globais.

## Por que importa

Mantém o espaço global limpo e esconde detalhes internos. Antes disso, usavam-se classes, objetos e funções de invocação imediata (closures) para simular módulos, e o Node adotou o `require()` (CommonJS), sistema à parte.

## Como se relaciona

O uso em páginas está em módulos no navegador. A função `import()` devolve uma promessa (ver promises em JavaScript).

## Notas do Claude

O livro é de 2020: o Node hoje suporta módulos ES6 de forma estável (inferência minha, a conferir). No projeto, que usa JavaScript sem frameworks, módulos nativos dispensam empacotador (inferência minha).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[declaracao-de-variaveis-let-const-e-var]] — «Declaração de variáveis: let, const e var» cita esta nota ao explicar suas relações
- [[modulos-no-node-commonjs]] — «Módulos no Node» cita esta nota ao explicar suas relações
- [[closures-em-javascript]] — «Closures em JavaScript» cita esta nota ao explicar suas relações
- [[promises-em-javascript]] — esta nota cita a ideia de «Promises em JavaScript» na seção sobre como se relaciona
- [[usar-modulos-javascript-no-navegador]] — o framework aplica os módulos ES6 na página
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — «Componentes web: templates, elementos customizados e shadow DOM» cita esta nota ao explicar suas relações
- [[workers-threads-no-navegador]] — «Workers: threads no navegador» cita esta nota ao explicar suas relações
- [[modo-estrito-em-javascript]] — «Modo estrito em JavaScript» cita esta nota ao explicar suas relações
