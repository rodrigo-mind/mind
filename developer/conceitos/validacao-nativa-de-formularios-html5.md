---
titulo: "Validação nativa de formulários em HTML5"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 14, seção Using Input Validation (PDF p. 356-369)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Validação nativa de formulários em HTML5

## Definição

O HTML5 permite informar ao navegador, por atributos, o tipo de dado exigido; o navegador confere antes de enviar e impede o envio até o usuário corrigir. Antes, isso exigia bibliotecas JavaScript. O ganho: o usuário recebe resposta imediata, sem esperar o servidor.

| Atributo | O que garante | Vale em |
|---|---|---|
| `required` | Há algum valor (qualquer um) | `textarea`, `select` e `input` de vários tipos |
| `min` e `max` | O valor numérico ou de data fica no intervalo (limites inclusivos) | tipos de data e hora, `number` e `range` |
| `pattern` | O valor casa com uma expressão regular | `text`, `password`, `email`, `url`, `search`, `tel` |

- Os tipos `email` e `url` já exigem um endereço e uma URL válidos (o suporte a `url` é irregular); `pattern` pode restringir mais (por exemplo, a um domínio).
- **`min`, `max` e `pattern` só validam quando há valor:** o navegador deixa enviar o campo vazio. Por isso, costumam combinar com `required`.
- Um valor inicial em `value` satisfaz o `required`; para forçar a digitação, use `placeholder`.
- **Desligar:** `novalidate` no `form`, ou `formnovalidate` no botão, permite enviar sem validar (útil para "salvar o progresso" de um processo incompleto, se o servidor aceitar).

## Limitações apontadas pelo autor

O suporte é básico e inconsistente entre navegadores. Os problemas são destacados um de cada vez, então o usuário descobre um erro por tentativa; não há resumo de todos os erros e não se controla a aparência da mensagem.

## Como se relaciona

A regra de que a validação no navegador complementa e não substitui a do servidor vem do mesmo texto (ver regra da validação no navegador). No servidor, ver validar formulários em PHP.

## Notas do Claude

O livro é de 2011; os navegadores atuais têm mais recursos (por exemplo, a API de validação por JavaScript), mas o princípio vale (inferência minha, a conferir na documentação atual).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[validar-formularios-em-php]] — esta nota cita a ideia de «Validar formulários em PHP» na seção sobre como se relaciona
- [[estrutura-de-formularios-html5]] — a validação nativa usa a estrutura do formulário
- [[tipos-do-elemento-input]] — os tipos email, url e number validam parte do formato por si mesmos
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — a regra tira a consequência prática das limitações da validação nativa
- [[outros-elementos-de-formulario-html5]] — required vale também em select e textarea
- [[iframe-object-embed-progress-e-meter-em-html5]] — progress e meter aparecem em interfaces de formulário
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[expressoes-regulares-em-javascript-sintaxe-e-flags]] — «Expressões regulares em JavaScript: sintaxe e flags» cita esta nota ao explicar suas relações
