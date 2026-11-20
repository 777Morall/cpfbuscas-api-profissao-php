# Consulta por profissão em PHP

Exemplo do módulo profissão da API CPF Buscas em PHP, com validação local de entrada e encoding da query string.

> **Conheça o CPF Buscas:** use os módulos do painel ou integre seu sistema pela API. [Acesse cpfbuscas.com](https://cpfbuscas.com/?utm_source=github&utm_medium=readme&utm_campaign=modulos_php), [compare os planos](https://cpfbuscas.com/api) e [crie sua conta](https://cpfbuscas.com/cadastro). Painel e API têm contratações separadas.

## Exemplo disponível

Demonstra uma consulta pontual pelo parâmetro profissao, preservando espaços e acentos com encoding de URL. O limite de entrada é local ao exemplo. A documentação não especifica o schema ou a extensão do resultado; o exemplo exibe o JSON recebido sem presumir dados de pessoas nem uma tabela de classificação. Use somente com finalidade legítima e autorização adequada; não oferece coleta em massa.

| Método e endpoint | Parâmetros documentados |
|---|---|
| `GET /api/v1/query/profissao` | `profissao` (obrigatório) |

## Executar em PHP 8.2+

Requer extensão cURL. Não precisa instalar Composer ou dependências.

```bash
git clone https://github.com/777Morall/cpfbuscas-api-profissao-php.git
cd cpfbuscas-api-profissao-php
php examples/consulta.php --demo
php tests/run.php
```

O modo --demo apenas imprime o método, o caminho e os parâmetros de uma requisição simulada. Não consulta a API e não exige token. Os dados da demonstração são ilustrativos; não indicam cadastro válido nem disponibilidade na base.

Para uma consulta real, gere uma chave da API CPF Buscas e exporte a variável de ambiente:

```bash
export CPFBUSCAS_TOKEN='SUA_CHAVE_CPFBUSCAS'
php examples/consulta.php profissao "SUA_PROFISSAO"
```

No PowerShell use `$env:CPFBUSCAS_TOKEN = 'SUA_CHAVE_CPFBUSCAS'` e execute os mesmos comandos PHP. Substitua os valores ilustrativos por entradas autorizadas. O token do GitHub não autentica o CPF Buscas. .env.example é apenas referência, não é carregado automaticamente.

## Respostas e erros

A resposta real é exibida em JSON no terminal, sem presumir campos internos não especificados na documentação. O exemplo não grava respostas em arquivos. Erros locais ou HTTP encerram a execução com código 1.

- Bearer em Authorization, Accept: application/json e HTTPS com validação de certificado.
- 401: chave; 403: assinatura; 422: parâmetros; 429: limite; 503: indisponibilidade. Não há repetição automática. Retry-After é exibido quando fornecido.
- Todos os planos de API incluem os módulos documentados: Start 20 req/min e 1 chave; Plus 60 e 2; Pro 180 e 3; Scale 1.000 e 4. Confira as condições atuais no site.
- O cliente usa 20 req/min por instância, com margem. Execuções separadas não compartilham esse controle: coordene a cota entre processos e chaves em produção.
- A base alternativa oficial é https://cpfbuscas.net/api/v1, configurável por CPFBUSCAS_BASE_URL. Ela compartilha conta, chave e limite e não contorna HTTP 429.

## Testes e uso dos dados

Os testes usam transporte simulado para conferir montagem das consultas, query string, cabeçalho Bearer, rejeição de entradas inválidas e erros HTTP sem repetição. O GitHub Actions executa lint e testes em PHP 8.2, 8.3 e 8.4.

Use dados com finalidade legítima e autorização adequada; evite registrar dados pessoais ou chaves em logs e commits. A licença MIT cobre o exemplo, não os dados nem o serviço. Projeto independente, sem alegação de vínculo oficial.

## Outros módulos e exemplos

- [cpfbuscas-api-bin-php](https://github.com/777Morall/cpfbuscas-api-bin-php)
- [cpfbuscas-api-operadora-telefone-php](https://github.com/777Morall/cpfbuscas-api-operadora-telefone-php)
- [cpfbuscas-api-cbo-php](https://github.com/777Morall/cpfbuscas-api-cbo-php)
- [cpfbuscas-api-profissao-php](https://github.com/777Morall/cpfbuscas-api-profissao-php)

## Documentação

[Documentação oficial da API](https://cpfbuscas.com/api-docs) e [planos CPF Buscas](https://cpfbuscas.com/api), consultados em 20/11/2026. Métodos e parâmetros vieram do catálogo público; os validadores adicionais são escolhas locais do exemplo. Nenhuma consulta real foi realizada durante a criação.
