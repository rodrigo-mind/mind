---
titulo: "Imagens e mapas de imagem em HTML"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 15, seções Embedding an Image e Creating a Client-Side Image Map (PDF p. 365-377)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Imagens e mapas de imagem em HTML

## Definição

- **`img`:** elemento vazio; `src` (URL) e `alt` (conteúdo alternativo, mostrado se a imagem não carrega, o formato não é suportado ou o dispositivo não exibe imagens) são os essenciais. `width` e `height` dizem ao navegador o **tamanho real** da imagem para reservar o espaço antes do carregamento (sem eles, o conteúdo "pula" quando a imagem chega); não servem para redimensionar a imagem dinamicamente.
- **Imagem como link:** envolva o `img` com `a`. A imagem não parece link por si só: dê pistas visuais com CSS ou na própria imagem.
- **Mapa de imagem no servidor:** o atributo `ismap` anexa à URL as coordenadas do clique (`?10,4`), para o servidor decidir a resposta.
- **Mapa de imagem no cliente:** `usemap="#nome"` no `img` aponta para o `map name="nome"`, com elementos `area` (`href`, `alt`, `shape`, `coords`): `rect` (quatro números: esquerda, topo, direita, base), `circle` (centro x, centro y e raio), `poly` (pares de pontos) e `default` (a imagem toda). Não precisa de `a`.
- O atributo `ismap` e `usemap` têm a mesma finalidade geral (regiões clicáveis), mas o segundo não exige o servidor.

## Por que importa

`alt` e dimensões afetam acessibilidade e estabilidade do layout.

## Como se relaciona

Veja a regra de alt e dimensões, links e URLs relativas em HTML e iframe, object e embed em HTML5.

## Notas do Claude

O livro é de 2011: hoje também existem `srcset` e `sizes` (imagens responsivas) e `loading="lazy"`, que o trecho lido não trata (inferência minha, a conferir; ver design responsivo mobile-first).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[links-e-urls-relativas-em-html]] — esta nota cita a ideia de «Links e URLs relativas em HTML» na seção sobre como se relaciona
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — «Sempre informe alt e as dimensões das imagens» cita esta nota ao explicar suas relações
- [[iframe-object-embed-progress-e-meter-em-html5]] — «iframe, object e embed em HTML5, progress e meter» cita esta nota ao explicar suas relações
- [[design-responsivo-mobile-first]] — imagens responsivas fazem parte do design responsivo
