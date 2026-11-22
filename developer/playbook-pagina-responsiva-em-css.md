---
titulo: "Playbook de página responsiva em CSS"
tipo: playbook
origem: destilar
assunto: developer
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Playbook de página responsiva em CSS

## Objetivo

Montar uma página (site institucional, landing page) com HTML semântico e CSS próprio, que funcione em telas pequenas e grandes, seja acessível e carregue bem, usando só HTML, CSS e JavaScript sem frameworks.

## Quando usar

Ao criar uma página nova ou refatorar uma folha de estilo que cresceu sem organização.

## O que o usuário precisa fornecer

- O conteúdo e a estrutura da página (seções, imagens, formulários).
- A paleta de cores e as fontes (ou o direito de escolhê-las).
- O navegador-alvo mais antigo que importa (define o uso de camadas, aninhamento e consultas de contêiner).

## Etapas

| Etapa | Framework ou nota | Livro | O que produz |
|---|---|---|---|
| 1. Estrutura do documento | Estrutura básica de um documento HTML5; Metadados do documento HTML; Elementos de seção semânticos | The Definitive Guide to HTML5 | `doctype`, `head`, `title`, codificação e regiões `header`, `nav`, `main`, `article`, `aside`, `footer` |
| 2. Escolher os elementos | Escolha o elemento HTML mais específico e seja consistente; Imagens: regra de `alt` e dimensões | HTML5 | marcação sem `div` desnecessários e imagens com `alt`, `width` e `height` |
| 3. Folha de estilo organizada | Organização de uma folha de estilo em seis camadas; Use border-box em todos os elementos | CSS in Depth | camadas `reset`, `theme`, `global`, `layout`, `modules` e `utilities`, com o reset básico |
| 4. Unidades e fonte base | Defina a fonte base na raiz e use unidades relativas; Fonte fluida com calc() e clamp() | CSS in Depth | `rem` e `em` no lugar de pixels, e tamanho de fonte que acompanha a tela |
| 5. Cores e contraste | Organizar cores com propriedades personalizadas; Garanta o contraste mínimo do texto | CSS in Depth | paleta em variáveis e pares de cor com contraste conferido |
| 6. Fontes web | Fontes web e @font-face; Carregue só as fontes necessárias e escolha o font-display | CSS in Depth | no máximo duas famílias, poucos pesos, `font-display` definido |
| 7. Layout | Fluxo normal do documento; Centralizar um bloco na horizontal; Flexbox; Layout em grade (CSS Grid); Espaçamento com o seletor coruja | CSS in Depth | colunas e regiões da página, com espaçamento uniforme |
| 8. Módulos | CSS modular; Não altere um módulo com seletores de contexto; Prefira consultas de contêiner nos módulos | CSS in Depth | componentes (cartão, menu, botão) com variantes por modificador |
| 9. Responsivo | Design responsivo mobile-first | CSS in Depth | estilos para tela pequena primeiro, com consultas de mídia para as maiores |
| 10. Posicionamento, se preciso | Tipos de posicionamento; Organize os z-index | CSS in Depth | modal ou menu com `z-index` em variáveis |
| 11. JavaScript | Carregue scripts com defer ou async; Usar módulos JavaScript no navegador | HTML5 e JavaScript | scripts que não travam a página |
| 12. Conferir | Verificar contraste, teclado, rede lenta (para as fontes) e telas diferentes | CSS in Depth | página testada em largura pequena, média e grande |

## Entregável

Uma página com um arquivo CSS organizado em camadas e este checklist:

- [ ] HTML com `doctype`, `title`, codificação e regiões semânticas.
- [ ] Imagens com `alt` e dimensões.
- [ ] `box-sizing: border-box` e reset na camada `reset`.
- [ ] Fonte base na raiz, em unidades relativas; nenhum tamanho de texto só em pixels.
- [ ] Cores em variáveis; contraste conferido (4,5:1 no texto comum).
- [ ] No máximo duas famílias de fonte web e `font-display` definido.
- [ ] Layout com flexbox ou grade; nenhuma tabela de layout.
- [ ] Módulos com modificadores, sem seletores de contexto.
- [ ] Testado em celular, tablet e desktop e só pelo teclado.

## Lacunas

- A tag `meta name="viewport"` (indispensável no celular) e as imagens responsivas (`srcset`, `loading="lazy"`) não estão nas notas lidas.
- Desempenho (Core Web Vitals, cache, compressão de imagens) e SEO técnico: só tocados pelas regras de fontes e imagens.
- Acessibilidade além do contraste e do `alt` (foco visível, ARIA, leitores de tela).
- Animações e transições (capítulos de baixa prioridade de CSS in Depth ainda não destilados).

## Notas do Claude

A ordem é uma proposta minha: estrutura, base de CSS, visual, layout, módulos, responsivo. Alternativa: construir primeiro os módulos isolados e só depois a página. Recursos recentes (camadas, aninhamento, `@scope`, consultas de contêiner, OKLCH) pedem conferência do suporte dos navegadores: em um público com navegadores antigos, evite as camadas, que ignoram toda a regra sem degradação gradual.

## Conexões

- [[developer]] — nota destilada ligada a este assunto: playbook de livro-base
- [[estrutura-basica-de-um-documento-html5]] — o playbook usa esta nota como etapa do processo
- [[metadados-do-documento-html]] — o playbook usa esta nota como etapa do processo
- [[elementos-de-secao-semanticos-html5]] — o playbook usa esta nota como etapa do processo
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — o playbook usa esta nota como etapa do processo
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — o playbook usa esta nota como etapa do processo
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — o playbook usa esta nota como etapa do processo
- [[regra-use-border-box-em-todos-os-elementos]] — o playbook usa esta nota como etapa do processo
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — o playbook usa esta nota como etapa do processo
- [[fonte-fluida-com-calc-e-clamp]] — o playbook usa esta nota como etapa do processo
- [[organizar-cores-com-propriedades-personalizadas]] — o playbook usa esta nota como etapa do processo
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — o playbook usa esta nota como etapa do processo
- [[fontes-web-e-font-face]] — o playbook usa esta nota como etapa do processo
- [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]] — o playbook usa esta nota como etapa do processo
- [[fluxo-normal-do-documento]] — o playbook usa esta nota como etapa do processo
- [[centralizar-um-bloco-na-horizontal]] — o playbook usa esta nota como etapa do processo
- [[flexbox]] — o playbook usa esta nota como etapa do processo
- [[layout-em-grade-css-grid]] — o playbook usa esta nota como etapa do processo
- [[espacar-elementos-com-o-seletor-coruja]] — o playbook usa esta nota como etapa do processo
- [[css-modular-modulos-variantes-e-bem]] — o playbook usa esta nota como etapa do processo
- [[regra-nao-altere-um-modulo-com-seletores-de-contexto]] — o playbook usa esta nota como etapa do processo
- [[regra-prefira-consultas-de-conteiner-as-de-midia-nos-modulos]] — o playbook usa esta nota como etapa do processo
- [[design-responsivo-mobile-first]] — o playbook usa esta nota como etapa do processo
- [[tipos-de-posicionamento-em-css]] — o playbook usa esta nota como etapa do processo
- [[regra-organize-os-z-index-e-posicione-o-minimo]] — o playbook usa esta nota como etapa do processo
- [[regra-carregue-scripts-com-defer-ou-async]] — o playbook usa esta nota como etapa do processo
- [[usar-modulos-javascript-no-navegador]] — o playbook usa esta nota como etapa do processo
- [[playbook-formulario-seguro-em-php]] — formulários da página têm este processo de segurança
- [[playbook-posicionamento-de-produto]] — a mensagem da página nasce do posicionamento
