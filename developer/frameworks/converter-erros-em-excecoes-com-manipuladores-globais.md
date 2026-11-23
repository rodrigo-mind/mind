---
titulo: "Converter erros em exceções com manipuladores globais (set_error_handler e set_exception_handler)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 3, seção sobre exceções e tratamento de erros (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Converter erros em exceções com manipuladores globais

## Para que serve

Garantir que todo erro do PHP vire uma exceção tratável e que nenhuma exceção escape sem um tratamento final: o usuário vê uma página amigável e o desenvolvedor recebe os detalhes.

## Quando usar e quando não usar

- **Use** em projetos sem framework, como os do projeto. O livro diz que todo framework ou projeto OO que os autores conhecem já faz isso.
- Não precisa se o framework já instala esses manipuladores.

## O que perguntar ao usuário antes

- Como distinguir desenvolvimento de produção (uma variável de ambiente, um arquivo de configuração)?
- Onde gravar o log, e qual página mostrar ao usuário em caso de erro?

## Passos

1. No arquivo que todo script inclui primeiro (o bootstrap), registre `set_error_handler()` com uma função que recebe `int $severidade, string $mensagem, string $arquivo, int $linha`.
2. Dentro dela, se a severidade não estiver ligada no `error_reporting()` atual (`0 === (error_reporting() & $severidade)`), devolva `true` e ignore. Caso contrário, lance `new ErrorException($mensagem, 0, $severidade, $arquivo, $linha)`.
3. Registre `set_exception_handler()` com uma função que recebe `Throwable`. Ela é a última defesa para exceções que passaram por todos os `catch`.
4. Nessa função, em produção, mostre uma mensagem amigável. Em modo de depuração, mostre os detalhes (no livro, com `var_export`).
5. Registre e notifique o erro com todas as informações úteis para depurar.

## Saída esperada

Um bootstrap em que avisos e notices viram `ErrorException`, e qualquer exceção não capturada termina numa resposta controlada.

## Erros comuns

- Mostrar os detalhes do erro em produção.
- Lançar exceção para níveis que foram desligados de propósito: o teste do `error_reporting()` evita isso, e também respeita o `@` (inferência minha).
- Achar que isso dispensa `try/catch`: o manipulador global é só a rede de segurança (ver tratar erros com exceções em PHP).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
// bootstrap.php
declare(strict_types=1);

set_error_handler(static function (int $sev, string $msg, string $file, int $line): bool {
    if (0 === (error_reporting() & $sev)) {
        return true;
    }
    throw new ErrorException($msg, 0, $sev, $file, $line);
});

set_exception_handler(static function (Throwable $e): void {
    error_log((string) $e);
    http_response_code(500);
    if (getenv('APP_DEBUG') === '1') {
        echo '<pre>' . htmlspecialchars((string) $e) . '</pre>';
        return;
    }
    require __DIR__ . '/erro-500.html';
});
```

## Notas do Claude

- Resolve a pendência da nota níveis de erro e set_error_handler, que não cobria a conversão em `ErrorException`.
- O livro cita duas bibliotecas: `symfony/error-handler` e `thecodingmachine/safe` (funções do PHP reescritas para lançar exceção em vez de devolver `false`).
- Erros fatais e de análise não passam pelo `set_error_handler` (ver a nota de níveis de erro). Para registrá-los, existe `register_shutdown_function()` com `error_get_last()` (inferência minha, fora do livro).

## Conexões

- [[regra-nunca-silencie-excecoes]] — o manipulador global garante que nada seja silenciado
- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[niveis-de-erro-e-set-error-handler]] — completa a nota, que não cobria a conversão em ErrorException
- [[tratar-erros-com-excecoes-em-php]] — o manipulador global é a rede de segurança dos try/catch
- [[regra-nao-exiba-erros-na-tela-em-producao]] — em produção, a página de erro não mostra detalhes
- [[depurar-php-com-var-dump-e-xdebug]] — em modo de depuração mostra os detalhes do erro
