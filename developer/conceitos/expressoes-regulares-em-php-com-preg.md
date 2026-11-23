---
titulo: "Expressões regulares em PHP com preg_match e preg_replace"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 10 (PDF p. 430-448)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Expressões regulares em PHP com preg

## Definição

As expressões regulares do PHP vêm do Perl (PCRE) e servem para validar e buscar dentro de textos quando uma comparação simples não basta. As antigas funções POSIX (`ereg_*`) foram removidas.

**Sintaxe básica:**

- `^` marca o início e `$` o fim; `\b` marca o limite de palavra.
- `[ADZ]` é um grupo de caracteres e `[^...]` exclui caracteres.
- `\d` são dígitos, `\w` letras e números ASCII, `\s` espaços. As maiúsculas (`\D`, `\W`, `\S`) negam.
- Quantidade: `{5}`, `{2,4}`, `?` (0 ou 1), `*` (0 ou mais), `+` (1 ou mais). Por padrão, a busca é **gulosa** e pega o máximo possível.
- `( | )` cria alternativas e grupos; `\1` e `\2` se referem aos grupos; `(?: )` agrupa sem guardar.
- Metacaracteres literais são escapados com `\`.

**Funções:**

- `preg_match($padrao, $texto, $partes)` devolve **1** se encontrou, **0** se não e **`false`** em caso de erro. Por isso, compare de forma estrita. Em `$partes`, o índice 0 é o trecho inteiro e os seguintes são os grupos. `PREG_OFFSET_CAPTURE` acrescenta as posições, e o quinto parâmetro define de onde começar.
- `preg_match_all()` encontra todas as ocorrências, organizadas por `PREG_PATTERN_ORDER` (o padrão) ou `PREG_SET_ORDER`.
- `preg_replace()` troca o que encontrou e pode reusar grupos (`"\\2, \\1"`); `preg_replace_callback()` chama uma função para cada ocorrência.
- `preg_split()` divide o texto; `preg_grep()` filtra um vetor.
- O padrão fica entre delimitadores iguais (o comum é `/`). Se o delimitador aparecer dentro do padrão, escape-o.
- Modificadores depois do delimitador: `i` ignora maiúsculas, `x` ignora espaços no padrão, `U` deixa a busca não gulosa.

**Exemplos do livro:** CEP americano (`^\d{5}(?:[- ]\d{4})?$`), data MM/DD/AAAA e filtro de links. Para telefones, o livro diz que a validação é difícil pelas muitas variantes, e que o formulário deve explicar com precisão o formato esperado.

## Por que importa

Validar formatos de formulário (CEP, CPF, telefone) e extrair dados de textos no servidor.

## Como se relaciona

A sintaxe é a mesma das expressões regulares em JavaScript. A validação de formulários está em validar formulários em PHP e em filtrar entrada com filter_input (que tem `FILTER_VALIDATE_REGEXP`). O escape de texto literal num padrão está em escapar texto conforme o destino em PHP.

## Notas do Claude

- Para o Brasil, exemplos meus: CEP `/^\d{5}-?\d{3}$/`; celular com DDD `/^\(?\d{2}\)?\s?9\d{4}-?\d{4}$/`. O CPF exige conferir os dígitos verificadores, e uma regex não basta.
- Com texto em UTF-8, use o modificador `u`, senão `\w` e `.` tratam `ç` e `ã` como dois bytes (conhecimento meu, a conferir).
- Para validar e-mail, prefira `filter_var($email, FILTER_VALIDATE_EMAIL)` a uma regex própria (inferência minha; o livro remete o tema ao capítulo 13).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[expressoes-regulares-em-javascript-sintaxe-e-flags]] — a sintaxe básica é a mesma das expressões regulares em JavaScript
- [[filtrar-entrada-com-filter-input]] — filter_input aceita `FILTER_VALIDATE_REGEXP` para aplicar um padrão
- [[validar-formularios-em-php]] — as regex servem para validar formatos como CEP e telefone
- [[escapar-texto-conforme-o-destino-em-php]] — texto literal dentro de um padrão precisa de escape próprio
