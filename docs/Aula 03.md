# Aula 03 - Criação de Classes
Aqui faremos a criação das migrations, Models, Controllers, Requests e Resources

## Criação da das Migration
Note que na criação da migration o nome "events" refere-se ao nome da tabela
a ser criada no banco de dados.
O comando a seguir cria uma migration:
`php artisan make:migration events --table=events`

Verifique a forma alternativa de criação da migration na criação do Model a seguir

## Criação do Model (Classe)
Para criação do Model pode se usar o comando a seguir:
`php artisan make:model Event`

O próximo comando cria o model e migration ao mesmo tempo com a adição do parâmetro `-m`,
aqui o nome "Event" refere-se à classe (model):
`php artisan make:model -m Event`

## Criação do Controller
A criação do controller pode ser feita com algumas variações:
- Controller normal:
`php artisan make:controller EventController`
- Controller Resource (cria automaticamente todas as funções):
`php artisan make:controller EventController --resource`
- Controller API (Cria as funções apenas para api, não cria index, create e edit):
`php artisan make:controller EventController --api`

Com a criação do controller pode se criar sua Request automaticamente com o comando a seguir:
`php artisan make:controller EventController --resource --requests`

## Criação da Request
As requests são usadas para receber os dados antes dos controllers,
nelas pode ser feito a validação e tratamento dos dados que serão recebidos,
O comando a seguir cria uma request:
`php artisan make:request EventRequest`

## Criação da Resource
As resoruces são utilizadas para tratar as respostas da api além de converter a resposta para json
`php artisan make:resource EventResource`
