---
titulo: "Testes unitários em PHP com PHPUnit"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 36 (PDF p. 1296-1303)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Testes unitários em PHP com PHPUnit

## Para que serve

Verificar automaticamente e de forma repetida se uma unidade de código (função ou método) devolve o resultado esperado, para detectar erros cedo e permanentemente. O PHPUnit, de Sebastian Bergmann (desde 2004, nascido como porte do JUnit), é o padrão de fato.

## Quando usar e quando não usar

Use em lógica com regras claras (cálculos, validações, transformações). Partes que dependem de entrada do usuário, de banco ou de uma requisição HTTP exigem fornecer esses dados ou simulá-los (mock). O livro lembra que testar só a função isolada nem sempre basta.

## O que perguntar ao usuário antes

- Quais entradas devem produzir quais resultados (incluindo os casos de erro)?
- Composer está disponível?

## Passos

1. **Instalar:** `composer require --dev phpunit/phpunit` (precisa da extensão `mbstring`) ou baixar o arquivo PHAR (`phpunit-X.phar`) e torná-lo executável.
2. **Escrever a classe de teste:** estenda `PHPUnit\Framework\TestCase`; cada método de teste começa com `test`.
3. **Estrutura AAA** (Arrange, Act, Assert): preparar, executar a função, confirmar. As confirmações são métodos `assert...`, como `assertEquals($esperado, $obtido)`. Para exceções, `$this->expectException(Classe::class);` antes da chamada.
4. **Executar:** `vendor/bin/phpunit ArquivoTest.php` (ou `php phpunit.phar ArquivoTest.php`); o resultado informa testes e confirmações aprovados.
5. **Carregar o código:** em vez de `require` manual, use o autoload do Composer, e passe `--bootstrap autoload.php` ao PHPUnit.

## Saída esperada

Relatório com os testes aprovados ou reprovados, repetível a cada mudança.

## Erros comuns

- Testes que dependem de banco ou de rede reais, sem mock.
- Esquecer o prefixo `test` no nome do método (o teste não roda).
- Testar só o caminho feliz, sem os casos de exceção.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
final class PrecoTest extends PHPUnit\Framework\TestCase
{
    public function testDescontoDe10PorCento(): void
    {
        $this->assertSame(90.0, aplicarDesconto(100.0, 10));
    }
}
```

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[depurar-php-com-var-dump-e-xdebug]] — os testes automatizam a detecção de erros que a depuração acha
- [[gerenciar-dependencias-com-composer]] — o PHPUnit se instala e carrega pelo Composer
- [[carregamento-automatico-em-php]] — o PHPUnit usa o autoload com --bootstrap
- [[acoplamento-e-desacoplamento]] — código desacoplado é mais fácil de testar e de simular com mocks
- [[principios-solid]] — princípios SOLID facilitam o teste unitário
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[complexidade-ciclomatica]] — reduzir pontos de decisão sem testes é arriscado
- [[atributos-nativos-do-php-8]] — «Atributos nativos do PHP 8» cita esta nota ao explicar suas relações
