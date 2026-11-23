---
titulo: "Acesso à conta de anúncios: leitura por padrão e autorização a cada ação"
tipo: regra
origem: guia
assunto: trafego
guia: guia-google-ads-brasil
fontes:
  - "guia-google-ads-brasil, seção 3.3 e módulos G1 e H1"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Acesso à conta de anúncios: leitura por padrão e autorização a cada ação

## Regra
O Claude Code não acessa conta de anúncios por padrão. Se o usuário conectar (MCP oficial ou API), o acesso começa somente leitura; publicar, pausar, mudar orçamento ou lance, adicionar palavra ou aplicar recomendação exige autorização explícita a cada ação, com teto de orçamento definido pelo usuário e registro em `log-alteracoes.md`. Credenciais ficam em `.env` ou gerenciador de segredos, com permissão mínima, nunca no código.

## Por quê
Gasto e política são do anunciante, e erro numa conta de anúncios custa dinheiro e pode suspendê-la. A empresa deve ser dona da conta (e do Merchant Center, GA4, GTM e Perfil da Empresa), com pelo menos dois administradores com verificação em duas etapas; a agência entra como usuário ou por MCC.

## Quando não vale
Não há exceção para escrita sem autorização; MCPs de terceiros que pedem acesso total pedem avaliação de segurança antes.

## Como verificar
Log de alterações com data, o quê e por quê; tabela de ativos e acessos (atual e recomendado); acessos de ex-funcionários e ex-agências removidos a cada 3 meses.

## Conexões
- [[auditar-uma-conta-de-google-ads]] — a auditoria começa verificando propriedade e acessos
- [[guia-google-ads-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[regra-respeite-direitos-promocoes-menores-e-publicidade-nas-redes]] — mesmo princípio de aprovação humana para publicar ou responder
- [[regra-trate-dados-pessoais-e-ia-com-governanca-no-marketing]] — mesma cautela com conectores e APIs
- [[medir-redes-sociais-integrar-ao-pago-e-gerir-como-agencia]] — regra de acesso a contas, válida também aqui
- [[diagnosticar-e-otimizar-campanhas-da-meta-e-cuidar-da-conta]] — regra de acesso, válida também para a Meta
- [[medir-e-operar-o-seo-no-dia-a-dia-com-o-claude-code]] — mesma cautela de acesso somente leitura
- [[medir-leads-e-roi-do-perfil-da-empresa-no-google]] — mesma regra de leitura por padrão para APIs
- [[proteger-a-conta-e-resolver-problemas-do-perfil-da-empresa]] — mesma lógica de propriedade e acesso mínimo
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
