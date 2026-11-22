---
titulo: "Encapsule as propriedades: privadas, com acesso por métodos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seção 11.3.4 (PDF p. 475-476)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Encapsule as propriedades: privadas, com acesso por métodos

## Regra

Marque as propriedades como `private` (ou `protected`, se a hierarquia precisar) e exponha o que for necessário por métodos públicos (`getX()` e `setX()`).

## Por quê

Para o livro, trabalhar de modo absolutamente limpo em orientação a objetos significa não ler as propriedades diretamente. O encapsulamento é boa prática de estilo, mantém a ordem nos scripts e ajuda com modelos de objetos e padrões de projeto. Um método de acesso também permite validar o valor antes de gravar (inferência minha).

## Quando não vale

Objetos de dados simples e imutáveis podem usar propriedades públicas `readonly` (inferência minha, apoiada na seção de `readonly`). O livro mesmo usa propriedades públicas em quase todos os exemplos, por brevidade didática.

## Como verificar

Procure `public $` em propriedades mutáveis; troque por `private` com métodos de acesso (ou `readonly`).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — a regra aplica a visibilidade
- [[responsabilidade-coesao-e-ortogonalidade]] — o encapsulamento sustenta a coesão da classe
- [[imutabilidade-datetime-e-datetimeimmutable]] — propriedades privadas e só leitura sustentam a imutabilidade
- [[campos-publicos-privados-e-estaticos-em-classes-javascript]] — a mesma ideia de encapsulamento
