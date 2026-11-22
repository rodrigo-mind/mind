---
titulo: "Estrutura de formulários em HTML5"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 12 (PDF p. 275-304)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Estrutura de formulários em HTML5

## Definição

Formulários são o mecanismo do HTML para coletar dados do usuário. O mínimo são três elementos: `form` (marca a presença do formulário), `input` (campo de entrada; por padrão, uma caixa de texto de uma linha) e `button` (sem atributos, dentro de um `form`, envia os dados ao servidor). O HTML5 reformulou o sistema de formulários e, segundo o livro, o suporte dos navegadores é bom, mas não perfeito: vale conferir cada recurso antes de adotá-lo.

## Problemas e soluções (resumo do capítulo)

| Quero... | Use |
|---|---|
| Dizer para onde os dados vão | atributo `action` do `form` (ou `formaction` do `button`) |
| Escolher a codificação do envio | `enctype` do `form` (ou `formenctype`) |
| Controlar o preenchimento automático | `autocomplete` no `form` ou no `input` |
| Dizer onde mostrar a resposta | `target` (ou `formtarget`) |
| Dar nome ao formulário | `name` do `form` |
| Rotular um campo | elemento `label` |
| Focar um campo ao carregar a página | `autofocus` no `input` |
| Desabilitar um campo ou um grupo | `disabled` (no `input` ou no `fieldset`) |
| Agrupar campos e dar título ao grupo | `fieldset` e `legend` |
| Botões | `button` com `type="submit"`, `"reset"` ou `"button"` |
| Associar um elemento a um formulário que não o contém | atributo `form` |

## Pontos de atenção

- O `button` é multiuso: o tipo `submit` envia, `reset` limpa e `button` é genérico, sem ação padrão.
- O livro usa um script Node.js simples para mostrar os dados que o navegador envia ao servidor; o que o servidor vê é o que o formulário de fato transmite (a parte do servidor, em PHP, é tratada em outras notas).

## Como se relaciona

Os tipos de `input` estão em tipos do elemento input, e a validação no navegador, em validação nativa de formulários. No servidor, a validação equivalente em PHP está em validar formulários em PHP.

## Notas do Claude

Confiança média: li a tabela-resumo e a apresentação dos elementos; o detalhe de cada atributo (`enctype` com `text/plain`, `target` e outros) não foi lido por inteiro. O livro é de 2011: confira cada recurso na documentação atual.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[validar-formularios-em-php]] — esta nota cita a ideia de «Validar formulários em PHP» na seção sobre como se relaciona
- [[tipos-do-elemento-input]] — «Tipos do elemento input em HTML5» cita esta nota ao explicar suas relações
- [[validacao-nativa-de-formularios-html5]] — a validação nativa usa a estrutura do formulário
- [[regra-token-csrf-em-formularios]] — o formulário POST que muda dados deve levar o token CSRF
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — o rótulo e os campos também são marcação semântica
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
