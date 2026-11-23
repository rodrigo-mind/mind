---
titulo: "Não use die ou exit para tratar erros"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4, seções sobre exceções e finally (PDF p. 134-144)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não use die ou exit para tratar erros

## Regra

Num `catch`, ou ao detectar um erro dentro de uma classe, não chame `die()` ou `exit()`. Recupere-se do erro ou lance uma exceção.

## Por quê

- O livro diz que `die` torna o código mais difícil de testar e pode impedir que outras partes do sistema façam a limpeza necessária.
- `die()` e `exit()` dentro de `try` ou `catch` encerram o script, e o bloco `finally` **não roda**.
- Uma classe que encerra o script assume uma decisão que cabe a quem a chama.

## Quando não vale

- Métodos com retorno `never`, que existem justamente para encerrar com `exit()` (o livro dá esse exemplo).
- No ponto mais alto do script (o controlador da página), depois de já ter registrado o erro e mostrado a resposta, como num redirecionamento (`header('Location: ...'); exit;`). É inferência minha, fora do livro.

## Como verificar

Procure `die(` e `exit` nos `.php` (`grep -rnE '\b(die|exit)\s*\(' --include=*.php .`). Dentro de classes e de `catch`, não deve haver ocorrências, fora as exceções acima.

## Notas do Claude

O padrão `$pdo = new PDO(...) or die("erro")`, comum em tutoriais, cai nesta regra e ainda expõe detalhes do erro na tela.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[tratar-erros-com-excecoes-em-php]] — a alternativa a die é lançar e capturar exceções
- [[regra-nunca-silencie-excecoes]] — ambas tratam de mau uso do tratamento de erros
- [[tipo-de-retorno-never-em-php]] — métodos `never` são a exceção, pois existem para encerrar o script
- [[acesso-ao-banco-com-pdo]] — `new PDO(...) or die()` é um exemplo a evitar
