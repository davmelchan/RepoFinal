var tabla;
$(document).ready(function()
    {



        tabla =  $('.table').dataTable({
            responsive:true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Registros no encontrados",
                "info": "Mostrando páginas _PAGE_ de _PAGES_",
                "infoEmpty": "Información no disponible",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": 'Buscar:',
                'paginate':{
                    'next':'Siguiente',
                    'previous':'Anterior'
                }
            }


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

function eliminar(ruta,id){

    Swal.fire({
        title: '¿Estás seguro de eliminar esta unidad?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
// Enviar el formulario de eliminación

            $.ajax({
                type: 'DELETE',
                url: ruta.replace(':id',id),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1550);

                },
                error: function(xhr,status,error) {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: xhr.responseJSON.error,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });










        }
    });




}
