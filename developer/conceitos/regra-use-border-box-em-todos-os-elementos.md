---
titulo: "Use border-box em todos os elementos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.2.3 (PDF p. 104-105; impressa 74-75)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use border-box em todos os elementos

## Regra

No início de toda folha de estilo nova, aplique `box-sizing: border-box` a todos os elementos e pseudo-elementos.

## Por quê

Com `content-box`, o padding e a borda alteram o tamanho final, e o `width` deixa de ser a largura real. O `border-box` faz `height` e `width` valerem o tamanho verdadeiro, o que o autor recomenda colocar em todo site novo; é prática comum e ele a assume em todos os exemplos do livro.

## Quando não vale

Em folhas de estilo já existentes escritas sobre o modelo padrão: adicionar a regra pode quebrar estilos (revise tudo). O modelo padrão ainda é o do navegador para quem não declara.

## Como verificar

Procure no início da folha de estilo:

```css
*, ::before, ::after { box-sizing: border-box; }
```

## Notas do Claude

Para o projeto (HTML e CSS sem frameworks), vale como primeira linha de todo CSS novo (inferência minha, coerente com o texto).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[modelo-de-caixa-do-css]] — a regra corrige o comportamento padrão do modelo
- [[regra-evite-numeros-magicos-no-css]] — o border-box elimina a conta que levava ao número mágico
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — o reset inclui o border-box
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
