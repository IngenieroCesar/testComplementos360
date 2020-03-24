<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Obtener Proyecto

Para iniciar, clona este repositorio en tu computadora, Siguiente abre una terminal en la raiz de estre proyecto, asegurandote de que tienes las dependencias de laravel instaladas corre los siguientes comandos:

- composer install.
- composer update.
- cp .env.example .env

Luego configura tu archivo .env, el cual con tendra la inormación de tu proyecto y correspondiente al servidor en el que alojes el proyecto.

## Cabe recalcar que este proyecto no necesita de un servidor externo, ya que no tiene uso de base de datos, por ende podemos utilizar simplemente el servidor que incluye laravel para desarrollo:
Corre el siguiente comando en la terminal en la raiz del proiyecto:

- php artisan serve

## About testComplementos360
Este proyecto corresponde al consumo de una API externa: http://www.balldontlie.io. El cual tiene como objetibo almacenar los datos en un archivo JSON, los cuales tendran la posibilidad de ser listados, filtrados, ordenados, editados y eliminados, persistiendo los datos en el archivo JSON.

## Ubicación de archivos:
- Los datos persistidos estan almacenados en los archivos (: public/jsondb/jugadores.json) && (: public/jsondb/team.json).
- El backend es manejado por el controlador (: ViewController.php).
- El frontend es manejado por javascript renderizando en la vista (: welcome.blade.php), con los archivos de funciones (: public/js/app.js) && (: public/js/edit.js).

## CONSTRUCCIÓN ARCHIVO JSON (Persistencia de datos):

- Primero debemos utilizar una libreria desarrollada para el consumo de API's en Laravel llamada Guzzle (ref: http://docs.guzzlephp.org/en/stable/), la cual genera un cliente que realiza la petición a la api, y resive los datos que requerimos.
- Podemos encontrar la solicitus en el controlador ViewController@create, el cual se encarga de traer toda la información de la API.
- Los datos resividos corresponden a un String Codificado, por ende lo convertimos a JSON con la funcion "json_decode" de php.
- Evitamos que el archivo se vuelva a crear si ya existe con la función "file_exists" de php.
- Creamos el archivo que contendra nuestros datos con la función "fopen" de php.
- Persistimos los datos  convirtiendo el JSON en una representacion de este en string.

## LISTAR LOS DATOS ALMACENADOS
- Con el uso de JavaScript obtenemos la información de nuestro archivo JSON con el metodo "open();" y "send();".
- Luego obtenemos el ID del elemento en donde queremos renderizar la información con el metodo "getElementById();"
- Luego enviamos los datos mediante el metodo "innerHTML".

## CREAR Y ALMACENAR NUEVO JUGADOR:
- Frontend: Con JavaScript obtenemos los datos correspondientes a los equipos para que puedan ser listados y seleccionados en la creación del nuevo jugador.

-Backend: Resivimos los datos del formulario, con los cuales empesamos a crear nuestro nuevo objeto, incluyendo el equipo con el cual almacenamos todos los datos correspondientes a ese equipo en el jugador. Resivimos los datos de los archivos JSON y lo transformamos en un arreglo de objetos de tal manera que podremos agregar un nuevo objeto al final del arreglo. 


## EDITAR Y ALMACENAR JUGADOR:
- Frontend: Con JavaScript obtenemos los datos correspondientes al Jugador y todos los equipos para que puedan ser listados y seleccionados en la creación del nuevo jugador. En la vista encontramos los datos d este jugador para editarlos.

-Backend: Resivimos los datos del formulario, con los cuales empesamos ciclar y buscamos el objeto en nuestro arreglo del archivo JSON que corresponde al editado, de esta manera modificamos sus campos corresondientes. luego persistimos los datos regrabando todo el nuevo arreglo en nuestro JSON transformandolo en un string para escritura. 

## ELIMINAR JUGADOR:

-Backend: Mediante un boton generado por JavaScript que contiene el url unico para la eliminación del objeto en nuestro JSON; para la eliminación utilizamos las funciones:
    - unset: para la eliminación del dato en nuestro arreglo de objetos.
    - array_values: Para reorganizar el arreglo de tal manera que el espacio en blanco dejado por el comando anterior sera ocupado por el elemento siguiente.

## Laravel: 

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.