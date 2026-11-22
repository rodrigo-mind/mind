---
titulo: "Não desserialize dados não confiáveis"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 5, seção Serialization (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não desserialize dados não confiáveis

## Regra

Evite `unserialize` para dados que venham de fora; prefira JSON. Se for indispensável, passe sempre o segundo argumento com a lista de classes permitidas: `unserialize($dados, ['allowed_classes' => [MinhaClasse::class]])`.

## Por quê

Cabe a você garantir que só as classes esperadas sejam instanciadas. O livro diz que o recurso virou alvo tão frequente de ataques que quem se vê usando-o deve reconsiderar, e cita a injeção de objetos do PHP (PHP Object Injection, do OWASP). O JSON não cria objetos arbitrários.

## Quando não vale

Para dados que só o próprio sistema grava e lê, em local protegido (mesmo assim, com `allowed_classes`).

## Como verificar

Procure `unserialize(` e confira a origem dos dados (cookies, campos de formulário, arquivos enviados, banco) e o segundo argumento.

## Notas do Claude

Isto confirma o alerta que eu havia registrado, como inferência, nas notas de serialização de objetos em PHP e de arquivos (livro de visitas com `serialize`).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — a regra de segurança da serialização
- [[serializacao-de-objetos-em-php]] — corrige e confirma o alerta daquela nota
- [[regra-trave-o-arquivo-ao-ler-e-gravar]] — o exemplo do livro de visitas usa serialize
- [[regra-nunca-confie-na-entrada-do-usuario]] — é um caso da regra geral
- [[owasp-top-10-2021]] — a injeção de objetos faz parte das falhas de integridade
