---
titulo: "Planejar as conversões de uma conta de Google Ads"
tipo: framework
origem: guia
assunto: trafego
guia: guia-google-ads-brasil
fontes:
  - "guia-google-ads-brasil, módulos B1, B2, B3, B5 e B6"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Planejar as conversões de uma conta de Google Ads

## Para que serve
Fazer o lance inteligente aprender com o que importa. O guia manda medir **antes** de otimizar: o algoritmo otimiza para o que se mede, e medir errado ensina errado.

## O que perguntar ao usuário antes
Tipo de negócio (e-commerce ou leads), se há CRM, se o site usa banner de cookies, se o site é próprio (PHP) ou plataforma.

## Passos
1. **Tag do Google** em todas as páginas (direta ou via GTM) com vinculador de conversões; teste com uma conversão real e confira em Metas > Conversões.
2. **Principais (entram no lance)** só o que tem valor: compra (com valor, moeda BRL e ID da transação), formulário enviado, clique em WhatsApp ou ligação, lead qualificado. **Secundárias (só observação):** ver preço, adicionar ao carrinho, rolar a página.
3. **Evitar duplicidade:** não contar a mesma compra por tag e por GA4 importado como principais.
4. **Conversões otimizadas:** ativar (dados do cliente com hash: e-mail, telefone com +55, nome) e conferir a taxa de correspondência depois de alguns dias.
5. **Consentimento:** se há banner, implementar o modo de consentimento direito (mal configurado pode zerar a medição sem aviso); se não há, registrar a decisão jurídica.
6. **Offline e CRM:** capturar GCLID e dados do lead, gravar no CRM com estágios (lead, qualificado, venda com valor) e enviar de volta pelo Data Manager (desde 15/06/2026 é o caminho para novas integrações, `[OFICIAL]` segundo o guia). Quando houver volume, trocar a meta principal para lead qualificado ou venda.
7. **Valor:** usar receita ou margem em vez de contagem; para leads, valor estimado = ticket × taxa de fechamento. Para novos clientes, usar a meta de aquisição com a lista de clientes atuais.
8. **Atribuição:** vincular Google Ads e GA4, usar atribuição por dados se houver volume, comparar Google Ads, GA4 e CRM, e tratar vendas reais como fonte de verdade. Acompanhar o MER (receita total ÷ mídia total, com impostos).
9. **Exclusões de dados** quando o rastreamento quebrar por um período.

## Saída esperada
Plano Ação, Principal ou Secundária, Valor, Origem, Status, mais o código de evento (em site PHP, com valor dinâmico, ID da transação e `dataLayer`).

## Erros comuns
Microconversões como principais; GCLID perdido no formulário; clique no WhatsApp tratado como venda.

## Conexões
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — a medição de ligação e WhatsApp alimenta o plano de conversões
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — métricas acionáveis, versão do SEO
- [[metricas-acionaveis-e-de-vaidade]] — a conversão principal deve ser métrica acionável, e não de vaidade
- [[guia-google-ads-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[montar-o-plano-de-mensuracao-e-triangular-a-atribuicao]] — atribuição no Google
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — mesma lógica de dados de conversão no Google
- [[montar-crm-e-mail-whatsapp-e-automacoes-de-retencao]] — conversões offline vêm do CRM
- [[auditar-uma-conta-de-google-ads]] — a auditoria de conversões segue o plano de conversões
- [[escolher-o-tipo-de-campanha-e-estruturar-uma-conta-de-google-ads]] — sem conversões bem medidas a estrutura não aprende
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
