const btnSupervision = document.getElementById("btnSupervision");
const modal = document.getElementById("ModalSupervision");
const mymodal = new bootstrap.Modal(modal);
const formulario = document.getElementById('formulario');
let titulo = document.getElementById('exampleModalLabel');
let btnFormulario = document.getElementById('btnGuardar');

btnSupervision.addEventListener('click',function(){
    mymodal.show();
    formulario.reset();
    titulo.innerText = "Agregar datos de supervisión";
    btnFormulario.innerText = "Guardar";
});


function guardarGrupo(ruta){
    var formData = new FormData($('#formulario')[0]);

    // Realiza la llamada AJAX
    $.ajax({
        type: 'POST',
        url: ruta,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Si la llamada es exitosa, puedes cerrar el modal, mostrar un mensaje, etc.


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
        error: function(xhr) {
            Swal.fire(
                'Error',
                xhr.responseJSON.errors,
                'error'
            )


        }
    })

}

function editar(info){
    mymodal.show();
    titulo.innerText = 'Actualizar datos de supervisión';
    btnFormulario.innerText = 'Actualizar';

    var partes = info.FechaSupervision.split('/');

    // Obtener las partes de la fecha
    var año = partes[2];
    var mes = partes[1];
    var día = partes[0];

    // Formatear la fecha como "YYYY-MM-DD"
    var fechaFormateada = año + '-' + mes + '-' + día;



    $('#IdSupervision').val(info.idSupervision);
    $('#Observacion').val(info.Observacion);
    $('#TipoSupervision').val(info.IdTipoSupervision);
    $('#FechaAgregar').val(fechaFormateada);

}

function eliminar(id,ruta){


    Swal.fire({
        title: '¿Estás seguro de eliminar la supervisión?',
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
                url: ruta.replace(':id', id),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {

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
                error: function (errores) {
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
