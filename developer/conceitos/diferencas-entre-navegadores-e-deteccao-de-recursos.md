---
titulo: "Diferenças entre navegadores e detecção de recursos"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 25 (PDF p. 620-639) e cap. 26, seção sobre hasFeature (PDF p. 640-665)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Diferenças entre navegadores e detecção de recursos

## Definição

O DOM é o conjunto de objetos que representa o documento: todo elemento tem pelo menos os recursos de `HTMLElement`, e alguns têm objetos mais específicos. Os "níveis" do DOM (DOM Level 3 etc.) são versões da padronização e, para o autor, devem ser em geral ignorados: os navegadores escolheram recursos de cada nível, e há inconsistências.

O livro aponta três formas de lidar com essas diferenças:

1. **Usar uma biblioteca**, como jQuery, que padroniza o comportamento. A contrapartida é ficar limitado ao que ela oferece.
2. **Ser conservador:** usar só recursos com suporte amplo. Para o autor, é o mais sensato na maioria dos casos, mas exige testar bem e testar de novo a cada versão dos navegadores.
3. **Detectar o recurso:** testar se a propriedade ou o método existe (`if (document.querySelectorAll) { ... } else { ... }`). Tem três problemas: nem sempre há alternativa; detectar a presença não garante que a implementação é boa e consistente; e testar cada recurso enche o código de testes. Não substitui testes de verdade.

O método `document.implementation.hasFeature()` não ajuda: os navegadores dizem ter recursos que não implementam de forma útil.

## Por que importa

Ajuda a decidir quando usar um recurso novo do navegador num site de cliente, que precisa funcionar nos navegadores do público.

## Como se relaciona

As APIs a avaliar estão em APIs do navegador para conhecer. O carregamento dos scripts está em usar módulos JavaScript no navegador.

## Notas do Claude

- Livro de 2012: a fragmentação diminuiu muito desde então, e o jQuery deixou de ser necessário para isso na maioria dos projetos (inferência minha).
- Hoje, a forma prática da opção 2 é consultar uma tabela de compatibilidade atual antes de usar um recurso (inferência minha, a conferir).

## Conexões

- [[apis-do-navegador-para-conhecer]] — a lista de APIs é o que se avalia ao aplicar esta decisão de compatibilidade
- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modelo-de-seguranca-da-web-no-navegador]] — ambos tratam do que o navegador permite ou não ao script
- [[usar-modulos-javascript-no-navegador]] — o carregamento de scripts é um caso em que se decide entre detectar o recurso ou ser conservador
- [[modo-estrito-em-javascript]] — recursos do JavaScript também variam por versão do navegador
- [[versoes-do-ecmascript-e-ambientes-do-javascript]] — o suporte do navegador depende da versão do ES
