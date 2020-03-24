<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editar jugador</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body >   


    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-md-12 ">
                <div class="header">
                    <h2>Editar</h2>
                </div>
                <form action="{{ url("prueba/{$jugador['id']}")}}" method="POST">
                    @csrf 
                    <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="first_name">Nombre</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$jugador['first_name']}}" required>
                        </div>
                        <div class="form-group">
                            <label for="height_feet">Altura</label>
                            <input type="text" class="form-control" id="height" name="height_feet" value="{{$jugador['height_feet']}}" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$jugador['last_name']}}" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Posición</label>
                            <select class="form-control" id="position" name="position" value="{{$jugador['position']}}" required>
                              <option>C</option>
                              <option>G</option>
                              <option>F</option>
                              <option>C-G</option>
                              <option>C-F</option>
                              <option>G-F</option>
                            </select>
                          </div>
                        {{-- Aca debo traer los nombres de los equipos:  (LISTO)/ --}}
                        <div  class="form-group" >
                            <label for="team">Equipo</label>
                            <input type="hidden" id="nameteam" value="{{$jugador['team']['full_name']}}"">
                            <select class="form-control" id="team" name="team" required>
                                {{-- LOS EQUIPOS SON ADQUIRIDOS DESDE EL ARCHIVO JSON DE EQUIPO
                                Y CON LISTADOS PARA GUARDARLOS COMO UN OBJETO EN CADA JUGADOR --}}
                            </select>
                        </div>                           
            
                        <a class="btn btn-secondary" href="{{route('prueba.index')}}" role="button">Volver</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
            
                </form>
            </div>
        </div>
    </div>

   

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>         <!-- Compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{secure_asset('js/edit.js')}}"></script>
    <script>
        //Cargamos los equipos en el selector aenas carga la pagina:
        window.onload=cargarEquipo;
    </script>

</body>
</html>