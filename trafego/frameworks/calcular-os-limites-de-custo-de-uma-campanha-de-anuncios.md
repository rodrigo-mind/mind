---
titulo: "Calcular os limites de custo de uma campanha de anúncios"
tipo: framework
origem: guia
assunto: trafego
guia: guia-google-ads-brasil
fontes:
  - "guia-google-ads-brasil, módulo A1 e seção 4.1"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Calcular os limites de custo de uma campanha de anúncios

## Para que serve
Saber quanto se pode pagar por clique, lead e venda antes de abrir a conta. Vale também para anúncios da Meta.

## O que perguntar ao usuário antes
Preço, custo do produto, impostos da venda, taxas (cartão, frete, marketplace), taxa de conversão da página, taxa de fechamento dos leads e recompra (LTV de 6 a 12 meses).

## Passos
1. **Margem de contribuição** por venda = preço − custo − impostos da venda − taxas.
2. **CPA máximo** = margem de contribuição ÷ fator de impostos da plataforma (Google: confirmar se ainda é 1,00; Meta: 1,1383).
3. **ROAS de equilíbrio** = fator de impostos ÷ margem percentual. Exemplo do guia: margem 30% e fator 1,00 dão ROAS mínimo 3,33.
4. **Lead:** custo máximo por lead = CPA máximo × taxa de fechamento.
5. **CPC máximo viável** ≈ CPA máximo × taxa de conversão esperada da página.
6. Com recompra, calcule também com o LTV e diga qual meta usar.
7. Compare com os CPCs estimados da pesquisa: se o CPA fica inviável, ajuste a oferta, mire cauda longa ou local, ou troque de canal.

## Saída esperada
Tabela com ticket, margem, CPA máximo, ROAS de equilíbrio, CPC máximo viável e custo máximo por lead.

## Erros comuns
Esquecer impostos e taxas, comparar Google e Meta sem o custo real, usar desejo em vez de número como meta.

## Conexões
- [[calcular-o-roi-do-seo]] — o mesmo raciocínio de custo e retorno aplicado ao SEO
- [[guia-trafego-pago-meta-brasil]] — o guia da Meta usa o mesmo cálculo, com o fator de impostos próprio
- [[guia-google-ads-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[como-a-meta-entrega-anuncios-e-aplicar-o-fator-de-impostos]] — o cálculo de limites usa o fator de impostos
- [[diagnosticar-o-negocio-e-calcular-unit-economics]] — limites de CPA e ROAS derivam da margem calculada aqui
- [[definir-lances-orcamento-e-segmentacao-no-google-ads]] — os limites de custo dão o CPA e o ROAS alvo
- [[auditar-uma-conta-de-google-ads]] — o CPA máximo é a régua do resultado da auditoria
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
