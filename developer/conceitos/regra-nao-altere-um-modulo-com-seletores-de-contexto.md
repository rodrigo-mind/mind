---
titulo: "Não altere um módulo com seletores de contexto"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 9, seção 9.1.3 (PDF p. 275-277; impressa 245-247)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não altere um módulo com seletores de contexto

## Regra

Nunca use seletores descendentes para mudar a aparência de um módulo conforme o lugar da página (`.page-header .dropdown`); crie uma classe modificadora aplicada diretamente ao elemento (`.dropdown--dark`).

## Por quê

O autor chama de "a melhor coisa para evitar o CSS impossível de manter". Os problemas do seletor de contexto:
- **Onde pôr o código?** Junto do cabeçalho ou do menu? Com o tempo, a folha vira uma lista desordenada de regras avulsas, difíceis de achar.
- **Especificidade crescente:** cada novo ajuste precisa igualar ou superar a anterior (a regra acaba com dois IDs e cinco classes para atingir uma caixa de seleção).
- **Reutilização:** se o menu escuro for necessário na barra lateral, será preciso duplicar ou acrescentar seletores.
- **Acoplamento à estrutura do HTML**, e código que ninguém tem coragem de apagar.

Com o modificador, só o módulo decide a sua aparência, e outros módulos não conseguem mexer nele.

## Quando não vale

Variantes que ajustam os filhos do **próprio módulo** (`.media--right .media__image`) são aceitas.

## Como verificar

Procure seletores que combinam um módulo com um contêiner de página (`.sidebar .card`, `.header .button`) e troque por modificadores.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[css-modular-modulos-variantes-e-bem]] — a regra principal do CSS modular
- [[especificidade-de-seletores]] — seletores de contexto aumentam a especificidade
- [[regra-mantenha-a-especificidade-baixa]] — é uma forma de manter a especificidade baixa
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
