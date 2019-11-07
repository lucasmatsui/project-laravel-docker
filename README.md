## Prejeto Laravel com Docker - Gerenciador de Series
- iniciando o aprendizado em laravel 5.x.
- Crud de Series.
- Adicionando as series e as suas respectivas temporadas e episodios.
- Marcação de series assistidas.

## Para utilizar
- Tenha o <b>docker</b> e o <b>docker-compose instalado</b> e execute:
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

## Preview
![screencapture-localhost-8888-series-2019-11-07-14_52_39](https://user-images.githubusercontent.com/31348487/68414133-59a16080-016e-11ea-8a11-74577a8b2148.png)
![screencapture-localhost-8888-series-1-temporadas-2019-11-07-14_51_17](https://user-images.githubusercontent.com/31348487/68414019-29f25880-016e-11ea-8f1b-6f1cefbc5535.png)
