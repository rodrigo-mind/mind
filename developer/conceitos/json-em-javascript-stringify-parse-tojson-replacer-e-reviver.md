---
titulo: "JSON em JavaScript: stringify, parse, toJSON, replacer e reviver"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.6 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# JSON em JavaScript: `stringify`, `parse`, `toJSON`, replacer e reviver

## Definição

JSON (JavaScript Object Notation) serializa objetos e vetores em texto. Suporta números, textos, `true`, `false`, `null`, vetores e objetos; **não** suporta `Map`, `Set`, `RegExp`, `Date` (vira texto) nem vetores tipados. É um subconjunto estrito do JavaScript: sem comentários e com nomes de propriedade entre aspas duplas.

- **`JSON.stringify(valor, replacer, espaço)`** gera o texto; o 3º argumento (número de espaços ou texto como `'\t'`) formata em várias linhas legíveis. **`JSON.parse(texto, reviver)`** reconstrói a estrutura. Cópia profunda simples: `JSON.parse(JSON.stringify(o))` (só para dados serializáveis).
- **`toJSON()`:** se o valor tem esse método, o `stringify` usa o retorno; `Date` o implementa (igual a `toISOString()`), então depois do `parse` volta um texto, não uma data.
- **Reviver (parse):** função chamada para cada valor primitivo, com a chave e o valor, no contexto do objeto contêiner; o retorno vira o novo valor, e `undefined` remove a propriedade (exemplo do livro: recriar `Date` a partir de textos ISO e ignorar chaves começadas por `_`).
- **Replacer (stringify):** um vetor de nomes (só essas propriedades, na ordem do vetor) ou uma função que devolve o valor a gravar (`undefined` omite).
- Usar `toJSON` ou replacers que troquem tipos exige reviver correspondente e cria um formato próprio, que perde a compatibilidade com o ecossistema JSON.
- **Nunca decodifique JSON com `eval`:** é falha de segurança; `JSON.parse` é mais rápido e seguro.

## Por que importa

É o formato de troca de dados mais usado com APIs.

## Como se relaciona

Veja `eval()` em JavaScript, a regra de nunca passar texto do usuário ao `eval`, usar a API fetch, o clone estruturado (ver armazenamento no navegador) e criar e consumir uma API REST simples em PHP.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[armazenamento-no-navegador]] — esta nota cita a ideia de «Armazenamento no navegador» na seção sobre como se relaciona
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — esta nota cita a ideia de «Criar e consumir uma API REST simples em PHP» na seção sobre como se relaciona
- [[datas-e-horas-com-date-em-javascript]] — Date vira texto no JSON
- [[eval-em-javascript]] — não decodificar JSON com eval
- [[usar-a-api-fetch]] — as respostas de API são lidas como JSON
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — cópia profunda por JSON
