---
titulo: "match e switch em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 5, seção 5.2 (PDF p. 205-219)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# match e switch em PHP

## Definição

**`switch`** compara uma variável com vários valores (`case`) e executa as instruções a partir do caso que bate, até um `break`. Sem `break`, ele continua executando os casos seguintes. Isso às vezes é desejado (vários casos com as mesmas instruções) e muitas vezes é um bug. `default` pega o que sobrou. Para o PHP, `switch` funciona como um laço: aceita `continue`, e `continue 2` passa para a próxima volta do laço externo.

**`match`** (PHP 8) foi pensado para substituir o `switch` em muitos casos:

- É uma **expressão**: devolve um valor (`$resultado = match($x) { ... };`) e por isso termina com ponto e vírgula.
- Cada linha é `valor => resultado`, separada por vírgula. Vários valores na mesma linha: `56, 57, 58 => "..."`.
- Não usa `break`: para no primeiro valor que bate.
- Compara com **igualdade estrita** (`===`), incluindo o tipo. A string `"55"` não bate com o inteiro `55`.
- Sem `default` e sem nenhum caso correspondente, lança **`UnhandledMatchError`**. O rigor é de propósito, para evitar bugs pequenos.
- Para faixas de valores, use `match(true)` com uma condição em cada linha (`$idade >= 10 && $idade < 30 => ...`). Nesse caso, a comparação dentro da condição segue as regras do operador usado.

**`if`:** o livro desaconselha a forma curta sem chaves, que fica difícil de ler. A forma com dois-pontos e `endif` tem um uso prático: alternar trechos de HTML em templates.

## Por que importa

`match` deixa curtas e seguras as conversões de valor, como status para rótulo ou código para texto, e acusa casos esquecidos em vez de seguir em silêncio.

## Como se relaciona

A igualdade estrita é a da regra use sempre a comparação idêntica em PHP. Com enums, `match` cobre cada caso (ver enums em PHP). A preferência por retorno antecipado em vez de `if` aninhado está na regra use retorno antecipado em vez de condicionais aninhadas.

## Notas do Claude

- Valores que vêm de `$_GET` e `$_POST` são strings: converta antes (`(int) $_GET['status']`), senão um `match` com inteiros cai no `default` ou lança `UnhandledMatchError` (inferência minha a partir do exemplo do livro).
- Exemplo inventado por mim: `$rotulo = match($pedido['status']) { 'pago' => 'Pago', 'enviado' => 'A caminho', 'cancelado' => 'Cancelado', default => 'Pendente' };`.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-use-sempre-a-comparacao-identica-em-php]] — o `match` compara com igualdade estrita, como manda a regra
- [[enums-em-php]] — combina bem com enums, cobrindo cada caso
- [[polimorfismo-no-lugar-de-condicionais]] — ambos tratam de substituir cadeias de condicionais, com `match` ou com objetos
- [[condicionais-em-javascript-if-else-if-e-switch]] — é o contraponto em JavaScript, onde o `switch` também compara de modo estrito
- [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]] — ambas reduzem a complexidade das condicionais
