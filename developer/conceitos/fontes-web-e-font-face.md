---
titulo: "Fontes web e @font-face"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 12, seções 12.2 a 12.4 (PDF p. 366-373; impressa 336-343)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fontes web e @font-face

## Definição

Antes, só se podiam usar fontes "seguras" (Arial, Helvetica, Georgia) instaladas na máquina do usuário. As **fontes web** são baixadas pela página e mudam o tom do site (formal, informal, lúdico). É comum usar duas: uma para títulos e outra para o texto (em geral, uma com serifa e uma sem). "Typeface" é a família (Roboto); cada variante (leve, negrito, itálico) é uma "font".

- **Serviço hospedado** (Google Fonts, Adobe Fonts): cuida de hospedagem e licença. No Google Fonts: escolha as fontes, **reduza os pesos** ao necessário (por exemplo, Roboto 300 e Sansita 800), copie as tags `<link>` para o `<head>` (inclusive as de `preconnect`, que antecipam a conexão) e use os nomes em `font-family` (Roboto no `body`, Sansita nos títulos).
- **`@font-face`:** é o que o serviço gera. `font-family` define o nome de uso; `src` dá o endereço (e o `format`); `font-weight` e `font-style` dizem a que peso e estilo a regra corresponde; `unicode-range` (usado pelo Google) separa os caracteres latinos comuns de conjuntos estendidos (cirílico, grego, vietnamita), que só são baixados se a página precisar. Para hospedar a própria fonte (por exemplo, uma comprada), escreva as regras à mão.
- **Formato:** WOFF2, compactado, é suportado por todos os navegadores atuais; dá para listar mais de um formato em ordem de preferência; `local()` usa antes a fonte instalada no sistema.
- **Cada variante precisa da própria regra** `@font-face`. Se a página pedir um peso que não foi declarado, o navegador usa o mais próximo, e pode simular negrito ou itálico geometricamente (o "negrito falso", que nunca fica tão bom). Use só pesos e estilos que foram declarados.

## Por que importa

A fonte define o caráter do site, mas pesa no carregamento (ver regra de fontes e font-display).

## Como se relaciona

Ver fontes variáveis em CSS e espaçamento de texto.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fontes-variaveis-em-css]] — esta nota cita a ideia de «Fontes variáveis em CSS» na seção sobre como se relaciona
- [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]] — o desempenho das fontes
- [[links-e-urls-relativas-em-html]] — o link e o preconnect ficam no head do documento
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
