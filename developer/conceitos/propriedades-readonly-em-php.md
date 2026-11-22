---
titulo: "Propriedades readonly em PHP 8.1"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 12, seção Readonly properties"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Propriedades readonly em PHP 8.1

## Definição

A palavra `readonly` antes de uma propriedade (inclusive na promoção do construtor) a torna de escrita única: o valor pode ser definido uma vez, dentro da classe, e depois fica travado; de fora da classe, não se escreve. Isso permite objetos imutáveis (DTOs) com o mínimo de código: `public function __construct(public readonly int $num)`.

## Por que importa

- Substitui o padrão clássico de propriedades privadas com getters, em menos código.
- Permite a "escrita única" mesmo quando o valor não vem do construtor, sem a verificação manual com `isset`, que falha quando `null` é um valor válido.
- Nem a Reflection consegue alterar o valor depois de definido.

## Armadilhas

- **A imutabilidade não se propaga a objetos:** uma propriedade `readonly` com um `DateTime` impede trocar o objeto, mas não impede alterá-lo por dentro (`setDate`). O livro recomenda usar `DateTimeImmutable` e objetos imutáveis nas propriedades readonly.
- **Clonar e alterar:** o padrão de `with()` por `clone` falha, porque o clone já copia o valor inicializado e continua somente leitura. Em vez disso, crie uma instância nova, repetindo os parâmetros do construtor, todos opcionais e com valor padrão `null`, e combine com parâmetros nomeados.

## Como se relaciona

Combina com o uso de tipos estritos (ver regra strict types) e é boa base para objetos de valor e DTOs.

## Notas do Claude

Exige PHP 8.1 ou superior; propriedades readonly precisam ter tipo declarado (inferência minha, da documentação do PHP, não do trecho lido).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-strict-types-em-todo-arquivo-php]] — esta nota cita a ideia de «Declare strict_types e tipos de parâmetro e retorno em todo arquivo PHP» na seção sobre como se relaciona
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — «Visibilidade, static, final e constantes de classe em PHP» cita esta nota ao explicar suas relações
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — «Null, void e propriedades não inicializadas em PHP» cita esta nota ao explicar suas relações
- [[imutabilidade-datetime-e-datetimeimmutable]] — «Imutabilidade: DateTime e DateTimeImmutable» cita esta nota ao explicar suas relações
- [[atributos-nativos-do-php-8]] — «Atributos nativos do PHP 8» cita esta nota ao explicar suas relações
