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

const btnActividad = document.getElementById("btnActividad");
const modal = document.getElementById('ModalActividades');
const myModal = new bootstrap.Modal(modal);
const frm = document.getElementById('formulario');
let titulo = document.getElementById("exampleModalLabel");
let btnModal = document.getElementById('btnModal');
function Abrirfrm(id){

    myModal.show();
    titulo.innerText = "Agregar datos de la actividad";
    btnModal.innerText = "Guardar";
    frm.reset();
    $('#IdEstudiante').val(id);

}

function guardarActividad(ruta){

    var formData = new FormData($('#formulario')[0]);
    $.ajax({
        type: 'POST',
        url: ruta,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Si la llamada es exitosa, puedes cerrar el modal, mostrar un mensaje, etc.


            Swal.fire({
                position: 'center',
                icon: 'success',
                title: response.success,
                showConfirmButton: false,
                timer: 1500
            });

            setTimeout(function () {
                window.location.reload();
            }, 1550);


        },
        error: function (xhr) {
            console.log(xhr);
            Swal.fire(
                'Error',
                xhr.responseJSON.errors,
                'error'
            )


        }
    })





}

function editar(info,inicio,fin){

    myModal.show();
    titulo.innerText="Agregar datos de la actividad";
    btnModal.innerText="Actualizar"
    let fechaInicio = document.getElementById('Fechainicio');
    let fechafinal =document.getElementById('Fechafinal');
    var partes = inicio.split('/');

    // Obtener las partes de la fecha
    var año = partes[2];
    var mes = partes[1];
    var día = partes[0];

    // Formatear la fecha como "YYYY-MM-DD"
    var fechaFormateada = año + '-' + mes + '-' + día;


    var partes1 = fin.split('/');

    // Obtener las partes de la fecha
    var año1 = partes1[2];
    var mes1 = partes1[1];
    var día1 = partes1[0];

    // Formatear la fecha como "YYYY-MM-DD"
    var fechaFormateada1 = año1 + '-' + mes1 + '-' + día1;
    $('#IdActividad').val(info.IdTracker);


    $('#Fechainicio').val(fechaFormateada);
    $('#Fechafinal').val(fechaFormateada1);
    $('#IdEstudiante').val(info.IdEstudiante);
    $('#Estado').val(info.Estado);
    $('#TituloActividad').val(info.Titulo);
}


    function eliminar(ruta,id){

        Swal.fire({
            title: '¿Estás seguro de eliminar esta actividad?',
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
                    type: 'POST',
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
                    error: function(errores) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: errores.error,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });










            }
        });




    }


