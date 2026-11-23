---
titulo: "Medir e operar o SEO no dia a dia com o Claude Code"
tipo: framework
origem: guia
assunto: trafego
guia: guia-seo-brasil
fontes:
  - "guia-seo-brasil, módulos I1 a I4 e K1 a K5"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Medir e operar o SEO no dia a dia com o Claude Code

## Passos
1. **KPIs:** visibilidade (impressões, posição por grupo, top 3 e top 10, impressões em IA, citações), tráfego (não marca mostra o crescimento real; marca mostra força), negócio (conversões e receita do orgânico, por página de entrada), saúde (indexadas contra enviadas, Core Web Vitals, erros) e buscas pelo nome. Menos cliques com mais conversões pode ser normal na era da IA.
2. **Posições:** 20 a 100 termos por grupo, com localização no Brasil e celular; posição é indicador, não objetivo.
3. **Dashboards:** Looker Studio com Search Console e GA4, com painéis de visão geral, páginas de negócio, conteúdo, técnico e IA, e anotações de atualizações, publicações e migrações.
4. **ROI:** receita ou lucro do orgânico ÷ custo (equipe, conteúdo, ferramentas, desenvolvimento); o horizonte é de meses, então mostrar evolução trimestral.
5. **Rotina:** semanal (15 a 30 min: Search Console, status de atualizações, conteúdo do plano), mensal (relatório, posições, IA, indexação, Core Web Vitals, links, registro) e trimestral (auditoria rápida, estratégia, política de rastreadores, consolidação).
6. **Com desenvolvimento:** toda tarefa técnica como chamado (problema, impacto, URLs de exemplo, solução, critério de aceite, como testar); SEO entra antes de mudanças de layout, CMS, URLs e migrações.
7. **Automações do Claude Code** (com aprovação para produção, credenciais em `.env`, APIs somente leitura): rastreador simples, extração da API do Search Console, PageSpeed em lote, análise de logs, geração de sitemap e JSON-LD a partir do MySQL, validação de redirecionamentos. Registrar na base de conhecimento do projeto o mapa de termos, decisões técnicas, histórico de mudanças e testes.

## Saída esperada
Painel de KPIs, modelo de relatório mensal e cálculo de ROI.

## Erros comuns
Perseguir posição em vez de negócio; automação que escreve em produção sem aprovação.

## Conexões
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — versão do livro dos KPIs acionáveis
- [[calcular-o-roi-do-seo]] — cálculo de ROI do SEO, do livro
- [[regra-acompanhe-o-trafego-e-nao-apenas-a-posicao-no-ranking]] — mesma ideia: posição não é objetivo
- [[registrar-linha-de-base-e-historico-de-mudancas-de-seo]] — a base de conhecimento do projeto guarda a linha de base e o histórico
- [[regra-acesso-a-conta-de-anuncios-somente-leitura-e-autorizacao-a-cada-acao]] — mesma cautela de acesso somente leitura
- [[guia-seo-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
