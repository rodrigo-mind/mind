---
titulo: "Guarde senhas só como hash com sal, nunca em texto legível"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 20 (Readable Passwords), p. 244-257"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Guarde senhas só como hash com sal

## Regra

Nunca grave nem envie a senha em texto legível. Guarde só um hash criptográfico unidirecional, calculado a partir da senha com um sal aleatório por usuário.

## Por quê

- Uma senha em texto no banco aparece em consultas registradas, em pacotes de rede sem criptografia e em backups, e quem as lê pode entrar nas contas. O sistema que "recupera" a senha por e-mail prova que a guarda legível.
- Um hash unidirecional transforma a senha em uma sequência de tamanho fixo e não reversível; confere-se a senha aplicando o mesmo hash à entrada e comparando.
- Algoritmos fracos devem ser evitados: o livro diz que SHA-1 e MD5 já são considerados fracos, e recomenda pelo menos SHA-256.
- Um **sal** (salt), uma sequência aleatória de pelo menos 8 bytes, diferente para cada senha e guardada junto, derrota ataques de dicionário e de tabelas arco-íris: o atacante teria que gerar uma tabela de hashes para cada senha.
- O hash deve ser calculado no código da aplicação, e não dentro da consulta SQL, para que a senha em texto não apareça em consultas e em registros do banco.
- Para desativar uma conta, é melhor um atributo próprio; se faltar, grave no hash um valor que a função de hash nunca produz.

## Quando não vale

O livro não traz exceção ao texto legível em produção.

## Como verificar

Confira se a coluna de senha tem o hash e o sal (e não a senha), se o hash é calculado no código e se o algoritmo é forte. Procure funções de envio de senha por e-mail.

## Notas do Claude

Divergência a observar: o livro mostra o cálculo manual do hash SHA-256 com sal, em Python. A prática do checklist do centralizador de desenvolvimento do projeto, para PHP, é `password_hash` e `password_verify`, que cuidam do sal e do custo do algoritmo. Decisão adotada: para a stack de referência, valem as funções do PHP e o checklist do projeto; o livro vale pelo motivo e pelo princípio (hash unidirecional, sal único por senha, nada de senha legível). Confiança média por isso e porque o trecho sobre armazenar o hash como texto (mini-antipadrão) não foi lido.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-sessoes-seguras-em-php]] — senhas guardadas com segurança e sessões protegidas formam a base do login seguro
- [[developer]] — diverge: o livro ensina calcular o hash SHA-256 com sal à mão; o checklist do centralizador manda usar `password_hash` e `password_verify`, que já cuidam do sal e do custo
- [[opcoes-de-autenticacao-em-php]] — o login por sessão depende de senhas guardadas com hash
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
