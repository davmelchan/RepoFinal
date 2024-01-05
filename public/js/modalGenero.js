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





const btnGenero = document.getElementById("btnGenero");
const modal = document.getElementById("ModalGenero");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById('exampleModalLabel');
let btnGuardar = document.getElementById('btnGuardar');
let formulario = document.getElementById('formulario');
btnGenero.addEventListener("click", function () {

    mymodal.show();
    titulo.innerText = "Guardar género";
    btnGuardar.innerText= "Guardar";
    formulario.reset();

});

function editar(info){
mymodal.show();

titulo.innerText = "Actualizar género";
btnGuardar.innerText= "Actualizar";
    $('#IdGenero').val(info.IdGenero);
    $('#NombreGenero').val(info.Nombre);
}
