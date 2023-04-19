## Table of Contents
1. [General Info](#general-info)
2. [Technologies](#technologies)
3. [Installation](#installation)
4. [Collaboration](#collaboration)
### General Info
***
Se desarrollo una api de cursos utilizando laravel, laravel module para la organizacion del proyecto 
y el patro de diseño de repositorio, se creo la base de datos en MySql mariaDb, y las respectivas migraciones
en laravel. 

## Technologies
***
Listado de tecnologias :
* [Laravel](https://laravel.com/docs/9.x): Version 9.19
* [Laravel module](https://nwidart.com/laravel-modules/v6/introduction): Version 9.0

## Installation
***
Introducion a la instalacion
```
$ instalar un servidor local, en mi caso recomiendo laragon (https://laragon.org/download/index.html)
$ instalar composer en su maquina(https://getcomposer.org/download/)
$ crear base de datos
$ git clone https://github.com/RobinsonHortaBeltran/prueba-back.git
$ cd prueba-back
$ composer install
$ configurar el archivo de conexion colocar el nombre de la base de datos, usario y contraseña en .env utilizar el archivo.env.example como base.
$ si el archivo .env esta bien configurado, en la consola ejecutar el comando php artisan migrate --seed 
para correr las migraciones y su semilla de datos.
$ por ultimo levantar el servidor ejecutando en la consola el comando php artisan serve, este nos dara una url (http://127.0.0.1:8000).
$ abrir postman o el navegador web, y probar utilizando la siguiente url,http://127.0.0.1:8000/api/course
este realizara una peticion get donde nos debera retornar el listado de los cursos creados en la migracion
```
## Collaboration
***
Desarrollado por Robinson Horta Beltran

