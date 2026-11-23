---
titulo: "Criar e ler cookies em PHP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 14, seção 14.3 (PDF p. 650-676)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Criar e ler cookies em PHP

## Para que serve

Gravar e recuperar pequenos dados no navegador do usuário, como preferências, ou o identificador de uma sessão.

## Quando usar e quando não usar

Use para dados não sensíveis de pouco tamanho. O livro diz que esconder dados sensíveis em cookies, cifrados ou não, não é aconselhável: o melhor é guardá-los só no servidor (ver regra de dados sensíveis em cookies).

## O que perguntar ao usuário antes

- Que dado será guardado e por quanto tempo?
- Em que caminhos e domínios o cookie deve valer?
- O site usa HTTPS?

## Passos

1. Chame `setcookie()` **antes de qualquer saída HTML**, porque o cookie vai no cabeçalho HTTP; senão aparece um erro de cabeçalhos já enviados. Se for preciso definir no meio da página, use o buffer de saída.
2. Parâmetros: `name` (único obrigatório), `value`, `expires`, `path`, `domain`, `secure` e `httponly`.
   - **`expires`:** número de segundos desde 1/1/1970 (`time() + 60*60*24` para um dia, ou `mktime(...)`). Sem data (ou zero), o cookie é temporário e some ao fechar o navegador.
   - **`path`:** por padrão, a pasta do script que definiu o cookie; use `"/"` para valer no site todo, ou um caminho (como a área administrativa), o que ainda economiza tráfego, pois o navegador só o envia para URLs daquele caminho.
   - **`domain`:** por padrão, o do URL; use um com ponto inicial (`.exemplo.com`) para os subdomínios. O livro cita "cookies de domínios estrangeiros", que vários navegadores rejeitam.
   - **`secure`:** só envia por HTTPS.
   - **`httponly`:** o JavaScript não vê o cookie.
3. Para o atributo `SameSite` (`None`, `Lax` ou `Strict`), use a forma com vetor de opções: `setcookie($nome, $valor, ['expires' => ..., 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Lax'])`. O terceiro parâmetro se chama `expires_or_options`: aceita um número (data de expiração) ou um vetor; por isso, a chamada com parâmetros nomeados `expires:` falha com "Unknown named parameter".
4. Para alterar um cookie, repita exatamente os mesmos dados de criação (exceto valor e data); senão o navegador cria vários cookies com o mesmo nome.
5. O valor é codificado por URL automaticamente; use `setrawcookie()` se não quiser isso.
6. Para ler, use o vetor `$_COOKIE`; confira antes se existe (`isset($_COOKIE["x"])` ou `array_key_exists`), senão há aviso. Ele não traz propriedades como caminho e validade. Ao exibir, use `htmlspecialchars`.
7. Os cookies chegam ao servidor só na próxima requisição.

## Saída esperada

Cookies criados com escopo, validade e proteções definidos, e leitura segura em `$_COOKIE`.

## Erros comuns

- Chamar `setcookie()` depois de enviar HTML.
- Esquecer o `path`, e o cookie não aparecer em outras pastas.
- Não conferir se o cookie existe antes de ler.
- Mudar o cookie com parâmetros diferentes dos originais.
- Guardar senhas em cookies.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
setcookie('tema', 'escuro', [
  'expires' => time() + 60*60*24*30, 'path' => '/',
  'secure' => true, 'httponly' => true, 'samesite' => 'Lax',
]);
$tema = $_COOKIE['tema'] ?? 'claro';
```

## Notas do Claude

Segundo o livro, o `SameSite` tem três níveis: `None` (sem restrição), `Lax` (cookies só em requisições entre sites por GET) e `Strict` (nenhum cookie entre sites); o Chrome adotou `Lax` como padrão, o que obrigou a rever muitas aplicações.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[cookies-http]] — «Cookies HTTP: o que são, limites e mitos» cita esta nota ao explicar suas relações
- [[regra-nao-guarde-dados-sensiveis-em-cookies]] — a regra limita o que se grava com setcookie
- [[regra-token-csrf-em-formularios]] — o atributo SameSite ajuda a reduzir ataques CSRF
- [[regra-escape-a-saida-contra-xss]] — o valor lido de $_COOKIE deve ser escapado na saída; httponly reduz o roubo por XSS
- [[enviar-email-com-mail-do-php]] — ambos dependem de cabeçalhos e da configuração do servidor
- [[cookies-no-javascript-document-cookie]] — «Cookies no JavaScript» cita esta nota ao explicar suas relações
- [[regra-omita-a-tag-de-fechamento-em-arquivos-so-php]] — a regra evita o erro de cabeçalhos já enviados ao criar cookies
