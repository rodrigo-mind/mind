---
titulo: "Padrões Adapter e Factory (com exemplo de acesso a banco)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 12, seção 12.3 (PDF p. 564-568)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrões Adapter e Factory

## Definição

- **Factory (fábrica):** cria instâncias de objetos **sem informar as classes de antemão**; a instância sai de um método, não de um construtor.
- **Adapter (adaptador):** uma classe com **interface fixa** para a comunicação; repassa as chamadas a objetos subjacentes que podem ter interfaces totalmente diferentes.

No exemplo do livro, a classe adaptadora de banco do Laminas recebe uma configuração (o nome do driver, como `Pdo_Sqlite`, e o banco) e escolhe sozinha a classe do driver; o código da aplicação só conhece o adaptador. Vantagem: dá para trocar o banco (e o próprio adaptador, por causa da interface fixa) sem mexer na aplicação. Estritamente, o autor reconhece que o exemplo não usa um método de fábrica, mas o princípio é semelhante.

## Por que importa

Reduz o acoplamento com o fornecedor de uma tecnologia (por exemplo, do banco de dados).

## Como se relaciona

Ver padrões de criação de objetos, acoplamento e desacoplamento e acesso ao banco com PDO (que já é uma camada de abstração de bancos).

## Notas do Claude

Confiança média: li o conceito e o exemplo, não o resto do capítulo; o exemplo depende do Laminas, e o livro avisa que, na época, o pacote só era compatível com PHP 8.0 a 8.2.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-criacao-de-objetos]] — esta nota cita a ideia de «Padrões de criação de objetos» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[acesso-ao-banco-com-pdo]] — esta nota cita a ideia de «Acesso ao banco com PDO» na seção sobre como se relaciona
- [[padrao-mvc-modelo-visao-controlador]] — o exemplo do adaptador usa o modelo de uma aplicação MVC
- [[padrao-builder]] — «Padrão Builder» cita esta nota ao explicar suas relações
