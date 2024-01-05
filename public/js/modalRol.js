var tabla;
$(document).ready(function()
    {



      tabla =  $('.table').dataTable({
            responsive:true,



        });

    }
);

$(window).resize(function () {
    // Destruir DataTables
    tabla.destroy();

    // Volver a inicializar DataTables
    tabla = $('.table').DataTable({
        responsive: true,
        // Otras opciones...
    });
});
const btnRol = document.getElementById("btnRol");
const modal = document.getElementById("ModalRol");
const mymodal = new bootstrap.Modal(modal);
const formulario = document.getElementById('formulario');

btnRol.addEventListener("click", function () {
    mymodal.show();
    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnGuardar');
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
    let btnFormulario = document.getElementById('btnGuardar');
    titulo.innerText = 'Actualizar rol';
    btnFormulario.innerText = 'Actualizar';

    ///datos formulario

    $('#IdRol').val(info.IdRol);
    $('#NombreRol').val(info.Nombre);

    /*
    IdRol
    * */
}








