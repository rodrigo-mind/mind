---
titulo: "Numerar linhas do resultado com ROW_NUMBER e GUIDs como chave"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 22, seção Solution: Get Over It e mini-antipadrão Auto-Increment per Group (PDF p. 280-283)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Numerar linhas do resultado com ROW_NUMBER

## Definição

Chaves geradas (autoincremento) parecem números de linha, porque crescem de um em um, mas isso é coincidência da implementação: uma chave primária identifica **uma linha de uma tabela**; um número de linha identifica uma posição **em um resultado de consulta**, e não corresponde à chave quando há `JOIN`, `GROUP BY` ou `ORDER BY`.

- **Numeração real:** a função de janela `ROW_NUMBER() OVER (ORDER BY ...)` (SQL:2003, suportada pelos bancos populares) devolve números consecutivos do resultado. Serve para **paginação**: numere em uma subconsulta e filtre `WHERE rn BETWEEN 51 AND 100`.
- **Contagem por grupo** ("a numeração recomeça em 1 para cada time, cliente ou defeito"): não faça uma coluna autoincremento por subgrupo (precisa bloquear inserções para olhar o último valor do subgrupo, ou criar um gerador por subgrupo); numere na consulta com `ROW_NUMBER() OVER (PARTITION BY grupo ORDER BY data)`.
- **GUIDs** como chave: números pseudoaleatórios de 128 bits (no SQL Server, `UNIQUEIDENTIFIER` com `NEWID()`). Vantagens: podem ser gerados em vários servidores sem repetir, e ninguém reclama de lacunas. Desvantagens: longos e difíceis de digitar, sem ordem (o maior não é o mais recente) e ocupam pelo menos 16 bytes, mais espaço e mais lentos que um inteiro de 4 bytes.

## Por que importa

Separa o que o banco garante (unicidade da chave) do que a tela precisa (numeração contínua).

## Como se relaciona

Ver não renumere chaves primárias e chave primária sob medida; a função de janela também aparece em obter a linha com o maior valor por grupo.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[obter-a-linha-com-o-maior-valor-por-grupo]] — esta nota cita a ideia de «Obter a linha com o maior valor por grupo» na seção sobre como se relaciona
- [[regra-nao-renumere-chaves-primarias-nem-reaproveite-ids]] — a numeração contínua se faz na consulta
- [[regra-chave-primaria-sob-medida]] — compara chaves geradas e GUIDs
