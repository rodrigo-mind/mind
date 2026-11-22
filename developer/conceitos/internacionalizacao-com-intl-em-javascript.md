---
titulo: "Internacionalização com Intl em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.7 (PDF p. 285-344, capítulo 11)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Internacionalização com `Intl` em JavaScript

## Definição

A API de internacionalização (padrão ECMA402, não do ECMAScript) tem três classes: `Intl.NumberFormat`, `Intl.DateTimeFormat` e `Intl.Collator`. Não traduz textos; só formata e compara conforme a localidade. Em Node, os binários prontos podem não trazer dados de localidades além do inglês dos EUA.

- **Argumentos:** (1) a localidade (`"en-US"`, `"fr"`, `"zh-Hans-CN"`, ou vetor delas; se omitida, usa a do sistema) e (2) um objeto de opções.
- **`Intl.NumberFormat`:** `style` (`"decimal"`, `"percent"`, `"currency"`), `currency` (código ISO, obrigatório com `currency`), `currencyDisplay`, `useGrouping`, `minimumIntegerDigits`, `minimumFractionDigits` e `maximumFractionDigits`, e dígitos significativos. Exemplos do livro: `10` em euros na localidade `"es"` dá "10,00 €"; mil libras em `"en"` dá "£1,000.00". O `format` já é ligado ao objeto, então se pode usá-lo como função solta (`data.map(formatData)`). Para trocar o sistema de dígitos, acrescente `-u-nu-` à localidade (por exemplo `hi-IN-u-nu-deva`).
- **`Intl.DateTimeFormat`:** mesmas duas entradas; você escolhe quais campos mostrar (ano, mês, dia, dia da semana, hora...) e o formato (numérico, `2-digit`, nome longo ou curto); o formatador procura o formato local mais próximo e pode mostrar campos a mais. Dá mais controle que `toLocaleDateString()`.
- **`Intl.Collator`** (seção 11.7.3): ordena e compara textos na ordem natural de cada idioma (o ñ vem depois do n no espanhol; o galês trata CH e DD como letras), o que o `sort()` padrão, por valor Unicode, não faz. Duas entradas (localidade e opções); passa-se o `compare` (já ligado ao objeto) ao `sort()`. Opções: `usage` (`"sort"` ou `"search"`), `sensitivity` (`"base"` ignora caixa e acentos, `"accent"`, `"case"`, `"variant"`: o padrão para ordenar), `ignorePunctuation`, `numeric` (ordena "Versão 9" antes de "Versão 10"; útil para nomes de arquivo) e `caseFirst`. Variantes de ordenação vão na localidade com `-u-co-` (por exemplo `de-DE-u-co-phonebk`, `es-ES-u-co-trad`, `zh-TW-u-co-pinyin`). O livro diz: nunca ordene textos para pessoas sem passar algo como `new Intl.Collator().compare`. Exemplo de busca "frouxa": `sensitivity: "base"` com `ignorePunctuation: true`.

## Por que importa

Formatar valores e datas para o usuário final sem escrever regras manuais.

## Como se relaciona

Veja datas e horas com `Date`, igualdade e comparação (ordem de textos) e fazer pedidos HTTP.

## Notas do Claude

Não li a lista completa de opções de `DateTimeFormat` (campos de data e hora), só o princípio geral; por isso a nota diz "mais controle" sem listá-las. Confiança alta no `Collator` e no `NumberFormat`; a nota fica em média pela leitura parcial do `DateTimeFormat`.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-ordene-textos-para-pessoas-com-intl-collator]] — a classe Collator é descrita ali
