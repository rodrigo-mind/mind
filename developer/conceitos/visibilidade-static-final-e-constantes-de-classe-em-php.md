---
titulo: "Visibilidade, static, final e constantes de classe em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seções 11.3.4, 11.3.9 e 11.3.6 (PDF p. 473-481 e 484-486, 490-492)"
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4 (PDF p. 97-146)"
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 2, seção sobre static (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Visibilidade, static, final e constantes de classe em PHP

## Definição

- **`public`** (padrão), **`private`** (só dentro da própria classe) e **`protected`** (a classe e toda a sua hierarquia, pais e filhos). Valem para propriedades, métodos e, desde o PHP 7.1, constantes. `var` é antigo (igual a `public`) e não deve ser usado.
- **`static`:** propriedades e métodos acessados pelo nome da classe (`Classe::$prop`, `Classe::metodo()`), sem objeto; nesses métodos não há `$this`. **`self::`** se refere à classe onde o código está; **`static::`** ao tempo de execução (late static binding: em `Laptop::start()` herdado de `Computer`, `static::class()` usa `Laptop`, e `self::class()`, `Computer`). `static` também serve de tipo de retorno (`: static`, e `new static()`), e se combina em uniões (`?static`).
- **`final`:** em um método, impede que seja sobrescrito; em uma classe, impede herdar dela. Não existe propriedade `final`. No PHP 8, um método privado da classe-mãe com o mesmo nome do `final` não gera mais erro.
- **`readonly`:** desde o PHP 8.1, a propriedade só recebe valor no construtor (e na classe inteira, desde o 8.2).
- **Constantes** (`const nome = valor`; acesso `Classe::nome`): com visibilidade, `final` (PHP 8.1) e **tipo** (PHP 8.3: `public const string nome`).

## Por que importa

Controla o que pode ser usado e alterado de fora, e é a base do encapsulamento.

## Como se relaciona

A boa prática está em encapsule propriedades como privadas; ver também propriedades readonly em PHP e fundamentos de classes e objetos em PHP.


## Notas do Claude

- Zandstra (cap. 4) confirma e avisa: depender demais de métodos estáticos é um problema de projeto, e `final` deve ser usado com cuidado, porque limita a flexibilidade e atrapalha ferramentas de teste como o PHPUnit, que estendem classes para criar dublês. Constantes de classe podem ter visibilidade (7.1) e ser `final`.

- Edmonds e Mitchell (cap. 2) resumem: use `self::` para impedir a sobrescrita e `static::` para permitir. Usar demais o acesso estático traz acoplamento e dificulta testes e refatoração; o padrão deve ser métodos e propriedades de instância.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[propriedades-readonly-em-php]] — esta nota cita a ideia de «Propriedades readonly em PHP 8.1» na seção sobre como se relaciona
- [[fundamentos-de-classes-e-objetos-em-php]] — esta nota cita a ideia de «Fundamentos de classes e objetos em PHP» na seção sobre como se relaciona
- [[regra-encapsule-propriedades-como-privadas]] — a regra aplica a visibilidade
- [[padroes-de-criacao-de-objetos]] — static e new static aparecem nos padrões de criação
- [[enums-em-php]] — constantes tipadas e enums cobrem valores fixos
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — constantes de classe são o meio de aplicar a regra
- [[constantes-final-em-php]] — «Constantes final em PHP 8.1» cita esta nota ao explicar suas relações
- [[classes-com-a-palavra-class-em-javascript]] — static em PHP e em JavaScript
