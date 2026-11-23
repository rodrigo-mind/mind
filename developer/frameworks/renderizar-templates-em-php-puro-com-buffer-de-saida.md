---
titulo: "Renderizar templates em PHP puro com buffer de saída"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 8, seção sobre a View (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Renderizar templates em PHP puro com buffer de saída

## Para que serve

Separar o HTML da lógica sem usar uma linguagem de templates: o controlador prepara os dados, um arquivo PHP de template mostra os dados, e um renderizador junta os dois e devolve o HTML como texto.

## Quando usar e quando não usar

- **Use** em sistemas sem framework que querem a camada de visão do MVC.
- Os frameworks já trazem linguagens de templates, que em geral escapam a saída sozinhas, mas os autores recomendam conferir se fazem isso mesmo.

## O que perguntar ao usuário antes

- Que dados cada página precisa mostrar?
- Onde ficam os arquivos de template?

## Passos

1. **Dados do template como DTO:** crie uma classe por template (por exemplo, `HomePageTemplateData`) com todos os dados exigidos no construtor, imutável e implementando uma interface comum (`TemplateDataInterface`). Um DTO (data transfer object) é um objeto sem comportamento, que só carrega dados.
2. **Template:** um `.php` comum com HTML. No topo, uma linha de docblock declara o tipo da variável de dados (`/** @var HomePageTemplateData $templateData */`), para o editor completar o resto.
3. **Escape em toda saída:** cada valor impresso passa por uma função de escape (no livro, `Esc::_()`, um invólucro de `htmlspecialchars` com nome curto para não poluir o template).
4. **Renderizador:** um método `render(string $template, TemplateDataInterface $dados): string` que chama `ob_start()`, faz `require` do template (que roda no escopo do método e vê suas variáveis) e devolve `ob_get_clean()`.
5. O controlador devolve esse texto como resposta.

## Saída esperada

O HTML da página como texto, gerado a partir de dados tipados, com toda saída escapada.

## Erros comuns

- Imprimir um valor sem escapar. Os autores insistem: quem cria o próprio sistema de templates tem de garantir o escape.
- Passar variáveis soltas para o template em vez de um objeto único: perde-se o tipo e o autocompletar.
- Embelezar o HTML em produção: o livro só faz isso no exemplo; em produção, o certo seria reduzir o tamanho.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

final class Renderizador {
    public function __construct(private string $pasta) {}
    public function render(string $nome, object $dados): string {
        ob_start();
        require $this->pasta . '/' . $nome . '.php'; // usa $dados
        return (string) ob_get_clean();
    }
}
```

## Notas do Claude

- Não monte o nome do template a partir de entrada do usuário: seria inclusão de arquivo arbitrário (inferência minha; ver a regra nunca confie na entrada do usuário).
- Ligado a visão com modelo e auxiliar de visão (Zandstra), a regra escape a saída contra XSS e o padrão MVC.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[padrao-mvc-modelo-visao-controlador]] — é a camada de visão do MVC
- [[visao-com-modelo-e-auxiliar-de-visao]] — outra forma de separar visão e modelo, no livro de Zandstra
- [[regra-escape-a-saida-contra-xss]] — toda saída do template precisa de escape
- [[escapar-texto-conforme-o-destino-em-php]] — o escape de HTML no template segue este framework
- [[regra-leia-superglobais-em-um-so-lugar]] — o controlador que prepara os dados recebe a requisição já lida num ponto único
