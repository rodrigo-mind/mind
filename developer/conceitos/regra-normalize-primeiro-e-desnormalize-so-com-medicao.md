---
titulo: "Normalize primeiro e desnormalize só com medição"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, apêndice 1, seção Myths About Normalization (PDF p. 342-344)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Normalize primeiro e desnormalize só com medição

## Regra

Modele o banco nas formas normais antes de pensar em desnormalizar; se for desnormalizar por desempenho, meça antes e depois.

## Por quê

O livro desfaz quatro mitos:
- **"Normalizar deixa o banco mais lento"**: falso. Pode exigir um `JOIN` para juntar atributos, mas a desnormalização costuma favorecer um tipo de consulta à custa de outros (a lista de produtos de um defeito ajuda a perguntar "quais produtos" e atrapalha "quais defeitos de um produto"). Existem usos legítimos da desnormalização.
- **"Normalização manda empurrar os dados para tabelas filhas com pseudochaves"**: falso. As pseudochaves são uma escolha de conveniência, desempenho ou espaço, sem relação com a normalização.
- **"Normalizar é separar os atributos ao máximo, como no EAV"**: falso, é o contrário; o EAV deixa os dados menos legíveis e mais difíceis de consultar.
- **"Ninguém precisa passar da terceira forma normal"**: falso (mais de 20% dos bancos violam a quarta).

## Quando não vale

Quando a medição mostra que uma consulta crítica precisa da duplicação, e o custo de manter a cópia consistente é aceito conscientemente.

## Como verificar

Para cada coluna duplicada de propósito, exija uma justificativa com a medição (e a forma de mantê-la sincronizada).

## Notas do Claude

Combina com o método Mentor de índices: medir antes de mexer (ver índices com o método Mentor).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[formas-normais-resumo]] — a regra tira a consequência prática das formas normais
- [[indices-com-o-metodo-mentor]] — a medição antes e depois é do método Mentor
