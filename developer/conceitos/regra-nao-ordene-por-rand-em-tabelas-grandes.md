---
titulo: "Não ordene por RAND() em tabelas grandes"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, vol. 1, cap. 16 Random Selection (PDF p. 200-209)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não ordene por RAND() em tabelas grandes

## Regra

Para sortear uma linha (anúncio, produto em destaque, depoimento), não use `ORDER BY RAND() LIMIT 1` em tabelas que crescem. Sorteie a posição e busque só aquela linha.

## Por quê

Ordenar por uma expressão aleatória não usa índice: o banco faz uma varredura completa da tabela (table scan), muitas vezes copia o resultado numa tabela temporária e ordena tudo "à mão". Com poucos dados, ninguém percebe e a consulta passa nos testes. Com a tabela grande, como no exemplo do livro do site de anúncios, a página fica cada vez mais lenta. O problema só aparece testando com um volume de dados parecido com o de produção.

**Alternativas do livro:**

1. **Chave aleatória entre o MIN e o MAX:** só funciona se as chaves forem contínuas, sem buracos.
2. **Próxima chave maior ou igual a um valor aleatório:** resolve os buracos, mas as linhas que vêm depois de um buraco saem com mais frequência.
3. **Lista de chaves no PHP e sorteio de uma:** boa para resultados de tamanho moderado. A consulta roda duas vezes.
4. **Deslocamento aleatório:** conte as linhas, sorteie um número entre 0 e o total e busque com `LIMIT 1 OFFSET n`. Funciona com buracos e dá chance igual a todas as linhas.
5. **Recurso próprio do banco:** `TABLESAMPLE` no SQL Server, `SAMPLE` no Oracle.
6. **Guardar o sorteio em cache:** mostrar o mesmo anúncio sorteado a todos por cinco minutos, e só então sortear de novo.

**Várias linhas:** repita a busca de uma linha aleatória quantas vezes precisar. Se não puderem se repetir, confira os resultados no código e continue até ter linhas distintas.

## Quando não vale

Listas pequenas que não vão crescer, como os estados do país ou a equipe de um setor. Nelas, `ORDER BY RAND()` é aceitável.

## Como verificar

Procure `ORDER BY RAND()` no código. Confira o tamanho atual da tabela e quanto ela pode crescer, e use `EXPLAIN` para ver se a consulta faz varredura e ordenação em arquivo ("Using temporary; Using filesort").

## Notas do Claude

Exemplo inventado por mim, em PHP com PDO: `$total = (int) $pdo->query('SELECT COUNT(*) FROM produtos WHERE ativo = 1')->fetchColumn(); $n = random_int(0, max(0, $total - 1)); $st = $pdo->prepare('SELECT * FROM produtos WHERE ativo = 1 LIMIT 1 OFFSET ?'); $st->bindValue(1, $n, PDO::PARAM_INT); $st->execute();`.

## Conexões

- [[antipadrao-de-sql-o-que-e]] — a regra segue a estrutura de capítulo descrita para os antipadrões
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[indices-com-o-metodo-mentor]] — a consulta com RAND() não usa índice e faz varredura
- [[acesso-ao-banco-com-pdo]] — o exemplo de alternativa usa PDO com consulta preparada
- [[numeros-aleatorios-e-precisao-em-php]] — a alternativa sorteia a posição com `random_int` no PHP
- [[mapa-sql-antipatterns]] — o mapa acompanha a destilação do livro de que esta nota veio
