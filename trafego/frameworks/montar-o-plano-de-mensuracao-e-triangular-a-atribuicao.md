---
titulo: "Montar o plano de mensuração e triangular a atribuição"
tipo: framework
origem: guia
assunto: trafego
guia: guia-marketing-digital-brasil
fontes:
  - "guia-marketing-digital-brasil, seção 5 e módulos H1, H3 e H4"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Montar o plano de mensuração e triangular a atribuição

## Passos
1. **Objetivos, KPIs e eventos** por etapa do funil, com GA4, Tag Manager, Search Console, pixels e APIs de conversão, CRM e plataforma de loja. Eventos principais: lead, clique no WhatsApp, ligação, início de checkout, compra com valor e cadastro.
2. **Padrão de UTMs** em minúsculas, sem acento, com dicionário fixo: `utm_source` (google, meta, instagram, tiktok, email, whatsapp, gbp, parceiro), `utm_medium` (cpc, paid-social, social, email, referral, organic-local), `utm_campaign` no formato ano-mês, objetivo e tema, e `utm_content` pela peça. WhatsApp com página de redirecionamento ou mensagem por origem; offline com cupom, QR com UTM e "como nos conheceu?". Documentar em `plano-de-mensuracao.md`.
3. **Triangulação:** comparar relatórios das plataformas (autodeclarados), GA4, CRM com vendas reais (fonte de verdade) e testes de incrementalidade (lift, geo, pausa controlada); acompanhar o MER (receita total ÷ investimento total em marketing, com impostos); para orçamentos grandes, avaliar modelos de mix de mídia; explicar as diferenças sem escolher o número mais bonito.
4. **Painéis:** executivo de 1 página (receita, novos clientes, CAC, MER, LTV, leads qualificados, conversão, reputação), painéis por canal e relatório mensal (o que aconteceu, por quê, o que aprendemos, o que faremos, riscos).

## Saída esperada
Plano de mensuração, dicionário de UTMs, nota metodológica, painel com as quatro visões e modelo de relatório.

## Erros comuns
Confiar numa fonte só; UTM sem padrão; ignorar vendas reais.

## Conexões
- [[medir-leads-e-roi-do-perfil-da-empresa-no-google]] — padrão de UTM e eventos do Perfil
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — KPIs do lado orgânico
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — atribuição no Google
- [[diagnosticar-o-negocio-e-calcular-unit-economics]] — CAC e LTV alimentam o painel executivo
- [[guia-marketing-digital-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
