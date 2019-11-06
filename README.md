## Prejeto Laravel com Docker - Gerenciador de Series
- iniciando o aprendizado em laravel 5.x.
- Crud de Series.
- Adicionando as series e as suas respectivas temporadas e episodios.

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
![screencapture-localhost-8888-series-2019-11-06-12_12_40](https://user-images.githubusercontent.com/31348487/68310560-fe4c7100-008e-11ea-91b6-40c2f1c26b6e.png)
![screencapture-localhost-8888-series-11-temporadas-2019-11-06-12_13_03](https://user-images.githubusercontent.com/31348487/68310567-00163480-008f-11ea-904c-d45b610db53b.png)
