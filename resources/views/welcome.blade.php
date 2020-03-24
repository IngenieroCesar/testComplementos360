<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
    <body>
        <div class="container">
            <div class="row justify-content-center">

                <div class=" col-md-12 ">
                    <div class="">
                        <form action="{{route('prueba.create')}}" method="GET">
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Cargar Api</button>
                                {{-- Boton que se encarga de cargar los datos del archivo JSON --}}
                                <button type="button" class="btn btn btn-success" id="button">Cargar ó Filtrar</button>
                                <button id="btncrearjugador" type="button" class="btn btn-primary " data-toggle="modal" data-target="#crearjugador">
                                    Crear Jugador
                                </button>
                            </div>

                        </form>
                        <div class="input-group mb-3">
                            <input type="text" id="filtro" class="form-control" placeholder="Example: Grizzlies" aria-label="Example: Grizzlies" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">Filtro: Nombre  Posición  Equipo</span>
                            </div>
                          </div>
                   </div>

                    <!-- Button trigger modal -->

                    <!-- Modal crear jugador-->
                    <div class="modal fade" id="crearjugador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Crear Jugador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <form action="{{route('store_prueba')}}" method="POST">
                                @csrf
                                <div class="modal-body">                           
                                    <div class="form-group">
                                        <label for="first_name">Nombre</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="height_feet">Altura</label>
                                        <input type="text" class="form-control" id="height" name="height_feet" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Apellido</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Posición</label>
                                        <select class="form-control" id="position" name="position" required>
                                          <option>C</option>
                                          <option>G</option>
                                          <option>F</option>
                                          <option>C-G</option>
                                          <option>C-F</option>
                                          <option>G-F</option>
                                        </select>
                                      </div>
                                    {{-- Aca debo traer los nombres de los equipos:  (LISTO)/ --}}
                                    <div class="form-group">
                                        <label for="team">Equipo</label>
                                        <select class="form-control" id="team" name="team" required>
                                            {{-- LOS EQUIPOS SON ADQUIRIDOS DESDE EL ARCHIVO JSON DE EQUIPO
                                            Y CON LISTADOS PARA GUARDARLOS COMO UN OBJETO EN CADA JUGADOR --}}
                                        </select>
                                    </div>                           
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    {{-- End Modal --}}
                </div>
                <div class=" col-md-8">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Position</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="response">
                            {{-- Datos cargados mediante JavaScript --}}
                        </tbody>
                      </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>         <!-- Compiled and minified JavaScript -->
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
         <script src="{{secure_asset('js/multisort.js')}}"></script>
         <script src="{{secure_asset('js/app.js')}}"></script>
         <script>
            //Cargamos los Jugadores al carga la pagina:
            window.onload=traerDatos;
        </script>

    </body>
</html>
