---
titulo: "Escopo em CSS com @scope"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 9, seção 9.3 (PDF p. 286-296; impressa 256-266)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Escopo em CSS com @scope

## Definição

A regra `@scope (seletor) { ... }` restringe os estilos a uma parte da página, com a imposição feita pelo navegador (em vez da disciplina de nomes do BEM). É o recurso mais novo do livro: chegou ao Chrome 118 em outubro de 2023, sem previsão para o Firefox; confira o suporte.

- **Seletores dentro do escopo** só atingem descendentes da raiz do escopo (`@scope (.media) { img { ... } .body { ... } }`); a raiz é estilizada com `:scope`. Os nomes de classe internos podem se repetir em outros módulos. O seletor do `@scope` **não soma especificidade**: `img` dentro do escopo vale 0,0,1 (e não 0,1,1).
- **Proximidade:** novo critério da cascata, considerado depois da especificidade e **antes da ordem no arquivo**. Com escopos aninhados e seletores de igual especificidade para o mesmo elemento, vence o escopo mais interno (o módulo `media` dentro de `highlight-block` mantém a cor do seu título). Só decide conflitos de propriedade; o escopo externo continua aplicando o que o interno não define.
- **Limite interno (donut scope):** `@scope (.highlight-block) to (.slot)` ("até"): os estilos não alcançam o `.slot` nem o que está dentro dele. Garante que um módulo que contém outros nunca mude os internos (por exemplo, `@scope (.dropdown) to (.drawer > *)`). Dá para combinar uma regra com limite e outra sem, no mesmo módulo. O limite não impede a **herança** (fontes do módulo externo seguem).
- **Colisões de nome:** só as classes das raízes; use um prefixo (`m-media`) ou um atributo (`@scope ([data-scope="dropdown"]) to ([data-scope])`).
- **Escopo implícito:** `@scope` sem seletor dentro de um `<style>` no elemento limita ao pai; útil em conteúdo avulso.
- **Escopo e camadas:** são dimensões independentes (como linhas e colunas); a especificidade ainda vence a proximidade, e as camadas vencem as duas. Dá para dividir a camada `modules` (`modules.base` e `modules.ui`).
- **Shadow DOM:** isola de verdade um componente (precisa trazer o próprio estilo), bom para widgets embutidos em outros sites; o escopo, ao contrário, mantém o módulo dentro da cascata, para um site coeso.

## Por que importa

Substitui boa parte da disciplina de nomes por regras que o navegador aplica.

## Como se relaciona

Estende CSS modular e camadas da cascata em CSS; a proximidade entra na cascata do CSS.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[cascata-do-css]] — esta nota cita a ideia de «A cascata do CSS» na seção sobre como se relaciona
- [[camadas-da-cascata-em-css]] — esta nota cita a ideia de «Camadas da cascata» na seção sobre como se relaciona
- [[css-modular-modulos-variantes-e-bem]] — o escopo é a alternativa imposta pelo navegador
- [[aninhamento-de-css]] — @scope também pode ser aninhado
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — «Componentes web: templates, elementos customizados e shadow DOM» cita esta nota ao explicar suas relações
