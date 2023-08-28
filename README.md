# Teste SCI

## Requisitos do Sistema

-   PHP (versão 7.4 ou superior)
-   Composer
-   Docker e Docker Compose (para usar Laravel Sail)

## Instalação

Siga as etapas abaixo para configurar e executar a aplicação:

```bash
cp .env.example .env
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed

A seed criará um usuário administrador com as seguintes credenciais:
E-mail: admin@admin
Senha: 123

## Vite
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev

Utilização
Após a conclusão das etapas de instalação, você pode acessar a aplicação em seu navegador visitando a URL:

http://localhost

Certifique-se de que o Docker esteja em execução para que o Laravel Sail funcione corretamente.

Executando Testes
Para executar os testes automatizados, utilize o seguinte comando:
```
