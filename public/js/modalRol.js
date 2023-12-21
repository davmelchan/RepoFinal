$(document).ready(function() {
    $('#myTable').DataTable({
        responsive: true,

});
});
const btnRol = document.getElementById("btnRol");
const modal = document.getElementById("ModalRol");
const mymodal = new bootstrap.Modal(modal);
const formulario = document.getElementById('formulario');

btnRol.addEventListener("click", function () {
    mymodal.show();
    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnFormulario');
    formulario.reset();
    titulo.innerText = 'Agregar nuevo rol';
    btnFormulario.innerText = 'Guardar';

});
/*
$('#btnEditar').click(function(e){
   mymodal.show();
    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnFormulario');
    titulo.innerText = 'Actualizar rol';

    btnFormulario.innerText = 'Actualizar';
});
*/
function editar(info){

    mymodal.show();

    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnFormulario');
    titulo.innerText = 'Actualizar rol';
    btnFormulario.innerText = 'Actualizar';

    ///datos formulario

    $('#IdRol').val(info.IdRol);
    $('#NombreRol').val(info.Nombre);

    /*
    IdRol
    * */
}








