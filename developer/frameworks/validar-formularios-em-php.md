---
titulo: "Validar formulários em PHP (Form Validation)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 13, p. 571-641 (seção 13.3 e 13.6)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Validar formulários em PHP

## Para que serve

Garantir que o formulário só seja processado quando estiver completo e coerente, e mostrar o formulário de novo, com aviso, quando houver erro.

## Quando usar e quando não usar

Use em todo formulário que receba dados. O livro afirma que a verificação em JavaScript no navegador é um serviço ao usuário para evitar erros acidentais, e não impede erros intencionais: o PHP continua sendo a validação que importa.

## O que perguntar ao usuário antes

- Quais campos são obrigatórios e que condições cada um deve cumprir (por exemplo, e-mail com um `@`)?
- Que método o formulário usa (`GET` ou `POST`)?

## Passos

1. Parta de uma variável `$ok = false`. Se o formulário foi enviado (por exemplo, `isset($_POST["Submit"])`), assuma `$ok = true` e rode as verificações, passando para `false` ao achar erro.
2. **Campos de texto:** os navegadores enviam o campo mesmo vazio (como texto vazio), então `isset()` não basta. Verifique `isset`, `is_string` e, após `trim()`, que não é vazio.
3. **Botões de opção e caixas de seleção:** verifique que o valor foi enviado (`isset` e `is_string`).
4. Se tudo estiver certo (`$ok`), processe os dados. Se não, mostre o formulário (o que também ocorre na primeira visita) e, quando houver envio incompleto, uma mensagem de erro.
5. Opcionalmente, repita no navegador uma verificação em JavaScript (`onsubmit="return check(this)"`) como conveniência.
6. Preencha de novo os campos com o que o usuário digitou (a seção "pré-preencher" do capítulo), escapando a saída.

## Saída esperada

Formulário que só avança com dados completos, com mensagens claras e valores preservados.

## Erros comuns

- Usar só `isset()` em campos de texto.
- Confiar apenas na checagem em JavaScript.
- Esquecer de exibir um aviso de erro quando o formulário volta.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$nome = trim($_POST['nome'] ?? '');
if ($nome === '') { $erros[] = 'Informe o nome.'; }
```

## Notas do Claude

Confiança média: li o início da seção de validação e a de JavaScript. O livro valida só presença; as validações de formato (e-mail, telefone) e as medidas de segurança contra CSRF ficam para outros trechos. Ao aplicar, use também `filter_var` para e-mail e cabeçalhos de CSRF (inferência minha, do checklist do projeto).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — a validação do formulário precede o uso dos dados na consulta SQL
- [[regra-nunca-confie-na-entrada-do-usuario]] — a validação do formulário é a primeira aplicação da regra
- [[filtrar-entrada-com-filter-input]] — os filtros validam formatos que a checagem de campos obrigatórios não cobre
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — o servidor PHP precisa validar o que o fetch envia, mesmo que o cliente valide
- [[validacao-nativa-de-formularios-html5]] — «Validação nativa de formulários em HTML5» cita esta nota ao explicar suas relações
- [[estrutura-de-formularios-html5]] — «Estrutura de formulários em HTML5» cita esta nota ao explicar suas relações
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — a validação no servidor é a que vale
- [[regra-prefira-igualdade-estrita-em-javascript]] — valores de formulário chegam como texto, e a conversão frouxa gera erros nos dois lados
- [[enviar-email-com-mail-do-php]] — o e-mail de contato nasce de um formulário validado
- [[tipos-escalares-do-php-e-armadilhas]] — valores de formulário chegam como texto
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[metodos-de-string-com-expressoes-regulares-em-javascript]] — «Métodos de string com expressões regulares» cita esta nota ao explicar suas relações
- [[expressoes-regulares-em-javascript-sintaxe-e-flags]] — «Expressões regulares em JavaScript: sintaxe e flags» cita esta nota ao explicar suas relações
