---
titulo: "Tipos de objeto, herança de tipos, comparação e referências"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 5, seções Object type inheritance, Object comparison e Passing objects by reference (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tipos de objeto, herança de tipos, comparação e referências

## Definição

- **Um objeto tem vários tipos:** a sua classe, as classes-mãe até o topo, todas as interfaces que implementa e as interfaces que estas estendem (uma classe herda de uma só classe, mas implementa várias interfaces). `class_parents()`, `class_implements()` e `instanceof` mostram isso, e o objeto passa em qualquer declaração de tipo desses ancestrais. Cadeias longas de herança são confusas; a **composição em vez de herança** evita boa parte da complexidade.
- **Comparação:** `==` é verdadeiro para objetos da mesma classe com as mesmas propriedades; `===` só para a **mesma instância** (duas instâncias nunca são idênticas); mudar uma propriedade de uma delas desfaz a igualdade.
- **Referências:** valores escalares só viram referência com `&`; **variáveis de objeto já são referências a uma instância**: atribuir a outra variável ou passar a uma função não copia o objeto (`spl_object_id()` mostra o mesmo número). Para copiar, use `clone`.

## Por que importa

Explica por que mudar um objeto dentro de uma função muda o original e por que `===` falha entre instâncias parecidas.

## Como se relaciona

Veja fundamentos de classes e objetos em PHP, composição em vez de herança e criar instâncias por clone, reflexão e serialização.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — «Criar instâncias por clone, reflexão e serialização» cita esta nota ao explicar suas relações
- [[fundamentos-de-classes-e-objetos-em-php]] — esta nota cita a ideia de «Fundamentos de classes e objetos em PHP» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — interfaces são tipos do objeto
- [[imutabilidade-datetime-e-datetimeimmutable]] — «Imutabilidade: DateTime e DateTimeImmutable» cita esta nota ao explicar suas relações
- [[tipos-de-intersecao-em-php]] — regras de tipos de objeto e covariância
- [[tipo-de-retorno-never-em-php]] — never é o tipo de fundo na covariância
- [[subclasses-com-extends-e-super-em-javascript]] — herança em PHP
