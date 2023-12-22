const btnAspecto = document.getElementById("btnAspecto");
const modal = document.getElementById("ModalAspecto");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById('exampleModalLabel');
let btnGuardar = document.getElementById('btnGuardar');
let formulario = document.getElementById('formulario')
btnAspecto.addEventListener("click", function () {
    mymodal.show();
    titulo.innerText= "Guardar categoría de evaluación";
    btnGuardar.innerText="Guardar";
    formulario.reset();
});

function editar(info){
    mymodal.show();
    titulo.innerText= "Actualizar categoría de evaluación";
    btnGuardar.innerText="Actualizar";
    $('#IdAspecto').val(info.IdCatEvaluacion);
    $('#NombreAspecto').val(info.Nombre);
}
