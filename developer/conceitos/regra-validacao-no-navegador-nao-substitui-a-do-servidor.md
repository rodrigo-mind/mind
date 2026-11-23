---
titulo: "A validação no navegador complementa, e nunca substitui, a do servidor"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 14 (PDF p. 356-369)"
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 13, seção 13.6.1 (PDF p. 631-632)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# A validação no navegador complementa, e nunca substitui, a do servidor

## Regra

Valide sempre no servidor, mesmo que o formulário também valide no navegador (por atributos HTML5 ou JavaScript).

## Por quê

Os dois livros dizem o mesmo:

- O livro de HTML5 adverte que a validação no navegador complementa a do servidor: não dá para contar que o usuário use um navegador que a suporte direito, e é fácil para um usuário malicioso montar um script que envia dados direto ao servidor, sem passar pelo formulário.
- O livro de PHP afirma que o formulário só fica "à prova de balas" no servidor; a checagem em JavaScript é um serviço ao usuário para evitar erros acidentais, e não impede erros intencionais.

A validação no navegador serve à experiência do usuário (resposta imediata e menos idas ao servidor).

## Quando não vale

Não há exceção: a do navegador é opcional, a do servidor é obrigatória.

## Como verificar

Envie ao servidor, por uma ferramenta ou um script, um pedido com campos vazios, fora do intervalo ou fora do padrão e veja se é rejeitado. Procure scripts PHP que confiam em `required`, `maxlength` ou `pattern` do HTML.

## Notas do Claude

Combina com a regra de nunca confiar na entrada do usuário e com a de campos ocultos, que também podem ser forjados.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[validacao-nativa-de-formularios-html5]] — a regra tira a consequência prática das limitações da validação nativa
- [[validar-formularios-em-php]] — a validação no servidor é a que vale
- [[filtrar-entrada-com-filter-input]] — os filtros do PHP validam no servidor o que o HTML valida no navegador
- [[regra-nunca-confie-na-entrada-do-usuario]] — é um caso da regra geral sobre entrada não confiável
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[api-de-validacao-de-formularios-por-javascript]] — a validação por JavaScript é um caso em que a regra se aplica
