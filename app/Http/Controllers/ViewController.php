<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

            return view('welcome');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    //Creamos nuestro archivo JSON como nuestra base de datos
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.balldontlie.io',
            // You can set any number of default request options.
            // 'timeout'  => 5.0,
        ]);
    //Realizamos el reques a nustra API
        $response = $client->request('GET', '/api/v1/players');
        $body = $response->getBody()->getContents();
    //Establecemos el JSON de nuestros datos:
        //Arreglo para almacenar datos de todos los jugadores
        $posts = json_decode($body)->data;
        //Arreglo para almacenar datos de los equipos:
        $teams = array();               
        //Establecemos la ruta donde guardaremos nuestro archivo.
        $path = public_path('jsondb/jugadores.json');
        $pathteam = public_path('jsondb/team.json');

    //Debo establecer la condición para que no se vuelva a crear si ya exista! (LISTO)
        if(file_exists($path)){
            return redirect('/prueba');
        }else{
        //almacenamos los jugadores en el archivo JSON:
            $handler = fopen($path, "w+");
            fwrite($handler, json_encode($posts));
            fclose($handler);
        //almacenamos los equipos, para guardarlos en un archivo JSON:
            //CONTADOR PARA CREACIÓN DE DATOS UNICOS EN ARREGLO:
            $contador = 0;
            foreach ($posts as $key => $post) {
                //si no contiene datos agregamos el primero
                if($contador == 0){
                    array_push($teams, $post->team );
                    $contador++;
                }else{                    
                //si ya tiene datos el arreglo validamos que no se repita para agregar un dato nuevo:
                    for ($i=0; $i < count($teams) ; $i++) { 
                        if($teams[$i]->id != $post->team->id){
                            //Si no se repite la validación permitira agregar el dato:
                            $validación = false;
                        }else{
                            //al repetirse la validación no permitira agregar el dato:
                            $validación = true;
                            break;
                        }
                    }
                //Resive la validación de si se repite o no para agregar o no el dato:
                    if($validación == false){
                        array_push($teams, $post->team );
                        $contador++;
                    }
                }
            }
            //abrimos archivo de equipos para escritura:
            $teamfile = fopen($pathteam, "w+");
            fwrite($teamfile, json_encode($teams));
            fclose($teamfile);
           
            return redirect('/prueba');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //Traemos nuestro archivo JSON de jugadores
        $path = public_path('jsondb/jugadores.json');
        $data = file_get_contents($path);
        //  dd($data);
        $jugadores = json_decode($data, true);
        $tamaño = count($jugadores);
         
    //Traemos nuestro archivo JSON con los equipos:
        $pathteam = public_path('jsondb/team.json');
        $datateam = file_get_contents($pathteam);
        $teams = json_decode($datateam, true);
        
    //Buscamos el equipo correspondiente con el nombre enviado por el formulario:
    foreach ($teams as $team) {
        
        if ($request->team == $team['full_name']) {
        //Al encontrar el equipo correspondiente procedemos a almacenar nuestro nuevo jugador y su equipo
        $contenido_arr = [
            "id" => $tamaño,
            "first_name" => $request->first_name,
            "height_feet" => $request->height_feet,
            "height_inches" => $request->height_feet,
            "last_name" => $request->last_name,
            "position" => $request->position,
            "team" => $team_arr[] = [
                "id" => $team['id'],
                "abbreviation" => $team['abbreviation'],
                "city" => $team['city'],
                "conference" => $team['conference'],
                "division" => $team['division'],
                "full_name" => $team['full_name'],
                "name" => $team['name']
            ],
            "weight_pounds" => null
            ];
        break;
        }
    }
       
        array_push($jugadores, $contenido_arr);
        $json = json_encode($jugadores);
        file_put_contents($path, $json);        
        return redirect('/prueba');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //Traemos nuestro archivo JSON de jugadores
        $path = public_path('jsondb/jugadores.json');
        $data = file_get_contents($path);
        $jugadores = json_decode($data, true);
        $tamaño = count($jugadores);
           
      //Buscamos el equipo correspondiente con el nombre enviado por el formulario:
        foreach ($jugadores as $jugador) {
            
            if ($id == $jugador['id']) {
                $team = $jugador['team'];
                return view('edit', compact("jugador", "team"));
            }            
        }         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //Traemos nuestro archivo JSON de jugadores
        $path = public_path('jsondb/jugadores.json');
        $data = file_get_contents($path);
        $jugadores = json_decode($data, true);
        $tamaño = count($jugadores);

        //Traemos nuestro archivo JSON con los equipos:
        $pathteam = public_path('jsondb/team.json');
        $datateam = file_get_contents($pathteam);
        $teams = json_decode($datateam, true);
        //CICLAMOS PARA ENCONTRAR EL EQUIPO RESIVIDO Y AGREGAR TODOS SUS DATOS:
        for ($i=0; $i < $tamaño ; $i++) { 
            # code...
        
            //Encontramos el jugador con el ID resivido por el formulario:
            if ($id == $jugadores[$i]['id']) {

                $jugadores[$i]['first_name'] = $request->first_name;
                $jugadores[$i]['height_feet'] = $request->height_feet;
                $jugadores[$i]['last_name'] = $request->last_name;
                $jugadores[$i]['position'] = $request->position;

                $jugadores[$i]['weight_pounds'] = null;
                foreach($teams as $team){
                    //Encontramos el equipo con el seleccionado por el formulario para actualizar
                    //todos los datos del equiipo del jugador:
                    if($request->team == $team['full_name']){
                        $jugadores[$i]['team'] = [
                            "id" => $team['id'],
                            "abbreviation" => $team['abbreviation'],
                            "city" => $team['city'],
                            "conference" => $team['conference'],
                            "division" => $team['division'],
                            "full_name" => $team['full_name'],
                            "name" => $team['name']
                        ];
                        break;
                    }
                }
                
                break;
            }            
        }   
        
        //guardamos de nuevo todo el archivo:
        $jugadoresfile = fopen($path, "w+");
        fwrite($jugadoresfile, json_encode($jugadores));
        fclose($jugadoresfile);
        return redirect('/prueba');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //Traemos nuestro archivo JSON de jugadores
        $path = public_path('jsondb/jugadores.json');
        $data = file_get_contents($path);
        $jugadores = json_decode($data, true);
        $tamaño = count($jugadores);

        for ($i=0; $i < $tamaño ; $i++) { 
        
            //Encontramos el jugador con el ID resivido por el formulario:
            if ($id == $jugadores[$i]['id']) {
                //Eliminamos el registro de nuestro arreglo:
                unset($jugadores[$i]);
            }            
        }  
        //Ordenamos nuevamente posiciónes de nuestro arreglo:
        $jugadores = array_values($jugadores);

        //guardamos de nuevo todo el archivo:
        $jugadoresfile = fopen($path, "w+");
        fwrite($jugadoresfile, json_encode($jugadores));
        fclose($jugadoresfile);
        return redirect('/prueba');
        
    }
}
