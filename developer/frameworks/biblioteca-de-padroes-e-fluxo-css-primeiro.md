---
titulo: "Biblioteca de padrões e fluxo CSS primeiro"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 9, seção 9.4 (PDF p. 296-298; impressa 265-268)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Biblioteca de padrões e fluxo CSS primeiro

## Para que serve

Documentar os módulos de CSS de um projeto e montar páginas a partir deles, reduzindo o CSS novo a cada página. A biblioteca de padrões (pattern library) é um conjunto separado de páginas HTML que mostra cada módulo; não faz parte do site, é uma ferramenta da equipe.

## Quando usar e quando não usar

Em projetos grandes ou com equipe; em um site pequeno, uma página de exemplos já ajuda.

## O que perguntar ao usuário antes

- Quem mantém o CSS e quem monta o HTML? Há várias aplicações que usam a mesma folha?

## Passos

1. **Fluxo CSS primeiro:** com o esboço da página em mãos, vá à biblioteca e procure módulos existentes para o que precisa, de fora para dentro (layout e contêineres, depois o interior). Se tudo existe, não escreva CSS novo.
2. Quando faltar algo, deixe a página de lado e **construa o módulo (ou a variante) na biblioteca**, em isolamento; documente e confira a aparência e o comportamento.
3. Volte à página e use o novo módulo.
4. **Documentação viva:** como as páginas da biblioteca são onde se testam as mudanças, ela está sempre atualizada (e o comentário de documentação fica junto do CSS).
5. **Mudanças incompatíveis:** em vez de alterar o módulo e atualizar todo o HTML, marque-o como obsoleto (deprecated) na biblioteca e crie um módulo novo; migre aos poucos. Use **versionamento semântico** (maior.menor.correção): correção para ajustes, menor para módulo novo ou obsolescência, maior quando se apagam módulos obsoletos ou se redesenha. Dá para hospedar várias versões ao mesmo tempo, e cada projeto escolhe a sua: o HTML e o CSS ficam desacoplados.

## Saída esperada

Um inventário atualizado dos módulos e páginas montadas, quase sem CSS novo.

## Erros comuns

- Escrever o HTML primeiro e "aplicar" estilos depois (a pergunta certa não é como escrever HTML fácil de estilizar, mas como escrever estilos reutilizáveis).
- Ter medo de apagar CSS porque ninguém sabe o que ele faz.

## Notas do Claude

O autor também sugere, ao usar um pré-processador, um arquivo por módulo e um arquivo principal que os importa; sem pré-processador (caso do projeto), os mesmos módulos podem ser arquivos CSS separados, carregados por `@import` com camada ou reunidos no deploy (inferência minha).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[css-modular-modulos-variantes-e-bem]] — a biblioteca documenta os módulos
- [[divida-tecnica]] — evita o CSS só de acréscimos
