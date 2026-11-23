---
titulo: "Montar o feed do Merchant Center para o Brasil"
tipo: framework
origem: guia
assunto: trafego
guia: guia-google-ads-brasil
fontes:
  - "guia-google-ads-brasil, módulo C5"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Montar o feed do Merchant Center para o Brasil

## Para que serve
Alimentar Shopping e PMax de e-commerce com dados que o comprador brasileiro busca e que o Google aprova.

## Passos
1. Pesquisar os requisitos atuais do Merchant Center no Brasil (atributos obrigatórios, parcelamento, frete, impostos, devolução, avaliações).
2. **Títulos** com marca, produto, modelo e atributo (exemplo do guia: "Kit Relação Honda CG 160 Original Vaz"), descrições completas, GTIN, marca e MPN, imagens limpas, preço e disponibilidade sincronizados.
3. Preencher parcelamento, frete, condição e política de devolução; ativar as listagens gratuitas.
4. Zerar reprovações e avisos do diagnóstico.
5. **Rótulos personalizados** por margem, mais vendidos, sazonais e estoque.
6. **Site em PHP próprio:** gerar o feed XML ou CSV a partir do MySQL, com atualização programada (cron).
7. Vincular Merchant Center, Google Ads e GA4.

## Saída esperada
Auditoria do feed, correções e, se aplicável, o script de geração.

## Erros comuns
Preço ou estoque desatualizado no feed; título genérico; reprovações ignoradas.

## Conexões
- [[escolher-o-tipo-de-campanha-e-estruturar-uma-conta-de-google-ads]] — o feed sustenta as campanhas de Shopping e PMax escolhidas aqui
- [[guia-google-ads-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[otimizar-conversao-de-site-loja-virtual-e-marketplaces]] — feed de produtos
- [[planejar-seo-de-e-commerce-no-brasil]] — feed do Google Shopping, usado também pelo SEO
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
