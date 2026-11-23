---
titulo: "Metadados do documento HTML: meta, link e style"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 7, seção Describing Documents with the Metadata Elements (PDF p. 115-148)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Metadados do documento HTML: meta, link e style

## Definição

**`meta`** (elemento vazio no `head`): cada elemento serve a um único propósito; para dois usos, escreva dois `meta`.
- **Pares nome/valor** (`name` + `content`): os nomes predefinidos são `application-name`, `author`, `description`, `generator` e `keywords`; há extensões, como `robots` (valores `noindex`, `noarchive`, `nofollow`). Segundo o autor, os buscadores dão hoje pouca atenção a `keywords`, por abuso.
- **Codificação de caracteres:** `charset` (por exemplo, UTF-8, que representa todo o Unicode com poucos bytes).
- **Simular cabeçalho HTTP:** `http-equiv` aceita só três valores no HTML5: `refresh` (recarregar a cada N segundos, ou ir para outra URL), `default-style` e `content-type`.

**`style`:** define CSS dentro do documento (pode haver vários, em qualquer lugar permitido). O `type` é sempre `text/css`. O atributo `scoped` não era suportado pelos navegadores principais. `media` limita quando o estilo vale: por dispositivo (`screen`, `print`, etc.) e por característica (`width`, `orientation`...), combináveis com `and`, `not` e vírgula (ou). O autor manda testar e ter um estilo reserva, porque a interpretação varia.

**`link`:** relaciona o documento a um recurso externo; o atributo principal é `rel`. Valores comuns: `stylesheet` (folha de estilo externa, reaproveitável entre páginas), `icon` (favicon; se estiver em `/favicon.ico`, o navegador pede sozinho), `alternate`, `author`, `help`, `license`, `pingback` e `prefetch` (baixar de antemão um recurso provável; na época só o Firefox suportava).

## Por que importa

Define codificação, aparência, ícone e como buscadores e navegadores tratam a página.

## Como se relaciona

Faz parte da estrutura básica de um documento HTML5. O `media` usa o mesmo modelo das consultas de mídia do design responsivo mobile-first.

## Notas do Claude

O livro é de 2011: os tipos de dispositivo como `handheld` e `tty` perderam o uso, e a tag `meta name="viewport"` (essencial no design responsivo) não é tratada no trecho que li (inferência minha, a conferir).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[estrutura-basica-de-um-documento-html5]] — esta nota cita a ideia de «Estrutura básica de um documento HTML5» na seção sobre como se relaciona
- [[design-responsivo-mobile-first]] — o atributo media usa o mesmo modelo das consultas de mídia
- [[cascata-do-css]] — style e link carregam as folhas de estilo que entram na cascata
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[The-Art-of-SEO-Mastering-Search-Engine-Optimization-(Eric-Enge-Stephan-Spencer) (pdf)]] — o livro mostra como título e descrição da página entram no SEO na página
- [[auditar-um-site-existente-para-seo]] — a auditoria revisa títulos, meta descrição e metatags robots
- [[o-que-os-buscadores-leem-em-uma-pagina]] — título e meta descrição são metadados que o buscador lê
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — título e meta descrição são os metadados que o framework otimiza para SEO
