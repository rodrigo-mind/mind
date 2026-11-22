---
titulo: "Aninhamento de CSS (nesting)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 8, seção 8.4 (PDF p. 262-267; impressa 232-237)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Aninhamento de CSS (nesting)

## Definição

Permite pôr uma regra dentro de outra, com o seletor da regra interna relativo ao da externa (como nos pré-processadores Sass e Less). Reduz a repetição (`.card` aparece uma só vez) e agrupa regras relacionadas. A especificidade é a do seletor final montado (a soma das partes).

- **Seletor de aninhamento `&`:** refere-se ao seletor externo e define onde ele entra. `&.is-open` dá `.modal.is-open` (sem espaço); sem `&`, o aninhado vira descendente (`.modal .is-open`). `&:hover` e `&::after` visam estados e pseudoelementos. `&` no fim (`.homepage &`) inverte a lógica (estiliza o elemento por um contexto), o que o autor evita porque dificulta a manutenção. Ao contrário do Sass, o `&` não junta partes de nomes de classe.
- **Restrição antiga:** versões iniciais exigiam que o seletor interno começasse com símbolo (`&`, `.`, `#`) e não com uma tag; foi removida, mas as primeiras implementações ainda a impõem (solução: `& h3`).
- **É "açúcar sintático":** o navegador converte para código equivalente sem aninhamento; com uma lista de seletores no pai, o `&` vira `:is(...)` e **herda a especificidade do mais alto**; além disso, `footer { .card & .title }` pode casar em mais ordens do que se imagina (`footer :is(.card .title)`).
- **At-rules aninhadas:** `@media`, `@layer` e `@supports` (e `@scope` e `@container`) dentro de uma regra aplicam-se ao seletor pai sem repeti-lo.
- **Suporte:** disponível em todos os navegadores principais desde o fim de 2023; confira os dados antes de usar em produção.

## Por que importa

Mantém juntas as regras de um mesmo componente, inclusive as responsivas.

## Como se relaciona

Veja a regra de limitar o aninhamento e declarar as propriedades primeiro, e especificidade de seletores.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[is-e-where-em-seletores-css]] — o aninhamento se converte em :is()
- [[regra-limite-o-aninhamento-a-tres-niveis]] — a regra limita o uso do aninhamento
- [[camadas-da-cascata-em-css]] — at-rules como @layer podem ser aninhadas
- [[escopo-em-css-com-scope]] — @scope também pode ser aninhado
