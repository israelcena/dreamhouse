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
 - ✅ Busca e filtragem avançada de casas (localização, tipo, preço, quartos, banheiros, vagas)
 - ✅ Sistema de avaliações (ratings) com estrelas de 1-5
 - ✅ Comentários nas avaliações
 - ✅ Cálculo automático de média de avaliações
 - ✅ Proteção contra auto-avaliação
 - ✅ Uma avaliação por usuário por casa
 - ✅ Sistema de favoritos com toggle em tempo real
 - ✅ Sistema de solicitação de contato
 - ✅ Compartilhamento em redes sociais (Facebook, Twitter, WhatsApp)
 - ✅ Upload de imagens real com armazenamento local
 - ✅ Suporte para URL de imagens externas
 - ✅ Validação completa de formulários
 - ✅ Autorização e segurança

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

## Funcionalidades Principais

### 1. Sistema de Avaliações ⭐
O projeto possui um sistema completo de avaliações para as casas cadastradas:

**Características:**
- **Avaliação por estrelas**: De 1 a 5 estrelas
- **Comentários opcionais**: Usuários podem adicionar comentários às suas avaliações
- **Média de avaliações**: Cálculo automático da média de avaliações de cada casa
- **Proteções**:
  - Usuários não podem avaliar suas próprias casas
  - Cada usuário pode avaliar cada casa apenas uma vez
  - Usuários só podem excluir suas próprias avaliações

**Como usar:**
1. Acesse uma casa específica
2. Se estiver autenticado e não for o proprietário, verá um formulário de avaliação
3. Selecione de 1 a 5 estrelas
4. Opcionalmente, adicione um comentário
5. Clique em "Enviar Avaliação"

### 2. Sistema de Favoritos ❤️
Permite aos usuários salvar suas casas preferidas:

**Características:**
- Toggle de favoritos em tempo real (AJAX)
- Feedback visual instantâneo
- Lista de favoritos no perfil do usuário
- Um clique para adicionar/remover

**Como usar:**
1. Clique no ícone de coração na página da casa
2. A casa será adicionada/removida dos favoritos instantaneamente
3. Acesse `/favoritos` para ver todas as suas casas favoritadas

### 3. Sistema de Solicitação de Contato 📧
Os usuários podem solicitar contato com o proprietário da casa:

**Características:**
- Modal de contato com formulário completo
- Pré-preenchimento com dados do usuário autenticado
- Validação de dados
- Status de solicitação (pendente, contatado, fechado)
- Proprietários podem gerenciar solicitações recebidas

**Como usar:**
1. Clique em "Solicitar Contato" na página da casa
2. Preencha o formulário com nome, email, telefone e mensagem
3. Aguarde o retorno do proprietário
4. Proprietários acessam `/solicitacoes-contato` para ver as solicitações

### 4. Compartilhamento Social 🌐
Compartilhe casas nas redes sociais:

**Redes suportadas:**
- Facebook
- Twitter
- WhatsApp

**Como usar:**
1. Clique nos ícones de redes sociais na página da casa
2. A página será aberta com o compartilhamento pré-configurado

### 5. Upload de Imagens 📸
Sistema completo de upload de imagens:

**Características:**
- Upload real de arquivos (JPEG, PNG, JPG, GIF, WEBP)
- Tamanho máximo: 5MB
- Armazenamento local em `/storage/homes`
- Também suporta URLs externas
- Remoção automática de imagens ao excluir casa

**Como usar:**
1. No formulário de cadastro/edição de casa
2. Escolha entre:
   - **Upload de arquivo**: Selecione uma imagem do seu computador
   - **URL externa**: Cole o link de uma imagem online

### 6. Busca Avançada 🔍
Sistema de filtros avançados para encontrar a casa ideal:

**Filtros disponíveis:**
- Localização/endereço
- Tipo de imóvel (Casa, Apartamento)
- Faixa de preço (mínimo e máximo)
- Número mínimo de quartos
- Número mínimo de banheiros
- Número mínimo de vagas
- Apenas casas ativas

**Características:**
- Filtros persistem após a busca
- Botão de limpar filtros
- Paginação dos resultados
- Mensagem quando não há resultados

## Estrutura de Banco de Dados

### Tabela `ratings`
- `user_id`: ID do usuário que avaliou
- `home_for_rent_id`: ID da casa avaliada
- `rating`: Nota de 1 a 5
- `comment`: Comentário opcional
- Constraint unique: `(user_id, home_for_rent_id)`

### Tabela `favorites`
- `user_id`: ID do usuário
- `home_for_rent_id`: ID da casa favoritada
- Constraint unique: `(user_id, home_for_rent_id)`

### Tabela `contact_requests`
- `user_id`: ID do usuário que solicitou
- `home_for_rent_id`: ID da casa
- `name`, `email`, `phone`: Dados de contato
- `message`: Mensagem do interessado
- `status`: Status da solicitação (pending, contacted, closed)

Recomendo a utilização do [Laravel Sail](https://laravel.com/docs/10.x/sail) para startar o projeto.

Project by [@israelcena](https://github.com/israelcena)
