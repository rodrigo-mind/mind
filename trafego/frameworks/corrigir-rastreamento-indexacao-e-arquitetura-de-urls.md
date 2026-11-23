---
titulo: "Corrigir rastreamento, indexação e arquitetura de URLs"
tipo: framework
origem: guia
assunto: trafego
guia: guia-seo-brasil
fontes:
  - "guia-seo-brasil, módulos A4, B1, B2 e B7"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Corrigir rastreamento, indexação e arquitetura de URLs

## Para que serve
Garantir que as páginas importantes sejam rastreadas, indexadas e linkadas. Sem rastreamento e indexação não há ranking nem citação em IA.

## Passos
1. **robots.txt:** bloquear só o que não deve ser rastreado (admin, carrinho, buscas internas infinitas); nunca CSS e JS necessários.
2. **Sitemap:** só URLs canônicas, indexáveis, com status 200 e `lastmod` real.
3. **Canonical** consistente com links internos e sitemap; **noindex** para páginas sem valor de busca (obrigado, login, filtros sem demanda). Não usar noindex junto com bloqueio no robots, porque o Google não vê o noindex.
4. **Relatório de indexação:** "Rastreada, mas não indexada" e "Descoberta, mas não indexada" apontam qualidade, duplicidade, autoridade ou links internos; "Soft 404" aponta página vazia ou fraca.
5. **JavaScript:** conteúdo e links importantes no HTML renderizado, testados na Inspeção de URL. Em sites grandes, controlar parâmetros e filtros e analisar logs do servidor.
6. **Arquitetura:** hierarquia lógica (páginas importantes a no máximo 3 ou 4 cliques da home, opinião consolidada), URLs curtas, em minúsculas, com hífen, sem acento e sem ç, breadcrumbs, mais links internos para as páginas de negócio e correção de páginas órfãs.
7. **Segurança básica:** HTTPS em tudo, CMS e plugins atualizados, 2FA, backups, e monitoramento de páginas estranhas indexadas (cassino, remédios).
8. **Checklist rápido de 30 itens** (indexação, técnico e experiência, conteúdo, autoridade, mensuração e segurança) para a auditoria inicial.

## Saída esperada
Lista de correções, arquivos prontos (robots.txt, sitemap) e regras de canonical e noindex.

## Erros comuns
Bloquear CSS e JS; sitemap com URL redirecionada; noindex em página bloqueada no robots.

## Conexões
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — explica o funcionamento de cada controle usado aqui
- [[arquitetura-de-site-amigavel-a-buscadores]] — princípios de arquitetura, do livro
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — orçamento de rastreamento e erros
- [[auditar-um-site-existente-para-seo]] — a auditoria do livro é a base deste checklist
- [[implementar-redirecionamentos-301-sem-perder-autoridade]] — regras de redirecionamento usadas em consolidações e migrações
- [[guia-seo-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
