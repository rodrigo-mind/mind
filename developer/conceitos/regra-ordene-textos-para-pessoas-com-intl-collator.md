---
titulo: "Regra: ordene textos para pessoas com Intl.Collator"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.7.3 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Ordene textos para pessoas com `Intl.Collator`

## Regra

Para exibir textos em ordem alfabética a um usuário, use `new Intl.Collator(localidade, opções).compare` no `sort()`, e não a ordenação padrão.

## Por quê

A ordenação padrão compara valores Unicode de 16 bits: todas as maiúsculas ASCII vêm antes das minúsculas e letras acentuadas ficam fora de lugar. Cada idioma tem sua ordem natural (ñ depois de n em espanhol). O livro dá a regra: "nunca ordene textos legíveis por pessoas sem passar algo como" um collator. Com `numeric: true`, "page9" vem antes de "page10" (útil para nomes de arquivo).

## Quando não vale

Para ordenar identificadores técnicos ou chaves em que se quer ordem estável e independente de localidade.

## Como verificar

Procure `.sort()` sem argumento (ou com `<`) sobre listas de nomes, títulos ou categorias mostradas ao usuário.

## Notas do Claude

Em PHP, o equivalente é a classe `Collator` da extensão `intl` (conhecimento meu, não do livro lido).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[internacionalizacao-com-intl-em-javascript]] — a classe Collator é descrita ali
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — a comparação padrão de textos é por valor Unicode
- [[vetores-e-iteracao-em-javascript]] — sort() de vetores
