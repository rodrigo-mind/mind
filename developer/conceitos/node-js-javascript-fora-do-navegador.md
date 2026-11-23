---
titulo: "Node.js, JavaScript fora do navegador"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 16 (PDF p. 595-652)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Node.js, JavaScript fora do navegador

## Definição

O Node é o JavaScript com acesso ao sistema operacional: lê e grava arquivos, roda processos, abre conexões de rede. É popular para servidores web eficientes e muito concorrentes, e para ferramentas de linha de comando.

- **Concorrência por eventos:** o Node tem uma só thread e uma API assíncrona por padrão, baseada em callbacks, eventos e promessas. Um programa não termina enquanto houver callbacks ou eventos pendentes. Um servidor esperando conexões nunca termina.
- **Erros assíncronos:** uma exceção num callback só pode ser tratada ali mesmo. Para o resto, há `process.setUncaughtExceptionCaptureCallback()` e o evento `unhandledRejection`, para promessas rejeitadas sem `catch`.
- **Entrada e saída:** `console.log` escreve em stdout e `console.error` em stderr. Também há os argumentos da linha de comando e as variáveis de ambiente (`process.argv`, `process.env`).
- **Módulos:**
  - o sistema próprio, CommonJS, usa `require()` e `module.exports`;
  - o Node 13 acrescentou os módulos ES6 (`import` e `export`);
  - arquivos `.mjs` são sempre ES6, `.cjs` são sempre CommonJS, e os `.js` seguem o campo `"type"` do `package.json` mais próximo (`"module"` ou `"commonjs"`).
- **Outros temas do capítulo:** a instalação traz o `npm`, o gerenciador de pacotes. O capítulo cobre `Buffer` (dados binários), streams, o módulo `fs` (arquivos), clientes e servidores HTTP, processos filhos e threads (`worker_threads`). O autor recomenda a documentação oficial (nodejs.org/api).

## Por que importa

Na stack do projeto, o servidor é PHP. O Node entra como ferramenta de desenvolvimento: `npm` para instalar linters, formatadores e minificadores (inferência minha).

## Como se relaciona

Os módulos estão em módulos no Node, CommonJS e módulos ES6 em JavaScript. A assincronia está em promises em JavaScript e async e await. As ferramentas estão em ferramentas do JavaScript.

## Notas do Claude

- Confiança média: li a introdução, a seção de programas, erros e módulos, e folheei o resto.
- O mapa marca este capítulo como `ignorar`, e ele foi destilado a pedido do usuário.
- Hospedagem compartilhada da Hostinger costuma não rodar Node permanente nos planos PHP (inferência minha, a conferir no plano do cliente).

## Conexões

- [[ferramentas-do-javascript-eslint-prettier-jest-e-empacotadores]] — as ferramentas de JavaScript rodam sobre o Node
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modulos-no-node-commonjs]] — o sistema próprio de módulos do Node é o CommonJS
- [[modulos-es6-em-javascript]] — o Node 13 passou a aceitar módulos ES6
- [[promises-em-javascript]] — a API assíncrona do Node usa callbacks, eventos e promessas
- [[workers-threads-no-navegador]] — o `worker_threads` do Node é o equivalente dos workers do navegador
- [[versoes-do-ecmascript-e-ambientes-do-javascript]] — o Node é um dos ambientes hospedeiros da linguagem
