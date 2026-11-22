---
titulo: "Outros elementos de formulário: select, optgroup, textarea e output"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 14, seção Using the Other Form Elements (PDF p. 346-356)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Outros elementos de formulário: select, optgroup, textarea e output

## Definição

Além do `input`, o HTML tem outros elementos para coletar dados:

- **`select`** com **`option`**: lista de opções, uma alternativa compacta aos botões `radio`, boa para conjuntos maiores. Atributos: `name`, `disabled`, `form`, `size` (quantas opções mostrar), `multiple` (várias escolhas), `autofocus` e `required` (os três últimos novos no HTML5). A aparência depende do navegador e da plataforma.
- **`optgroup`**: dá estrutura à lista de `option`, agrupando-as sob um rótulo.
- **`textarea`**: várias linhas de texto.
- **`output`**: indica o resultado de um cálculo.
- **`keygen`**: gera um par de chaves pública e privada; o autor recomenda evitá-lo, pelo suporte irregular.

## Como se relaciona

Complementam os tipos do elemento input e usam os mesmos atributos de validação (`required` vale em `select` e `textarea`; ver validação nativa de formulários).

## Notas do Claude

Confiança média: li o resumo do capítulo e a descrição do `select`; os detalhes de `textarea`, `output` e `optgroup` não foram lidos por inteiro.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[tipos-do-elemento-input]] — os outros elementos completam os campos de entrada
- [[validacao-nativa-de-formularios-html5]] — required vale também em select e textarea
