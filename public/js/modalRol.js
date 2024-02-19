var tabla;
$(document).ready(function()
    {



      tabla =  $('.tablota').dataTable({
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
    tabla = $('.tablota').DataTable({
        responsive: true,

        // Otras opciones...
    });
});




var tablon;
$(document).ready(function()
    {



        tablon =  $('.tablita').dataTable({
            responsive:true,
            lengthChange: false,
            paging: false,
            dom: '<"row"<"col-sm-6"f><"col-sm-6"l>>rtip',
            searching: false
        });

    }
);


$(window).resize(function () {
    // Destruir DataTables
    tabla.destroy();

    // Volver a inicializar DataTables
    tabla = $('.tablita').DataTable({
        responsive: true,
        lengthChange: false,
        paging: false,
        dom: '<"row"<"col-sm-6"f><"col-sm-6"l>>rtip'
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



function eliminar(ruta,id){

    Swal.fire({
        title: '¿Estás seguro de eliminar el rol?',
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


const modal3 = document.getElementById("ModalPermisos");
const mymodal3 = new bootstrap.Modal(modal3);
const formulario3 = document.getElementById('formulario-Permiso');
function permiso(id){

    $('#pId').val(id);

}


function guardar(ruta){
    var formData = new FormData($('#formulario-Permiso')[0]);

    // Realiza la llamada AJAX
    $.ajax({
        type: 'POST',
        url: ruta,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Si la llamada es exitosa, puedes cerrar el modal, mostrar un mensaje, etc.
            console.log(response.success);


       /*     Swal.fire({
                position: 'center',
                icon: 'success',
                title: response.success,
                showConfirmButton: false,
                timer: 1500
            });

            setTimeout(function() {
                window.location.reload();
            }, 1550);
*/

        },
        error: function(xhr) {
            Swal.fire(
                'Error',
                xhr.responseJSON.errors,
                'error'
            )


        }
    })

}
