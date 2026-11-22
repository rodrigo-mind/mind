---
titulo: "Constantes final em PHP 8.1"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 12, seção Final constants (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Constantes final em PHP 8.1

## Definição

Constantes de classe podem ser sobrescritas em classes filhas, e, antes do PHP 8.1, as definidas em **interfaces** não podiam. No 8.1, constantes podem ser sobrescritas em qualquer nível, inclusive nas vindas de interface, **a menos que marcadas `final`**; tentar sobrescrever uma constante `final` é erro fatal. A visibilidade (`public`, `protected`, `private`) continua valendo.

No exemplo do livro, a classe pai sobrescreve uma constante da interface e torna outra `final`. Também se vê a diferença entre `self::CONST` (valor da classe onde o método foi escrito) e `static::CONST` (valor da classe chamadora, pela ligação estática tardia).

## Por que importa

O autor recomenda marcar as constantes como `final` por padrão e só permitir a sobrescrita por exceção, para o código ser mais robusto e previsível. As constantes são a boa solução contra textos e números mágicos.

## Como se relaciona

Veja visibilidade, static, final e constantes de classe em PHP, a regra de usar constantes nomeadas (DRY) e enums em PHP.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[enums-em-php]] — esta nota cita a ideia de «Enumerações em PHP 8.1» na seção sobre como se relaciona
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — esta nota cita a ideia de «Visibilidade, static, final e constantes de classe em PHP» na seção sobre como se relaciona
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — constantes nomeadas, agora protegidas contra sobrescrita
