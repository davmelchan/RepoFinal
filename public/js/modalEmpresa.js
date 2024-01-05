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

const btnEmpresa = document.getElementById("btnEmpresa");
const modal = document.getElementById("ModalEmpresa");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById('exampleModalLabel');
let btnGuardar=document.getElementById('btnGuardar');
let formulario = document.getElementById('formulario')

btnEmpresa.addEventListener("click", function () {
    mymodal.show();
    titulo.innerText="Agregar centro de prácticas";
    btnGuardar.innerText="Guardar";
    formulario.reset();

});

function editar(info){
    mymodal.show();
    titulo.innerText="Actualizar centro de prácticas";
    btnGuardar.innerText="Actualizar";
    $('#IdEmpresa').val(info.IdEmpresa);
    $('#NombreEmpresa').val(info.Nombre);
    $('#Descripcion').val(info.Descripcion);
    $('#Responsable').val(info.Responsable);


}
