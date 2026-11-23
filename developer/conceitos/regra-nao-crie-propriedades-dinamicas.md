---
titulo: "Não crie propriedades dinâmicas em objetos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 1, seção sobre classes (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não crie propriedades dinâmicas em objetos

## Regra

Declare toda propriedade na classe, com visibilidade e tipo, ou use a promoção no construtor. Não atribua propriedades que não foram declaradas (`$this->novaCoisa = ...`).

## Por quê

Uma propriedade criada na hora só pode ser pública e não tem tipo. Isso tira muito da segurança do código e abre espaço para vários bugs. Por isso, quem lê espera que uma propriedade dinâmica seja um erro, e a maioria dos editores (IDEs) já a marca com aviso.

## Quando não vale

- Em objetos feitos para isso, como `stdClass` ou o resultado de `json_decode()` sem `true`.
- Em classes que tratam o caso de propósito, com `__get` e `__set` documentados (ver a regra use métodos mágicos com cuidado e documente).

## Como verificar

Toda atribuição `$this->x` dentro da classe deve corresponder a uma propriedade declarada ou promovida. Um analisador estático, como PHPStan ou Psalm, aponta as que não correspondem.

## Notas do Claude

Fora do livro: desde o PHP 8.2, criar propriedade dinâmica gera aviso de descontinuação (deprecation), salvo em classes com o atributo `#[AllowDynamicProperties]`. Confira a versão do PHP do servidor.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-encapsule-propriedades-como-privadas]] — ambas pedem propriedades declaradas, com visibilidade
- [[fundamentos-de-classes-e-objetos-em-php]] — a promoção no construtor é a forma de declarar propriedades
- [[regra-use-metodos-magicos-com-cuidado-e-documente]] — `__get` e `__set` são a exceção documentada
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — trata do objeto usado como vetor associativo, onde propriedades dinâmicas são esperadas
