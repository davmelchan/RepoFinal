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

    });
});




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

function eliminar(ruta,id){

    Swal.fire({
        title: '¿Estás seguro de eliminar esta categoría de supervisión?',
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

