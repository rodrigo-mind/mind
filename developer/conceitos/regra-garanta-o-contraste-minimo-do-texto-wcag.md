---
titulo: "Garanta o contraste mínimo do texto (WCAG)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 11, seção 11.4 (PDF p. 351-355; impressa 321-325)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Garanta o contraste mínimo do texto (WCAG)

## Regra

Confira a razão de contraste entre o texto e o fundo com uma ferramenta: o texto comum deve atender ao nível AA (4,5:1) e, de preferência, o AAA (7:1); o texto grande, 3:1 (AA) e 4,5:1 (AAA).

## Por quê

Cinza sobre cinza claro é difícil de ler para quem tem baixa visão e em um celular sob sol forte. As diretrizes WCAG definem os níveis; o texto é "grande" a partir de 18 pt (24 px) em peso normal ou 14 pt (18,667 px) em negrito. O livro sugere atender ao AAA no texto do corpo e aceitar o AA em rótulos e textos decorativos.

Também **não use preto puro sobre branco puro**: em tela com luz própria, o contraste excessivo cansa a vista; use cinza bem escuro e, se quiser, branco levemente acinzentado. E o cálculo não conta tudo: fontes finas (peso 100) parecem ter menos contraste que as de peso normal com a mesma cor, então exija mais contraste de fontes finas.

## Quando não vale

Nem todo texto de um design real atinge o AAA, e as próprias diretrizes admitem isso.

## Como verificar

Use um verificador de contraste de CSS (o autor cita o oddcontrast.com, que aceita todos os formatos de cor), para cada par de cores de texto e fundo da paleta.

## Notas do Claude

Para o projeto, vale registrar os pares aprovados junto das variáveis de cor (ver organizar cores com propriedades personalizadas).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[notacoes-de-cor-em-css-e-oklch]] — a escolha de cores deve respeitar o contraste
- [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]] — fontes finas pedem mais contraste
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[gradientes-sombras-e-modos-de-mesclagem-em-css]] — gradiente ou sombra sob o texto exige conferir o contraste
- [[regra-respeite-prefers-reduced-motion]] — contraste e movimento reduzido são cuidados de acessibilidade
