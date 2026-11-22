---
titulo: "Proteja formulários que mudam dados com um token CSRF"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 32, seção 32.6, p. 1214-1219"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Proteja formulários que mudam dados com um token CSRF

## Regra

Em todo formulário que altera dados (pedido, exclusão, edição), inclua um campo oculto com um token aleatório, guarde o mesmo valor na sessão e confira, ao receber, que os dois são idênticos.

## Por quê

No ataque de falsificação de requisição entre sites (CSRF), uma página de terceiros faz o navegador do usuário, já logado, enviar uma requisição ao site atacado, e o navegador envia junto o cookie de sessão. Pode ser um GET (uma imagem de 1 pixel) ou um POST (formulário oculto enviado por JavaScript). O atacante sabe como é a requisição, mas não pode adivinhar nem ler o token, nem mexer na sessão da vítima.

Passos do livro:

1. Gere `random_bytes(32)` e guarde em `$_SESSION["token"]`.
2. Ponha o valor em um campo `<input type="hidden" name="token">`.
3. Ao receber o POST, compare `$_SESSION["token"] === $_POST["token"]`; se igual, processe e apague o token da sessão; senão, gere outro.

Medidas como conferir o referenciador ou o IP nem sempre funcionam. Como reforço, use `session.cookie_samesite = "Lax"` (ou `Strict`).

## Quando não vale

O livro mostra pedidos GET que mudam estado como exemplo de vulnerabilidade; a regra de fundo é não usar GET para ações que alteram dados.

## Como verificar

Procure formulários POST sem campo de token e ações de exclusão ou alteração por link simples.

## Notas do Claude

O exemplo do livro grava o token em binário dentro do HTML, o que pode não ser imprimível; na prática, converta com `bin2hex` e compare com `hash_equals` (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-sessoes-seguras-em-php]] — o token fica guardado na sessão, e o cookie SameSite reforça a defesa
- [[owasp-top-10-2021]] — o CSRF faz parte do primeiro item da lista de 2021
- [[modelo-de-seguranca-da-web-no-navegador]] — ambos tratam de requisições entre origens diferentes
- [[estrutura-de-formularios-html5]] — o formulário POST que muda dados deve levar o token CSRF
- [[criar-e-ler-cookies-em-php]] — o atributo SameSite ajuda a reduzir ataques CSRF
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
