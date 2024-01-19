const modal = document.getElementById("EvInfo");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById("tituloModal");


let miInput = document.getElementById('not');
miInput.addEventListener('input', function() {
    let valor = miInput.value;

    miInput2.value =  valor.replace(/\D/g, '');
});


function mostrar(titu,tituloEv,descripcion,unidad,tipo,puntos){
    mymodal.show();


    titulo.innerText= `Información de la  ${titu}`;
    $('#Titulo').val(tituloEv);
    $('#unidad').val(unidad);
    $('#tipo').val(tipo);
    $('#Descripcion').val(descripcion);
    $('#puntaje').val(puntos);


}


