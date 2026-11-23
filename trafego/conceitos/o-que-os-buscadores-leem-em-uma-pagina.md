---
titulo: "O que os buscadores leem (e não leem) em uma página"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 44-51"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 180-182, 193-197"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# O que os buscadores leem (e não leem) em uma página

## Definição
O robô de busca é um programa que analisa o HTML bruto da página, o mesmo que se vê em "exibir código-fonte", e os cabeçalhos HTTP (códigos de status). O que importa para ele é o texto legível no HTML e alguns elementos específicos. O que só aparece depois que o navegador executa algo, ou que não é texto, pode ficar invisível.

**O que ele lê:**
- **Texto da página**, o conteúdo único.
- **Título da página (title)**: um dos fatores mais importantes de ranqueamento; costuma, mas nem sempre, aparecer como título do resultado.
- **Meta descrição**: não entra diretamente no cálculo de ranking, mas é muito usada como texto do resultado; uma boa descrição pode aumentar cliques, e a taxa de cliques pode influenciar o ranking. Os termos buscados aparecem em negrito no resultado.
- **Atributo alt das imagens**: ajuda a entender a imagem e a página, e também serve a pessoas com deficiência visual.
- **noscript**: texto para quem não executa JavaScript (cerca de 2% dos usuários, segundo a experiência dos autores). Deve representar o conteúdo do script, não outro assunto.

**O que não adianta usar:**
- **Meta keywords**: spammers arruinaram o valor da tag e os buscadores não a usam mais; não vale gastar tempo com ela.

**O que ele não vê (ou vê mal):**
- **Imagens**: reconhece só coisas simples e não lê o texto dentro da imagem de forma geral; depende de alt, nome do arquivo e texto ao redor.
- **Flash**: parte do conteúdo é extraída, mas faltam sinais semânticos (títulos, negrito), e texto convertido em desenho se perde.
- **Áudio e vídeo**: só dados limitados (por exemplo, metadados de MP3 ou notas de podcast).
- **Conteúdo gerado em JavaScript** só depois de ação do usuário (como AJAX): não está no HTML e fica invisível; o Google oferece orientações específicas e frameworks mais novos agravam o problema.
- **Plug-ins** incorporados com embed: podem ou não ser vistos.
- **Frames e iframes** com conteúdo de outro site: o buscador entende que é de outro editor e pode ignorá-lo como conteúdo próprio.

## Por que importa
Determina como escrever e estruturar páginas: o conteúdo que deve ranquear precisa estar como texto no HTML, com título único e relevante, alt nas imagens e meta descrição que convide ao clique.

**Complemento do capítulo 6 (conteúdo indexável e navegação).** Conteúdo importante deve estar em texto HTML; imagens e Flash são rastreados, mas dão poucas pistas de relevância (só nome do arquivo, título e alt). Links em formulários, JavaScript difícil de interpretar, plug-ins e Flash podem não ser seguidos; o livro lembra que o Google passou a renderizar parte do JavaScript e do CSS em 2014 (por isso não bloqueie esses arquivos) e que links em PDF e PowerPoint parecem contar como os do HTML. Sobre AJAX, o conteúdo carregado depois de uma ação não está no HTML; nesses casos, crie uma estrutura paralela de páginas e links que o robô possa seguir e dê ao visitante um link direto para cada estado. O trecho depois do `#` da URL não vai ao servidor e é ignorado; o Google propôs em 2009 um esquema de URLs rastreáveis para AJAX. Para áudio e vídeo, o livro recomenda transcrições em texto. Teste se um trecho está indexado buscando uma frase única entre aspas.

## Como se relaciona
- Base dos itens de checagem de auditar-um-site-existente-para-seo (títulos, metas, alt).
- Parte do processo explicado em rastreamento-indexacao-e-ranqueamento.
- Complementa problemas-tecnicos-de-plataforma-que-prejudicam-o-seo (Flash, formulários, URLs).

## Notas do Claude
Em 2014 o Google já dizia executar mais JavaScript; hoje a capacidade é maior ainda. Não presuma que o que o livro dá como invisível continua invisível: teste com as ferramentas atuais do buscador.

## Conexões
- [[auditar-um-site-existente-para-seo]] — títulos, metadescrições e alt checados na auditoria são o que o robô lê na página
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — Flash, formulários e conteúdo por script ficam fora do que o robô consegue ler
- [[rastreamento-indexacao-e-ranqueamento]] — o que o robô lê é a matéria-prima da indexação
- [[metadados-do-documento-html]] — título e meta descrição são metadados que o buscador lê
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — o atributo alt é a principal pista textual que o buscador tem sobre uma imagem
- [[ajax-e-websockets-com-php]] — conteúdo carregado por AJAX depois de uma ação pode não estar no HTML que o robô lê
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[otimizacao-para-buscas-verticais-imagem-video-produtos-e-noticias]] — imagens e vídeos são lidos por pistas de texto (nome de arquivo, alt, título), base da otimização vertical
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — o framework aplica o que o robô lê (título, meta descrição, alt) na otimização da página
