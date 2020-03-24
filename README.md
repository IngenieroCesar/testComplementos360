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
-Los datos persistidos estan almacenados en los archivos (: public/jsondb/jugadores.json) && (: public/jsondb/team.json).
-El backend es manejado por el controlador (: ViewController.php).
-El frontend es manejado por javascript renderizando en la vista (: welcome.blade.php), con los archivos de funciones (: public/js/app.js) && (: public/js/edit.js).

## CONSTRUCCIÓN ARCHIVO JSON (Persistencia de datos):

- Primero debemos utilizar una libreria desarrollada para el consumo de API's en Laravel llamada Guzzle (ref: http://docs.guzzlephp.org/en/stable/), la cual genera un cliente que realiza la petición a la api, y resive los datos que requerimos.
- Podemos encontrar la solicitus en el controlador ViewController@create, el cual se encarga de traer toda la información de la API.
- Los datos resividos corresponden a un String Codificado, por ende lo convertimos a JSON con la funcion "json_decode" de php.
- Evitamos que el archivo se vuelva a crear si ya existe con la función "file_exists" de php.
- Creamos el archivo que contendra nuestros datos con la función "fopen" de php.
- Persistimos los datos  convirtiendo el JSON en una representacion de este en string.

## LISTAR LOS DATOS ALMACENADOS

## CREAR Y ALMACENAR NUEVO JUGADOR:



EDITAR Y ALMACENAR JUGADOR:

ELIMINAR JUGADOR:


Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
