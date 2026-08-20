cat > README.md << 'EOF'
# Habit Tracker

Aplicação web para acompanhar hábitos diários, construída com **Laravel 13**. Cada usuário pode registrar seus hábitos, marcar a conclusão do dia e visualizar o progresso ao longo do ano em um mapa de calor no estilo do gráfico de contribuições do GitHub.

## Funcionalidades

- Cadastro e login de usuários
- Criação, edição e exclusão de hábitos
- Marcação diária de conclusão (toggle) de cada hábito
- Dashboard com os hábitos do usuário autenticado
- Histórico anual em grade de contribuições (heatmap), com seleção de ano
- Restrição de acesso às áreas internas via middleware de autenticação

## Tecnologias

- **PHP** 8.3+
- **Laravel** 13
- **Blade** para as views
- **Tailwind CSS** 4
- **Vite** 8 para o build dos assets
- **Pest** para testes

## Pré-requisitos

- PHP 8.3 ou superior
- Composer
- Node.js e npm
- Um banco de dados (MySQL, PostgreSQL ou SQLite)

## Instalação

```bash
# Clone o repositório
git clone https://github.com/GustavoCJesu/habit-tracker.git
cd habit-tracker/habit-tracker

# Instale as dependências PHP e JS
composer install
npm install

# Crie o arquivo de ambiente e gere a chave da aplicação
cp .env.example .env
php artisan key:generate
```

Configure a conexão com o banco de dados no arquivo `.env` e, em seguida, rode as migrations:

```bash
php artisan migrate
```

Se quiser popular o banco com dados de exemplo:

```bash
php artisan db:seed
```

## Executando o projeto

Em um terminal, suba o servidor do Laravel:

```bash
php artisan serve
```

Em outro terminal, rode o Vite para compilar os assets:

```bash
npm run dev
```

A aplicação ficará disponível em `http://localhost:8000`.

## Estrutura principal

O projeto gira em torno de dois modelos:

- **Habit** — um hábito pertencente a um usuário.
- **HabitLog** — o registro de que um hábito foi concluído em uma data específica (com restrição de unicidade por hábito + dia).

As principais rotas são:

| Método | Rota | Descrição |
| --- | --- | --- |
| `GET` | `/` | Página inicial |
| `GET/POST` | `/login` | Formulário e autenticação de login |
| `GET/POST` | `/cadastro` | Formulário e processamento de cadastro |
| `POST` | `/logout` | Encerra a sessão |
| `resource` | `/dashboard/habits` | CRUD de hábitos |
| `POST` | `/dashboard/habits/{habit}/toggle` | Marca/desmarca a conclusão do dia |
| `GET` | `/dashboard/habits/historico{year?}` | Histórico anual em heatmap |

## Testes

```bash
php artisan test
```

## Licença

Defina aqui a licença do projeto (ex.: MIT).
EOF
