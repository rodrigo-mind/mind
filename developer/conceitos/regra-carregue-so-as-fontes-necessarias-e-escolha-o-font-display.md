---
titulo: "Carregue só as fontes necessárias e escolha o font-display"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 12, seção 12.5 (PDF p. 374-379; impressa 344-349)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Carregue só as fontes necessárias e escolha o font-display

## Regra

Limite os arquivos de fonte aos pesos e estilos de fato usados (prefira fontes variáveis) e defina conscientemente a propriedade `font-display` de cada `@font-face`.

## Por quê

Depois das imagens, as fontes web são das maiores causas de lentidão no carregamento. Enquanto baixam, o navegador faz uma de duas coisas, e ambas são indesejáveis: **FOUT** (mostra a fonte reserva e a troca, fazendo o texto "pular") ou **FOIT** (texto invisível, que, se a fonte falhar, deixa a página em branco). Nunca se evitam por completo; só se mitigam. O `font-display` escolhe:
- `auto` (decisão do navegador, em geral como `block`);
- `block` (texto invisível por pouco tempo e depois a reserva, trocada ao carregar a web);
- `swap` (mostra a reserva logo e troca: FOUT; é o do Google Fonts por `&display=swap`; melhor em conexões lentas);
- `fallback` (breve invisibilidade, depois a reserva; melhor em conexões rápidas);
- `optional` (como `fallback`, mas o navegador pode nunca usar a fonte web em conexão lenta; para fontes menos vitais).

Outros pontos: as unidades `ch` e `ex` variam entre fontes e provocam deslocamento de layout quando a fonte web chega, então evite usá-las para dimensionar partes grandes da página; `lh` (a entrelinha do elemento) é suportada desde o fim de 2023; fontes do sistema nunca terão o desempenho de fontes já instaladas.

## Quando não vale

Quando o visual exige uma fonte específica e se aceita o custo.

## Como verificar

Simule rede lenta (por exemplo, "Regular 3G" nas DevTools, com cache desativado) e veja o comportamento; confira se há `font-display` em cada `@font-face` e quantos arquivos a página baixa.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — fontes finas pedem mais contraste
- [[fontes-web-e-font-face]] — o desempenho das fontes
- [[fontes-variaveis-em-css]] — reduzem o peso da página
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
