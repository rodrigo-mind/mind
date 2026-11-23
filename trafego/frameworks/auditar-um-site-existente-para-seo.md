---
titulo: "Auditar um site existente para SEO"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 4, p. 105-109, 112-115"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Auditar um site existente para SEO

## Para que serve
Descobrir o que impede um site de ser bem encontrado e criar a base para o resto do trabalho de SEO. O livro trata a auditoria como, em geral, o primeiro passo da execução, e diz que ela deve cobrir as versões desktop e móvel.

## Quando usar e quando não usar
Ao assumir um site já no ar, antes de redesenho ou migração, ou quando o tráfego orgânico cai. Para site novo, o trabalho é de planejamento (ver arquitetura-de-site-amigavel-a-buscadores).

## O que perguntar ao usuário antes
- Acesso a analytics, às ferramentas do buscador (webmaster tools) e, se houver, aos logs do servidor
- Lista dos principais concorrentes
- Histórico de mudanças e de trabalhos anteriores de SEO (ver registrar-linha-de-base-e-historico-de-mudancas-de-seo)

## Passos
1. **Velocidade e versão móvel.** Tempo de carregamento excessivo atrasa o rastreamento e quase elimina a competitividade em busca móvel; confirme que há versão rápida e amigável a celular.
2. **Usabilidade e acessibilidade ao robô.** Usabilidade afeta conversão e propensão a receber links. Garanta que o robô alcança o conteúdo.
3. **Saúde no buscador.** Compare páginas indexadas (comando `site:dominio`) com as que você acredita ter; confira o cache (a página em cache igual à real?); verifique se as ferramentas do buscador estão validadas para o domínio e subdomínios; busque a marca (se não ranqueia, pode haver penalidade).
4. **Palavras-chave.** As páginas miram os termos certos? A arquitetura segue a forma como os usuários buscam? Há mais de uma página mirando o mesmo termo (ver canibalizacao-de-palavras-chave)?
5. **Conteúdo duplicado.** Confirme que a versão com e sem "www" redireciona por 301 para uma só, e o mesmo para http e https. Pesquise trechos únicos entre aspas para achar cópias. Cada conteúdo deve ter uma só URL.
6. **URLs.** Curtas, descritivas, com poucos parâmetros; palavras-chave sem encher de repetições.
7. **Títulos de página.** Únicos e descritivos, com a marca no fim, se for incluída, e com menos de cerca de 70 caracteres.
8. **Conteúdo.** Páginas principais com texto suficiente e cabeçalhos; poucas páginas com pouco conteúdo em proporção ao total.
9. **Metatags.** Procure `robots` com noindex ou nofollow sem intenção; use meta descrição única por página ou nenhuma (ela não ranqueia, mas pode afetar a taxa de cliques e a detecção de duplicados).
10. **Sitemap e robots.txt.** Verifique se o arquivo de mapa do site lista todas as páginas e se o robots.txt está correto.
11. **Redirecionamentos.** Tipo certo (301 para mudança permanente) e destino correto; reduza redirecionamentos ajustando links internos.
12. **Links internos.** Evite excesso de links por página e âncoras abusivas; ligar para sites de qualidade é saudável.
13. **Subdomínios** desnecessários e **geolocalização** (endereço em todas as páginas e cadastro de negócio local, se houver foco local).
14. **Links externos.** Faça análise de backlinks: distribuição de âncoras (por exemplo, quase todas com a mesma palavra-chave é sinal de manipulação), existência de links para páginas internas, links aparentemente pagos e comparação com concorrentes.
15. **Imagens.** Texto alternativo (alt) e nomes de arquivo relevantes.
16. **Qualidade do código.** Validação ajuda a evitar problemas; use um navegador que simule o que o buscador vê.
17. **Servidor.** Confira os problemas listados em problemas-tecnicos-de-plataforma-que-prejudicam-o-seo.

## Saída esperada
Lista de problemas priorizada por impacto e esforço, com a evidência de cada um e o responsável provável (conteúdo, desenvolvimento, servidor).

## Erros comuns
- Presumir que o desenvolvedor ou o CMS já cuidam de SEO.
- Auditar só o desktop.
- Pular a análise de backlinks e só olhar o site.

## Notas do Claude
Ferramentas, limites de tamanho de título e nomes das ferramentas de buscador são de 2014; confira as versões atuais. A velocidade e o suporte a celular têm hoje peso maior que o descrito.

## Conexões
- [[arquitetura-de-site-amigavel-a-buscadores]] — a auditoria checa links internos, profundidade, subdomínios e demais pontos de estrutura que esta nota explica
- [[canibalizacao-de-palavras-chave]] — a auditoria verifica se mais de uma página mira o mesmo termo
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — erros de rastreamento, mapa do site e robots.txt são itens que a auditoria confere
- [[o-que-os-buscadores-leem-em-uma-pagina]] — títulos, metadescrições e alt checados na auditoria são o que o robô lê na página
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — a auditoria inclui a checagem dos problemas de CMS, URL e servidor listados nesta nota
- [[registrar-linha-de-base-e-historico-de-mudancas-de-seo]] — o histórico de mudanças e a linha de base acompanham a auditoria
- [[pesquisar-com-operadores-avancados-de-busca]] — operadores como site: e inurl: servem a checagens de indexação e de duplicidade na auditoria
- [[metadados-do-documento-html]] — a auditoria revisa títulos, meta descrição e metatags robots
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[regra-ganhe-links-nao-os-compre-troque-nem-fabrique]] — a análise de backlinks da auditoria procura os padrões de link que a regra manda evitar
- [[guia-seo-brasil]] — a auditoria rápida de 30 itens (módulo A4) atualiza o roteiro de auditoria do livro
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — a auditoria do livro é a base deste checklist
- [[diagnosticar-queda-de-trafego-organico]] — a auditoria técnica cobre as causas técnicas da queda
- [[auditar-uma-conta-de-google-ads]] — auditoria equivalente para o lado orgânico
