<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('prueba', 'ViewController');
Route::post('prueba', 'ViewController@store')->name('store_prueba'); 
//Generamos esta ruta para facilitar la identificación de la ruta que queremos;
Route::get('prueba/{id}/destroy', 'ViewController@destroy')->name('destroy_prueba');

//Prueba de uso de libreria para APIS!

// use GuzzleHttp\Client;

// Route::get('/', function () {

// $client = new Client([
//     // Base URI is used with relative requests
//     'base_uri' => 'https://www.balldontlie.io',
//     // You can set any number of default request options.
//     // 'timeout'  => 5.0,
// ]);
//     //Realizamos el reques a nustra API
//     $response = $client->request('GET', '/api/v1/players');
//     $body = $response->getBody()->getContents();
//     //Establecemos el JSON de nuestros datos
//     $posts = json_decode($body)->data;
//     //Establecemos la ruta donde guardaremos nuestro archivo.
//     $path = public_path('jsondb/jugadores.json');
    
//     $handler = fopen($path, "w+");
//     fwrite($handler, json_encode($posts));
//     fclose($handler);

    


//     return view('welcome', compact('posts'));
// });


