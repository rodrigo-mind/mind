---
titulo: "Medir ligações e WhatsApp em campanhas"
tipo: framework
origem: guia
assunto: trafego
guia: guia-google-ads-brasil
fontes:
  - "guia-google-ads-brasil, módulo B4 e seção 4.3"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Medir ligações e WhatsApp em campanhas

## Para que serve
No Brasil muita venda sai por telefone e WhatsApp, onde o clique no anúncio não vira conversão sozinho.

## Passos
1. **Ligação:** usar o recurso de ligação (anúncios só para chamada foram descontinuados) com conversão por duração mínima combinada com o usuário (por exemplo, 60 s); no site, medir o clique em `tel:` por tag.
2. **WhatsApp no site:** medir o clique em links `wa.me` ou `api.whatsapp.com` por tag ou GTM; opcionalmente passar por uma página própria que registra origem e GCLID antes de abrir o WhatsApp; mensagem pré-preenchida que identifica a origem.
3. **Venda fechada:** registrar no CRM com o GCLID e importar como conversão offline.
4. **Regra de uso:** clique no WhatsApp é intenção, não venda; só serve como meta principal enquanto não houver lead qualificado ou venda medida.

## Saída esperada
Configuração de ligações, código de rastreamento do WhatsApp e fluxo até a venda.

## Erros comuns
Contar toda ligação como conversão (inclusive de 3 s); perder a origem ao abrir o WhatsApp.

## Conexões
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — o plano geral de conversões em que a medição de contato se encaixa
- [[estrategia-gbp-seo-local]] — o Perfil da Empresa também gera ligações e rotas a medir
- [[guia-google-ads-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[rodar-campanhas-de-whatsapp-e-de-negocio-local-na-meta]] — medição de contato no Google
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — medição de WhatsApp nos anúncios do Google
- [[medir-redes-sociais-integrar-ao-pago-e-gerir-como-agencia]] — medição de WhatsApp com origem
- [[medir-leads-e-roi-do-perfil-da-empresa-no-google]] — mesma técnica de medição de contato, aplicada a anúncios
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
