---
titulo: Tráfego
tipo: centralizador
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tráfego

Centralizador do assunto **tráfego**: como levar pessoas até a oferta e medir o que acontece depois. Cobre tráfego pago, orgânico, social e direto, e a gestão de redes sociais. É o ponto de entrada para tudo no Mind sobre campanhas, anúncios, canais e medição.

Este assunto muda mais rápido que [[estrategia]]. Plataformas, formatos, regras e preços envelhecem em meses. Por isso, aqui a pesquisa atual pesa tanto quanto os livros (ver "Informações atuais").

## Por que o assunto está no Mind

[[estrategia]] define para quem se fala e o que se promete. Tráfego leva essa promessa até o público e mede o resultado. [[developer]] garante que o rastreamento funcione no site e nos sistemas. Este arquivo une as três pontas, para que uma campanha nasça da estratégia e termine em dados confiáveis.

## Escopo

**Dentro:**
- Tráfego pago: anúncios em buscadores, redes sociais e outras plataformas (estrutura de campanha, públicos, criativos, orçamento, lances, testes)
- Tráfego orgânico: busca (SEO) e conteúdo que atrai sem pagar mídia
- Social: presença e gestão de redes sociais (calendário editorial, formatos, comunidade, atendimento nas redes)
- Tráfego direto e canais próprios: quem chega digitando o endereço ou pela marca, e relacionamento por e-mail e WhatsApp
- Planejamento de campanhas: objetivo, plano de mídia, orçamento e prazo de teste
- Anúncios: estrutura, ângulo e criativo, a partir da mensagem definida em [[estrategia]]
- Medição: o que medir e por quê, atribuição, relatórios e decisão de manter, ajustar ou parar

**Fora:**
- Posicionamento, marca e mensagem de base: ficam em [[estrategia]]
- Implementação técnica do rastreamento (instalar e configurar Tag Manager, pixels, eventos e API de conversões): fica em [[developer]]
- Redação aprofundada de anúncios, páginas e e-mails: assunto de copywriting, quando existir
- Processo de venda e atendimento comercial

## Mapa do assunto

| Área | O que cobre | Base hoje |
|---|---|---|
| Tráfego pago | Plataformas de anúncio, estrutura de campanha, públicos, orçamento, lances, testes | Ainda sem livro. Pesquisa atual |
| Tráfego orgânico | SEO e conteúdo | Ainda sem livro. Pesquisa atual |
| Social e gestão de redes | Calendário editorial, formatos, comunidade, atendimento | Ainda sem livro. Pesquisa atual |
| Tráfego direto e canais próprios | Marca e endereço direto, e-mail, WhatsApp, lista de contatos | Ainda sem livro. Pesquisa atual |
| Campanhas e anúncios | Plano, público, ângulo, criativo, orçamento e teste | Notas de [[estrategia]] (posicionamento, mensagem, marca) e pesquisa atual |
| Medição e otimização | Métricas, atribuição, relatórios, decisão sobre o que manter ou mudar | Métricas e experimentos de [[estrategia]] e pesquisa atual. A parte técnica fica em [[developer]] |

## Conexão com estratégia

Antes de montar qualquer campanha, ler em [[estrategia]]:
- o brief estratégico, se existir;
- o posicionamento (alternativas do cliente, valor e quem mais se importa), que define público e ângulo do anúncio;
- a mensagem e a voz da marca, que viram texto e criativo;
- hipóteses e experimentos, que viram teste de campanha com critério de sucesso.

Se algo disso faltar, o Claude Code avisa e propõe montar essa base antes de gastar verba.

## Conexão com developer

O tráfego define **o que medir e como nomear**. [[developer]] cuida de **instalar e fazer funcionar** nos sites e sistemas (PHP e JavaScript puros, em hospedagem simples). Pontos de ligação:
- Google Tag Manager: contêiner, tags, gatilhos e variáveis
- Pixels das plataformas de anúncio e API de conversões (envio pelo servidor)
- Eventos e conversões: compra, cadastro, clique em WhatsApp
- UTM e padrão de nomes de campanha
- Analytics para visitas e conversões
- Consentimento de cookies e LGPD
- Páginas de destino: velocidade, formulários e links de contato
- Integração com planilhas ou CRM

## Fluxo de partida

Ponto de partida, a ajustar depois dos livros e das pesquisas:

1. **Brief estratégico.** Vem de [[estrategia]].
2. **Objetivo e métrica.** O que a campanha precisa provar, e com que número.
3. **Canal e público.** Onde está o cliente de melhor ajuste e como alcançá-lo.
4. **Mensagem e criativo.** Ângulo e formatos, a partir da mensagem da estratégia.
5. **Rastreamento pronto antes de gastar.** Pedir ao [[developer]] o que for preciso.
6. **Teste pequeno.** Orçamento e prazo definidos, com um critério claro de sucesso.
7. **Medir e decidir.** Manter, ajustar ou parar, com base nos números.
8. **Registrar o aprendizado.** O que funcionou e o que não funcionou, com data.

Entregável de referência: um **plano de campanha** com objetivo e métrica, público, canal, mensagem e criativos, orçamento e prazo do teste, rastreamento necessário, critério de decisão e lacunas conhecidas.

## Informações atuais

- Regras, formatos, limites, políticas, preços e nomes de recursos das plataformas mudam. Sobre eles, o Claude Code pesquisa na internet antes de afirmar, prefere as páginas oficiais de cada plataforma e informa fonte e data.
- A pesquisa vai para `RESPOSTAS`. Só entra na base quando o usuário a promove, como nota curta com fonte, data de verificação e data para revisar (sugestão: 90 dias).
- Dos livros, usar os princípios (público, oferta, teste, medição). Os detalhes de plataforma são conferidos na pesquisa atual.
- Se a pesquisa contradiz um livro ou nota anterior, registrar a divergência com o prefixo `diverge:`, sem trocar um pelo outro em silêncio.
- Nota com data de revisão vencida: avisar o usuário antes de usá-la.

## Como o Claude Code usa este arquivo

- Em pedidos de campanha, anúncio, plano de mídia, redes sociais, SEO, métricas ou rastreamento, ler este arquivo, [[estrategia]], [[developer]] e as notas ligadas a eles antes de responder.
- Dizer de onde vem cada coisa: livro (qual e capítulo), nota atual (fonte e data) ou inferência do Claude.
- Pedir os dados que faltam (verba, público, histórico de resultados, acesso ao analytics). Não inventar números nem prometer resultado.
- Entregas vão para `RESPOSTAS`, como qualquer resposta.
- Para criar um agente especializado em tráfego, seguir a diretriz [[creator-of-minds]] e começar pelas notas ligadas a este arquivo.

## Como este assunto cresce

1. **Livro de tráfego ou anúncios:** coloque em `biblioteca/` e rode `/preparar <livro>`. As notas destiladas ficam nesta pasta.
2. **Pesquisa atual:** o Claude Code pesquisa e grava em `RESPOSTAS`. O que vale guardar é promovido a nota nesta pasta, com fonte, data e prazo de revisão.
3. **Quando houver volume:** separar por canal (pago, orgânico, social, direto) em notas próprias.
4. **Quando houver base:** `/destilar playbook <tema>` junta frameworks e notas em um processo (por exemplo, a primeira campanha).

## Lacunas conhecidas

- Nenhum livro de tráfego ou anúncios na biblioteca ainda
- Nenhuma nota atual sobre as plataformas de anúncio, SEO ou redes sociais
- Rastreamento (Tag Manager, pixel, API de conversões, UTM, consentimento) ainda sem notas em [[developer]]
- Redação de anúncios (copywriting) e funil de vendas: assuntos próprios, ainda sem centralizador

## Conexões

- [[estrategia]] — fornece o brief, o posicionamento e a mensagem de que toda campanha de tráfego parte
- [[developer]] — implementa o rastreamento (Tag Manager, pixels, UTM, consentimento) que o tráfego define
- [[creator-of-minds]] — diretriz que este arquivo manda seguir para criar um agente especializado em tráfego
