---
titulo: "Enumerações em PHP 8.1 (enums)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 12, seção Enumerations"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Enumerações em PHP 8.1 (enums)

## Definição

Um enum é um tipo especial com uma lista fixa de valores possíveis, os casos (cases). Há dois tipos:

- **Básico (pure):** só os casos, cada um com a propriedade `name`.
- **Com valor associado (backed):** cada caso tem `name` e `value`, e todos os valores são do mesmo tipo escalar (`string` ou `int`), declarado depois do nome: `enum Status: string`.

Enums podem conter constantes e métodos, implementar interfaces e usar traits (desde que o trait não tenha propriedades). Todo enum tem o método `cases()`, com a lista de casos.

Para criar uma instância: o caso explicitamente (`Status::Novo`); a partir de um valor escalar confiável, `from()`, que falha se não houver correspondência; e a partir de dado não confiável (entrada do usuário), `tryFrom()`, que devolve `null` se não houver, e que se combina com um valor padrão (`?? Status::PADRAO`).

## Por que importa

Substitui conjuntos de constantes ou strings soltas por um tipo restrito e verificável. O livro sugere refatorar código existente para enums.

## O que enums não podem

- Não têm herança (são, na prática, `final`).
- Não têm propriedades (nem estado); por isso não têm construtor nem destrutor.

## Como se relaciona

Para guardar o valor no banco, o enum com valor associado se liga bem a uma tabela de consulta (ver regra de valores permitidos em tabela de consulta), e a entrada de formulário deve passar por `tryFrom`.

## Notas do Claude

Exigem PHP 8.1 ou superior. Na hospedagem compartilhada do projeto, confira a versão do PHP antes de usar (inferência minha).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-valores-permitidos-em-tabela-de-consulta]] — esta nota cita a ideia de «Guarde os valores permitidos em uma tabela de consulta, e não na definição da coluna» na seção sobre como se relaciona
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — constantes tipadas e enums cobrem valores fixos
- [[constantes-final-em-php]] — «Constantes final em PHP 8.1» cita esta nota ao explicar suas relações
- [[atributos-nativos-do-php-8]] — «Atributos nativos do PHP 8» cita esta nota ao explicar suas relações
