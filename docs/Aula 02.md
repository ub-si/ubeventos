# Instalação do Framework
## 1. Clonar Repositório
`git clone https://github.com/ub-si/ubeventos.git`

## 2. Entrar na pasta
`cd ubeventos`

## 3. Instalar o Laravel
Substitua o nome exampel-app pelo nome do seu projeto, no meu caso "ubeventos"
`composer create-project laravel/laravel ubeventos`

## 4. Mover os arquivos
Entre na pasta da instalação (../ubeventos/ubeventos) e mova todos os aquivos da instalação do laravel para fora da pasta (../ubeventos), ou seja para dentro do repositório

## 5. Enviar arquivos para o repositório remoto
1. Adicionar os aquivos ao repositório:
`git add .`
2. Aplicar alterações (Commit):
`git commit -m "Instalação do Framework"`
3. Enviar alteração para servidor remoto:
`git push`

## 6. Altera os parametros do arquivo .env
- APP_NAME=UbEventos
- APP_URL=http://127.0.0.1:8000/
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=ubeventos
- DB_USERNAME=root
- DB_PASSWORD=

## 7. Atualizar banco de dados
`php artisan migrate`

## 8. Executar aplicação com servidor PHP
`php artisan serve`

## 9. Instalação do Starter Kit Breeze
1. Adicionar pacote: `composer require laravel/breeze --dev`
2. Instalar o breeze: `php artisan breeze:install`
3. Atualizar database: `php artisan migrate`