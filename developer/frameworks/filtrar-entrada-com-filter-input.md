---
titulo: "Filtrar e validar entrada com filter_input e filter_var"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 32, seção 32.5, p. 1209-1213"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Filtrar e validar entrada com filter_input e filter_var

## Para que serve

Usar a extensão de filtros do PHP, incluída sem instalação, para validar ou limpar dados de entrada.

## Quando usar e quando não usar

Use para validar formato (e-mail, inteiro, URL) em complemento à validação de campos obrigatórios. Não substitui a parametrização no banco nem o escape na saída.

## O que perguntar ao usuário antes

- Que tipo de dado cada campo deve ter?
- Se é só validar (recusar entrada inválida) ou também limpar.

## Passos

1. Para dados de uma entrada (GET, POST, cookie), chame `filter_input(INPUT_POST, "campo", FILTRO)`; para um valor qualquer, `filter_var($valor, FILTRO)`.
2. Escolha o grupo de filtros: os que têm `VALIDATE` no nome só verificam (e devolvem o valor, `false` ou `null` se inválido): `FILTER_VALIDATE_EMAIL`, `FILTER_VALIDATE_INT`, `FILTER_VALIDATE_URL`. Os que têm `SANITIZE` alteram o dado, removendo o que não pertence ao formato.
3. Para formatos próprios, `FILTER_VALIDATE_REGEXP` com a opção `regexp` (sem delimitadores).
4. Se o resultado for inválido, trate como erro de validação e reexiba o formulário.
5. Mesmo após filtrar, escape a saída com `htmlspecialchars`.

## Saída esperada

Dados com formato verificado ou limpo, e fluxo de erro para os inválidos.

## Erros comuns

- Usar `FILTER_SANITIZE_STRING` e `FILTER_SANITIZE_STRIPPED`: estão obsoletos desde o PHP 8.1; o livro manda usar `htmlspecialchars`.
- Achar que `FILTER_SANITIZE_ADD_SLASHES` protege contra injeção de SQL.
- Conferir `== null` e esquecer que um valor válido, como zero, pode ser falso.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email === false || $email === null) { $erros[] = 'E-mail inválido.'; }
```

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[validar-formularios-em-php]] — os filtros validam formatos que a checagem de campos obrigatórios não cobre
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — os filtros do PHP validam no servidor o que o HTML valida no navegador
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[expressoes-regulares-em-php-com-preg]] — o filtro de regex usa a sintaxe preg
- [[regra-leia-superglobais-em-um-so-lugar]] — filtrar a entrada cabe no ponto único que lê as superglobais
