---
titulo: "Padrão Chain of Responsibility (cadeia de responsabilidade)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Chain of responsibilities (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Chain of Responsibility (cadeia de responsabilidade)

## Definição

Um dado ou evento passa em sequência por uma série de classes até uma delas **quebrar a cadeia** ou todas terem sido visitadas ("passa o pacote"). As classes implementam uma interface padronizada e há uma forma de registrar o próximo elo como propriedade; cada elo decide interromper ou passar adiante. No livro, o exemplo é o **middleware** (os do Laravel; o PHP-FIG padronizou os de HTTP na PSR-15): todo middleware se baseia nesse princípio.

## Por que importa

Organiza etapas ordenadas e independentes (autenticação, registro, cache) sem acoplá-las.

## Como se relaciona

Veja padrão Command, padrão Observer, padrão Decorator e o padrão MVC (o controlador recebe o resultado da cadeia).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-decorator]] — esta nota cita a ideia de «Padrão Decorator» na seção sobre como se relaciona
- [[padrao-command]] — esta nota cita a ideia de «Padrão Command» na seção sobre como se relaciona
- [[padrao-observer]] — esta nota cita a ideia de «Padrão Observer» na seção sobre como se relaciona
