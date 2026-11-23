---
titulo: "Organizar cores com propriedades personalizadas"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 11, seções 11.2 e 11.3 (PDF p. 325-350; impressa 295-320)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Organizar cores com propriedades personalizadas

## Para que serve

Traduzir a paleta de um designer em código reutilizável, que aceita novas cores e mudanças de marca sem caça a valores.

## Quando usar e quando não usar

Sempre que a página reutiliza cores. Em sites grandes, use dois níveis (cores brutas e cores por finalidade).

## O que perguntar ao usuário antes

- Qual a cor primária (da marca) e as variações, o texto e os cinzas?
- É preciso modo claro e escuro?

## Passos

1. **Variáveis em `:root`:** uma por cor da paleta, com o nome dado pelo designer; evita erros de digitação e permite mudar a cor da marca em um só lugar (o autor conta um projeto em que isso evitou editar mais de cem pontos).
2. **Converta para HSL ou OKLCH** nas DevTools (Shift + clique no quadradinho da cor, ou o seletor de cores): para achar a relação entre as cores. Em OKLCH, o `--brand-green` e seus tons compartilham o matiz 165; guarde o matiz em uma variável (`oklch(45% 0.09 var(--brand-hue))`). Os cinzas costumam ter um pouco de croma, o que enriquece a página.
3. **Nomes com números** (`--gray-50`, `--blue-30`), onde o número se aproxima da luminosidade, deixam inserir um novo tom entre dois existentes (sempre se precisará de mais um cinza).
4. **Dois níveis** (em projetos grandes): variáveis "brutas" (`--gray-90`) e variáveis por finalidade (`--color-text`, `--color-border`, `--color-bg`) que apontam para elas; use as segundas ao longo da folha. Dá para trocar a borda sem mexer no cinza do menu, e inverter fundo e texto no modo escuro mudando só o segundo nível.
5. **Novas cores:** pegue o complemento (matiz ±180° no HSL ou OKLCH; ajuste a olho, por exemplo, o matiz 345 passou para 10) e ajuste luminosidade e croma até combinar (o autor chegou a `oklch(64% 0.15 10deg)` por tentativa e erro nas DevTools); em DevTools, force estados (`:active`, `:hover`) para ver as cores. Seletores de cor, como o oklch.com, mostram os limites do gamute.
6. **Recursos novos:** `color-mix(in oklch, azul, vermelho)` mistura duas cores (use `srgb` para misturar com branco ou preto; percentuais deslocam o equilíbrio; funciona com `currentColor`); a **cor relativa** (`oklch(from var(--brand) calc(l / 2) c h)`) escurece, ou dá uma versão semitransparente mantendo `l`, `c` e `h`. Ainda sem suporte pleno em 2024 (a cor relativa, no Firefox): use valores reserva.

## Saída esperada

Paleta em variáveis, em um só lugar, com mudanças locais e previsíveis.

## Erros comuns

- Espalhar valores hexadecimais por toda a folha.
- Nomear as cores por sua função atual (`--light-green`), sem espaço para novos tons.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
:root {
  --brand-hue: 165deg;
  --green-45: oklch(45% 0.09 var(--brand-hue));
  --green-74: oklch(74% 0.15 var(--brand-hue));
  --color-link: var(--green-74);
}
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[contraste-visual-como-ferramenta-de-design]] — «Contraste visual como ferramenta de design» cita esta nota ao explicar suas relações
- [[notacoes-de-cor-em-css-e-oklch]] — «Notações de cor em CSS: gamute, espaços de cor e OKLCH» cita esta nota ao explicar suas relações
- [[propriedades-personalizadas-do-css]] — aplica as variáveis CSS às cores
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — as cores globais ficam na camada theme
- [[consultas-de-estilo-de-conteiner]] — o modo escuro pode usar consultas de estilo
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[gradientes-sombras-e-modos-de-mesclagem-em-css]] — as propriedades personalizadas podem alimentar gradientes
