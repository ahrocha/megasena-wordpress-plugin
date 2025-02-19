# Mega-Sena Results

## Descrição
O **Mega-Sena Results** é um plugin para WordPress que busca e exibe os resultados mais recentes da Mega-Sena a partir da API `https://api.megasena.hurpia.com.br/megasena/ultima`.

## Instalação

1. Baixe ou clone este repositório.
2. Copie a pasta `mega-sena-results` para o diretório `wp-content/plugins/` do seu WordPress.
3. No painel administrativo do WordPress, acesse **Plugins > Plugins Instalados**.
4. Encontre o **Mega-Sena Results** e clique em **Ativar**.

## Uso

Para exibir os resultados mais recentes da Mega-Sena em uma página, post ou widget, utilize o seguinte shortcode:

```
[mega_sena_results]
```

## Funcionamento

O plugin faz uma requisição HTTP para a API fornecida e exibe as informações do sorteio mais recente em um formato simples de HTML.

### Exemplo de Saída:
```html
<div class="mega-sena-results">
    <h3>Resultado do Sorteio 2829</h3>
    <p><strong>Data:</strong> 2025-02-15</p>
    <p><strong>Números Sorteados:</strong> 13 22 38 46 51 56</p>
</div>
```

## Melhorias Futuras
- Adicionar cache para evitar chamadas excessivas à API.
- Personalizar a exibição com CSS.
- Criar uma página de configuração no admin do WordPress.

## Licença
Este plugin é distribuído sob a licença GPL-2.0 ou superior.

## Autor
Desenvolvido por **Andrey Rocha** - [andreyrocha.dev](https://andreyrocha.dev)

## Atalho para zipar
zip resultados-da-megasena.zip index.php readme.txt resultados-da-megasena.php
