---
titulo: "CSS modular: módulos, variantes e nomes (BEM)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 9, seções 9.1 e 9.2 (PDF p. 268-285; impressa 238-255)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# CSS modular: módulos, variantes e nomes (BEM)

## Definição

CSS modular divide a página em partes reutilizáveis que não dependem diretamente umas das outras, para que uma mudança em uma não tenha efeito inesperado em outra. É o princípio de **encapsulamento** aplicado ao CSS (o autor compara a móveis modulares). Cada módulo cuida de poucos elementos do DOM, tem um **nome de classe único** e um padrão próprio de elementos filhos; módulos se aninham e se combinam para montar a página. Fica na camada `modules` (ver camadas da cascata) e todo o CSS de um módulo, com variantes e estados, fica junto.

- **Seletor do módulo:** só o nome da classe (`.message`); nada que o restrinja a um lugar (`#sidebar .message` o prenderia ao `#sidebar`). Reutilizar o mesmo módulo dá uma interface consistente (o autor conta um projeto com vários botões quase iguais, `.save-form button`, `.login-form button`, que divergiram com o tempo, e foram unificados em um só).
- **Variantes (modificadores):** uma classe nova que começa com o nome do módulo (`message--error`), aplicada **junto** à classe base (`class="message message--error"`); só sobrescreve o que muda. Tamanhos podem mudar o `font-size` para que o `padding` em `em` acompanhe.
- **Subelementos:** `media__image` e `media__body`; o nome já os torna únicos, sem descendentes (`.media > .media__image` seria desnecessário). Para itens genéricos, um seletor de filho com tag descritiva (`.media__body > h4`, `.menu > li`) é aceitável, mas **nunca** tags genéricas como `div` e `span`.
- **BEM** (Bloco, Elemento, Modificador): `bloco`, `bloco__elemento` (dois sublinhados) e `bloco--modificador` (dois hifens); o duplo hífen mostra de relance o que é módulo e o que é modificador (`nav-menu--horizontal`). Há outras metodologias (OOCSS, SMACSS, ITCSS, SUITCSS).
- **Responsabilidade única:** se a descrição do módulo precisa do "e" ("alterna um menu **e** empilha itens"), divida: o módulo `dropdown` (botão e gaveta) contém um módulo `menu` (lista de links); cada um é independente e reutilizável. Mas não divida sem necessidade concreta.
- **Classes de estado:** `is-open`, `is-loading`, `has-error`: adicionadas e removidas por JavaScript para mudar a aparência; ficam junto do módulo. Mantenha elementos posicionados que se relacionam no mesmo módulo.
- **Nomes:** o nome deve dizer o que o módulo **é** conceitualmente, não onde é usado (`running-tip` não serve se o módulo for usado para corridas) nem como parece (`gray-box-with-image`); `media`, `panel`, `alert`, `form-control` funcionam. Algumas equipes exigem duas palavras para evitar nomes genéricos. Variantes: `button--danger` em vez de `button--red`; evite `button--20px`; `large` e `small` são aceitáveis.
- **Alternativa em JavaScript:** CSS em JS (Styled Components, vanilla-extract e CSS Modules) gera nomes únicos, mas prende a uma ferramenta e só serve a aplicações totalmente renderizadas por JavaScript; é controverso.

## Por que importa

Evita a folha de estilo "só de acréscimos", em que ninguém ousa apagar nada e os seletores ficam cada vez mais específicos.

## Como se relaciona

Veja a regra de não alterar módulos por contexto, escopo com @scope em CSS e especificidade de seletores.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nao-altere-um-modulo-com-seletores-de-contexto]] — a regra principal do CSS modular
- [[escopo-em-css-com-scope]] — o escopo é a alternativa imposta pelo navegador
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — os módulos ficam na camada modules
- [[biblioteca-de-padroes-e-fluxo-css-primeiro]] — a biblioteca documenta os módulos
- [[regra-use-line-height-sem-unidade]] — o tamanho da fonte do módulo escala o espaçamento em em
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — os módulos usam consultas de contêiner
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — o dropdown e o menu do capítulo 9 refazem o exemplo de posicionamento
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — as classes com significado servem de modo parecido nos módulos
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — a mesma ideia de encapsulamento
