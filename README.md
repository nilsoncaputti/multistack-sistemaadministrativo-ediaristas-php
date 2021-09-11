## Projeto sistema adminstrativo da plataforma E-Diaristas
Desenvolvido no curso Multi-stack da TreinaWeb

## Instalando o projeto

## Clona o repositório
```
git clone https://github.com/nilsoncaputti/multistack-sistemaadministrativo-ediaristas-php.git
```

## Instalar as dependencias 
```
composer install
```
Ou em ambiente de desenvolvimento
```
composer update
```

## Criar arquivo de configurações de ambiente
Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto
e em seguida configurar os detalhes da aplicação e conexão como banco de dados.

## Criar a estrutura no banco de dados 
```
php artisan migrate
```

## Iniciar o servidor de desenvolvimento
```
php artisan serve
```