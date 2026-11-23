---
titulo: "Criar um pacote Composer e versionar com SemVer"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 11 (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Criar um pacote Composer e versionar com SemVer

## Para que serve

Transformar código que se repete entre projetos (validação de CPF, conexão PDO, envio de e-mail) num pacote reutilizável, instalado pelo Composer, com versões que não quebram os projetos que o usam.

## Quando usar e quando não usar

- **Use** quando o mesmo código for usado em vários projetos.
- O livro pede para não publicar no Packagist pacotes inúteis, do tipo "hello world": o Packagist é um sistema real. Um pacote interno pode ficar só no seu repositório Git, sem publicar (inferência minha).

## O que perguntar ao usuário antes

- Qual o nome do fornecedor (vendor) e do pacote?
- Qual licença: livre de verdade, ou exigindo código aberto de quem usar?
- O pacote vai ser público ou só para os seus projetos?

## Passos

1. **Metadados no `composer.json`:**
   - `name` no formato `fornecedor/pacote`, único; por convenção, igual ao usuário e ao repositório no GitHub;
   - `description` curta, que aparece na busca;
   - `keywords`, duas ou três;
   - `license`: MIT para uso livre e sem restrições, GPLv3 para obrigar quem usar a abrir o próprio código.
2. **Carregamento automático:** em `autoload`, ligue a pasta `src/` ao namespace base (por exemplo, `SeuNome\\Pacote\\`). Em `autoload-dev`, ligue `tests/` ao namespace dos testes.
3. **Executáveis (opcional):** declare-os em `bin`. O Composer cria o atalho em `vendor/bin`. Por convenção, o arquivo fica sem `.php`, começa com a linha `#!/usr/bin/env php` e recebe permissão de execução (`chmod +x`, que o Git registra). O caminho do `vendor/autoload.php` muda conforme o pacote está em desenvolvimento ou instalado em outro projeto, e por isso o executável precisa procurá-lo nos dois lugares.
4. **Versões com tags Git:** ao chegar num ponto estável, faça o commit, crie uma tag com a versão (`git tag 1.2.0`) e envie a tag (`git push --tags`). O Packagist lê as tags.
5. **Versionamento semântico (SemVer), `MAIOR.MENOR.CORREÇÃO`:**
   - **MAIOR:** mudanças que quebram quem usa (breaking changes);
   - **MENOR:** novas funções, sem quebrar nada;
   - **CORREÇÃO:** só correções de bugs, segurança e desempenho, sem nada novo e sem quebrar.
6. **Antes de estabilizar:** use `0.y.z`, que pela especificação quer dizer "pode mudar a qualquer hora". Versões em andamento ganham um sufixo (`2.0.0-RC1`).

## Saída esperada

Um repositório com `composer.json` completo, código em `src/`, testes em `tests/` e tags de versão. Os projetos o instalam com `composer require fornecedor/pacote:^1.0`.

## Erros comuns

- Mudar a interface numa versão MENOR ou de CORREÇÃO, o que quebra quem atualizou confiando no SemVer.
- Esquecer a permissão de execução do arquivo em `bin`.
- Publicar no Packagist pacotes de teste e não removê-los.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```json
{
  "name": "fornecedor/validadores-br",
  "description": "Validação de CPF, CNPJ e CEP",
  "license": "MIT",
  "autoload": { "psr-4": { "Fornecedor\\ValidadoresBr\\": "src/" } },
  "require": { "php": ">=8.1" }
}
```

## Notas do Claude

- diverge: o livro chama a configuração de carregamento automático de "PSR-12". O padrão de autoload é o PSR-4; o PSR-12 é um guia de estilo de código (conhecimento meu). O próprio livro usa PSR-4 no capítulo 1.
- Para usar um repositório Git privado sem Packagist, declare-o em `repositories` no `composer.json` do projeto (conhecimento meu, a conferir na documentação do Composer). Ver também gerenciar dependências com Composer.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[gerenciar-dependencias-com-composer]] — complementa o uso do Composer com a criação de pacotes
- [[carregamento-automatico-em-php]] — o pacote declara o autoload PSR-4
- [[namespaces-em-php]] — o namespace base do pacote liga a pasta src ao autoload
- [[testes-unitarios-em-php-com-phpunit]] — o pacote tem pasta de testes ligada por `autoload-dev`
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — o pacote é o meio de reaproveitar código entre projetos
