---
titulo: "Registre só as funções permitidas em uma API"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 27, seção 27.2 (PDF p. 1041-1043)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Registre só as funções permitidas em uma API

## Regra

Em uma API que chama funções pelo nome recebido, mantenha uma lista (vetor ou objeto) das funções expostas e só execute as que estão nela; `function_exists` não basta.

## Por quê

O servidor do exemplo do livro verifica apenas se a função existe antes de chamá-la, "para que nenhum método desconhecido seja chamado"; o próprio livro nota que, numa aplicação real, faz sentido registrar todas as funções chamáveis e permitir só as registradas. Sem a lista, qualquer função do PHP vira chamável pela URL (inferência minha sobre a gravidade: um nome como `system` seria aceito por `function_exists`).

## Quando não vale

Não há exceção. Quando há vários métodos com números diferentes de parâmetros, o livro pede também verificações adicionais.

## Como verificar

Procure `$variavel(...)` e `call_user_func` com nome vindo de `$_GET`, `$_POST` ou do corpo da requisição, e confira a lista permitida (`in_array` com comparação estrita).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — a regra corrige o ponto fraco do exemplo
- [[regra-nunca-confie-na-entrada-do-usuario]] — o nome da função vem da entrada
