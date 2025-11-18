# DreamHouse
![img](./front.png)

## 📋 A Ideia
Local para os usuários colocarem projetos e fotos de casas dos sonhos!
E onde essas possam ser avaliadas por outros usuários.
Qualquer usuário pode postar qualquer casa:
 - Arquitetos podem postar projetos,
 - Corretores de imóveis podem anunciar casas de seus clientes,
 - Usuários podem postar casas "Virtuais" criadas em programas e em jogos como "The Sims" ou "Minecraft".

## ✨ Status do Projeto

**🎉 PROJETO 100% FUNCIONAL - TODAS AS FUNCIONALIDADES IMPLEMENTADAS! 🎉**

## 🚀 Funcionalidades Implementadas

### Core Features (100% Completo)
 - ✅ **Sistema de autenticação de usuários** (Laravel Breeze)
 - ✅ **CRUD completo de casas** com validação e autorização
 - ✅ **Busca e filtragem avançada** (localização, tipo, preço, quartos, banheiros, vagas)
 - ✅ **Sistema de avaliações (ratings)** com estrelas de 1-5
 - ✅ **Comentários nas avaliações**
 - ✅ **Cálculo automático de média de avaliações**
 - ✅ **Proteção contra auto-avaliação**
 - ✅ **Uma avaliação por usuário por casa**
 - ✅ **Sistema de favoritos com toggle em tempo real** (AJAX)
 - ✅ **Sistema de solicitação de contato** com status (pendente, contatado, fechado)
 - ✅ **Compartilhamento em redes sociais** (Facebook, Twitter, WhatsApp)
 - ✅ **Upload de imagens real** com armazenamento local
 - ✅ **Suporte para URL de imagens externas**
 - ✅ **Validação completa de formulários** (Form Requests)
 - ✅ **Autorização e segurança** (Policies, Gates)

### Interface & UX (100% Completo)
 - ✅ **Página de listagem de favoritos** com paginação e ações
 - ✅ **Página de solicitações recebidas** com gerenciamento de status
 - ✅ **Página de solicitações enviadas** para acompanhamento
 - ✅ **Navegação completa** com links para todas as funcionalidades
 - ✅ **Empty states** em todas as páginas sem dados
 - ✅ **Mensagens de feedback** para todas as ações
 - ✅ **Formulários com dupla opção** (upload de arquivo OU URL)
 - ✅ **Preview de imagem atual** no formulário de edição
 - ✅ **Filtros com persistência** de valores após busca
 - ✅ **Modals interativos** para solicitação de contato

### Database & Seeders (100% Completo)
 - ✅ **Migrations completas** para todas as tabelas
 - ✅ **Relacionamentos Eloquent** configurados
 - ✅ **Seeders com dados realistas** (Users, Homes, Ratings, Favorites, Contact Requests)
 - ✅ **Constraints de integridade** (unique, foreign keys, cascade delete)

## 🎯 Possíveis Melhorias Futuras

Funcionalidades que poderiam ser adicionadas em versões futuras (não são necessárias para o MVP atual):

### Analytics & Dashboard
 - 📊 Dashboard com estatísticas das casas do usuário (visualizações, favoritos, avaliações médias)
 - 📈 Gráficos de desempenho das casas
 - 🔔 Sistema de notificações para novas solicitações de contato

### Funcionalidades Avançadas
 - 🖼️ **Galeria de múltiplas imagens** por casa (atualmente suporta 1 foto)
 - 🗺️ **Integração com mapas** (Google Maps/Leaflet) para visualizar localização
 - 🔍 **Comparação entre casas** (comparar até 3 casas lado a lado)
 - 📜 **Histórico de visualizações** do usuário
 - 🏷️ **Sistema de tags/categorias** adicionais (moderno, clássico, sustentável, etc.)
 - 💬 **Sistema de mensagens** diretas entre usuários
 - 🚨 **Sistema de denúncias/reports** para conteúdo inadequado

### Technical Improvements
 - 🧪 **Testes automatizados** (Unit Tests, Feature Tests)
 - 🚀 **API REST** para aplicação mobile
 - 🌍 **Internacionalização (i18n)** - suporte a múltiplos idiomas
 - 📄 **Exportação de dados** (PDF, Excel)
 - 🔧 **CI/CD Pipeline** para deploy automatizado
 - ⚡ **Cache** de queries e resultados
 - 🔍 **Full-text search** com Elasticsearch/Meilisearch
 - 📧 **Envio de emails** para notificações importantes

### UX Enhancements
 - 🌙 **Modo escuro (Dark mode)**
 - ♿ **Melhorias de acessibilidade (WCAG 2.1)**
 - 📱 **Progressive Web App (PWA)**
 - 🎨 **Temas personalizáveis**

## 🛠️ Stack
 - Laravel 10
 - Laravel Blade
 - Laravel Breeze
 - Tailwind CSS
 - MySQL
 - AJAX (Vanilla JavaScript)

## 📦 Pré-requisitos
 - PHP 8.1+
 - Composer
 - Node.js & NPM
 - MySQL 5.7+ ou MariaDB
 - Git

## 🔧 Instalação

### 1. Clone o repositório
```bash
git clone https://github.com/israelcena/dreamhouse.git
cd dreamhouse
```

### 2. Instale as dependências
```bash
# Dependências PHP
composer install

# Dependências JavaScript
npm install
npm run build
```

### 3. Configure o ambiente
```bash
# Copie o arquivo de exemplo
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### 4. Configure o banco de dados
Edite o arquivo `.env` e configure suas credenciais do MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dreamhouse
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5. Execute as migrations e seeders
```bash
# Criar as tabelas
php artisan migrate

# Popular com dados de teste
php artisan db:seed

# Criar link simbólico para storage (necessário para upload de imagens)
php artisan storage:link
```

### 6. Inicie o servidor

**Opção 1: Servidor interno do PHP**
```bash
php artisan serve
```
Acesse: `http://localhost:8000`

**Opção 2: Laravel Sail (Docker)**
```bash
./vendor/bin/sail up -d
```
Acesse: `http://localhost`

## 👤 Dados de Teste

Após executar os seeders, você terá:
- **10 usuários** (user1@test.com até user10@test.com, senha: `password`)
- **20 casas** cadastradas
- **Avaliações** aleatórias para as casas
- **Favoritos** pré-configurados
- **Solicitações de contato** de exemplo

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

## 🗄️ Estrutura de Banco de Dados

### Tabela `users`
- Informações de autenticação dos usuários
- Relacionamentos: casas, avaliações, favoritos, solicitações de contato

### Tabela `home_for_rents`
- Dados completos das casas (endereço, tipo, preço, área, quartos, banheiros, vagas)
- `active`: Flag para ativar/desativar anúncio
- Relacionamentos: usuário (proprietário), avaliações, favoritos, solicitações

### Tabela `ratings`
- `user_id`: ID do usuário que avaliou
- `home_for_rent_id`: ID da casa avaliada
- `rating`: Nota de 1 a 5
- `comment`: Comentário opcional (TEXT)
- Constraint unique: `(user_id, home_for_rent_id)` - previne avaliações duplicadas

### Tabela `favorites`
- `user_id`: ID do usuário
- `home_for_rent_id`: ID da casa favoritada
- Constraint unique: `(user_id, home_for_rent_id)` - previne duplicatas
- Cascade delete: remove favorito se usuário ou casa for excluído

### Tabela `contact_requests`
- `user_id`: ID do usuário que solicitou
- `home_for_rent_id`: ID da casa
- `name`, `email`, `phone`: Dados de contato
- `message`: Mensagem do interessado (TEXT)
- `status`: ENUM ('pending', 'contacted', 'closed')
- Permite múltiplas solicitações do mesmo usuário para a mesma casa

## 📚 Como Usar

### Navegação Principal
- **Explorar Casas** - Veja todas as casas cadastradas e use os filtros de busca
- **Dashboard** - Gerencie suas casas cadastradas
- **Favoritos** - Acesse suas casas favoritadas
- **Solicitações** - Veja solicitações de contato recebidas

### Fluxo de Uso Típico

**Como Anunciante:**
1. Faça login/registro
2. Acesse "Dashboard"
3. Clique em "Cadastrar Nova Casa"
4. Preencha o formulário (upload de imagem ou URL)
5. Aguarde avaliações e solicitações de contato
6. Gerencie solicitações em "Solicitações"

**Como Visitante:**
1. Faça login/registro
2. Navegue por "Explorar Casas"
3. Use filtros para encontrar a casa ideal
4. Clique em uma casa para ver detalhes
5. Avalie a casa (1-5 estrelas + comentário)
6. Adicione aos favoritos (clique no ❤️)
7. Solicite contato com o proprietário
8. Acompanhe suas solicitações em "Minhas Solicitações"

## 🧪 Comandos Úteis

```bash
# Resetar banco de dados e popular novamente
php artisan migrate:fresh --seed

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Verificar rotas
php artisan route:list

# Executar apenas um seeder específico
php artisan db:seed --class=RatingSeeder
```

## 📝 Rotas Principais

```
GET  /                          - Página inicial
GET  /login                     - Login
GET  /register                  - Registro
GET  /dashboard                 - Dashboard do usuário (autenticado)
GET  /homes                     - Listagem de casas
GET  /homes/{id}                - Detalhes da casa
GET  /favoritos                 - Lista de favoritos
GET  /solicitacoes-contato      - Solicitações recebidas
GET  /minhas-solicitacoes       - Solicitações enviadas

POST /homes/{id}/rating         - Criar avaliação
POST /homes/{id}/favorite/toggle- Toggle favorito (AJAX)
POST /homes/{id}/contato        - Enviar solicitação de contato
```

## 🤝 Contribuindo

Contribuições são bem-vindas! Por favor:
1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT.

## 👨‍💻 Autor

**Israel Cena**
- GitHub: [@israelcena](https://github.com/israelcena)
- LinkedIn: [Israel Cena](https://linkedin.com/in/israelcena)

---

⭐ Se este projeto foi útil para você, considere dar uma estrela no GitHub!
