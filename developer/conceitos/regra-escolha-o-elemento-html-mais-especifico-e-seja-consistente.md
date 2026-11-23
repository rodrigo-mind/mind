---
titulo: "Escolha o elemento HTML mais específico e use-o com consistência"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 6, seção Understanding How to Select Elements (PDF p. 104-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Escolha o elemento HTML mais específico e use-o com consistência

## Regra

Marque o conteúdo com o elemento que melhor descreve **o que ele é**; use só o necessário, só para o fim definido do elemento, de forma consistente em todo o site; e, na dúvida entre significado e aparência, fique do lado do significado.

## Por quê

O HTML5 tem elementos genéricos (`section`, `figure`, `article`) cujo sentido depende do tipo de conteúdo, então algum grau de interpretação é necessário. Para decidir, o autor dá quatro orientações:

- **Menos é mais:** ponha só a marcação que o significado do conteúdo exige (sem títulos complexos, dispensa o `hgroup`; as citações detalhadas só servem em textos que dependem delas). Regra de bolso: se não há resposta imediata à pergunta "como a semântica deste elemento será usada?", não aplique.
- **Não abuse dos elementos:** use cada um só para o fim definido, sem criar semântica privada. Se faltar um elemento, use `span` ou `div` e a classe, que serve também para dar sentido, e não só estilo.
- **Seja específico e consistente:** resista à tendência do HTML4 de montar a página com `div`s; uma classe `article` não comunica o que o elemento `article` comunica a quem processa o HTML; e aplique a mesma escolha em toda a página, site ou aplicação.
- **Não suponha o público:** a divisão entre significado e apresentação existe para o HTML ser processado por programas; assumir que só o visual importa limita os usos futuros do conteúdo.

Mesmo os elementos de uma letra (como `b`) foram aceitos em troca de um pouco de compromisso entre a divisão semântica e a visual: vale a ressalva de evitar elementos puramente de apresentação e definir uma classe com o estilo.

## Quando não vale

Quando nenhum elemento representa o significado e basta uma classe em `span` ou `div`.

## Como verificar

Procure `div` e `span` onde existiria um elemento semântico (`nav`, `header`, `article`, `ul`) e `class` com nomes de elementos HTML.

## Como se relaciona

Veja escolher o elemento HTML de texto pelo significado, elementos de seção semânticos do HTML5 e agrupar conteúdo em HTML.

## Notas do Claude

O capítulo traz também tabelas de consulta rápida com todos os elementos (documento, texto, agrupamento, seções, tabelas, formulários e conteúdo embutido), indicando o tipo (fluxo, frase) e o que é novo ou mudou no HTML5; os elementos `command` e `menu` não eram implementados por nenhum navegador. O livro é de 2011: conferir a lista atual na especificação.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[elementos-de-secao-semanticos-html5]] — esta nota cita a ideia de «Elementos de seção semânticos do HTML5» na seção sobre como se relaciona
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — esta nota cita a ideia de «Escolher o elemento HTML de texto pelo significado» na seção sobre como se relaciona
- [[agrupar-conteudo-em-html]] — o div é último recurso
- [[css-modular-modulos-variantes-e-bem]] — as classes com significado servem de modo parecido nos módulos
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[atributos-globais-booleanos-e-data-em-html]] — a escolha do elemento e dos atributos globais anda junta
