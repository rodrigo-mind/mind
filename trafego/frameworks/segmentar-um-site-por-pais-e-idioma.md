---
titulo: "Segmentar um site por país e idioma"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 259-263"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 82"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Segmentar um site por país e idioma

## Para que serve
Fazer o buscador mostrar a versão certa do site para cada país e idioma, sem criar duplicidade nem perder autoridade.

## Quando usar e quando não usar
Para empresas que atendem mais de um país ou idioma. O livro adverte que a decisão envolve também marketing e questões não ligadas a SEO (impostos, ou domínios que exigem presença local, como o .fr).

## O que perguntar ao usuário antes
- Quais países e idiomas, hoje e nos próximos anos
- Se há equipes locais, e a força do domínio principal
- Quem consegue hospedar e registrar domínios nos países

## Passos
1. **Reúna os sinais de país** (ver a lista do capítulo 2): extensão de domínio do país, hospedagem no país (mais pela velocidade), endereço físico local em texto em todas as páginas, a configuração de segmentação geográfica nas ferramentas do buscador, endereço verificado em mapas, links de sites do país e idioma local. As ferramentas de segmentação funcionam menos bem para subpastas do que o domínio, a hospedagem e os links; e usuários de alguns países preferem a extensão local (por exemplo, .fr para a França).
2. **Não entregue conteúdo por IP.** Os robôs rastreiam dos Estados Unidos; se você redireciona ou muda o idioma pelo IP, eles só verão a versão americana ou em inglês.
3. **Escolha a abordagem.** Com equipes locais fortes ou domínio principal fraco: sites locais independentes, cada um com seus sinais. Com marketing centralizado ou domínio principal forte: versões em subdomínios por país (permitem hospedagem local) ou em subpastas (aproveitam mais a autoridade do domínio); nos dois casos, cuidado com duplicidade entre regiões.
4. **Idiomas.** Um idioma em um país: um só site, com o idioma em pastas diferentes, links do país, hospedagem e domínio do país e a marcação hreflang. Vários países com o mesmo idioma ou vários idiomas: sites separados por país e idioma, em domínios e hospedagens locais, com redatores nativos do dialeto, links locais e hreflang.
5. **Marque com hreflang.** Há três formas (cabeçalho HTTP, cabeçalho HTML ou mapa do site); use só uma. Marcar só o idioma é aceitável, mas marcar só a região não: ao usar região, combine idioma e região. Inclua uma versão padrão (x-default). Cada versão deve referenciar todas as outras (acrescentar um país novo exige mexer em todas as páginas). Não há marcação para regiões como "América Latina": trate cada país. Os códigos de idioma seguem o padrão de duas letras.
6. **Planeje vários anos à frente** a lista de países e idiomas, para evitar refazer a marcação.

## Saída esperada
Mapa de países, idiomas, domínios, hospedagem e URLs, mais o conjunto de marcações hreflang por página.

## Erros comuns
- Entregar idioma por IP.
- Marcar hreflang só com região.
- Misturar duas formas de marcação que se contradigam.

## Notas do Claude
Os detalhes de ferramentas de segmentação geográfica e a lista de buscadores por país são de 2014. A marcação hreflang e a lógica de sinais de país seguem válidas, mas confirme a documentação atual.

## Conexões
- [[regra-prefira-subpasta-a-subdominio-ou-dominio-separado]] — subpasta ou subdomínio por país é uma das decisões de estrutura internacional
- [[resolver-conteudo-duplicado-e-conteudo-fino]] — versões por país com texto parecido geram duplicidade, o que o hreflang ajuda a evitar
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[guia-seo-brasil]] — o módulo B6 trata de hreflang para pt-BR e pt-PT
