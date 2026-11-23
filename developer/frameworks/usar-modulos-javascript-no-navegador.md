---
titulo: "Usar módulos JavaScript no navegador"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 10, seções 10.3.5 e 10.3.6 (PDF p. 267-284)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Usar módulos JavaScript no navegador

## Para que serve

Carregar o JavaScript de uma página como módulos ES6 nativos, sem depender de empacotador (webpack, Parcel).

## Quando usar e quando não usar

Use em desenvolvimento e em sites pequenos. O livro nota que, em produção, o empacotamento ainda costuma dar melhor desempenho (menos requisições), com a ressalva de que sites com atualizações frequentes e visitas repetidas podem ganhar com módulos pequenos, pelo melhor uso do cache.

## O que perguntar ao usuário antes

- A página precisa funcionar em navegadores sem módulos (hoje, o IE11)?
- O código será servido por um servidor web, ou aberto por `file:`?

## Passos

1. Carregue o ponto de entrada com `<script type="module" src="main.js"></script>`. O navegador segue as importações estáticas e carrega o programa inteiro.
2. Módulos têm o comportamento de `defer`: o carregamento começa na hora, mas a execução só vem depois do HTML processado, na ordem do documento. O atributo `async` faz o módulo rodar assim que carregado.
3. Para navegadores antigos, ofereça um `<script nomodule>` com o código convertido (por exemplo, com Babel); navegadores com módulos o ignoram.
4. Para carregar código sob demanda (a primeira tela cedo, o resto depois), use `import()`: devolve uma promessa, e o resultado equivale ao de `import * as`. Aceita qualquer expressão que dê um especificador, e é um operador, não uma função comum.
5. Teste com um servidor estático local.

## Saída esperada

Uma página que carrega módulos nativos, com ordem de execução previsível.

## Erros comuns

- Abrir a página por `file:` e ver o carregamento bloqueado: módulos só carregam da mesma origem ou com cabeçalhos CORS adequados, então é preciso um servidor.
- Servir `.mjs` com o tipo MIME errado (o navegador ignora a extensão, mas o tipo importa).
- Esperar que um módulo inline (`<script type="module">` com código) possa ser importado por outro: não tem nome.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```html
<script type="module" src="/js/main.js"></script>
<script nomodule src="/js/legado.js"></script>
```

## Notas do Claude

Na hospedagem compartilhada com deploy por FTP do projeto, módulos nativos são apenas arquivos estáticos; confira o tipo MIME de `.js` no servidor (inferência minha).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[modulos-es6-em-javascript]] — o framework aplica os módulos ES6 na página
- [[modelo-de-seguranca-da-web-no-navegador]] — módulos só carregam da mesma origem ou com CORS
- [[async-e-await]] — import() costuma ser usado com await
- [[regra-carregue-scripts-com-defer-ou-async]] — módulos se comportam como defer por padrão
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — «Componentes web: templates, elementos customizados e shadow DOM» cita esta nota ao explicar suas relações
- [[diferencas-entre-navegadores-e-deteccao-de-recursos]] — a decisão de usar módulos depende do suporte dos navegadores
- [[ferramentas-do-javascript-eslint-prettier-jest-e-empacotadores]] — servir módulos direto dispensa o empacotador
