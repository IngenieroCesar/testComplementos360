//Lectura del archivo json:
document.querySelector('#button').addEventListener('click', traerDatos);
document.querySelector('#filtro').addEventListener('keypress', traerDatos);

function traerDatos(){
    const xhttp = new XMLHttpRequest();
    //Abrimos nuestro archivo, estrablecemos que queremos que sea asincrono

    //TENGO QUE HACER COMPROBACIÓN DEL ARCHIVO EXISTENTES (Sin hacer)
    xhttp.open('GET', '../jsondb/jugadores.json', true);
    xhttp.send();
    //conseguimos nuestra respuesta
    xhttp.onreadystatechange = function(){
        //si resivimos correctamente nuestro archivo:
        if(this.readyState == 4 && this.status == 200){
            //Transformamos los datos resividos de texto a JSON
            let datos = JSON.parse(this.responseText);
            //Obtenemos nuestra tabla
            let res = document.querySelector('#response');
            res.innerHTML = '';

    //Ordenamos el arreglo con los datos: (Fuente: https://eldesvandejose.com/2018/02/27/ordenar-matrices-en-javascript/)
        console.log(datos);
        var matrizDePaises = datos;
        console.log(matrizDePaises);
        var matrizOrdenadaDePaises = matrizDePaises.multisort('last_name');
        console.log(matrizOrdenadaDePaises);
        
    //Filtrado por nombre, posición y equipo.
        //Obtenemos datos de input filtro:
        let filtro = document.getElementById('filtro').value
            if(filtro){
                console.log(filtro);

                matrizOrdenadaDePaises = matrizOrdenadaDePaises.filter(function(el){

                    if(el.team.name == filtro){
                        return (el.team.name == filtro);
                    }else if(el.first_name == filtro){
                        return (el.first_name == filtro);
                    }else if(el.position == filtro){
                        return (el.position == filtro);
                    }
                });
            }

        //imprimimos los datos generados o filtrados
            for(let jugador of matrizOrdenadaDePaises){
                res.innerHTML += `
                <tr>
                    <th id="resultado" cope="row">${jugador.id}</th>
                    <td id="resultado">${jugador.first_name}</td>
                    <td id="resultado">${jugador.last_name}</td>
                    <td id="resultado">${jugador.position}</td>
                    <td id="resultado">${jugador.team.name}</td>
                    <td id="acciones">
                    <a class="btn btn-warning" href="prueba/${jugador.id}/edit" role="button">Editar</a>
                    <a class="btn btn-danger" href="prueba/${jugador.id}/destroy" value="" role="button">Eliminar</a>
                    </td>
                </tr>
                `

            }
            
        }
    }
}

//Cargar equipos al formulario de crear jugador:
document.querySelector('#btncrearjugador').addEventListener('click', cargarEquipos);

function cargarEquipos(){
    const xhttp = new XMLHttpRequest();
//Abrimos nuestro archivo TEAM, estrablecemos que queremos que sea asincrono
    //TENGO QUE HACER COMPROBACIÓN DEL ARCHIVO EXISTENTES
    xhttp.open('GET', '../jsondb/team.json', true);
    xhttp.send();
    //conseguimos nuestra respuesta
    xhttp.onreadystatechange = function(){
        //si resivimos correctamente nuestro archivo:
        if(this.readyState == 4 && this.status == 200){
            //Transformamos los datos resividos de texto a JSON
            let datos = JSON.parse(this.responseText);
            //Obtenemos nuestra Selector Multiple
            let res = document.querySelector('#team');
            res.innerHTML = '';
        //imprimimos el nombre de cada uno de los equipos existentes:
            for(let team of datos){
                res.innerHTML += `
                <option>${team.full_name}</option>
                `
            }
        }
    }
}



    