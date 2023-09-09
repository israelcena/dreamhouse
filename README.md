# DreamHouse
![img](./front.png)

## A Ideia
Local para os usuários colocarem projetos e fotos de casas dos sonhos!  
E onde elas possam ser avaliadas, por outros usuários.  
Qualquer usuário poder postar qualquer casa:
 - Arquitetos podem postar projetos, 
 - Corretores de imóveis podem anunciar as casas de seus clientes
 - Usuários podem postar casas "Virtuais" criadas em programas e em jogos como The Sims

## Técnologias usadas
 - Laravel 10
 - Laravel Blade
 - Laravel Breeze

## Pré requisitos
 - PHP 8.1 ou superior
 - Git
 - Mysql

## Instalação

#### Após o clone do repositório é necessário fazer as instalações dos pacotes:
```sh
composer install
```

```sh
npm run build
```

#### Rode as migrations para criação das tabelas no BD 
***ps: Considerando que todas as configurações e tabelas já estão definidas***
```sh
php artisan migrate
```
#### Seeders
```sh
php artisan db:seed
```

#### Faça também o link para o "Storage local"
```sh
php artisan storage:link
```

Recomendo a utilização do [Laravel Sail](https://laravel.com/docs/10.x/sail) para startar o projeto.

Project by [@israelcena](https://github.com/israelcena)
