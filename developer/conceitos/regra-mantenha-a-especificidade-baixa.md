---
titulo: "Mantenha a especificidade dos seletores baixa e evite !important por reflexo"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 1, seções 1.1.3 e 1.1.4 (p. 12-18, numeração impressa)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mantenha a especificidade dos seletores baixa

## Regra

Prefira seletores de classe curtos e evite IDs e `!important` como reação automática a um conflito de estilos.

## Por quê

A especificidade vira uma corrida armamentista, sobretudo em projetos grandes: quanto mais alta a especificidade de uma regra, mais difícil é sobrepô-la depois. Manter baixa deixa as opções abertas. Historicamente, as duas regras práticas são não usar IDs nos seletores e não usar `!important`, porque dificultam sobrepor estilos no futuro.

Um caso a evitar, que o autor dá: ao publicar um módulo JavaScript reutilizável, não aplique estilos em linha por JavaScript; quem o usar teria de usar `!important` em cada propriedade que quiser mudar. O melhor é incluir uma folha de estilos e usar JavaScript para adicionar e remover classes.

## Quando não vale

O livro diz que isso está mudando: com camadas e escopo, há situações em que usar IDs e `!important` é aceitável (assunto da parte 3 do livro, ainda não destilada). Mesmo assim, nunca como reação automática a uma briga de especificidade.

## Como verificar

Procure `!important`, seletores com `#` e seletores de três ou mais níveis. Para cada um, veja se uma classe resolveria. As ferramentas do navegador (DevTools) mostram os seletores que se aplicam, ordenados por especificidade, e os valores sobrepostos riscados.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[especificidade-de-seletores]] — a regra dá a orientação prática para a especificidade
- [[camadas-da-cascata-em-css]] — as camadas reduzem a necessidade de truques de especificidade
- [[regra-limite-o-aninhamento-a-tres-niveis]] — o aninhamento profundo eleva a especificidade
- [[regra-nao-altere-um-modulo-com-seletores-de-contexto]] — é uma forma de manter a especificidade baixa
