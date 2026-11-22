---
titulo: "Expressões regulares em JavaScript: sintaxe e flags"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.3.1 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Expressões regulares em JavaScript: sintaxe e flags

## Definição

Uma expressão regular é um objeto `RegExp` que descreve um padrão de texto, uma "mini-linguagem" parecida com a de outras linguagens. Escreve-se como literal entre barras (`/s$/`) ou com `new RegExp("s$")` (aí as barras invertidas precisam ser dobradas, por causa do texto). **Flags** vêm depois da segunda barra: `i` (ignora maiúsculas e minúsculas), `g` (global), `y` (sticky), `u` (Unicode), `s` (o ponto casa também quebras de linha).

- **Literais:** letras e dígitos casam consigo mesmos; escapes como `\n`, `\t`, `\xnn`, `\uxxxx` e `\u{n}` (esta só com `u`). Os caracteres especiais `^ $ . * + ? = ! : | \ / ( ) [ ] { }` precisam de `\` para valerem literalmente (pode-se usar `\` antes de qualquer pontuação).
- **Classes de caracteres:** `[abc]`, negada `[^abc]`, intervalos `[a-z]`; atalhos `.`, `\w` (só ASCII), `\s` (espaço Unicode), `\d` (só ASCII) e as negações `\W`, `\S`, `\D`. Com `u`, `\p{...}` e `\P{...}` casam por propriedade Unicode (por exemplo `\p{Decimal_Number}`), já suportados em Node, Chrome, Edge e Safari no início de 2020.
- **Repetição:** `{n,m}`, `{n,}`, `{n}`, `?` (0 ou 1), `+` (1 ou mais) e `*` (0 ou mais); aplicam-se ao item anterior (um caractere, uma classe ou um grupo). Cuidado: `*` e `?` aceitam casar nada (`/a*/` casa em "bbbb"). Por padrão a repetição é **gulosa** (casa o máximo possível); com `?` depois (`+?`, `*?`, `{1,5}?`) é **preguiçosa**, mas isso não garante o menor trecho geral: `/a+?b/` em "aaab" ainda casa tudo, porque o casamento começa na primeira posição possível.
- **Alternância, grupos e referências:** `|` separa alternativas, testadas da esquerda para a direita (`/a|ab/` em "ab" casa só "a"); `( )` agrupa e **captura** (numerados pela ordem do parêntese de abertura, inclusive aninhados); `(?: )` agrupa sem capturar; `\1`, `\2`... voltam a referir o **texto** que o grupo casou (por exemplo `/(['"])[^'"]*\1/` exige aspas de abertura e fechamento iguais; não vale dentro de classe de caracteres). **Grupos nomeados** (ES2018): `(?<cidade>\w+)`, com referência `\k<nome>`; deixam a regex autoexplicativa.
- **Âncoras (posição):** `^` e `$` (início e fim; com `m`, de cada linha), `\b` (limite de palavra; `[\b]` é backspace) e `\B`; **lookahead** `(?=p)` e `(?!p)` (exige ou proíbe que o que vem a seguir case, sem consumir) e **lookbehind** `(?<=p)` e `(?<!p)` (ES2018; no início de 2020 só em Node, Chrome e Edge).
- **Flags** (seis): `g` (todos os casamentos), `i`, `m` (multilinha), `s` (o ponto casa também quebras de linha; ES2018), `u` (Unicode: casa pontos de código inteiros, habilita `\u{...}` e `\p{...}`; o livro recomenda usar **em todas as regexes**, salvo motivo contrário) e `y` (sticky: o casamento começa no início ou logo após o anterior). Combinam-se em qualquer ordem.

## Por que importa

É a ferramenta para validar e extrair padrões de texto.

## Como se relaciona

Veja métodos de string e `RegExp` para casar padrões, validação nativa de formulários em HTML5 (atributo `pattern`) e validar formulários em PHP.

## Notas do Claude

O livro (início de 2020) dá o suporte de lookbehind, `\p{}`, `s` e grupos nomeados como parcial entre navegadores; hoje é bem mais amplo (conhecimento meu, a conferir).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[validacao-nativa-de-formularios-html5]] — esta nota cita a ideia de «Validação nativa de formulários em HTML5» na seção sobre como se relaciona
- [[validar-formularios-em-php]] — esta nota cita a ideia de «Validar formulários em PHP» na seção sobre como se relaciona
- [[regra-nao-reutilize-regex-global-em-lacos-sem-controlar-lastindex]] — as flags g e y
