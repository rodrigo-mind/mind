---
titulo: "Eficiência de rastreamento e erros de rastreamento"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 11, p. 523-524"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 11, p. 546-548"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 11, p. 569-579"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 12, p. 603-606"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Eficiência de rastreamento e erros de rastreamento

## Definição
**Eficiência de rastreamento (crawl efficiency)** é o quanto o site ajuda os robôs a atingir três metas: encontrar todas as páginas importantes, não diluir autoridade com conteúdo duplicado e indexar logo o conteúdo urgente (promoções, notícias). Para isso é preciso observar o comportamento dos robôs e remover obstáculos.

**Como observar o robô:**
- **Arquivos de log do servidor** registram cada requisição, inclusive dos robôs; ferramentas de analytics por script não os veem (os robôs não executam JavaScript). Os logs também rastreiam usuários sem JavaScript e formatos além de HTML. Ferramentas por script são mais flexíveis (eventos, metas), e algumas oferecem as duas formas.
- **Ferramentas dos buscadores** (webmaster tools) mostram páginas indexadas, taxa de rastreamento, erros 4xx e 5xx, redirecionamentos, bloqueios por robots.txt, falhas de DNS e tempo de download. O livro destaca que o relatório do próprio buscador é mais fiel do que o comando `site:`, que dá só estimativa. Esses dados não guardam histórico: exporte e arquive.
- **Simuladores de robô** e rastreadores próprios mostram a página como o robô a vê.

**O que a frequência de rastreamento indica:** quais páginas têm mais autoridade e confiança, problemas de robots.txt ou de arquitetura, e quedas bruscas que podem sinalizar penalidade. Rastrear não garante indexar: a página precisa de conteúdo único e de links suficientes.

**Erros de rastreamento comuns:** páginas movidas sem redirecionamento, robots.txt que bloqueia partes importantes, links externos para URLs que não existem. Os relatórios de 404 mostram também quem linka para a página errada; faça um 301 para a página certa e ganhe um link. O "soft 404" ocorre quando uma página inexistente devolve código 200 (por exemplo, páginas de erro personalizadas que redirecionam a uma página válida): esconde links quebrados e pode fazer o buscador indexar a página de erro. Dê a ele o mesmo peso que a um 404 comum.

**Como melhorar:** eliminar duplicados e fornecer um mapa do site em XML completo e com metadados corretos (frequência de mudança), para que páginas novas e urgentes sejam descobertas.

**Conteúdo escondido sem querer (capítulo 12).** Pode acontecer após uma publicação: um noindex ou um robots.txt do ambiente de testes copiado para o site no ar (o livro recomenda checagens de segurança logo após qualquer atualização). Em site novo não há queda para alertar. Como detectar: páginas com visitas mas sem tráfego de busca; contagem de páginas indexadas muito baixa e estável; mapas do site separados por área para localizar o problema. Causas a checar: bloqueio por robots.txt (as ferramentas do buscador mostram o que está bloqueado); meta robots com noindex ou nofollow sem querer; falta de links diretos (links só para quem aceita cookies ou criptografados); conteúdo que exige formulário ou login (alternativa: First Click Free, com cinco acessos gratuitos por dia vindos do Google em 2014); IDs de sessão nas URLs; e pouca autoridade para entrar no índice principal (o Google diz já não ter índice suplementar). Texto oculto: o buscador pode vê-lo como spam; casos comuns sem intenção são menus e abas com display:none e textos de acessibilidade, que em geral não são penalizados.

## Por que importa
Páginas que o robô não alcança, ou que ele consome tempo em duplicatas, não ranqueiam. Erros de rastreamento também desperdiçam links que já existem.

## Como se relaciona
- Detalha o funcionamento descrito em rastreamento-indexacao-e-ranqueamento.
- Itens técnicos relacionados em problemas-tecnicos-de-plataforma-que-prejudicam-o-seo e na checagem de auditar-um-site-existente-para-seo.
- Dados de rastreamento entram na linha de base de registrar-linha-de-base-e-historico-de-mudancas-de-seo.

## Notas do Claude
Os nomes das ferramentas e dos relatórios são de 2014 e mudaram. A ideia de que os robôs rastreiam em ordem aproximada de autoridade é do livro e tem o PageRank como base, hoje menos visível.

## Conexões
- [[auditar-um-site-existente-para-seo]] — erros de rastreamento, mapa do site e robots.txt são itens que a auditoria confere
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — servidor lento, bloqueio de bots e redirecionamentos errados aparecem como erros de rastreamento
- [[rastreamento-indexacao-e-ranqueamento]] — detalha como acompanhar e melhorar o rastreamento e a indexação explicados no conceito geral
- [[registrar-linha-de-base-e-historico-de-mudancas-de-seo]] — dados de rastreamento e indexação compõem a linha de base
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — robots.txt e metatags mal configurados aparecem como erros e páginas não rastreadas
- [[migrar-dominio-redesenhar-ou-trocar-servidor-sem-perder-seo]] — o monitoramento de 404 e rastreamento acompanha uma migração, e noindex esquecido é causa de conteúdo escondido
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — orçamento de rastreamento e erros
