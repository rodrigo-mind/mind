---
titulo: "OWASP Top 10 (lista de 2021)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 32, p. 1188-1190"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# OWASP Top 10 (lista de 2021)

## Definição

O OWASP (Open Web Application Security Project) é um projeto de voluntários que publica, a cada três ou quatro anos, a lista das dez vulnerabilidades mais frequentes em sites. A de 2021, que o livro cita como a mais recente no início de 2025, traz:

1. Proteção de acesso insuficiente
2. Erros criptográficos
3. Injeções e cross-site scripting (XSS)
4. Projeto inseguro
5. Configuração insegura
6. Uso de componentes obsoletos ou inseguros
7. Identificação e autenticação inseguras
8. Integridade insuficiente de software e dados
9. Registro e monitoramento insuficientes
10. Falsificação de requisição do lado do servidor (SSRF)

## Por que importa

Para o livro, quase todos os itens vêm de programação descuidada, e não do servidor: o administrador pode proteger bem o servidor e o aplicativo ainda assim ser comprometido. Nenhum site é "completamente seguro": é preciso revisar o código e ler os registros do servidor para conhecer os ataques.

## Como se relaciona

Serve de índice para as regras de segurança: nunca confiar na entrada (regra nunca confie na entrada do usuário), XSS, CSRF e injeção de SQL. O livro lembra que o CSRF voltou à lista de 2021 como parte do primeiro item, e que XSS e injeção de SQL foram reunidos na categoria "injeção".

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — esta nota cita a ideia de «Nunca monte SQL juntando texto vindo do usuário» na seção sobre como se relaciona
- [[regra-nunca-confie-na-entrada-do-usuario]] — a lista é o índice das falhas que a regra ajuda a evitar
- [[regra-token-csrf-em-formularios]] — o CSRF faz parte do primeiro item da lista de 2021
- [[regra-escape-a-saida-contra-xss]] — o XSS faz parte da categoria de injeção da lista
- [[regra-use-funcoes-do-php-e-nao-comandos-do-sistema]] — a execução de comandos do sistema é um risco de injeção
- [[regra-nao-abra-urls-ou-streams-informados-pelo-usuario]] — a requisição forjada pelo servidor é uma classe de falha do OWASP
- [[regra-nao-exiba-erros-na-tela-em-producao]] — mensagens de erro detalhadas facilitam ataques
- [[regra-nao-desserialize-dados-nao-confiaveis]] — a injeção de objetos faz parte das falhas de integridade
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
