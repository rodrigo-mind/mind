---
titulo: "Trabalhar com datas em PHP com DateTime"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 9, seção 9.2 (PDF p. 408-429)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Trabalhar com datas em PHP com DateTime

## Para que serve

Criar, ler, formatar e comparar datas: prazos, validade, datas de pedidos e contagens regressivas.

## Quando usar e quando não usar

- O livro diz que `DateTime` é há anos a principal ferramenta para datas. As funções antigas (`date()`, `getdate()`, `time()`, `mktime()`) ainda funcionam e aparecem em código legado.
- `strftime()` está descontinuada. O livro mostra a data em alemão com `setlocale()` e avisa que o recurso está obsoleto.

## O que perguntar ao usuário antes

- Em que fuso estão o servidor e os clientes (por exemplo, `America/Sao_Paulo`)?
- Em que formato a data é digitada no formulário e em que formato deve aparecer?

## Passos

1. **Defina o fuso:** todas as funções de data usam o fuso do **servidor**. Um servidor na Europa dá a hora errada para os EUA, no exemplo do livro. Ajuste com `date_default_timezone_set()` ou passe um `DateTimeZone` ao criar a data.
2. **Crie:** `new DateTime()` para agora, ou `new DateTime('2022-07-20 12:00:00', new DateTimeZone('Europe/Berlin'))`. Aceita também termos como `now` e `tomorrow` e um timestamp com `@`. Se o texto já trouxer o fuso (`+03:00`) ou for um timestamp, o segundo parâmetro é ignorado.
3. **Leia o que o usuário digitou** com `DateTime::createFromFormat('d/m/Y', $texto)`, informando o formato. Valide também: o livro sugere pedir dia, mês e ano em campos separados e conferir com `checkdate()`.
4. **Formate** com `$data->format('d/m/Y H:i')`. Os símbolos são os mesmos de `date()`: `d` dia com zero, `m` mês, `Y` ano com quatro dígitos. Para escrever uma letra literal, escape com `\`, e cuidado com `\t` e `\n` em aspas duplas.
5. **Calcule:** o livro subtrai timestamps (`getTimestamp()`, em segundos desde 1/1/1970) e divide por `60*60*24` para ter dias.

## Saída esperada

Datas criadas no fuso certo, lidas no formato esperado, validadas e mostradas no formato do usuário.

## Erros comuns

- Esquecer o fuso e gravar horários errados.
- Usar `new DateTime($texto)` com data brasileira: `05/03/2024` é lido no formato americano (mês/dia). Prefira `createFromFormat` (inferência minha, fora do livro).
- Usar timestamps de 32 bits para datas antes de 1901 ou depois de 2038: em sistemas antigos, eles estouram. Alguns sistemas nem aceitam datas antes de 1970. `DateTime` não tem esse limite.
- Pôr letras comuns no formato de `date()` sem escape.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
date_default_timezone_set('America/Sao_Paulo');
$entrega = DateTimeImmutable::createFromFormat('!d/m/Y', $_POST['data'] ?? '');
if ($entrega === false) {
    $erro = 'Data inválida. Use dd/mm/aaaa.';
} else {
    $dias = (new DateTimeImmutable('today'))->diff($entrega)->days;
    echo 'Faltam ' . $dias . ' dias (' . $entrega->format('d/m/Y') . ')';
}
```

## Notas do Claude

- Para contar dias, `diff()`, que devolve um `DateInterval`, considera horário de verão e anos bissextos melhor que a divisão de segundos do livro (inferência minha).
- Prefira `DateTimeImmutable` (ver imutabilidade, DateTime e DateTimeImmutable).
- No MySQL, guarde em `DATETIME` ou `DATE` e formate só na exibição (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[imutabilidade-datetime-e-datetimeimmutable]] — recomenda DateTimeImmutable
- [[datas-e-horas-com-date-em-javascript]] — é o equivalente em JavaScript
- [[validar-formularios-em-php]] — a data digitada deve ser validada com `checkdate` e `createFromFormat`
- [[internacionalizacao-com-intl-em-javascript]] — formatar datas por idioma tem o equivalente do lado do navegador
