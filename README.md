
# Projeto: Cadastro de Cidadãos

Este projeto tem como objetivo fornecer uma solução simples para o cadastro de cidadãos. A seguir, apresentamos um passo a passo para rodar o projeto em seu ambiente local utilizando Docker.

## Passo 1: Instalar o Docker

### 1.1: Instalar o Docker no Ubuntu

Caso ainda não tenha o Docker instalado, siga as instruções abaixo:

```
sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt update
sudo apt install docker-ce docker-compose
```

Após a instalação, você pode verificar se o Docker foi instalado corretamente com o comando:

```
docker --version
```

### 1.2: Instalar o Docker no Windows

1. Baixe o [Docker Desktop para Windows](https://www.docker.com/products/docker-desktop).
2. Siga o assistente de instalação e, após a instalação, reinicie seu computador, se necessário.
3. Verifique se o Docker foi instalado corretamente executando o comando `docker --version` no terminal.

### 1.3: Instalar o Docker no macOS

1. Baixe o [Docker Desktop para macOS](https://www.docker.com/products/docker-desktop).
2. Siga o assistente de instalação.
3. Verifique se o Docker foi instalado corretamente executando o comando `docker --version` no terminal.

## Passo 2: Clone o Projeto

Clone o repositório do projeto para o seu ambiente local:

```
git clone https://github.com/luizpaulo726/projeto.git
```

Após o clone, navegue até a pasta do projeto:

```
cd projeto
```

## Passo 3: Subir o Projeto com Docker

### 3.1: Construir e Iniciar os Containers

No terminal, execute o seguinte comando para iniciar os containers do projeto:

```
docker-compose up -d
```

Esse comando vai baixar as imagens necessárias e iniciar os containers em segundo plano.

### 3.2: Verificar se os Containers estão Rodando

Para verificar se os containers estão rodando, execute:

```
docker ps
```

Isso mostrará os containers ativos. Copie o **ID do container** do serviço que está rodando o seu projeto.

### 3.3: Acessar o Container

Agora, acesse o container usando o comando abaixo, substituindo `ID_CONTAINER` pelo ID do container copiado:

```
docker exec -it ID_CONTAINER bash
```

Isso abrirá um terminal dentro do container.


### 3.4: Executar os Testes Unitários

Dentro do terminal do container, você pode executar os testes unitários do projeto com o comando:

```
./vendor/bin/pest
```

Esse comando executará os testes unitários do projeto, se configurado corretamente. Mas antes disso, atualize suas dependencias do composer, digite: composer install ou composer update

## Passo 4: Acessar o Projeto no Navegador

Depois que o Docker estiver rodando, você pode acessar o projeto no seu navegador. Abra o navegador e acesse o endereço:

[http://localhost:8080](http://localhost:8080)

Pronto! O projeto está rodando localmente.

## Passo 5: Dúvidas ou Problemas?

Caso você tenha qualquer dúvida ou encontre algum problema, não hesite em entrar em contato comigo:

**E-mail:** luizpaulo.lpb.batista@gmail.com
