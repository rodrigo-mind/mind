---
titulo: "Resolver conteúdo duplicado e conteúdo fino"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 219-226"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 12, p. 612-616"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Resolver conteúdo duplicado e conteúdo fino

## Para que serve
Diagnosticar e corrigir páginas que repetem conteúdo ou têm pouco valor próprio, para que o buscador indexe a versão certa e a autoridade de links não seja desperdiçada.

## Quando usar e quando não usar
Em auditorias e sempre que o CMS puder expor o mesmo texto em mais de uma URL. Na maioria dos casos o buscador apenas filtra as cópias (filtro de duplicados); penalidade real é rara e costuma atingir sites que agregam conteúdo sem acrescentar nada.

## O que perguntar ao usuário antes
- Que páginas parecem repetidas (versões de impressão, ordenações, https, arquivos de blog, páginas de cidade)
- Se há conteúdo licenciado ou sindicalizado, ou um modelo de afiliados
- Quem pode alterar o CMS, o servidor e o robots.txt

## Passos
1. **Classifique o problema.** Duplicado exato (duas URLs, mesmo conteúdo), quase duplicado (pequenas diferenças) e duplicado entre domínios. Distinga de *thin content* (pouco texto próprio, como 5 mil páginas de localização só com endereço) e de *thin slicing* (páginas separadas por diferenças mínimas, como uma página por tamanho de sapato). Os dois últimos podem acionar o algoritmo Panda.
2. **Meça o conteúdo mínimo útil.** O livro cita como referência, sem lista oficial, cerca de 30 a 50 palavras únicas em frases legíveis (mais é melhor), texto diferente do resto do site em mais que trocar verbos e substantivos (o caso de trocar só cidade e estado), títulos e meta descrições únicos (se não der, omita as descrições) e mídia própria quando for o caso.
3. **Entenda as consequências.** O robô tem um orçamento de rastreamento (crawl budget) e gasta parte nas cópias; os links para cópias desperdiçam autoridade; e o buscador pode escolher a versão que você não quer (por exemplo, a de impressão).
4. **Elimine na origem, se possível.** Faça com que cada conteúdo tenha uma só URL e redirecione as antigas com 301 (ver implementar-redirecionamentos-301-sem-perder-autoridade).
5. **Se não der, escolha a ferramenta:** tag canônica (melhor alternativa à eliminação), meta robots noindex ou bloqueio por robots.txt (ver controlar-o-robo-de-busca-robots-txt-metatags-e-canonical). Não combine bloqueio por robots.txt com noindex na mesma página, porque o robô não lê a página bloqueada e não verá o noindex.
6. **Trate os cenários comuns:**
   - **https:** duplicata quando links relativos fazem as páginas seguras se referirem a si mesmas; use canônica, 301 ou links absolutos.
   - **CMS que cria URLs extras:** elimine ou faça 301.
   - **Versões de impressão e ordenações:** canônica, noindex, robots.txt ou folha de estilo para impressão.
   - **Blogs e arquivos:** mostre só trechos nas páginas de arquivo e de categoria.
   - **Conteúdo de usuários:** políticas de conteúdo único e campos que forcem texto diferente.
   - **Conteúdo licenciado:** noindex com follow, ou obtenha exclusividade.
   - **Sindicalização:** peça ao parceiro canônica para sua página, noindex na cópia dele, ou um link de volta; se o parceiro tem mais autoridade, o Google pode atribuí-lo a ele.
   - **Afiliados:** trazer só a descrição do fabricante é o caso mais julgado; é preciso acrescentar valor real.
   - **Páginas de busca interna:** evite parecer "resultados de busca" (título "resultados", URL com ?q=, "resultados 1 a 10"); o Google não quer resultados de busca dentro de seus resultados.
   - **Limites de duplicidade e roubo de conteúdo (capítulo 12):** o buscador em geral só filtra os duplicados, e um responsável do Google disse em 2013 que cerca de 25% a 30% do conteúdo da web é duplicado e que não vale preocupar-se, salvo duplicação abusiva e maliciosa. Exceções ligadas ao Panda: violação de direitos autorais (cópias por raspagem), sites de afiliados finos e duplicação massiva (a experiência dos autores indica penalidade provável quando cerca de 70% ou mais das páginas são cópias). Para conteúdo roubado: peça a remoção, avise a hospedagem, o registrador e o buscador com notificação de direitos autorais (DMCA no caso dos EUA: contatos, descrição do conteúdo, declaração de boa-fé e sob pena de perjúrio e assinatura), ou use medidas jurídicas; registre a autoria com cópias arquivadas do site. Cuidado: concorrentes também usam esse instrumento de forma abusiva; sites com conteúdo de usuários devem ter política de reclamação.
7. **Monitore cópias do seu texto** (por exemplo, com um serviço de verificação de plágio) e, em caso de cópia por site mais forte, peça a remoção ao site, ao provedor de hospedagem, ou use pedidos de remoção por direito autoral e, em último caso, medidas legais.
8. **Verifique o tema do site.** Conteúdo fora do tema do site ou da seção (um artigo de pizza num site de ferraduras) tem dificuldade de ranquear e pode enfraquecer o tema do resto.

## Saída esperada
Lista de URLs duplicadas ou finas, causa de cada uma, e a ação (eliminar, 301, canônica, noindex, enriquecer o texto).

## Erros comuns
- Achar que a razão código/texto ou a navegação repetida geram duplicidade: o livro diz que os buscadores descartam os elementos comuns antes de comparar (mas essas páginas podem ser consideradas conteúdo fino).
- Reutilizar a mesma página para várias cidades trocando só o nome.
- Confiar que o buscador vai escolher a versão certa.

## Notas do Claude
Os textos de política do Google sobre afiliados, páginas de busca e Panda são de 2014; confira as diretrizes atuais.

## Conexões
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — a canonical e o noindex são as ferramentas para tratar duplicados que não dá para eliminar
- [[implementar-redirecionamentos-301-sem-perder-autoridade]] — eliminar a duplicidade na origem usa 301 das URLs repetidas
- [[panda-penguin-e-penalidades-do-google]] — conteúdo fino e duplicado é causa de Panda
- [[segmentar-um-site-por-pais-e-idioma]] — versões por país com texto parecido geram duplicidade, o que o hreflang ajuda a evitar
- [[publicar-conteudo-em-sites-de-terceiros]] — a sindicação cria cópias que se resolvem com canonical, noindex ou link
- [[recuperar-um-site-de-panda-penguin-ou-penalidade-manual]] — corrigir conteúdo fino e duplicado é parte da recuperação do Panda
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[regra-nao-gere-paginas-em-massa-sem-valor-real]] — conteúdo fino e duplicado, mesmo problema visto no livro
- [[planejar-seo-de-e-commerce-no-brasil]] — filtros e variações geram duplicidade
- [[planejar-o-conteudo-de-seo-para-o-publico-brasileiro]] — base para consolidar páginas fracas
