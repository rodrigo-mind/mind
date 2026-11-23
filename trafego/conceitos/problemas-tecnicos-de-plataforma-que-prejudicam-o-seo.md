---
titulo: "Problemas técnicos de plataforma que prejudicam o SEO"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 4, p. 101-102, 114-115"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 227-229, 250-258"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Problemas técnicos de plataforma que prejudicam o SEO

## Definição
Escolhas de CMS, servidor e hospedagem que, se ignoradas, impedem que o buscador rastreie, indexe ou valorize as páginas. O livro lembra que nem todo fornecedor de CMS nem todo desenvolvedor entende de SEO, então cabe a quem cuida de SEO explicar o tema à equipe técnica cedo.

## Por que importa
**Na plataforma (CMS):**
- **URLs dinâmicas** com parâmetros demais: o buscador consegue rastrear, mas convém manter URLs curtas e descritivas e usar a tag canônica (canonical).
- **ID de sessão ou de usuário na URL**: cada URL parece uma página nova. Evite; se não der, use a tag canônica.
- **Parâmetros supérfluos** na URL.
- **Links ou conteúdo em Flash**: os buscadores muitas vezes não veem. Exponha em HTML. (Tecnologia datada; o princípio é não esconder conteúdo do robô.)
- **Conteúdo atrás de formulários** (login, lista suspensa mal feita): fica oculto aos buscadores.
- **Redirecionamento 302 (temporário) como padrão**: bloqueia a transferência de autoridade (PageRank) para a página nova; mudanças permanentes devem usar 301.
- Plataformas que não permitem título e meta descrição diferentes por página, ou que geram centenas de páginas duplicadas.

**No servidor e na hospedagem:**
- **Tempo esgotado (timeout)**: se a página não responde dentro do limite do robô, pode nem entrar no índice.
- **Respostas lentas**: menos tolerância dos robôs e dos visitantes que fariam links.
- **IP compartilhado** com vizinhos de má reputação ou com IPs bloqueados por spam.
- **Bloqueio de bots** excessivo, que limita o rastreamento.
- **Limites de banda**: se o site viraliza e o host corta o acesso, perdem-se visitas, links e rastreamento.
- **Localização do servidor**: segundo o Google, hoje pouco importa; o que pesa é a velocidade de entrega, especialmente em busca móvel.

**Checklist de CMS (capítulo 6).** O livro lista o que um CMS amigável a SEO precisa permitir: título personalizável por página e por regras de seção; URLs estáticas com palavras-chave, personalizáveis (o "slug") e sem parâmetros de rastreamento ou ID de sessão; meta descrição e meta robots editáveis; marcação HTML livre (cabeçalhos, nofollow), com um H1 por página e o título do artigo como H1; texto âncora interno flexível; categorias aninhadas em vários níveis; controle de paginação; redirecionamentos 301 e canonização automática; trechos únicos nas páginas de arquivo, categoria e etiquetas; migalhas de pão; noindex em páginas de pouco valor; texto introdutório em páginas de categoria; nofollow em links de comentários e antispam; feeds RSS; gerador de mapa do site XML; validação de HTML; cache estático (protege o site quando recebe muito tráfego de uma só vez); alt nas imagens. Para escolher: cheque licença, manutenção e comunidade de plug-ins; os recursos de SEO costumam existir, mas ficam desligados por padrão. Serviços hospedados de terceiros (como fóruns) constroem a autoridade do fornecedor, e não a sua. O livro dedica ainda uma seção a Flash e suas limitações (conteúdo em URLs sem endereço próprio, texto desorganizado, pouca capacidade de receber links), com técnicas de mitigação hoje defasadas.

## Como se relaciona
- Itens de checagem do framework auditar-um-site-existente-para-seo.
- A arquitetura de links está em arquitetura-de-site-amigavel-a-buscadores; os duplicados, em canibalizacao-de-palavras-chave.
- Parte da implementação cabe ao assunto developer (servidor, redirecionamentos, URLs).

## Notas do Claude
Dados de 2014: Flash e Webmaster Tools já foram substituídos; os princípios (conteúdo acessível, URLs limpas, 301 para mudanças permanentes, servidor rápido) continuam válidos.

## Conexões
- [[arquitetura-de-site-amigavel-a-buscadores]] — estrutura e plataforma (CMS, servidor, URLs) são as duas frentes de decisão técnica do SEO
- [[auditar-um-site-existente-para-seo]] — a auditoria inclui a checagem dos problemas de CMS, URL e servidor listados nesta nota
- [[canibalizacao-de-palavras-chave]] — a correção usa 301 e tag canônica, tratados entre os problemas técnicos
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — servidor lento, bloqueio de bots e redirecionamentos errados aparecem como erros de rastreamento
- [[o-que-os-buscadores-leem-em-uma-pagina]] — Flash, formulários e conteúdo por script ficam fora do que o robô consegue ler
- [[links-e-urls-relativas-em-html]] — URLs limpas e links rastreáveis são parte do problema tratado aqui
- [[cookies-http]] — IDs de sessão na URL eram a alternativa a cookies que prejudica o rastreamento
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — falhas técnicas que também afetam a velocidade
