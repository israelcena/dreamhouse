# DreamHouse
![img](./front.png)

## A Ideia
Local para os usuários colocarem projetos e fotos de casas dos sonhos!
E onde essas possam ser avaliadas por outros usuários.
Qualquer usuário pode postar qualquer casa:
 - Arquitetos podem postar projetos,
 - Corretores de imóveis podem anunciar casas de seus clientes,
 - Usuários podem postar casas "Virtuais" criadas em programas e em jogos como "The Sims" ou "Minecraft".

## Funcionalidades
 - ✅ Sistema de autenticação de usuários
 - ✅ CRUD completo de casas
 - ✅ Busca e filtragem de casas
 - ✅ Sistema de avaliações (ratings) com estrelas de 1-5
 - ✅ Comentários nas avaliações
 - ✅ Cálculo automático de média de avaliações
 - ✅ Proteção contra auto-avaliação
 - ✅ Uma avaliação por usuário por casa

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

## Sistema de Avaliações

O projeto possui um sistema completo de avaliações para as casas cadastradas:

### Características:
- **Avaliação por estrelas**: De 1 a 5 estrelas
- **Comentários opcionais**: Usuários podem adicionar comentários às suas avaliações
- **Média de avaliações**: Cálculo automático da média de avaliações de cada casa
- **Proteções**:
  - Usuários não podem avaliar suas próprias casas
  - Cada usuário pode avaliar cada casa apenas uma vez
  - Usuários só podem excluir suas próprias avaliações

### Como usar:
1. Acesse uma casa específica
2. Se estiver autenticado e não for o proprietário, verá um formulário de avaliação
3. Selecione de 1 a 5 estrelas
4. Opcionalmente, adicione um comentário
5. Clique em "Enviar Avaliação"
6. Sua avaliação aparecerá na lista de avaliações da casa
7. A média de avaliações será atualizada automaticamente

### Estrutura de Banco de Dados:
- **Tabela**: `ratings`
- **Campos**:
  - `user_id`: ID do usuário que avaliou
  - `home_for_rent_id`: ID da casa avaliada
  - `rating`: Nota de 1 a 5
  - `comment`: Comentário opcional
  - Constraint unique em `(user_id, home_for_rent_id)` para evitar avaliações duplicadas

Recomendo a utilização do [Laravel Sail](https://laravel.com/docs/10.x/sail) para startar o projeto.

Project by [@israelcena](https://github.com/israelcena)
