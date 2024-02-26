# DreamHouse
![img](./front.png)

## A Ideia
Local para os usuários colocarem projetos e fotos de casas dos sonhos!
E onde essas possam ser avaliadas por outros usuários.
Qualquer usuário pode postar qualquer casa:
 - Arquitetos podem postar projetos, 
 - Corretores de imóveis podem anunciar casas de seus clientes,
 - Usuários podem postar casas "Virtuais" criadas em programas e em jogos como "The Sims" ou "Minecraft".

## Stack
 - Laravel 10
 - Laravel Blade
 - Laravel Breeze
 - Tailwind CSS

## Pré requisitos
 - PHP 8.1
 - Git
 - Mysql

## Instalação

#### Após o clone do repositório, é necessário fazer as instalações dos pacotes:
```sh
composer install
```

```sh
npm run build
```
#### Após instalações:
 - Duplique o arquivo **.env.example** , renomeie para **.env**
 - Para gerar automaticamente a sua APP_KEY, Rode o comando:

```sh
php artisan key:generate
```
 - Agora rode o projeto usando o sail ou o servidor interno do php:

```sh
php artisan serve
```

Usando o **Laravel Sail**:

```sh
 ./vendor/bin/sail up -d
```

#### Rode as migrations para criação das tabelas no BD 
*ps: Considerando que todas as configurações e tabelas já estão definidas*
```sh
php artisan migrate
```
#### Seeders
```sh
php artisan db:seed
```

Se precisar, faça também o link para o "Storage local":
```sh
php artisan storage:link
```

Recomendo a utilização do [Laravel Sail](https://laravel.com/docs/10.x/sail) para startar o projeto.

Project by [@israelcena](https://github.com/israelcena)
