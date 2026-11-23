---
titulo: "Recuperar um site de Panda, Penguin ou penalidade manual"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 9, p. 431-433"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 9, p. 441-460"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Recuperar um site de Panda, Penguin ou penalidade manual

## Para que serve
Descobrir por que o tráfego orgânico caiu e seguir o caminho certo de recuperação, conforme a causa (ver panda-penguin-e-penalidades-do-google).

## Quando usar e quando não usar
Diante de uma queda grande de tráfego orgânico. O livro avisa que, sem mensagem de penalidade e sem coincidência com uma atualização conhecida, a recuperação é bem mais difícil e o melhor é voltar às boas práticas ou chamar um especialista.

## O que perguntar ao usuário antes
- Data exata da queda, e se é só tráfego do Google
- Se há mensagem de ação manual nas ferramentas do buscador
- Histórico de campanhas de links, guest posts e conteúdo em massa
- Acesso aos dados de links de várias fontes

## Passos
1. **Confirme que a queda é de busca orgânica**, isolando o tráfego do Google nas análises.
2. **Verifique mensagem de ação manual** nas ferramentas do buscador. Se houver, você sabe o tipo.
3. **Compare a data da queda com o histórico de atualizações** (há ferramentas que sobrepõem as atualizações aos dados de tráfego). Datas de lançamento do Penguin apontam para um problema de links; do Panda, para qualidade de conteúdo.
4. **Se for Panda (qualidade de conteúdo):**
   - Avalie o site de forma crítica, de preferência com um olhar externo; pode ser preciso repensar o modelo de negócio. Não se prenda a concorrentes que parecem piores e não foram atingidos.
   - Para as páginas fracas: melhore o conteúdo; ou noindex; ou apague e redirecione com 301 (só se houver página equivalente); ou apague devolvendo status 410; ou use a ferramenta de remoção de URLs com cuidado.
   - Seja rigoroso: o livro diz que quem acha que já fez o suficiente quase sempre não fez. Espere vários meses, porque o buscador precisa rastrear de novo.
   - Exemplo do livro: um site de informação sobre carreiras reescreveu cerca de 140 páginas, pôs noindex em cerca de 60 e se recuperou com recordes de tráfego.
5. **Se for Penguin (links):** como o recálculo é raro, seja agressivo e limpe todos os problemas de uma vez. Não envie pedido de reconsideração (não adianta e nem é possível sem penalidade manual); espere a próxima atualização.
6. **Se for penalidade manual:**
   - **De links (parcial ou do site):** reúna os links de várias fontes (as ferramentas do buscador mostram uma amostra incompleta; complemente com ferramentas de terceiros e elimine duplicados); classifique-os; avalie cada um com o teste do livro (você o quereria se o buscador não existisse? o mostraria com orgulho a um cliente prestes a comprar? foi um endosso genuíno? se precisar justificar, é ruim); peça a remoção (sem pedir a quem usa nofollow); rejeite domínios inteiros com a ferramenta de rejeição de links, porque os dados são incompletos; não confie só em ferramentas automáticas de detecção. Links com nofollow, de sites de pouquíssima autoridade ou irrelevantes pouco importam.
   - **De conteúdo fino, cloaking, texto oculto, spam de usuários, links de saída, invasão ou spam:** corrija a origem (remover páginas finas ou isoladas, tirar diferenças entre o que o robô e o visitante veem, moderar conteúdo de usuários, colocar nofollow ou remover links vendidos, atualizar o CMS e reparar a invasão).
7. **Peça reconsideração** (só com penalidade manual): texto curto e objetivo; descreva o problema com números; assuma o que deu errado (inclusive uma agência ruim) sem acusar; diga o que foi feito (quantos links removidos, o que foi rejeitado); declare que seguirá as diretrizes. Enviado pela conta das ferramentas do site penalizado. A resposta costuma vir em uma a três semanas; se for negada, volte à limpeza.
8. **Pense na dependência do Google** e em diversificar o tráfego.

## Saída esperada
Diagnóstico da causa, lista de ações por página ou por link, e, se for o caso, o pedido de reconsideração enviado.

## Erros comuns
- Tentar salvar links duvidosos.
- Enviar vários pedidos de reconsideração sem limpeza suficiente (o Google pode pedir uma pausa).
- Apagar páginas sem redirecionar quando há equivalentes.
- Esquecer que o histórico de mudanças é necessário para o diagnóstico.

## Notas do Claude
Os fluxos descritos (mensagens, ferramentas de rejeição e reconsideração) refletem as ferramentas de 2014; os nomes e telas mudaram, mas a lógica de limpar e documentar o esforço permanece útil.

## Conexões
- [[panda-penguin-e-penalidades-do-google]] — o framework é o caminho de recuperação para as penalidades descritas no conceito
- [[regra-ganhe-links-nao-os-compre-troque-nem-fabrique]] — a limpeza de links ruins segue os critérios da regra
- [[resolver-conteudo-duplicado-e-conteudo-fino]] — corrigir conteúdo fino e duplicado é parte da recuperação do Panda
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[guia-seo-brasil]] — o módulo J trata de diagnóstico de queda, ação manual e recuperação
- [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]] — nota do livro afetada pela decisão 2
- [[diagnosticar-queda-de-trafego-organico]] — procedimento de recuperação do livro, para o caso de ação manual
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias cita esta nota ao registrar a divergência sobre penalidades
