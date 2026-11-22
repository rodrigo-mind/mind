---
titulo: "Use sessões PHP só com cookie e proteja o identificador"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 15, p. 707-711"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use sessões PHP só com cookie e proteja o identificador

## Regra

Mantenha o identificador da sessão apenas em cookie (nunca na URL), marque o cookie como `httponly` e `SameSite`, e renove o identificador com `session_regenerate_id(true)` em momentos-chave.

## Por quê

O identificador da sessão é a chave de acesso a todos os dados dela.

- **Sessões sem cookie** deixam o identificador no texto da URL, e o cabeçalho de referência (`HTTP_REFERER`) pode revelá-lo a outro site (sequestro de sessão). Por isso o livro diz para usar só sessões com cookie, que é a norma.
- **Renovar o identificador:** `session_regenerate_id()` gera um identificador novo e copia os dados; com o parâmetro `true`, a sessão antiga é apagada. Se o identificador foi roubado, ele deixa de valer. O custo é um pouco de desempenho.
- **`session.cookie_httponly = 1`** impede o JavaScript de ler o cookie, o que dificulta o sequestro por XSS.
- **`session.cookie_samesite = "Strict"`** (ou `Lax`) dificulta ataques de falsificação de requisição entre sites (CSRF), pois o navegador não envia o cookie em requisições de outro domínio.
- Prender a sessão a um endereço IP ou conferir o referenciador (`session.referer_check`) são medidas que o livro descreve, mas diz que nenhuma é totalmente confiável: proxies compartilham IP e o referenciador nem sempre é enviado.

## Quando não vale

O livro admite casos extremos (clientes que não aceitam cookies, políticas internas), mas afirma que normalmente não há desculpa para sessões sem cookie.

## Como verificar

Veja `php.ini` ou a configuração da sessão: cookie de sessão com `HttpOnly` e `SameSite`; `session_regenerate_id(true)` após o login; nenhum `PHPSESSID` na URL.

## Notas do Claude

O checklist do projeto também pede cookies de sessão seguros e HTTPS. Em hospedagem compartilhada, os valores do `php.ini` podem ser definidos com `ini_set` antes de `session_start()` ou no painel (inferência minha, a conferir na hospedagem).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-senha-com-hash-e-sal]] — senhas guardadas com segurança e sessões protegidas formam a base do login seguro
- [[regra-upload-seguro-em-php]] — ambos tratam dados externos como não confiáveis, no upload e na sessão
- [[opcoes-de-autenticacao-em-php]] — «Opções de autenticação em PHP» cita esta nota ao explicar suas relações
- [[regra-token-csrf-em-formularios]] — o token fica guardado na sessão, e o cookie SameSite reforça a defesa
- [[regra-escape-a-saida-contra-xss]] — o cookie de sessão HttpOnly reduz o dano de um XSS
- [[armazenamento-no-navegador]] — «Armazenamento no navegador» cita esta nota ao explicar suas relações
- [[cookies-http]] — «Cookies HTTP: o que são, limites e mitos» cita esta nota ao explicar suas relações
- [[opcoes-importantes-do-php-ini]] — as opções de sessão ficam no php.ini
- [[serializacao-de-objetos-em-php]] — «Serialização de objetos em PHP» cita esta nota ao explicar suas relações
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
