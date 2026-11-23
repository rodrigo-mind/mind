---
titulo: "Centralize as classes reutilizáveis em vez de copiá-las entre projetos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 14 (PDF p. 588-596)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Centralize as classes reutilizáveis em vez de copiá-las entre projetos

## Regra

Não copie uma classe reutilizável para cada projeto novo; mantenha-a em um repositório central compartilhado pelos projetos.

## Por quê

Copiar cria um acoplamento forte em escala maior: você acabará alterando a classe em um projeto e esquecendo de fazê-lo no outro. Para saber o que vale centralizar, separe, já na fase de planejamento, o que é específico do cliente e o que pode servir de base para futuros projetos (o exemplo do livro: classes de gerenciamento de conteúdo de um site). Mesmo código bem ortogonal pode ser específico de um projeto, e a reutilização real é mais rara do que se pensa.

## Quando não vale

Quando a classe só serve àquele projeto.

## Como verificar

Procure arquivos idênticos ou quase em mais de um projeto; extraia-os para um pacote comum.

## Notas do Claude

Para o projeto (vários sites em PHP, deploy por FTP), um pacote próprio instalado com Composer (ver gerenciar dependências com Composer) ou uma pasta compartilhada fora das pastas públicas é a forma prática (inferência minha). Ver também acoplamento e desacoplamento.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[gerenciar-dependencias-com-composer]] — o pacote compartilhado se instala com Composer
- [[acoplamento-e-desacoplamento]] — cópias entre projetos são acoplamento em escala maior
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — o mesmo princípio DRY para classes
- [[sintomas-de-um-projeto-php-que-degringola]] — a regra combate o sintoma de copiar código entre páginas
- [[criar-um-pacote-composer-e-versionar-com-semver]] — o pacote Composer é a forma de centralizar classes reutilizáveis
