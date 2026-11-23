---
titulo: "Diagnosticar erros de ambiente PHP (404, 500, código-fonte na tela, extensão faltando)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, caps. 1 a 3 (PDF p. 49-140), principalmente o cap. 3, seção 3.1"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Diagnosticar erros de ambiente PHP

## Para que serve

Achar a causa quando o PHP nem chega a rodar o código, em geral logo depois de instalar, mudar de servidor ou trocar a versão do PHP.

## Quando usar e quando não usar

- **Use** quando a página não abre, aparece em branco, mostra o código PHP ou dá erro 500 logo de cara.
- Para erros na lógica do programa, use depurar PHP com var_dump e Xdebug.

## O que perguntar ao usuário antes

- O que aparece exatamente: a mensagem do navegador, o código HTTP, a tela em branco?
- O que mudou desde a última vez que funcionou: o servidor, a versão do PHP, o `php.ini`, os arquivos enviados?

## Passos

1. **Veja a resposta HTTP real:** abra as ferramentas do navegador (F12), aba de rede, e confira o código e o conteúdo da resposta. O livro avisa que os navegadores, principalmente o Chrome, escondem detalhes com mensagens "amigáveis".
2. **404:** o arquivo não foi encontrado. Confira o endereço e as maiúsculas e minúsculas no nome do arquivo: no Linux, `Contato.php` e `contato.php` são arquivos diferentes. Confira também se o arquivo está na pasta certa do servidor.
3. **Servidor não encontrado ou conexão recusada:** veja se o servidor está rodando, se há roteador, firewall ou antivírus bloqueando e se um proxy configurado no sistema ou no navegador está atrapalhando o acesso local.
4. **O navegador mostra o código PHP:** o servidor não está passando o arquivo para o PHP. Confira a extensão `.php` e a configuração do servidor. Olhe o código-fonte da página: se o `<?php` aparece, o código não foi executado.
5. **Erro 500 ou tela em branco:** olhe o log de erros do servidor. Em desenvolvimento, ligue `display_errors = On`; em produção, deixe desligado, ligue `log_errors = On` e leia o log com frequência.
6. **Extensão não carrega:** em `phpinfo()`, veja se a extensão aparece. Se não aparece, confira se ela existe na pasta de extensões, se está ativada no `php.ini` (sem `;` no começo da linha), se o caminho das extensões está certo, se ela tem dependências e se é da mesma versão do PHP.
7. **`php.ini` errado:** `phpinfo()` mostra qual `php.ini` foi carregado. O PHP vem com dois modelos, `php.ini-development` e `php.ini-production`, e um deles deve ser renomeado para `php.ini`.
8. **Sem solução:** use o manual oficial (php.net/manual) e as fontes de ajuda em php.net/support.php.

## Saída esperada

A causa identificada (endereço, servidor, configuração ou extensão) e o ajuste feito, antes de mexer no código.

## Erros comuns

- Ligar `display_errors` em produção para depurar e esquecer de desligar (ver a regra não exiba erros na tela em produção).
- Mexer num `php.ini` que não é o carregado.
- Atualizar o PHP sem ler as mudanças da versão nova. O livro recomenda ler sempre as mudanças a cada troca de versão.

## Exemplo mínimo (inventado pelo Claude, não do livro)

Um arquivo temporário `info.php` com `<?php phpinfo();`, enviado só para conferir a versão, o `php.ini` carregado e as extensões, e **apagado logo depois**, porque expõe a configuração do servidor.

## Notas do Claude

- Confiança média: os capítulos 1 (história do PHP) e 2 (instalação no Windows, Linux e macOS, Apache e IIS) foram folheados; o 3 foi lido nas seções de erros e de ajuda.
- Na Hostinger, a versão do PHP, as extensões e os limites se ajustam no painel (hPanel), e o log de erros fica no painel ou na pasta do site (inferência minha, a conferir).
- Para desenvolver localmente sem instalar Apache, `php -S localhost:8000` sobe um servidor embutido (conhecimento meu).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[depurar-php-com-var-dump-e-xdebug]] — é o passo seguinte quando o ambiente está certo e o erro é de lógica
- [[opcoes-importantes-do-php-ini]] — os diagnósticos passam por display_errors e log_errors
- [[onde-configurar-o-php]] — descobrir qual php.ini foi carregado é um passo do diagnóstico
- [[regra-nao-exiba-erros-na-tela-em-producao]] — display_errors só deve ficar ligado em desenvolvimento
