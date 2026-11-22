---
titulo: "Descreva a responsabilidade de cada classe em 25 palavras ou menos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 6, seção Choosing Your Classes (PDF p. 243-246)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Descreva a responsabilidade de cada classe em 25 palavras ou menos

## Regra

Pense em uma classe como algo com um foco o mais estreito possível, e escreva a responsabilidade dela em até 25 palavras, raramente usando "e" ou "ou". Se a frase ficar longa ou cheia de ressalvas, divida a classe.

## Por quê

Modelar classes como substantivos do mundo real (Pessoa, Fatura, Produto) é um bom começo, mas a classe incha à medida que se acrescentam verbos. No exemplo do livro, `ShopProduct` cuida dos dados do produto; ao acrescentar `write()`, `writeXML()` e `writeHTML()`, passa a cuidar também da exibição. O livro separa em dois tipos: `ShopProduct` (dados) e `ShopProductWriter` (exibição).

## Quando não vale

As regras de projeto raramente são inflexíveis: às vezes o código que grava os dados do objeto mora na própria classe, porque o método precisa de acesso total aos campos e evita uma hierarquia paralela de persistência com acoplamento inevitável. O livro recomenda evitar a adesão religiosa às regras e lembrar o raciocínio por trás delas.

## Como verificar

Escreva a descrição da classe em uma frase. Se passar de 25 palavras, ou precisar de "e" para unir tarefas diferentes, avalie dividir.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[responsabilidade-coesao-e-ortogonalidade]] — a regra dá o critério prático de responsabilidade
