---
titulo: "Migrar domínio, redesenhar ou trocar de servidor sem perder SEO"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 12, p. 595-606"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Migrar domínio, redesenhar ou trocar de servidor sem perder SEO

## Para que serve
Fazer mudanças estruturais (trocar de domínio, CMS, URLs, redesenhar o site ou trocar de servidor) sem confundir os buscadores nem perder links e posições. O Google divide as mudanças em com e sem alteração de URLs.

## Quando usar e quando não usar
Antes de qualquer mudança que altere a estrutura, as URLs ou o servidor. Mudar só o visual, mantendo URLs e estrutura, é mais simples; mudar de hospedagem sem alterar URLs não exige redirecionamentos.

## O que perguntar ao usuário antes
- O que muda: domínio, estrutura de URLs, CMS, conteúdo, servidor
- Quem controla DNS, servidor e arquivos de configuração
- Prazo e tolerância a queda temporária de tráfego

## Passos
1. **Mapeie o conteúdo.** Reúna todas as URLs (de logs, do mapa do site, de um rastreador, das listas de links externos e do índice do Bing) e monte uma planilha com três blocos: páginas que migram (individuais e em lotes com curingas), páginas eliminadas (com o destino mais próximo, ou a página-pai se não houver equivalente) e arquivos baixáveis. O objetivo é preservar autoridade e dar boa experiência a quem chega por URLs antigas.
2. **Implemente 301 para todas as URLs antigas.** Para mudar de domínio, no Apache duas linhas de regra reescrevem todo o site para o novo domínio; no IIS, módulos de reescrita (ver implementar-redirecionamentos-301-sem-perder-autoridade).
3. **Atualize links externos importantes.** Contate os principais domínios que mandam tráfego (cerca de 100) e os que mais linkam (de 200 a 300, filtrando por qualidade), para trocar para as novas URLs.
4. **Atualize os mapas do site** (um por tipo ou seção de conteúdo, para monitorar a indexação) e cadastre ambos os domínios nas ferramentas dos buscadores. Mantenha o mapa de URLs antigas até os buscadores descobrirem os 301.
5. **Para trocar de domínio:** compre o novo cedo, publique algumas páginas e consiga links para ele ser reconhecido; use a ferramenta de mudança de endereço dos buscadores; lance com divulgação intensa para ganhar links e buscas pela marca; considere o risco de perder palavras-chave do domínio antigo e a "juventude" do domínio novo (uma alternativa é migrar para um domínio com histórico limpo, auditando backlinks e penalidades). Uma migração em fases (começando por uma subpasta ou seção) reduz o risco, segundo um responsável do Google citado no livro.
6. **Para trocar de servidor:** reduza o TTL do DNS antes; liste arquivos e configurações especiais (robots.txt, mapa do site, .htaccess, arquivos de analytics) e confira se foram; teste o novo servidor pelo IP antes da virada, editando o arquivo de hosts de uma máquina de teste; cuidado com configurações que transformam 301 em 302 e com conteúdo que depende de software que não existe no novo servidor.
7. **Monitore após o lançamento:** erros 404, 500 e 302 nas ferramentas dos buscadores e nos logs; como os 301 estão sendo tratados; atividade de rastreamento (quando chega perto da do site antigo, a migração está quase completa); tráfego de busca e posições.
8. **Expectativa.** Muitos sites perdem posição por um tempo; o livro estima que uma queda significativa raramente dura mais de 60 a 90 dias. Pesam o tamanho e a complexidade do site, a mudança estrutural, a autoridade e a frequência de rastreamento e a atualização de links externos.

## Saída esperada
Planilha de mapeamento, regras de redirecionamento implantadas e testadas, e um painel de monitoramento por semanas.

## Erros comuns
- Esquecer de remover o noindex ou o bloqueio de robots.txt de um ambiente de testes ao publicar (ver eficiencia-de-rastreamento-e-erros-de-rastreamento).
- Redirecionar tudo para a página inicial.
- Não registrar o novo domínio nas ferramentas dos buscadores antes do lançamento.

## Notas do Claude
O problema inverso, conteúdo escondido sem querer após uma publicação, está resumido em eficiencia-de-rastreamento-e-erros-de-rastreamento. A ferramenta de mudança de endereço citada é de 2014; verifique a atual.

## Conexões
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — o monitoramento de 404 e rastreamento acompanha uma migração, e noindex esquecido é causa de conteúdo escondido
- [[implementar-redirecionamentos-301-sem-perder-autoridade]] — a migração depende de 301 bem mapeados para cada URL antiga
- [[regra-prefira-subpasta-a-subdominio-ou-dominio-separado]] — a escolha de domínio e de estrutura pesa numa migração
- [[registrar-linha-de-base-e-historico-de-mudancas-de-seo]] — a migração precisa de linha de base e de diário de mudanças para avaliar o efeito
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[guia-seo-brasil]] — o módulo B8 atualiza o roteiro de migração e redesign
