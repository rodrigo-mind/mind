---
titulo: "Montar CRM, e-mail, WhatsApp e automações de retenção"
tipo: framework
origem: guia
assunto: trafego
guia: guia-marketing-digital-brasil
fontes:
  - "guia-marketing-digital-brasil, módulos G1 a G6"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Montar CRM, e-mail, WhatsApp e automações de retenção

## Passos
1. **CRM e funil:** estágios lead, contato, qualificado, proposta e venda ou perda (com motivo); campos de origem, UTM, ID de clique (`gclid`, `fbclid`), produto, valor, responsável e datas; SLA para o primeiro contato; devolver leads qualificados e vendas ao Google e à Meta; em sistema próprio, tabelas `clientes`, `leads`, `oportunidades` e `interacoes`.
2. **E-mail:** pesquisar as exigências atuais de Gmail, Yahoo e Microsoft para remetentes em massa (SPF, DKIM e DMARC alinhados, descadastro com um clique, taxa de spam abaixo de 0,3% segundo o Gmail); base só com opt-in (double opt-in quando possível), limpeza periódica, nunca lista comprada; subdomínio de marketing se fizer sentido; automações de boas-vindas, carrinho ou Pix não pago, pós-compra, avaliação, recompra, reativação e aniversário; métricas de entregabilidade, cliques, conversão, receita, descadastros e spam (a taxa de abertura ficou pouco confiável).
3. **WhatsApp:** opt-in, frequência baixa e relevante, opção de sair, segmentação, atendimento rápido e etiquetas de origem; detalhes em [[rodar-campanhas-de-whatsapp-e-de-negocio-local-na-meta]].
4. **Automação:** mapear captação, nutrição, venda, pós-venda, recompra e reativação; gatilhos por comportamento, tempo e CRM; começar com 3 a 5 automações de maior impacto.
5. **Fidelização e indicação:** segmentação RFM, ações por segmento (VIP, recorrentes, em risco, inativos), programa de fidelidade com custo na margem, recorrência (Pix Automático ou cartão) quando couber, e programa "indique e ganhe" com cupom ou link único medido (sorteio exige verificação jurídica).

## Saída esperada
Desenho do funil e dos campos, checklist de entregabilidade com registros DNS, mapa de automações com textos e regras de disparo, e análise RFM.

## Erros comuns
Lead sem origem gravada; e-mail sem autenticação de domínio; disparo de WhatsApp sem opt-in.

## Conexões
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — conversões offline vêm do CRM
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — retorno de estágios do CRM à Meta
- [[regra-trate-dados-pessoais-e-ia-com-governanca-no-marketing]] — consentimento e uso de dados
- [[guia-marketing-digital-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
