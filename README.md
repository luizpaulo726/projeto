
# Projeto: Cadastro de Cidadãos

Este projeto tem como objetivo fornecer uma solução simples para o cadastro de cidadãos. A seguir, apresentamos um passo a passo para rodar o projeto em seu ambiente local.

## Passo 1: Clone o Projeto

Clone o repositório do projeto para o seu ambiente local:

```
git clone https://github.com/luizpaulo726/projeto.git
```

## Passo 2: Configuração do Banco de Dados MySQL

### 2.1: Instale o MySQL

Se ainda não tiver o MySQL instalado, siga as instruções abaixo para o seu sistema operacional:

- **Ubuntu/Debian:**
  ```
  sudo apt install mysql-server
  ```

- **macOS (usando Homebrew):**
  ```
  brew install mysql
  ```

- **Windows:**
  Baixe o MySQL Installer [aqui](https://dev.mysql.com/downloads/installer/) e siga o assistente de instalação.

### 2.2: Configure o Banco de Dados

Abra o terminal MySQL e execute os seguintes comandos para criar o banco de dados, o usuário e as permissões:

```sql
CREATE DATABASE cadastro_cidadao;
CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'senha';
GRANT ALL PRIVILEGES ON cadastro_cidadao.* TO 'usuario'@'localhost';
FLUSH PRIVILEGES;
```

**Nota:** Substitua `usuario` e `senha` pelos valores desejados.

### 2.3: Crie a Tabela

Em seguida, crie a tabela `cidadaos` no banco de dados. No terminal MySQL, execute:

```sql
USE cadastro_cidadao;

CREATE TABLE cidadaos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nis VARCHAR(11) UNIQUE NOT NULL
);
```

### 2.4: Resumo da Instalação do MySQL

- Instale o MySQL.
- Crie o banco de dados `cadastro_cidadao`.
- Execute o script SQL para criar a tabela `cidadaos`.

## Passo 3: Instale as Dependências do Projeto

Navegue até a pasta raiz do projeto:

```
cd /caminho/para/o/projeto
```

Execute o comando abaixo para instalar as dependências do Composer:

```
composer install
```

**Observação:** Certifique-se de estar na pasta onde o arquivo `composer.json` está localizado.

## Passo 4: Execute o Servidor Local

Agora, navegue até a pasta `public` do projeto e execute o servidor PHP:

```
cd public
php -S localhost:9999
```

## Passo 5: Acesse o Projeto

Agora, você pode acessar o projeto no navegador utilizando o seguinte endereço:

[http://localhost:9999/](http://localhost:9999/)

---

Com esses passos, seu projeto estará configurado e funcionando localmente! Se houver alguma dúvida ou problema, fique à vontade para entrar em contato.
