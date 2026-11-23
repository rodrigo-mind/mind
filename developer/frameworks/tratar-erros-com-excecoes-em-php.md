---
titulo: "Tratar erros com exceções em PHP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4, seções sobre tratamento de erros, finally e a classe Error (PDF p. 131-148)"
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 3, seção sobre exceções (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tratar erros com exceções em PHP

## Para que serve

Avisar que algo deu errado sem encerrar o script nem "sujar" o valor de retorno, e deixar a decisão de como reagir para quem tem contexto para isso.

## Quando usar e quando não usar

- **Use** quando um método **detecta** o erro, mas não sabe o que fazer com ele. No exemplo do livro, `write()` sabe que não consegue gravar o arquivo e por quê, mas não sabe como o sistema deve reagir.
- As alternativas antigas têm problemas:
  - encerrar a execução é drástico: a classe derruba o script inteiro;
  - devolver um sinal de erro (`false`, `-1`, objeto de erro) obriga quem chama a testar o retorno em toda chamada, e quem chama pode não saber tratar o erro melhor que o método.

## O que perguntar ao usuário antes

- Que erros podem acontecer (arquivo, banco, dado inválido) e o que fazer em cada um: parar, registrar e seguir, ou mostrar mensagem?
- Onde ficam o log e a mensagem ao usuário?

## Passos

1. **Lance:** `throw new \Exception("mensagem", codigo)`. O `throw` para o método e passa o erro para quem chamou.
2. **Crie tipos de exceção** estendendo `Exception` (`class FileException extends \Exception {}`), por dois motivos: acrescentar dados (no exemplo, `XmlException` guarda o `LibXmlError`) e poder capturar cada tipo separadamente.
3. **Capture** com `try { ... } catch (TipoEspecifico $e) { ... }`, com um `catch` por tipo, **do mais específico para o mais genérico**. O primeiro que servir é usado, e um `catch (\Exception $e)` no topo engole todos os outros.
4. Ponha um `catch` genérico no fim, como rede de segurança para exceções novas, mas **faça algo nele**: falhar em silêncio gera bugs difíceis de achar.
5. Se não der para se recuperar, **lance de novo**, se possível uma exceção nova que embrulha a original e acrescenta contexto (o livro lista `getPrevious()`, que devolve a exceção aninhada; guardá-la pelo terceiro argumento do construtor, `new MinhaExcecao("msg", 0, $e)`, é complemento meu).
6. **Limpe em `finally`:** o bloco roda sempre, com ou sem exceção, inclusive quando o `catch` relança ou faz `return`. É o lugar para fechar arquivos, conexões e logs. Só não roda se houver `die()` ou `exit()`.
7. Para erros internos do motor (PHP 7+), capture `Error` ou suas subclasses (`TypeError`, `ArgumentCountError`, `DivisionByZeroError`, `ParseError`...). `Error` e `Exception` implementam a interface `Throwable`.
8. Se não precisar do objeto, o PHP 8 permite `catch (FileException)`, sem a variável.

## Saída esperada

Métodos que lançam exceções com tipo próprio e mensagem clara, e um ponto de chamada que decide o que fazer em cada tipo, com a limpeza garantida em `finally`.

## Erros comuns

- `catch` genérico antes dos específicos.
- `catch` vazio, que esconde o erro.
- Usar `die()` para tratar erro: dificulta os testes, impede a limpeza de outros trechos e pula o `finally` (ver a regra não use die ou exit para tratar erros).
- Pôr a limpeza depois do `try/catch`, achando que sempre vai rodar: um `catch` pode relançar ou encerrar o script.
- Exceção que ninguém captura: ela sobe até o topo e vira erro fatal ("Uncaught exception").

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
class ProdutoNaoEncontrado extends \Exception {}

function buscarProduto(PDO $pdo, int $id): array {
    $st = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
    $st->execute([$id]);
    $p = $st->fetch(PDO::FETCH_ASSOC);
    if ($p === false) {
        throw new ProdutoNaoEncontrado("Produto $id não existe");
    }
    return $p;
}

try {
    $produto = buscarProduto($pdo, (int)($_GET['id'] ?? 0));
} catch (ProdutoNaoEncontrado $e) {
    http_response_code(404);
    $erro = 'Produto não encontrado.';
} catch (\Throwable $e) {
    error_log($e);              // detalhe só no log
    http_response_code(500);
    $erro = 'Erro interno. Tente de novo.';
}
```

## Notas do Claude

- Com o PDO configurado em `PDO::ERRMODE_EXCEPTION`, os erros do banco já chegam como `PDOException` (ver acesso ao banco com PDO).
- Em produção, mostre ao usuário uma mensagem genérica e grave o detalhe no log (ver a regra não exiba erros na tela em produção). Erros que não são exceções seguem em níveis de erro e set_error_handler.

- Edmonds e Mitchell (cap. 3) confirmam o fluxo e acrescentam: o `catch` sempre declara o tipo; `Throwable` é o mais amplo (pega exceções e erros internos); um só `catch` pode pegar vários tipos separados por `|` (`catch (FooException|BarException $e)`); os `catch` costumam ir do mais estreito ao mais amplo, terminando em `Throwable`. Para a rede de segurança global, ver converter erros em exceções com manipuladores globais.

## Conexões

- [[regra-nao-use-die-ou-exit-para-tratar-erros]] — a regra mostra o que evitar ao tratar erros com exceções
- [[regra-nunca-silencie-excecoes]] — o framework de exceções traz o catch genérico que deve agir
- [[converter-erros-em-excecoes-com-manipuladores-globais]] — o manipulador global é a rede de segurança depois dos catch
- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — é o equivalente em JavaScript
- [[niveis-de-erro-e-set-error-handler]] — os erros que não são exceções seguem em níveis de erro
- [[acesso-ao-banco-com-pdo]] — o PDO em modo ERRMODE_EXCEPTION lança PDOException
- [[regra-nao-exiba-erros-na-tela-em-producao]] — em produção a mensagem é genérica e o detalhe vai ao log
- [[classes-de-erro-do-javascript-e-erros-personalizados]] — criar tipos próprios de exceção tem paralelo em JavaScript
