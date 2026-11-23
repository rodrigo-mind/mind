---
titulo: "Preparar um site para a busca móvel"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 10, p. 461-467"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Preparar um site para a busca móvel

## Para que serve
Fazer com que o site apareça bem nas buscas feitas em celulares, escolhendo a configuração móvel certa e cumprindo os requisitos mínimos de uso e velocidade.

## Quando usar e quando não usar
Em qualquer site novo ou existente. O livro afirma que o ponto de virada já passou: segundo o livro, o Google passou a receber mais buscas de aparelhos móveis que de computadores em 2014 e lançou em abril de 2015 um algoritmo que decide, sim ou não, se uma página é amigável a celular e usa isso no ranqueamento de buscas móveis (o Google teria dito que o impacto seria maior que o do Panda ou do Penguin).

## O que perguntar ao usuário antes
- Se é preciso atender também celulares simples, ou só smartphones
- Tamanho do site e orçamento de desenvolvimento
- Se há apps para o mesmo conteúdo

## Passos
1. **Atenda os quatro requisitos básicos:** rápido (o ideal do livro é carregar em menos de um segundo); funcional (conteúdo exibido e funcionando no navegador móvel, sem bloquear CSS, JavaScript ou imagens); amigável ao toque (botões, links e campos grandes e espaçados); sem redirecionamentos e erros (as URLs móveis devem responder 200).
2. **Escolha a configuração**, entre as três aceitas pelo Google:
   - **Design responsivo (mesmas URLs):** o mesmo HTML para todos os aparelhos, com CSS que muda a apresentação. Normalmente a mais barata de manter; o site móvel herda links e sinais do desktop.
   - **Entrega dinâmica (mesmas URLs):** a mesma URL entrega HTML e CSS diferentes conforme o agente de usuário. Mais cara, mas pode ser mais rápida e mais adequada ao aparelho.
   - **URLs separadas** (por exemplo, um subdomínio m.): mais flexível para celulares simples ou sites enormes; o buscador passa a tratar dois sites e os links não se somam automaticamente.
3. **Sinalize a configuração.** Na entrega dinâmica, use o cabeçalho HTTP Vary; em URLs separadas, use as anotações rel="alternate" e rel="canonical" entre as versões (evita duplicidade) e redirecione os visitantes móveis para a URL móvel. Detecte o agente de usuário no servidor (há bibliotecas abertas para isso).
4. **Deixe CSS, JavaScript e imagens acessíveis** aos robôs (verifique o robots.txt), e não use Flash.
5. **Faça um mapa do site móvel** quando usar URLs separadas, no formato exigido pelo buscador.
6. **Meça e melhore a velocidade** com ferramentas de teste de velocidade móvel; vale o mesmo para as três configurações.
7. **Considere apps.** O livro prevê que o conteúdo dentro de apps passará a ser indexado: crie esquemas de links profundos (deep links) para páginas específicas do app, registre-os no sistema operacional, siga os padrões multiplataforma e use a API de indexação de apps do Google. Prefira URLs próprias a URLs de terceiros, para que links externos e compartilhamentos se acumulem em um endereço seu.

## Saída esperada
Decisão registrada sobre a configuração, checklist de requisitos móveis e plano de velocidade.

## Erros comuns
- Bloquear arquivos de estilo e script no robots.txt.
- Ter URLs móveis que redirecionam ou devolvem erro.
- Esquecer de ligar as versões desktop e móvel com anotações.

## Notas do Claude
O livro é de 2015; as ferramentas de teste e os nomes dos programas (Google Webmaster Tools, API de indexação de apps) mudaram. A tabela de tendências sobre gastos com anúncios móveis não foi usada.

## Conexões
- [[otimizar-a-presenca-em-busca-local]] — a maior parte das buscas locais acontece no celular, onde a experiência móvel é decisiva
- [[arquitetura-de-site-amigavel-a-buscadores]] — a decisão de configuração móvel (mesma URL ou URL separada) faz parte da arquitetura
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — URLs móveis separadas pedem mapa do site móvel e anotações, e CSS e JavaScript não podem ser bloqueados
- [[sinais-de-ranqueamento-e-fatores-negativos]] — a velocidade da página é um dos sinais de qualidade que pesam em especial no celular
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[design-responsivo-mobile-first]] — o design responsivo é uma das três configurações móveis aceitas pelo Google
- [[guia-seo-brasil]] — os módulos B3 e B4 atualizam velocidade e mobile (Core Web Vitals)
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — versão do livro (2015) do preparo para o celular
