const btnValoracion = document.getElementById("btnValoracion");
const modal = document.getElementById("ModalValoracion");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById('exampleModalLabel');
let btnGuardar = document.getElementById('btnGuardar');
let formulario = document.getElementById('formulario');
btnValoracion.addEventListener("click", function () {
    mymodal.show();
    titulo.innerText="Agregar categoría de supervisión";
    btnGuardar.innerText="Guardar";
    formulario.reset();
});

function editar(info){
 mymodal.show();
    titulo.innerText="Actualizar categoría de supervisión";
    btnGuardar.innerText="Actualizar";
    $('#IdValoracion').val(info.IdCatSupervision);
    $('#NombreValoracion').val(info.Nombre);

}

