function multisort (campoDeOrdenacion){
    var matrizDeCampoOrdenada = new Array();
    let matrizFinalOrdenada = new Array();
    for (var i in this){
        var datoParaCopiar = this[i][campoDeOrdenacion];
        if (datoParaCopiar == undefined) continue;
        matrizDeCampoOrdenada.push(datoParaCopiar);
    }
    matrizDeCampoOrdenada.sort();
    for (var i in matrizDeCampoOrdenada){
        for (var j in this){
            var dato = this[j][campoDeOrdenacion];
            if (dato == undefined || dato != matrizDeCampoOrdenada[i]) continue;
            matrizFinalOrdenada.push(this[j]);
        }
    }
    return matrizFinalOrdenada;
}

Array.prototype.multisort = multisort;