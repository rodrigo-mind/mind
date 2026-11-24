---
titulo: "Configurar Pixel, API de Conversões e eventos de WhatsApp na Meta"
tipo: framework
origem: guia
assunto: trafego
guia: guia-trafego-pago-meta-brasil
fontes:
  - "guia-trafego-pago-meta-brasil, módulos B1 a B4"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Configurar Pixel, API de Conversões e eventos de WhatsApp na Meta

## Para que serve
Dar à Meta dados de conversão de qualidade antes de escalar; sem eles ela otimiza para quem clica, não para quem compra.

## Passos
1. **Pixel e API de Conversões** (navegador e servidor) com desduplicação (mesmo `event_name` e `event_id`). Eventos mínimos: e-commerce com PageView, ViewContent, AddToCart, InitiateCheckout e Purchase (com valor e BRL); leads com Lead e Contact. Dados do cliente com hash (e-mail, telefone com 55 e DDD, nome, cidade, CEP, `fbp`, `fbc`). Verificar o domínio, conferir no Gerenciador de Eventos a qualidade de correspondência (EMQ), atraso e duplicados, respeitar o consentimento. Em site PHP, gerar o envio server-side com `event_id` compartilhado e o token em `.env`.
2. **WhatsApp:** com o app comum não há envio de eventos (medir por etiquetas e planilha e otimizar por conversas). Com a API (parceiro ou Cloud API) enviar eventos das conversas: os nomes aceitos diferem dos do Pixel (integradores relatam `LeadSubmitted`, `QualifiedLead` e `Purchase` com `action_source = business_messaging`); confirmar na documentação oficial. Depois, testar otimização por lead qualificado ou compra.
3. **Leads e CRM:** origem gravada em todo lead (UTM ou ID do clique), estágios novo, contatado, qualificado e venda com valor, devolvidos à Meta; em sistema próprio, tabela `leads` com origem, UTMs, `fbclid`, data, status e valor.
4. **Atribuição:** em 2026 a Meta removeu as janelas de 7 e 28 dias de visualização da API de Insights (ferramentas passaram a receber zero, sem erro) e a atribuição por clique passou a exigir clique no link; registrar a janela e o modelo em cada relatório, tratar vendas reais como fonte de verdade e comparar Meta, GA4 e CRM.

## Saída esperada
Plano de eventos, código server-side quando aplicável, checklist de verificação e nota "como ler os números da conta".

## Erros comuns
Evento duplicado; conector de relatório com janela descontinuada; otimizar por conversa e atrair curiosos.

## Conexões
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — mesma lógica de dados de conversão no Google
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — medição de WhatsApp nos anúncios do Google
- [[guia-trafego-pago-meta-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[montar-crm-e-mail-whatsapp-e-automacoes-de-retencao]] — retorno de estágios do CRM à Meta
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
- [[head-site-veiculos-TEMPLATE-1]] — o script de consentimento do head só carrega pixel e tags depois do aceite, como esta configuração exige
