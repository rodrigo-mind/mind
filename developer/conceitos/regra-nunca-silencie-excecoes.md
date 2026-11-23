---
titulo: "Nunca silencie exceções"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 3, seção sobre exceções (EPUB, sem páginas)"
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4, seção sobre exceções (PDF p. 138-140)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nunca silencie exceções

## Regra

Nenhum `catch` pode ficar vazio ou só engolir o erro. Cada um deve recuperar, registrar ou relançar a exceção.

## Por quê

- Edmonds e Mitchell: a exceção silenciada é das coisas mais irritantes de achar depois de horas de depuração, e o autor diz que não manteria na equipe quem faz isso.
- Zandstra: um `catch` genérico de reserva é útil, mas tem que fazer algo de fato, porque falhar em silêncio causa bugs difíceis de diagnosticar.

## Quando não vale

Quando ignorar é a decisão certa e consciente, como um arquivo temporário que pode não existir. Mesmo assim, capture o tipo mais específico possível e deixe um comentário explicando por que o erro é ignorado (inferência minha).

## Como verificar

Procure `catch` com corpo vazio, ou só com comentário, nos `.php` (por exemplo, `grep -rnE 'catch\s*\([^)]*\)\s*\{\s*\}' --include=*.php .`). Também desconfie de `@` antes de chamadas de função, que silencia erros do mesmo jeito (inferência minha).

## Notas do Claude

O par desta regra é converter erros em exceções com manipuladores globais: mesmo o que escapa de todos os `catch` termina registrado.

## Conexões

- [[regra-nao-use-die-ou-exit-para-tratar-erros]] — as duas regras evitam esconder ou interromper erros
- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[tratar-erros-com-excecoes-em-php]] — o catch genérico deve fazer algo, como o passo 4 do framework
- [[converter-erros-em-excecoes-com-manipuladores-globais]] — é o par da regra: o que escapar dos catch termina registrado
- [[regra-nao-exiba-erros-na-tela-em-producao]] — ambas tratam de como deixar erros visíveis ao desenvolvedor e não ao visitante
