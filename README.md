# Desafio técnico para desenvolvedores

Construa uma nova aplicação, utilizando o framework de sua preferência (Ruby on Rails, Elixir Phoenix, Python Django ou Flask, NodeJS Sails, Java Spring, ASP.NET ou outro), a qual deverá conectar na API do GitHub e disponibilizar as seguintes funcionalidades:

- Botão para buscar e armazenar os repositórios destaques de 5 linguagens à sua escolha;
- Listar os repositórios encontrados;
- Visualizar os detalhes de cada repositório.

Alguns requisitos:

- Deve ser uma aplicação totalmente nova;
- A solução deve estar em um repositório público do GitHub;
- A aplicação deve armazenar as informações encontradas;
- Utilizar PostgreSQL, MySQL ou SQL Server;
- O deploy deve ser realizado, preferencialmente, no Heroku, AWS ou no Azure;
- A aplicação precisa ter testes automatizados;
- Preferenciamente dockerizar a aplicação;
- Por favor atualizar o readme da aplicação com passo a passo com instrução para subir o ambiente.

Quando terminar, faça um Pull Request neste repo e avise-nos por email.

**IMPORTANTE:** se você não conseguir finalizar o teste, por favor nos diga o motivo e descreva quais foram as suas dificuldades. Você pode também sugerir uma outra abordagem para avaliarmos seus skills técnicos, vender seu peixe, mostrar-nos do que é capaz.

# 
# Tecnologias
- Laravel
- Blade + Bootstrap + Vue Js
- Mysql

# Links


#
# Ambiente de desenvolvimento Local
- Possuir Mysql Instalado
- Clonar este repositório
- Acessar o diretório do projeto

### Executar os comandos:
```shell
# criar .env
cp .env.example .env

# para istalar compose
composer install

# para gerar a chave do laravel
php artisan key:generate

# migrando tabelas na base de dados mysql inserindo dados
php artisan migrate:refresh --seed
```

### Para testes automatizados
```shell
php artisan test
```

# Ambiente de desenvolvimento Docker
- Clonar este repositório
- Acessar o diretório do projeto
### Executar os comandos:
```shell
# criar .env
cp .env.example .env

# instalando imagem docker
docker-compose up -d --build

# para istalar composer
docker-compose exec app composer install

# para gerar a chave do laravel
docker-compose exec app php artisan key:generate

# migrando tabelas na base de dados mysql inserindo dados
docker-compose exec app php artisan migrate:refresh --seed

# gera o link simbólico para a pasta storage
docker-compose exec app php artisan storage:link
```
### Para testes automatizados
```shell
docker-compose exec app php artisan test
```
