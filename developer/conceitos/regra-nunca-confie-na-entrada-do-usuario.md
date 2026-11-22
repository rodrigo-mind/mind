---
titulo: "Nunca confie na entrada do usuário, nem na URL nem em campos ocultos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 32, p. 1190-1194 e 1205-1208"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nunca confie na entrada do usuário

## Regra

Trate como não confiável tudo o que vem do cliente (`$_GET`, `$_POST`, `$_COOKIE`, parte de `$_SERVER`, campos ocultos): valide o formato e verifique, no servidor, se o usuário tem direito de executar a ação sobre aquele registro.

## Por quê

- Quase toda falha de segurança nasce de dado vindo de fora. Qualquer plano que dependa de "a entrada cumpre os requisitos X e Y" deve ser descartado.
- **Acesso a registros por identificador na URL:** um sistema que lista só os links de edição dos artigos do usuário (`edit.php?id=23`) fica vulnerável se `edit.php?id=25` não checar a autorização. O livro cita um site de inscrições em que um evento esgotado ainda era acessível pelo número, e uma proposta de palestra que podia ser acessada alterando um parâmetro.
- **Campos ocultos não são invisíveis:** quem salva a página, muda o `action` e o valor do campo e a envia falsifica a requisição POST. Os navegadores têm ferramentas que editam formulários.
- **Variáveis não inicializadas:** o recurso `register_globals`, hoje removido, permitia ligar uma variável pela URL (`login.php?loggedIn=1`). O livro recomenda inicializar as variáveis e usar `error_reporting = E_ALL`.
- **`include` com variável da URL:** `include "$section.php"` com `section` vindo do usuário pode incluir arquivo indevido (inclusive de outro servidor, se `allow_url_include` estiver ativo, o que é desligado por padrão e obsoleto desde o PHP 7.4).
- Em produção, `display_errors = Off`, porque cada mensagem de erro revela informação ao atacante.

## Quando não vale

Não há exceção no texto.

## Como verificar

Para cada script que recebe um identificador, procure a checagem de dono ou de permissão. Procure `include`/`require` com variáveis de entrada, campos ocultos usados como se fossem confiáveis e `display_errors` ligado em produção.

## Notas do Claude

No projeto, a lista de arquivos permitidos para `include` (uma lista fixa de nomes) é a forma segura de fazer o roteamento por parâmetro (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — a injeção de SQL é o caso mais grave de entrada não confiável
- [[validar-formularios-em-php]] — a validação do formulário é a primeira aplicação da regra
- [[owasp-top-10-2021]] — a lista é o índice das falhas que a regra ajuda a evitar
- [[regra-nao-execute-plugins-de-origem-nao-confiavel]] — ambas tratam dados externos como não confiáveis
- [[request-e-response-como-objetos]] — um objeto de requisição é o lugar natural para filtrar a entrada
- [[usar-a-api-fetch]] — o servidor deve validar tudo o que o fetch envia
- [[tipos-do-elemento-input]] — o campo oculto e o readonly podem ser forjados no envio
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — é um caso da regra geral sobre entrada não confiável
- [[regra-nao-guarde-dados-sensiveis-em-cookies]] — o cookie vem do cliente e pode ser alterado
- [[enviar-email-com-mail-do-php]] — campos de formulário usados em cabeçalhos de e-mail precisam de validação
- [[regra-nao-abra-urls-ou-streams-informados-pelo-usuario]] — é um caso da regra geral
- [[regra-registre-so-as-funcoes-permitidas-em-uma-api]] — o nome da função vem da entrada
- [[serializacao-de-objetos-em-php]] — desserializar dados externos é perigoso
- [[regra-nao-desserialize-dados-nao-confiaveis]] — é um caso da regra geral
- [[padrao-interpreter-e-mini-linguagens]] — deixar o usuário escrever PHP seria inseguro
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — mensagens recebidas devem ter a origem e o conteúdo conferidos
- [[regra-nunca-passe-texto-do-usuario-a-eval]] — caso particular do princípio
