---
titulo: "Não defina tratadores de evento em atributos HTML"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.2.2 (PDF p. 449)"
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 30 (PDF p. 750-777)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não defina tratadores de evento em atributos HTML

## Regra

Registre tratadores no JavaScript com `addEventListener()`, e não em atributos como `onclick="..."` no HTML.

## Por quê

- O livro diz que a técnica é malvista no desenvolvimento moderno e só a documenta porque aparece em código antigo.
- O texto do atributo vira o corpo de uma função envolvida em blocos `with` (do documento, do formulário que contém o elemento e do próprio elemento). Assim, o código enxerga variáveis inesperadas, o que causa bugs confusos.
- Esse código nunca roda em modo estrito.
- Cada atributo é uma propriedade `on<evento>` e só admite um tratador por tipo.

## Quando não vale

Para entender ou manter código legado que já usa atributos. Converta quando for mexer nele.

## Como verificar

Procure `on[a-z]+=` nos arquivos `.html` e `.php` do projeto (por exemplo, `grep -rnE ' on[a-z]+=' --include=*.php --include=*.html .`). Não deve haver ocorrências.

## Notas do Claude

Outro motivo, fora do livro: uma Content-Security-Policy sem `'unsafe-inline'` bloqueia esses atributos, e o livro recomenda estudar CSP na seção 15.15.3. Manter todo o JavaScript em arquivos `.js` deixa o site pronto para essa proteção.

- diverge: Freeman (cap. 30, livro de 2012) usa atributos `onmouseover` nos exemplos e chama as propriedades `on*` de "o jeito mais fácil" na maioria dos casos. Flanagan (2020) desaconselha os atributos. A regra segue Flanagan, por ser mais recente e pelos motivos acima.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[registrar-tratadores-de-eventos-com-addeventlistener]] — indica a forma de registro que a regra recomenda
- [[eventos-no-navegador]] — os atributos on* são uma das formas antigas de registrar tratadores
- [[modelo-de-seguranca-da-web-no-navegador]] — uma CSP sem `unsafe-inline` bloqueia esses atributos
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — atributos on* inseridos com texto do usuário são vetor de XSS
