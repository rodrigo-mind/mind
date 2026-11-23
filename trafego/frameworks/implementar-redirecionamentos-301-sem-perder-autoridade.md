---
titulo: "Implementar redirecionamentos 301 sem perder autoridade"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 243-250"
confianca: media
criado: 2026-11-23
atualizado: 2026-11-23
---

# Implementar redirecionamentos 301 sem perder autoridade

## Para que serve
Mover ou unificar URLs mantendo a autoridade de links acumulada e evitando que o buscador indexe cópias.

## Quando usar e quando não usar
Sempre que uma URL mudar (novo domínio, novo CMS, nova estrutura, remoção de conteúdo), para canonizar "www" com e sem, e para eliminar duplicados. Mudar de hospedagem sem alterar URLs não exige redirecionamento.

## O que perguntar ao usuário antes
- Lista de URLs antigas e novas
- Tipo de servidor (Apache ou IIS) e quem tem acesso à configuração
- Se a página inicial é servida por mais de uma URL (por exemplo, index.php)

## Passos
1. **Use 301 para mudanças permanentes.** O 301 diz ao robô que o recurso mudou para sempre: ele repassa a autoridade (inclusive de links) para o novo endereço e tira o antigo do índice. O 302 (temporário) não repassa a autoridade e pode manter a página antiga no índice. Códigos 303 e 307, ou redirecionamentos que devolvem 404 ou 200, têm comportamento imprevisível; evite.
2. **Escolha o método.** No Apache, regras no arquivo .htaccess (Redirect e RedirectMatch) e reescrita com mod_rewrite; no IIS, o console ou um módulo de reescrita; ou código no próprio aplicativo (PHP, ASP etc.), garantindo que o status devolvido seja 301. O redirecionamento por meta refresh em geral é tratado como 302; só com atraso de 0 segundo parece 301, mas é melhor usar 301 de verdade. Confira os cabeçalhos com uma ferramenta de verificação de cabeçalho HTTP.
3. **Escreva as regras com cuidado.** Os exemplos do livro: reescrever /produtos/123 para um script dinâmico; um redirecionamento de domínio sem "www" para a versão com "www" (com a condição de host e a flag R=301); remover parâmetros de rastreamento ou de sessão; forçar uma barra final; devolver páginas https de catálogo para http. Erros típicos em expressões regulares: usar `.*` onde cabia `.+`, não escapar o ponto, omitir `^` e `$` e usar correspondência gananciosa (preferir `.*?` ou `[^/]+`). Teste e depure com o registro de reescrita do servidor.
4. **Ao migrar URLs dinâmicas para estáticas**, troque os links internos e faça 301 das URLs antigas para as novas; evite laços de redirecionamento acrescentando uma condição que impeça reaplicar a regra.
5. **Corrija a página inicial com mais de uma URL.** Se index.html ou index.php aparecem junto com a raiz, os links se dividem. Um 301 simples de /index.php para / cria laço, porque o servidor carrega index.php como arquivo padrão da raiz. O livro propõe: copiar o conteúdo para outro arquivo (sitehome.php), definir esse arquivo como documento padrão só na raiz (DirectoryIndex), esvaziar o index.php antigo e fazer nele o redirecionamento, e garantir que os links internos usem a URL canônica da raiz.
6. **Reduza redirecionamentos ao longo do tempo** atualizando links internos e navegação.

## Saída esperada
Tabela de URLs antigas e novas, regras de redirecionamento aplicadas e checagem de status 301 em cada uma.

## Erros comuns
- Usar 302 por padrão do CMS ou da biblioteca.
- Redirecionar tudo para a página inicial (o livro recomenda redirecionar para a página mais próxima em tema).
- Criar laços de redirecionamento ao redirecionar a página inicial.
- Reter parâmetros de rastreamento depois do redirecionamento.

## Notas do Claude
`confianca: media`: o capítulo traz muito código de mod_rewrite que resumi pelos princípios, e não por sintaxe; consulte a documentação atual do servidor antes de aplicar. Os exemplos do livro usam Apache e IIS de 2014.

## Conexões
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — o 301 é a alternativa mais forte à canonical para unificar URLs
- [[migrar-dominio-redesenhar-ou-trocar-servidor-sem-perder-seo]] — a migração depende de 301 bem mapeados para cada URL antiga
- [[resolver-conteudo-duplicado-e-conteudo-fino]] — eliminar a duplicidade na origem usa 301 das URLs repetidas
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — regras de redirecionamento usadas em consolidações e migrações
- [[planejar-seo-de-e-commerce-no-brasil]] — produto descontinuado exige redirecionamento correto
