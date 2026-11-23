---
titulo: "Métodos de string com expressões regulares (search, replace e match)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.3.2 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Métodos de string e RegExp (`search`, `replace`, `match`, `matchAll`, `split`, `exec` e `test`)

## Definição

- **`search(regex)`:** posição do primeiro casamento ou -1; ignora a flag `g`.
- **`replace(regex, substituto)`:** com `g`, troca todos os casamentos; sem `g`, só o primeiro. Se o primeiro argumento é **texto**, ele é procurado literalmente (diferente de `search`, que converte em regex). No substituto, `$1`, `$2` referem-se aos grupos capturados, e `$<nome>` aos grupos nomeados (`(?<nome>...)`). Em vez de texto, aceita uma **função** que recebe o casamento completo, os grupos, a posição, o texto inteiro e, por fim, o objeto dos grupos nomeados (exemplo do livro: converter inteiros em hexadecimal).
- **`match(regex)`:** devolve um vetor ou `null`. Com `g`, devolve **todos** os casamentos (sem os grupos); sem `g`, devolve o primeiro casamento em `[0]`, os grupos em `[1]`, `[2]`..., além das propriedades `index`, `input` e `groups` (nomeados). A flag `y` (sticky) exige que o casamento comece onde `lastIndex` indica.
- **`matchAll(regex)`** (ES2020): exige a flag `g`; devolve um **iterador** de objetos de casamento (como os do `match` sem `g`, com `index` e grupos), a forma mais simples e geral de percorrer todos os casamentos. **Nunca altera `lastIndex`**.
- **`split(separador)`:** divide em vetor; o separador pode ser regex (`/\s*,\s*/`); se a regex tem grupos de captura, o texto capturado entra no vetor (`"Testing<br/>1,2,3".split(/<([^>]+)>/)` dá `["Testing", "br/", "1,2,3"]`).
- **Classe `RegExp`:** `new RegExp("\\d{5}", "g")` (barras invertidas dobradas) serve para regex montadas em tempo de execução, e `new RegExp(outra, "i")` copia mudando as flags. Propriedades somente leitura: `source`, `flags`, `global`, `ignoreCase`, `multiline`, `dotAll`, `unicode`, `sticky`; e `lastIndex` (leitura e escrita).
- **`regex.test(texto)`:** devolve `true` ou `false` (chama `exec`). **`regex.exec(texto)`:** um casamento por chamada, com o mesmo vetor do `match` sem `g` (incluindo `index`, `input`, `groups`), independentemente da flag `g`; com `g` ou `y`, usa e atualiza `lastIndex` (índice logo após o casamento, e volta a 0 se falhar), permitindo laço `while ((m = re.exec(texto)) !== null)`.
- **Armadilha do `lastIndex`:** com `g` ou `y`, `match`, `exec` e `test` dependem do estado do objeto. Um literal de regex dentro da condição do `while` recria o objeto a cada volta e pode gerar **laço infinito**; reutilizar uma regex global com `test()` num laço faz perder casamentos (o exemplo das palavras com letra dobrada: "book" some). Defina a regex uma vez fora do laço quando o laço precisa de estado; remova `g` quando não é necessário, recrie a regex ou zere `lastIndex`; ou use `matchAll`.
- O livro avisa: analisar URLs com regex não é boa ideia; use a classe `URL`.

## Por que importa

São os usos mais comuns das expressões regulares no dia a dia.

## Como se relaciona

Veja expressões regulares em JavaScript (sintaxe e flags), a classe `URL` e validar formulários em PHP.

## Notas do Claude

Para decidir entre as formas: `test` para verificar, `matchAll` para percorrer, `replace` para trocar, `split` para dividir (resumo meu).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[validar-formularios-em-php]] — esta nota cita a ideia de «Validar formulários em PHP» na seção sobre como se relaciona
- [[regra-nao-reutilize-regex-global-em-lacos-sem-controlar-lastindex]] — o lastIndex é explicado ali
- [[classe-url-e-urlsearchparams-em-javascript]] — o livro desaconselha analisar URLs com regex
