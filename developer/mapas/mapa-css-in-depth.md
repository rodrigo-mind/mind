---
titulo: Mapa de CSS in Depth, Second Edition
tipo: mapa-do-livro
origem: destilar
livro: CSS-in-Depth-Second-Edition-(Keith-J-Grant).pdf
assunto: developer
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de CSS in Depth, Second Edition

## Tese

Guia atual de CSS (segunda edição), que parte dos fundamentos (cascata, unidades relativas, modelo de caixa), passa por layout (flexbox, grid, posicionamento, design responsivo), organização do código (camadas, escopo e consultas de contêiner), aprimoramentos visuais e animação.

## Como aproveitar

- Vale destilar: cascata e especificidade, unidades relativas, flexbox, grid, responsividade, camadas de cascata e consultas de contêiner.
- Ignorar: efeitos decorativos (máscaras, formas e modos de mesclagem) a não ser que o usuário peça.
- Limites: a numeração de páginas abaixo é a impressa no livro. O PDF tem 545 páginas; converter antes de ler.

## Capítulos

| Cap. | Título | Páginas | Prioridade | Estado | Notas geradas |
|---|---|---|---|---|---|
| 1 | Cascade, specificity, and inheritance | 33-64 | alta | destilado | [[cascata-do-css]], [[especificidade-de-seletores]], [[heranca-no-css]], [[regra-mantenha-a-especificidade-baixa]] |
| 2 | Working with relative units | 65-93 | alta | destilado | [[unidades-relativas-em-css]], [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]], [[unidades-de-viewport-em-css]], [[fonte-fluida-com-calc-e-clamp]], [[regra-use-line-height-sem-unidade]], [[propriedades-personalizadas-do-css]] |
| 3 | Document flow and the box model | 94-119 | alta | destilado | [[fluxo-normal-do-documento]], [[centralizar-um-bloco-na-horizontal]], [[propriedades-logicas-do-css]], [[modelo-de-caixa-do-css]], [[regra-use-border-box-em-todos-os-elementos]], [[regra-evite-numeros-magicos-no-css]], [[altura-de-elementos-e-overflow]], [[regra-prefira-min-height-a-height-fixa]], [[margens-negativas-e-colapso-de-margens]], [[espacar-elementos-com-o-seletor-coruja]] |
| 4 | Flexbox | 123-148 | alta | destilado | [[flexbox]] |
| 5 | Grid layout | 149-182 | alta | destilado | [[layout-em-grade-css-grid]] |
| 6 | Positioning and stacking contexts | 183-209 | media | destilado | [[tipos-de-posicionamento-em-css]], [[contextos-de-empilhamento-e-z-index]], [[regra-organize-os-z-index-e-posicione-o-minimo]], [[construir-modal-e-menu-suspenso-com-posicionamento]] |
| 7 | Responsive design | 209-238 | alta | destilado | [[design-responsivo-mobile-first]] |
| 8 | Cascade layers and nesting | 241-267 | media | destilado | [[camadas-da-cascata-em-css]], [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]], [[is-e-where-em-seletores-css]], [[aninhamento-de-css]], [[regra-limite-o-aninhamento-a-tres-niveis]] |
| 9 | Modular CSS and scope | 268-298 | media | destilado | [[css-modular-modulos-variantes-e-bem]], [[regra-nao-altere-um-modulo-com-seletores-de-contexto]], [[escopo-em-css-com-scope]], [[biblioteca-de-padroes-e-fluxo-css-primeiro]] |
| 10 | Container queries | 299-322 | media | destilado | [[tornar-um-modulo-responsivo-ao-seu-conteiner]], [[consultas-de-estilo-de-conteiner]], [[regra-prefira-consultas-de-conteiner-as-de-midia-nos-modulos]] |
| 11 | Color and contrast | 323-355 | media | destilado | [[contraste-visual-como-ferramenta-de-design]], [[notacoes-de-cor-em-css-e-oklch]], [[organizar-cores-com-propriedades-personalizadas]], [[regra-garanta-o-contraste-minimo-do-texto-wcag]] |
| 12 | Typography and spacing | 356-386 | media | destilado | [[espacamento-preciso-ao-implementar-um-design]], [[fontes-web-e-font-face]], [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]], [[fontes-variaveis-em-css]], [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] |
| 13 | Gradients, shadows, and blend modes | 387-412 | baixa | destilado | [[gradientes-sombras-e-modos-de-mesclagem-em-css]] |
| 14 | Masks, shapes, and clipping | 413-438 | baixa | destilado | [[filtros-mascaras-e-recortes-em-css]] |
| 15 | Transitions | 441-460 | baixa | destilado | [[criar-transicoes-em-css]], [[regra-respeite-prefers-reduced-motion]] |
| 16 | Transforms | 461-488 | baixa | destilado | [[transformacoes-em-css]], [[regra-anime-so-transform-e-opacity]] |
| 17 | Animations | 489-510 | baixa | destilado | [[animacoes-com-keyframes-em-css]] |

Prioridade: `alta`, `media`, `baixa` ou `ignorar` (o usuário pode mudar). Estado: `pendente` ou `destilado`. Páginas: numeração do leitor de PDF, salvo indicação nas observações.

## Observações

- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 13 a 17 lidos na prosa (as listagens de CSS foram puladas). Aberturas no PDF: 13 em 387, 14 em 413, 15 em 441, 16 em 461, 17 em 489; o capítulo 17 termina na p. 510 (o apêndice A começa em 511). Leitura mais rápida em sombras, modos de mesclagem, `clip-path`, `shape-outside` e no exemplo 3D do capítulo 17 (confiança média nessas notas).
- 2026-11-22: as páginas da tabela foram convertidas para a numeração do leitor de PDF somando 30 à impressa (conferido no capítulo 1: impressa 4 = PDF 34). As notas de CSS citam a numeração impressa.
- 2026-11-22: mapa criado a partir do sumário (páginas impressas); nenhum capítulo foi destilado. O limite final do capítulo 17 não foi localizado.

## Conexões

- [[developer]] — acompanha a destilação de um livro-base deste assunto
- [[CSS-in-Depth-Second-Edition-(Keith-J-Grant) (pdf)]] — o mapa acompanha a destilação do livro representado por esta ficha
- 2026-11-22: primeiro lote, com o capítulo 1 até os valores especiais (herança), em texto sem listagens de código. As seções sobre abreviações (shorthand) e recursos novos do capítulo ficaram sem leitura.
- 2026-11-22: segundo lote, com o começo dos capítulos 4, 5 e 7 (princípios, grade básica e mobile first). Cada um foi lido só nas primeiras seções, por isso as três notas têm confiança média e os capítulos seguem com trechos sem leitura: dimensionamento e alinhamento do flexbox, posicionamento da grade, consultas de mídia e imagens responsivas.
- [[cascata-do-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[especificidade-de-seletores]] — o mapa do livro lista esta nota como gerada pela destilação
- [[heranca-no-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-mantenha-a-especificidade-baixa]] — o mapa do livro lista esta nota como gerada pela destilação
- [[flexbox]] — o mapa do livro lista esta nota como gerada pela destilação
- [[layout-em-grade-css-grid]] — o mapa do livro lista esta nota como gerada pela destilação
- [[design-responsivo-mobile-first]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: terceiro lote, com os capítulos 2 (unidades relativas) e 3 (fluxo e modelo de caixa), lidos por inteiro. Páginas de PDF confirmadas pelas aberturas de capítulo (cap. 2 em 65-93, cap. 3 em 94-119; impressas 35-63 e 64-89). As notas destes dois capítulos citam PDF e impressa; as do primeiro lote citam a numeração impressa.
- [[unidades-relativas-em-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[unidades-de-viewport-em-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[fonte-fluida-com-calc-e-clamp]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-line-height-sem-unidade]] — o mapa do livro lista esta nota como gerada pela destilação
- [[propriedades-personalizadas-do-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[fluxo-normal-do-documento]] — o mapa do livro lista esta nota como gerada pela destilação
- [[centralizar-um-bloco-na-horizontal]] — o mapa do livro lista esta nota como gerada pela destilação
- [[propriedades-logicas-do-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[modelo-de-caixa-do-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-border-box-em-todos-os-elementos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-evite-numeros-magicos-no-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[altura-de-elementos-e-overflow]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-prefira-min-height-a-height-fixa]] — o mapa do livro lista esta nota como gerada pela destilação
- [[margens-negativas-e-colapso-de-margens]] — o mapa do livro lista esta nota como gerada pela destilação
- [[espacar-elementos-com-o-seletor-coruja]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: quarto lote, com os capítulos 6 (posicionamento), 8 (camadas e aninhamento) e 10 (consultas de contêiner), prioridade média. Páginas de PDF confirmadas (cap. 6 em 183-209, cap. 8 em 241-267, cap. 10 em 299-322; capítulo 9 em 268-298). O final do capítulo 10 (vantagens das consultas de estilo) foi lido só em parte.
- [[tipos-de-posicionamento-em-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[contextos-de-empilhamento-e-z-index]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-organize-os-z-index-e-posicione-o-minimo]] — o mapa do livro lista esta nota como gerada pela destilação
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — o mapa do livro lista esta nota como gerada pela destilação
- [[camadas-da-cascata-em-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[is-e-where-em-seletores-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[aninhamento-de-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-limite-o-aninhamento-a-tres-niveis]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — o mapa do livro lista esta nota como gerada pela destilação
- [[consultas-de-estilo-de-conteiner]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-prefira-consultas-de-conteiner-as-de-midia-nos-modulos]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: quinto lote, com os capítulos 9, 11 e 12 (últimos de prioridade média), lidos por inteiro. Com isso, todos os capítulos de prioridade alta e média de *CSS in Depth* estão destilados; restam os de baixa prioridade (13 gradientes, 14 máscaras, 15 transições, 16 transformações e 17 animações) e as lacunas de leitura dos capítulos 1, 4, 5 e 7.
- [[css-modular-modulos-variantes-e-bem]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-altere-um-modulo-com-seletores-de-contexto]] — o mapa do livro lista esta nota como gerada pela destilação
- [[escopo-em-css-com-scope]] — o mapa do livro lista esta nota como gerada pela destilação
- [[biblioteca-de-padroes-e-fluxo-css-primeiro]] — o mapa do livro lista esta nota como gerada pela destilação
- [[contraste-visual-como-ferramenta-de-design]] — o mapa do livro lista esta nota como gerada pela destilação
- [[notacoes-de-cor-em-css-e-oklch]] — o mapa do livro lista esta nota como gerada pela destilação
- [[organizar-cores-com-propriedades-personalizadas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — o mapa do livro lista esta nota como gerada pela destilação
- [[espacamento-preciso-ao-implementar-um-design]] — o mapa do livro lista esta nota como gerada pela destilação
- [[fontes-web-e-font-face]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]] — o mapa do livro lista esta nota como gerada pela destilação
- [[fontes-variaveis-em-css]] — o mapa do livro lista esta nota como gerada pela destilação
- [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] — o mapa do livro lista esta nota como gerada pela destilação
