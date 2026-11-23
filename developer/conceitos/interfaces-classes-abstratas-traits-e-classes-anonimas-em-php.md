---
titulo: "Interfaces, classes abstratas, traits e classes anônimas em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seções 11.3.5, 11.3.7, 11.3.8 e 11.3.11 (PDF p. 482-502)"
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4 (PDF p. 97-174)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Interfaces, classes abstratas, traits e classes anônimas

## Definição

- **Interface:** modelo que declara métodos sem implementação; uma classe a cumpre com `implements`. Não tem propriedades, e os parâmetros do método precisam coincidir. Uma classe pode implementar **várias** interfaces (separadas por vírgula).
- **Classe abstrata** (`abstract class`, com métodos `abstract`): não se instancia; a subclasse implementa os métodos. Diferente da interface, **uma classe só herda de uma**. Os métodos abstratos não podem ser `private` nem `final`, e não existem propriedades abstratas obrigatórias.
- **Trait:** conjunto de métodos (e, mais raramente, propriedades) reaproveitável sem hierarquia, definido com `trait` e usado com `use` dentro da classe (várias, separadas por vírgula). Se o mesmo método existe em vários lugares, a prioridade é: o da própria classe, depois o do trait, depois o herdado. Conflitos entre traits se resolvem com `insteadof` (escolhe qual vale) e `as` (apelido e/ou nova visibilidade).
- **Classe anônima** (PHP 7): `new class { ... }`, para uma estrutura de uso único (por exemplo, passada como parâmetro). Aceita construtor, herança, interfaces e traits.

## Por que importa

Dão contratos (interface), esqueleto parcial (abstrata) e reaproveitamento horizontal de código (trait).

## Como se relaciona

Complementam fundamentos de classes e objetos em PHP e composição em vez de herança; a preferência por interfaces vem de princípios SOLID e polimorfismo no lugar de condicionais.

## Notas do Claude

O livro de padrões (*PHP 8 Objects*) recomenda composição antes de herança; traits são uma forma de reaproveitar sem herdar, mas escondem dependências, então use com moderação (inferência minha).

- Zandstra (cap. 4) confirma: uma classe abstrata sem métodos abstratos quase sempre é desnecessária; quem implementa precisa repetir a assinatura; `extends` vem antes de `implements`; conflitos entre traits se resolvem com `insteadof` e apelidos com `as`; classes anônimas não capturam variáveis do contexto (passe pelo construtor).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[polimorfismo-no-lugar-de-condicionais]] — esta nota cita a ideia de «Polimorfismo no lugar de condicionais» na seção sobre como se relaciona
- [[fundamentos-de-classes-e-objetos-em-php]] — esta nota cita a ideia de «Fundamentos de classes e objetos em PHP» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[principios-solid]] — interfaces apoiam os princípios de inversão e substituição
- [[acoplamento-e-desacoplamento]] — programar para interfaces reduz o acoplamento
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — interfaces são tipos do objeto
- [[tipos-de-intersecao-em-php]] — a interseção combina interfaces
- [[classes-abstratas-e-hierarquias-de-classes-em-javascript]] — classes abstratas formais em PHP
- [[callbacks-funcoes-anonimas-e-closures-em-php]] — as classes anônimas também são tratadas do ponto de vista de callbacks e closures
