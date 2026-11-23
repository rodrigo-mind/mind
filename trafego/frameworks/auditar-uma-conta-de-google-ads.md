---
titulo: "Auditar uma conta de Google Ads"
tipo: framework
origem: guia
assunto: trafego
guia: guia-google-ads-brasil
fontes:
  - "guia-google-ads-brasil, módulo A2"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Auditar uma conta de Google Ads

## Para que serve
Achar os problemas que custam dinheiro numa conta existente e priorizar a correção.

## O que perguntar ao usuário antes
Exportação (CSV) ou acesso de leitura dos últimos 90 dias (campanhas, grupos, palavras, termos de pesquisa, anúncios, conversões, leilão) e prints de Metas > Conversões, Diagnóstico, Políticas e Faturamento.

## Passos
1. **Propriedade e acessos:** a conta é da empresa? A agência está numa MCC com a empresa como administradora?
2. **Conversões:** quais são principais e quais secundárias, duplicidade (tag e GA4 contando igual), microconversões contaminando o lance, valores, conversões otimizadas e consentimento.
3. **Estrutura:** campanhas fragmentadas, orçamento pulverizado, PMax e Pesquisa competindo sem estratégia de marca.
4. **Configurações:** localização em "Presença", idioma, redes (parceiros de pesquisa e Display marcados sem querer), programação, rotação.
5. **Termos de pesquisa:** parcela do gasto em termos irrelevantes, marcas de terceiros, emprego, "grátis", "como fazer".
6. **AI Max e PMax:** houve migração automática? Expansão de URL ligada? Textos gerados por IA revisados?
7. **Recomendações aplicadas automaticamente** e **políticas** (reprovações, avisos).
8. **Resultado:** custo real contra o CPA máximo.

## Saída esperada
Tabela Problema, Impacto, Correção, Esforço, Risco.

## Erros comuns
Otimizar lance antes de consertar a medição; julgar só pelo painel do Google, sem olhar vendas reais.

## Conexões
- [[calcular-os-limites-de-custo-de-uma-campanha-de-anuncios]] — o CPA máximo é a régua do resultado da auditoria
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — a auditoria de conversões segue o plano de conversões
- [[auditar-um-site-existente-para-seo]] — auditoria equivalente para o lado orgânico
- [[guia-google-ads-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[regra-acesso-a-conta-de-anuncios-somente-leitura-e-autorizacao-a-cada-acao]] — a auditoria começa verificando propriedade e acessos
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
