## Prejeto Laravel com Docker - Gerenciador de Series
- iniciando o aprendizado em laravel 5.x.
- Crud de Series.
- Editar o nome da serie in place.
- Adicionando as series e as suas respectivas temporadas e episodios.
- Marcação de series assistidas.
- Autenticação de Usuario.
- Teste automatizados.

## Para utilizar
- Instale o <b>Composer</b>
- Acesse a pasta <b>src</b> e rode:
```
$ composer install
```
- Ainda dentro da pasta <b>src</b> rode no terminal: 
```
$ php artisan key:generate
```
- Tenha o <b>docker</bb> e o <b>docker-compose instalado</b> e execute:
```
$ docker-compose up -d
```
- Depois rode as migrations dentro do bash <b>laravel5x_php-fpm</b> com o comando:
```
//Acessar o bash
$ docker exec -it <id do container> bash

//Rodar as migrations
$ php artisan migrate
```

### Para rodar os teste
- Acesse o bash do container <b>laravel5x_php-fpm</b> e execute: <b>$ vendor/bin/phpunit</b>

## Preview
![screencapture-localhost-8888-series-2019-11-11-16_13_07](https://user-images.githubusercontent.com/31348487/68610205-fb3df000-0495-11ea-82f2-85d656b6d33f.png)
![screencapture-localhost-8888-series-4-temporadas-2019-11-11-16_13_47](https://user-images.githubusercontent.com/31348487/68610209-fe38e080-0495-11ea-9bfa-1e38d8517799.png)
![screencapture-localhost-8888-series-8-episodios-2019-11-11-16_14_02](https://user-images.githubusercontent.com/31348487/68610212-ff6a0d80-0495-11ea-96e8-726077c37444.png)

