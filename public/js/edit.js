//Cargar equipos al formulario de crear jugador:

function cargarEquipo(){
    const xhttp = new XMLHttpRequest();
//Abrimos nuestro archivo TEAM, estrablecemos que queremos que sea asincrono
    //TENGO QUE HACER COMPROBACIÓN DEL ARCHIVO EXISTENTES
    //Salimos dos nieles ya que nos encontramos en la carpeta prueba!!
    xhttp.open('GET', '../../jsondb/team.json', true);
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
        //Con esta variable resivimos el equipo del jugador para que 
        //sea selecciónado por default en el formulario:
            var equipo = document.getElementById("nameteam").value;
        //imprimimos el nombre de cada uno de los equipos existentes:
            for(let team of datos){
                //Condicionamos el equipo del jugador para establecerlo por defecto:
                if(equipo == team.full_name){
                    res.innerHTML += `
                    <option selected="true">${team.full_name}</option>
                    `
                }else{
                    res.innerHTML += `
                    <option>${team.full_name}</option>
                    `
                }


            }
        }
    }
}