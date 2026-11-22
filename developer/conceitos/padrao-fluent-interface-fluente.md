---
titulo: "Interface fluente (padrão Fluent)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Fluent (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Interface fluente (padrão Fluent)

## Definição

Os métodos que fazem algo devolvem `$this` (tipo `static`), o que permite encadear várias chamadas na mesma instância, em uma linha lógica que se lê como um passo a passo. Convém o método declarar `: static` como tipo de retorno.

## Por que importa

Dá legibilidade e é a base de builders como o do Doctrine; é um caso em que a regra de nomear métodos com verbos pode ser quebrada.

## Como se relaciona

Veja padrão Builder, nomes claros e linguagem ubíqua, e imutabilidade (uma variante devolve cópias em vez de `$this`, inferência minha no item abaixo).

## Notas do Claude

Interfaces fluentes imutáveis, que devolvem um novo objeto a cada chamada, são uma variação comum (conhecimento meu, não do trecho lido).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-builder]] — esta nota cita a ideia de «Padrão Builder» na seção sobre como se relaciona
- [[imutabilidade-datetime-e-datetimeimmutable]] — a variante imutável devolve cópias
