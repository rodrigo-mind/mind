---
titulo: "Ferramentas do JavaScript (ESLint, Prettier, Jest, npm, empacotadores, Babel e TypeScript)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 17 (PDF p. 653-684)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Ferramentas do JavaScript

## Definição

O capítulo 17 apresenta as ferramentas mais usadas, com a versão de 2020 de cada uma:

- **ESLint (linter):** aponta código que funciona, mas tem cara de bug, é feio ou é ruim, como variáveis não usadas ou `==` em vez de `===`. Tem muitas regras e plug-ins e é configurável para aplicar só as regras que o projeto quer.
- **Prettier (formatador):** reformata todo o código num padrão (indentação, ponto e vírgula, aspas, tamanho de linha), com poucas opções. A ideia é adotar e nunca mais discutir formatação. Pode rodar no editor ao salvar e num gancho do Git antes de cada commit (`--write`). O autor gosta, com a ressalva de que ele desfaz alinhamentos manuais de comentários.
- **Jest (testes):** reúne o executor de testes, as asserções e os dublês (mocks). No exemplo do livro, simula a busca na rede para testar uma função `async` sem acessar a internet.
- **npm:** instala e gerencia bibliotecas. As dependências ficam registradas no `package.json`.
- **Empacotadores (webpack, Rollup, Parcel):** juntam os módulos num arquivo só (bundle) para o navegador.
- **Babel:** converte recursos novos da linguagem em código que navegadores antigos entendem.
- **JSX:** a extensão de sintaxe usada pelo React.
- **Flow e TypeScript:** acrescentam tipos ao JavaScript e conferem erros de tipo.

## Por que importa

Linter e formatador pegam erros cedo e deixam o código uniforme, mesmo num projeto com JavaScript puro.

## Como se relaciona

O ESLint acusa os problemas das regras prefira igualdade estrita em JavaScript e não quebre a linha depois de return. Os módulos estão em usar módulos JavaScript no navegador. Em PHP, os testes equivalentes estão em testes unitários em PHP com PHPUnit.

## Notas do Claude

- Confiança média: li a seção de abertura e as partes de ESLint, Prettier e Jest; as demais foram folheadas.
- Para a stack do projeto (JS puro, deploy por FTP), um caminho leve: usar ESLint e Prettier no VSCode, sem empacotador, servindo os módulos direto com `<script type="module">` (inferência minha).
- O cenário dessas ferramentas mudou desde 2020 (há opções como Vite e Biome). Confira o que é atual antes de adotar (inferência minha).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-prefira-igualdade-estrita-em-javascript]] — o ESLint acusa o uso de `==` em vez de `===`
- [[regra-nao-quebre-a-linha-depois-de-return]] — o ESLint acusa os erros de quebra de linha que a regra descreve
- [[usar-modulos-javascript-no-navegador]] — os empacotadores juntam módulos, e o projeto pode servi-los direto
- [[testes-unitarios-em-php-com-phpunit]] — é o equivalente do Jest no lado do PHP
- [[node-js-javascript-fora-do-navegador]] — o npm e as ferramentas rodam sobre o Node
