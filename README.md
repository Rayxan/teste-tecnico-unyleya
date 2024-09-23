
# Instalação do Projeto

Este guia o ajudará a configurar e executar o projeto **teste-tecnico-unyleya** com facilidade.

## Requisitos

Certifique-se de ter as seguintes dependências instaladas:

- PHP: `^8.2`
- Laravel: `^11.9`

## Passo a Passo da Instalação

### 1. Clonar o Repositório

Escolha um diretório de sua preferência e clone o projeto com o comando abaixo:

```bash
git clone https://github.com/Rayxan/teste-tecnico-unyleya.git
```

### 2. Instalar Dependências

Entre no diretório do projeto clonado e execute o comando para instalar as dependências do PHP:

```bash
cd teste-tecnico-unyleya
composer install
```

### 3. Configurar Variáveis de Ambiente

No diretório raiz do projeto:

1. Duplique o arquivo `.env.example`.
2. Renomeie o arquivo duplicado para `.env`.

### 4. Gerar a Chave da Aplicação

Gere a chave para a aplicação com o comando abaixo:

```bash
php artisan key:generate
```

### 5. Compilar Assets (CSS e JS)

Instale as dependências do Node.js e compile os arquivos de CSS e JS:

```bash
npm install && npm run dev
```

### 6. Configurar Banco de Dados

No arquivo `.env`, configure as credenciais do banco de dados MySQL como no exemplo abaixo:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teste-tecnico-unyleya
DB_USERNAME=root
DB_PASSWORD=root
```

> **Nota**: Certifique-se de que o banco de dados `teste-tecnico-unyleya` já exista em sua base de dados.

### 7. Migrar e Popular o Banco de Dados

Execute as migrações e seeds para criar as tabelas e popular com dados iniciais:

```bash
php artisan migrate:fresh --seed
```

### 8. Servir a Aplicação

Finalmente, rode o servidor local com o comando:

```bash
php artisan serve
```

A aplicação estará disponível no endereço padrão:

```
http://localhost:8000
```

---