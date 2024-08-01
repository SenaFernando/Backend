# Disco-Livre-Records-Backend

## Projeto "Discografia da Dupla Tião Carreiro e Pardinho"

O projeto "discografiaDupla-api" é uma API construída com PHP e Node.js, utilizando várias bibliotecas e ferramentas para facilitar o desenvolvimento e a construção. Este documento fornece uma visão geral da configuração, dependências e instruções para abrir e executar o projeto.

## Estrutura do Projeto

O arquivo `package-lock.json` descreve as dependências exatas instaladas no projeto, garantindo que o ambiente de desenvolvimento seja replicável e estável. Abaixo estão os principais componentes e suas versões.

### Dependências de Desenvolvimento

- `axios`: ^1.6.4
- `laravel-vite-plugin`: ^1.0
- `vite`: ^5.0

### Configuração de Ferramentas

**Vite**

Vite é uma ferramenta de construção moderna e rápida, especialmente popular em projetos front-end, mas também usada para builds otimizadas em projetos back-end. No projeto "discografiaDupla-api", Vite é utilizado em conjunto com o plugin `laravel-vite-plugin`.

**Laravel Vite Plugin**

Este plugin permite uma integração suave entre Laravel e Vite, facilitando o desenvolvimento e a compilação de ativos front-end em projetos Laravel.

## Abrindo o Projeto

### Pré-requisitos

Certifique-se de ter os seguintes softwares instalados em seu ambiente de desenvolvimento:

- **PHP**: Versão 7.4 ou superior
- **Composer**: Gerenciador de dependências para PHP
- **Node.js**: Versão 12 ou superior
- **NPM**: Gerenciador de pacotes para Node.js (normalmente instalado junto com o Node.js)
- **Git**: Para controle de versão

### Passos para Abrir o Projeto

1. **Clone o Repositório**

   Clone o repositório do projeto para sua máquina local usando o Git. Abra o terminal e execute o seguinte comando:

   ```bash
   git clone <(https://github.com/SenaFernando/Backend.git)>

2. **Instale as dependências PHP**

   Navegue até o diretório do projeto clonado e instale as dependências PHP usando o Composer:

   
      cd discografiaDupla-api
      composer install


3. **Configure o Arquivo .env**

Copie o arquivo .env.example para .env e configure as variáveis de ambiente conforme necessário. Abra o arquivo .env em um editor de texto e configure as seguintes variáveis:

.env

      APP_NAME=DiscografiaDupla
      APP_ENV=local
      APP_KEY=base64:ChaveGeradaAqui
      APP_DEBUG=true
      APP_URL=http://localhost
      
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nome_do_banco_de_dados
      DB_USERNAME=seu_usuario
      DB_PASSWORD=sua_senha
   - Certifique-se de configurar o banco de dados com as informações corretas.

4. **Gere a Chave da Aplicação**

Gere uma nova chave de aplicação Laravel:



      php artisan key:generate
      
5. **Instale as Dependências Node.js**

Instale as dependências Node.js necessárias para o projeto:



      npm install
      
6. **Compile os Recursos Front-end**

Use o Vite para compilar os recursos front-end:


      npm run dev
Para compilar para produção, use:


      npm run build
7. **Execute as Migrações do Banco de Dados**

Execute as migrações para configurar o banco de dados:


      php artisan migrate
8. **Inicie o Servidor de Desenvolvimento**

Inicie o servidor de desenvolvimento Laravel:


      php artisan serve
Por padrão, o servidor estará disponível em http://localhost:8000.
