---
titulo: "Nunca insira entrada do usuário no documento com innerHTML"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seções 15.1.8 e 15.3.4 (PDF p. 441-444 e 464-466)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nunca insira entrada do usuário no documento com innerHTML

## Regra

Não ponha dados vindos do usuário (nem de URLs ou de terceiros) em `innerHTML`, `outerHTML` ou `insertAdjacentHTML`. Use `textContent` para texto, ou troque os caracteres especiais por entidades antes de inserir marcação.

## Por quê

O livro avisa que, com essas APIs de HTML, nunca se deve inserir entrada de usuário: um usuário malicioso pode injetar seus próprios scripts na aplicação (XSS). No exemplo do livro, um nome vindo da URL com uma imagem cujo `onload` roda código acaba executando no site atacado, que pode ler cookies e capturar teclas. A prevenção é trocar `&`, `<`, `>`, aspas e `/` por entidades HTML, ou exibir conteúdo não confiável em um `<iframe sandbox>`.

## Quando não vale

Quando o HTML é totalmente gerado pelo próprio código, sem dado externo.

## Como verificar

Procure no código atribuições a `innerHTML` com variáveis que vêm de URL, formulário, API ou do banco.

## Notas do Claude

É o mesmo princípio de escapar a saída do lado do servidor: ver a regra de escape da saída contra XSS (PHP).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[navegacao-e-conteudo-no-dom]] — a regra trata do risco do innerHTML descrito aqui
- [[regra-escape-a-saida-contra-xss]] — é a mesma defesa, no cliente e no servidor
- [[modelo-de-seguranca-da-web-no-navegador]] — a regra aplica a prevenção de XSS descrita no modelo de segurança
- [[criar-inserir-e-remover-nos-do-dom]] — nós de texto evitam a injeção de HTML
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[regra-nunca-passe-texto-do-usuario-a-eval]] — outro vetor de injeção de código no navegador
- [[regra-nao-defina-tratadores-de-evento-em-atributos-html]] — tratadores em atributos agravam o XSS por innerHTML
- [[enviar-formulario-por-ajax-com-formdata]] — a resposta de Ajax em HTML deve respeitar esta regra
