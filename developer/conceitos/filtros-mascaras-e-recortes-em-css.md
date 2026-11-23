---
titulo: "Filtros, máscaras e recortes em CSS (filter, mask, clip-path, shape-outside)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 14 (PDF p. 413-440)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Filtros, máscaras e recortes em CSS

## Definição

- **`filter`:** aplica efeitos ao elemento: `blur()`, `grayscale()`, `sepia()`, brilho, contraste e outros (são dez funções). Várias funções vão separadas por espaço (`filter: blur(5px) sepia(20%)`). Exemplo do livro: numa galeria, aplicar o filtro a todas as imagens menos a que está sob o mouse, com uma transição para não ficar brusco. O desfoque forte deixa texto ilegível.
- **`backdrop-filter`:** aplica o filtro ao que está **atrás** do elemento, e não a ele. Serve para manter texto legível sobre uma imagem e para notificações e barras "de vidro". Ainda pede a versão com prefixo `-webkit-`.
- **Máscara (`mask-image`):** esconde partes do elemento conforme uma imagem ou um gradiente. As áreas opacas da máscara mostram o elemento; as transparentes escondem. As propriedades seguem o padrão das de fundo (`mask-size`, `mask-repeat`...), e alguns navegadores ainda pedem prefixo. Um gradiente como máscara serve para fazer o elemento "sumir" aos poucos. Para depurar, troque temporariamente `mask-image` por `background-image` e veja onde a máscara está.
- **Atenção:** máscaras com arquivo externo não funcionam abrindo o HTML direto do disco (`file://`). É preciso um servidor local.
- **`clip-path`:** recorta o elemento numa forma (círculo, polígono etc.).
- **`shape-outside`:** num elemento flutuante (`float`), faz o texto contornar uma forma em vez do retângulo.

## Por que importa

Dá formas e efeitos (fotos recortadas, títulos sobre imagem, texto que contorna figuras) sem editar as imagens.

## Como se relaciona

Os modos de mesclagem estão em gradientes, sombras e modos de mesclagem em CSS. As transições usadas nos filtros estão em criar transições em CSS.

## Notas do Claude

- Confiança média: li a parte de filtros e de máscaras; `clip-path` e `shape-outside` foram só folheados.
- Para testar máscaras localmente com PHP, `php -S localhost:8080` serve como servidor (inferência minha).

## Conexões

- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[gradientes-sombras-e-modos-de-mesclagem-em-css]] — gradientes servem de máscara, e os modos de mesclagem completam os efeitos
- [[criar-transicoes-em-css]] — o filtro ganha uma transição para não mudar bruscamente
- [[fluxo-normal-do-documento]] — `shape-outside` age sobre elementos flutuantes, que saem do fluxo normal
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
