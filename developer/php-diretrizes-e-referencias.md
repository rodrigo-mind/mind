---
titulo: Diretrizes e fontes de referência para PHP
tipo: diretriz
criado: 2026-11-22
atualizado: 2026-11-22
---

# Diretrizes e Fontes de Referência para Desenvolvimento PHP

Guia de referência para gerar, refatorar e revisar código PHP e para direcionar a leitura de artigos e documentação sobre PHP. **Escopo: apenas PHP vanilla** (a linguagem e sua biblioteca padrão, sem frameworks), em linha com a stack de referência de `developer.md`. Artigos e guias específicos de Laravel, Symfony ou outro framework ficam fora. Sempre que tomar decisões arquiteturais, escolher padrões de projeto ou utilizar recursos da linguagem, baseie-se nas fontes e diretrizes listadas abaixo.

---

## 1. Fontes Canônicas e Documentação Oficial (Prioridade Máxima)

Ao consultar sintaxe, comportamentos internos, bibliotecas padrão e especificações, priorize estas fontes:

1. **Documentação Oficial do PHP (Manual PHP)**
   - **URL:** `https://www.php.net/manual/pt_BR/` (e `https://www.php.net/manual/en/` para atualizações mais recentes)
   - **Foco:** Funções nativas, SPL (Standard PHP Library), sistema de tipos (PHP 8.2, 8.3, 8.4+), atributos, fibras (Fibers), gerenciamento de memória e guias de migração entre versões.

2. **PHP-FIG (PHP Framework Interop Group)**
   - **URL:** `https://www.php-fig.org/psr/` e `https://www.php-fig.org/per/`
   - **Foco:** Especificações de interoperabilidade que valem para PHP puro. Siga rigorosamente:
     - **PER Coding Style 2.0** (evolução da PSR-12 para estilo de código moderno).
     - **PSR-4** (Autoloading).
     - **PSR-3** (Logger Interface).

3. **PHP The Right Way**
   - **URL:** `https://phptherightway.com/`
   - **Foco:** Guia vivo mantido pela comunidade com as melhores práticas atuais sobre injeção de dependência, bancos de dados (PDO), segurança, testes, e deploy.

---

## 2. Estilo, Tipagem Estática e Modernização

Para estruturar código robusto, limpo e fácil de manter, utilize as convenções destas referências:

1. **PHPStan User Guide (Análise Estática)**
   - **URL:** `https://phpstan.org/user-guide/getting-started` e `https://phpstan.org/writing-php-code/phpdocs-basics`
   - **Foco:** Escrita de código compatível com análise estática rigorosa (Nível 8/9), uso correto de *Generics*, *Array Shapes*, *Type Narrowing* e PHPDocs avançados apenas onde o sistema de tipos nativo não alcança.

2. **Rector PHP Rules Overview**
   - **URL:** `https://getrector.com/documentation`
   - **Foco:** Padrões de modernização contínua de código (ex: conversão para *Constructor Property Promotion*, *Readonly classes*, `match` expressions e remoção de código morto).

---

## 3. Segurança e Qualidade de Código

1. **OWASP PHP Security Cheat Sheet**
   - **URL:** `https://cheatsheetseries.owasp.org/cheatsheets/PHP_Configuration_Cheat_Sheet.html`
   - **Foco:** Prevenção contra SQL Injection (Prepared Statements), XSS (escape de contexto), CSRF, gerenciamento seguro de sessões e hashing de senhas (`password_hash` com Argon2id/Bcrypt).

2. **PHPUnit Documentation**
   - **URL:** `https://docs.phpunit.de/`
   - **Foco:** Escrita de testes unitários e de integração claros e expressivos, sem depender de framework.

---

## 4. Diretrizes Práticas Derivadas Dessas Fontes

Ao escrever código baseado nas referências acima, aplique automaticamente:

- **Tipagem Estrita e Moderna:** Sempre inicie arquivos com `declare(strict_types=1);`. Prefira tipos nativos explícitos, `readonly` properties/classes, *Backed Enums* e DTOs tipados em vez de arrays associativos genéricos.
- **Design Orientado a Objetos:** Aplique SOLID, composição sobre herança, injeção de dependência explícita no construtor e imutabilidade sempre que possível.
- **Zero Código Legado:** Evite padrões obsoletos (ex: `global`, `extract()`, funções `mysql_*`, manipulação insegura de arquivos, supressão de erros com `@`, ou estruturas `switch` que podem ser `match`).
- **Sem frameworks:** Use PHP puro e a biblioteca padrão. Não recomende nem aplique convenções de Laravel, Symfony ou similares.
- **Contexto do Projeto:** Antes de aplicar qualquer padrão, confirme a versão do PHP disponível na hospedagem e use só recursos que ela suporte.

## Conexões
- [[developer]] — complementa o centralizador com fontes de referência de PHP vanilla (manual, PSR, OWASP, testes), no mesmo escopo da stack de PHP puro sem framework definida aqui
- [[The-Art-of-Modern-PHP-8-(Joseph-Edmonds-Lorna-Jane-Mitchell) (epub)]] — o livro trata dos mesmos temas que esta nota manda aplicar (tipos estritos, `readonly`, enums, injeção de dependência e autoload PSR-4)
- [[PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra) (pdf)]] — o livro desenvolve a orientação a objetos, a composição e a injeção de dependência que esta nota pede como diretriz de design
- [[PHP-and-MySQL-The-Comprehensive-Guide-(Christian-Wenz-Tobias-Hauser) (pdf)]] — o livro tem capítulos de PDO e de segurança de sessões, temas para os quais esta nota indica fontes de referência
