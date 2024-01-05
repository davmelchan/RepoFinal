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



/*Modal para las unidades de clase */

const btnUnidad = document.getElementById("AddUnidad");
const modalUnidad = document.getElementById("Modalunidad");
const unitModal = new bootstrap.Modal(modalUnidad);
const btnEditar = document.getElementById('btnEditar');

let titulo = document.getElementById('exampleModalLabel');
let btnGuardar = document.getElementById('btnGuardar');
let formulario =document.getElementById('formulario');

btnUnidad.addEventListener("click", function () {
    unitModal.show();
    titulo.innerText = 'Agregar nueva unidad';
    btnGuardar.innerText = 'Guardar';
    formulario.reset();
});

function editar(info){

    unitModal.show();
    titulo.innerText = 'Actualizar unidad';
    btnGuardar.innerText = 'Actualizar';
    $('#IdUnidad').val(info.IdUnidad);
    $('#NombreUnidad').val(info.Nombre);

}

