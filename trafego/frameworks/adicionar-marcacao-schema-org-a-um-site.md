---
titulo: "Adicionar marcação Schema.org a um site"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 217-218"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 263-273"
confianca: media
criado: 2026-11-23
atualizado: 2026-11-23
---

# Adicionar marcação Schema.org a um site

## Para que serve
Dizer aos buscadores, em formato padronizado, o que é cada conteúdo da página (livro, produto, evento, negócio local), para habilitar trechos enriquecidos (estrelas, preço, tempo de preparo) e ajudar a indexação. A marcação (dados estruturados) não é fator direto de ranqueamento, segundo o Google, mas pode aumentar a taxa de cliques, que é um sinal de uso.

## Quando usar e quando não usar
Em páginas com tipo bem definido de conteúdo (receitas, produtos, avaliações, eventos, empresas). O livro adverte que muitos veem a marcação como atalho de ranking, o que não é; e que o buscador também tenta extrair entidades do texto sem marcação.

## O que perguntar ao usuário antes
- Tipos de página do site (arquétipos) e que informações cada uma exibe
- Se o CMS já tem suporte a Schema.org
- Quem edita os modelos de página ou os scripts

## Passos
1. **Determine os tipos Schema.org** que descrevem as entidades de cada tipo de página, escolhendo o mais específico possível (Restaurant em vez de LocalBusiness; Book em vez de CreativeWork). Decida, por exemplo, se uma página de produto é um Product com várias Offers e uma só avaliação agregada, em vez de modelá-la como Offer.
2. **Mapeie as propriedades** do tipo aos elementos exibidos na página. Mantenha forte coerência com o que o usuário vê: marcar muitos dados que não aparecem se parece com spam. Exceções legítimas: contexto óbvio a uma pessoa e não ao robô, como a escala de uma avaliação (pior e melhor nota).
3. **Escolha a técnica.** A mais comum é Microdata (atributos itemscope, itemtype e itemprop) no HTML, editando modelos ou o CMS; o auxiliar de marcação de dados estruturados do Google dispensa mexer no código, mas só serve a esse buscador e é limitado; o JSON-LD era apontado como alternativa futura, por isolar a marcação em um bloco.
4. **Implemente** nos modelos de página ou scripts de geração.
5. **Teste** com a ferramenta de teste de dados estruturados do buscador: confira se as entidades aninhadas (por exemplo, a avaliação dentro do livro) aparecem corretamente.
6. **Monitore** se o buscador está usando os dados e como eles aparecem nos resultados.

## Saída esperada
Modelos de página com marcação, uma lista de tipos e propriedades por tipo de página, e o resultado dos testes.

## Erros comuns
- Marcar dados não visíveis na página.
- Usar o tipo genérico quando existe um específico.
- Tratar a marcação como garantia de ranqueamento.
- Considerar as informações estruturadas dos negócios locais (nome, endereço, telefone) como opcionais: o livro diz que podem trazer benefício de busca local.

## Notas do Claude
`confianca: media`: a seção de busca semântica, autoria e Knowledge Vault do capítulo foi lida, mas resumida em outra nota (pagina-de-resultados-verticais-e-personalizacao). O livro também trata do programa de autoria (rel=author), que ele mesmo diz ter sido encerrado em 2014, e de páginas de marca no Google+; por serem dependentes de um programa defasado, não viraram nota. Prefira JSON-LD atual e confira os tipos suportados na documentação do Google.

## Conexões
- [[pagina-de-resultados-verticais-e-personalizacao]] — a marcação estruturada alimenta trechos enriquecidos, o Knowledge Graph e as respostas diretas descritas na página de resultados
- [[otimizar-a-presenca-em-busca-local]] — nome, endereço e telefone marcados em Schema.org reforçam a consistência dos dados locais
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[estrategia-gbp-seo-local]] — complementa com a prática atual no Brasil: pede JSON-LD de negócio local no site, aplicação da marcação estruturada
- [[guia-seo-brasil]] — o módulo B5 trata dos dados estruturados suportados hoje
- [[otimizar-o-perfil-da-empresa-no-google-e-converter-visitas]] — marcação LocalBusiness do site
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — base de dados estruturados, a atualizar com a galeria atual
