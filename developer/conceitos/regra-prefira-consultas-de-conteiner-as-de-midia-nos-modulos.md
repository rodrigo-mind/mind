---
titulo: "Prefira consultas de contêiner às de mídia nos módulos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 10, seção 10.2.3 (PDF p. 311; impressa 279)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Prefira consultas de contêiner às de mídia nos módulos

## Regra

Em módulos reutilizáveis, adapte o layout com `@container` e não com `@media`; reserve o `@media` para o layout geral da página.

## Por quê

A janela pode ser larga enquanto o módulo está em uma coluna estreita: com `@media`, seria preciso consultas extras para "este módulo na barra lateral entre 800 e 1100 px", e o módulo deixaria de ser independente do contexto. Segundo o autor, com contêineres definidos de modo consistente (cada região que recebe módulos é contêiner), as consultas de contêiner são quase sempre a melhor escolha para módulos.

## Quando não vale

Para o layout da página (colunas empilhadas em telas pequenas) e quando o suporte do navegador-alvo é insuficiente.

## Como verificar

Procure `@media` dentro de arquivos de módulos e veja se dependem da largura do espaço, e não da janela.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — o framework mostra como aplicar
- [[design-responsivo-mobile-first]] — o @media segue válido para o layout geral
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
