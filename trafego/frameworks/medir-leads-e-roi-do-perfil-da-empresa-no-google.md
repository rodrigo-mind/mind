---
titulo: "Medir leads e ROI do Perfil da Empresa no Google"
tipo: framework
origem: guia
assunto: trafego
guia: estrategia-gbp-seo-local
fontes:
  - "estrategia-gbp-seo-local, módulos F1 a F6"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Medir leads e ROI do Perfil da Empresa no Google

## Passos
1. **UTM em todos os links do perfil** (`utm_source=google`, `utm_medium=organic`, `utm_campaign=gbp`, e `utm_content` por unidade) e eventos do GA4 para clique em WhatsApp, telefone e formulário.
2. **WhatsApp rastreável:** o link `wa.me` não carrega UTM, então usar página de redirecionamento própria que registra a origem, ou mensagem pré-preenchida diferente por origem; etiqueta "Google" no WhatsApp Business.
3. **Ligações e agendamentos:** número rastreado só para o perfil (pesquisar como manter a consistência do NAP), ou contagem nativa; link de agenda com UTM; sem ferramenta, atendente pergunta "como nos conheceu?".
4. **CRM:** todo lead com campo origem; pós-venda dispara pedido de avaliação (LGPD); nova avaliação notifica quem responde; em sistema próprio, tabela de leads com origem, UTM, data, status e valor.
5. **API do Perfil:** pesquisar a documentação atual (exige aprovação de acesso); começar por leitura; escrever só com autorização explícita do usuário; credenciais em `.env`.
6. **Painel mensal:** visibilidade (grade, impressões), ações (ligações, WhatsApp, rotas, site, agendamentos), reputação (nota, novas, % respondidas, tempo) e resultado (leads, vendas).
7. **ROI** = (receita atribuída − custo) ÷ custo, com receita = leads × taxa de fechamento × ticket médio; sem dado, usar estimativa com premissas explícitas.

## Saída esperada
Links prontos, código da página de redirecionamento, eventos GA4 e modelo de relatório de 1 página.

## Erros comuns
Contar clique no WhatsApp como venda; número de rastreamento no lugar do número real.

## Conexões
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — mesma técnica de medição de contato, aplicada a anúncios
- [[calcular-o-roi-do-seo]] — ROI do SEO em geral
- [[regra-acesso-a-conta-de-anuncios-somente-leitura-e-autorizacao-a-cada-acao]] — mesma regra de leitura por padrão para APIs
- [[estrategia-gbp-seo-local]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[rodar-campanhas-de-whatsapp-e-de-negocio-local-na-meta]] — origem e conversão de leads do Perfil
- [[montar-o-plano-de-mensuracao-e-triangular-a-atribuicao]] — padrão de UTM e eventos do Perfil
- [[medir-redes-sociais-integrar-ao-pago-e-gerir-como-agencia]] — mesmo modelo de origem, UTM e ROI
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
