---
titulo: "Rastreamento, indexação e ranqueamento"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 40-43"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 51-54"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Rastreamento, indexação e ranqueamento

## Definição
O livro descreve o buscador como duas tarefas: descobrir e catalogar as páginas públicas da web e, a cada consulta, devolver as mais adequadas, em ordem.

- **Rastreamento (crawling).** Robôs (crawlers ou spiders) partem de um conjunto inicial de sites muito confiáveis e seguem os links de cada página para descobrir outras. Os links formam o tecido que liga a web. O buscador não rastreia tudo todos os dias e ignora páginas que julga pouco importantes.
- **Indexação.** Constrói-se um grande banco de termos com os termos significativos de cada página, mais outros dados: a quais páginas ela se liga, o texto clicável dos links (texto âncora) e se o link é publicidade.
- **Recuperação e ranqueamento.** Dado o termo buscado, o sistema devolve só o que é relacionado e ordena por importância percebida, levando em conta confiança e autoridade do site.

Dois conceitos-chave:
- **Relevância**: quanto o conteúdo de um documento corresponde à intenção e aos termos da busca. Aumenta com termos relevantes na página e com links de páginas relevantes que usam âncora relevante. É a condição para "entrar no jogo".
- **Importância**: peso relativo do documento, medido por citações, isto é, por quantos outros documentos o referenciam (hoje, links e menções em redes sociais). Desempata páginas igualmente relevantes. A combinação das duas define a ordem.

Relevância e importância são calculadas por algoritmos com centenas de componentes, chamados fatores de ranqueamento (o Google prefere "sinais").

## Por que importa
- É o que o SEO tenta influenciar: relevância (conteúdo e links relevantes) e importância (autoridade e confiança).
- Páginas que o robô não alcança, por falta de links rastreáveis, não entram no jogo; por isso a arquitetura de links importa (ver arquitetura-de-site-amigavel-a-buscadores).
- O buscador analisa as palavras e frases da página e monta um mapa semântico de conceitos; sem correspondência semântica com a consulta, a página tem pouca chance de aparecer. A navegação repetida em todas as páginas do site não ajuda a definir o conteúdo próprio de cada uma; o foco é o "conteúdo único da página".
- Para avaliar o valor do conteúdo, o buscador olha, por exemplo, se o mesmo texto existe em outro site, se o conteúdo único tem duas frases ou mais de 500 palavras e se repete a palavra-chave em excesso.

## Como se relaciona
- Os sinais que compõem a ordem estão em sinais-de-ranqueamento-e-fatores-negativos.
- O que o robô consegue ou não ler está em o-que-os-buscadores-leem-em-uma-pagina.
- A interpretação da consulta está em intencao-de-busca-e-coocorrencia-de-termos.

## Notas do Claude
O livro avisa que o capítulo vale para Google e Bing; buscadores de outros países (Yandex, Baidu, Seznam, Naver) podem funcionar diferente.

## Conexões
- [[arquitetura-de-site-amigavel-a-buscadores]] — links e profundidade importam porque o robô descobre as páginas seguindo links
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — detalha como acompanhar e melhorar o rastreamento e a indexação explicados no conceito geral
- [[intencao-de-busca-e-coocorrencia-de-termos]] — a conectividade semântica faz parte de como o buscador mede relevância
- [[o-que-os-buscadores-leem-em-uma-pagina]] — o que o robô lê é a matéria-prima da indexação
- [[sinais-de-ranqueamento-e-fatores-negativos]] — os sinais compõem a relevância e a importância que definem a ordem dos resultados
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — as instruções ao robô atuam sobre as etapas de rastreamento e indexação
