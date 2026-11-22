---
titulo: "Enviar e-mail com mail() do PHP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 16, seções 16.1 e 16.2 (PDF p. 712-734)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Enviar e-mail com mail() do PHP

## Para que serve

Enviar do servidor mensagens simples, como o conteúdo de um formulário de contato para o webmaster ou um aviso automático de erro.

## Quando usar e quando não usar

Use para mensagens de texto simples. Para HTML, anexos e formatação, o livro diz que montar o e-mail à mão dá trabalho e que se economiza muito com bibliotecas externas (ver e-mails MIME).

## O que perguntar ao usuário antes

- Há um servidor SMTP acessível (o do provedor de hospedagem, por exemplo)?
- Qual o remetente, e ele pertence ao domínio do site?

## Passos

1. **Requisito:** é preciso um servidor SMTP ("sem ele, não dá", enfatiza o livro). No Unix/Linux, o PHP espera um programa compatível com `sendmail` (qmail e postfix oferecem wrappers).
2. **Configure o `php.ini`**, seção `[mail function]`. No Windows: `SMTP`, `smtp_port` e `sendmail_from`; no Unix/Linux: `sendmail_path`. Outras: `mail.force_extra_parameters`, `mail.add_x_header`, `mail.log` (registra as chamadas a `mail()`).
3. **Envie:** `mail($para, $assunto, $mensagem, $cabecalhos, $parametros)`; só os três primeiros são obrigatórios (use argumentos nomeados). Para incluir o nome do destinatário: `"Nome" <endereco@exemplo.com>`.
4. **Cabeçalhos extras** (4º parâmetro, separados por `\r\n`): `Cc`, `Bcc`, `Reply-To`, `From` (sobrescreve o `sendmail_from` no Windows e define o remetente no Unix/Linux), `X-Priority` e `X-Mailer`. Vários destinatários se separam por **vírgula** (o ponto e vírgula é uma convenção da Microsoft). A prioridade "alta" não acelera nada, só marca a mensagem para o destinatário, e abusar dela tem efeito contrário.
5. **Confira o retorno:** `mail()` devolve `true` quando o servidor local aceitou a mensagem; não dá para saber se o destinatário a recebeu.
6. **Teste** com um servidor local, como o smtp4dev, que intercepta as mensagens e as mostra, sem enviar.

## Saída esperada

A mensagem aceita pelo servidor de e-mail, com remetente e cabeçalhos corretos.

## Erros comuns

- Achar que o `mail()` envia sozinho, sem SMTP configurado.
- Esperar entrega: servidores de destino rejeitam mensagens de IPs residenciais ou de remetentes desconhecidos, por causa do spam. O que conta é o IP do servidor que envia, então usar o servidor do provedor costuma funcionar.
- Usar endereços de exemplo reais em testes e enviar mensagens a terceiros.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$ok = mail(
    to: 'contato@exemplo.com.br',
    subject: 'Novo contato',
    message: "Mensagem recebida.\n",
    additional_headers: "From: site@exemplo.com.br\r\nReply-To: visitante@exemplo.com.br"
);
```

## Notas do Claude

O livro não trata, no trecho lido, da **injeção de cabeçalhos**: se o assunto, o remetente ou o `Reply-To` vierem de um formulário, quebras de linha (`\r\n`) no valor permitem acrescentar cabeçalhos e disparar spam (inferência minha, a conferir). Valide ou rejeite quebras de linha nesses campos (ver nunca confie na entrada do usuário). A extensão IMAP, que lê caixas de e-mail, passou à PECL a partir do PHP 8.4, segundo o livro.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[emails-mime-html-e-anexos]] — o e-mail com HTML e anexos estende o envio simples
- [[regra-nunca-confie-na-entrada-do-usuario]] — campos de formulário usados em cabeçalhos de e-mail precisam de validação
- [[validar-formularios-em-php]] — o e-mail de contato nasce de um formulário validado
- [[criar-e-ler-cookies-em-php]] — ambos dependem de cabeçalhos e da configuração do servidor
- [[opcoes-importantes-do-php-ini]] — a seção mail function fica no php.ini
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
