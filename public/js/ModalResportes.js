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
        $('.timepicker').timepicker({
            'disableTimeRanges': [
                ['12am', '6am'],
                ['7pm', '11:31pm']
            ]
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



const modal = document.getElementById('ModalSupervision');
const mymodal = new bootstrap.Modal(modal);
const form = document.getElementById('formulario');
const titulo = document.getElementById('exampleModalLabel');
const btn = document.getElementById('btnGuardar');
function crearReporte(id){
    mymodal.show();
    form.reset();
    btn.innerText="Guardar";
    $('#EstudianteId').val(id);
    function actualizarContador() {
        var textarea = document.getElementById('Observacion');
        var contador = document.getElementById('contador');
        var maxLength = textarea.getAttribute('maxlength');
        var longitudActual = textarea.value.length;
        var caracteresRestantes = maxLength - longitudActual;
        contador.textContent = caracteresRestantes + ' caracteres restantes';
    }
    actualizarContador();

// Vincular el evento de entrada del usuario al textarea
    var textarea = document.getElementById('Observacion');
    textarea.addEventListener('input', actualizarContador);



}

function editarReporte(id,info){
    mymodal.show();

    $('#EstudianteId').val(id);
    $('#Area').val(info.Area);
    $('#RolAsignado').val(info.RolAsignado);
    $('#HoraEntrada').val(info.HoraEntrada);
    $('#HoraSalida').val(info.HoraSalida);
    $('#Observacion').val(info.Observacion);
    $('#HorasPracticas').val(info.HorasPracticas);
    btn.innerText="Actualizar";
    function actualizarContador() {
        var textarea = document.getElementById('Observacion');
        var contador = document.getElementById('contador');
        var maxLength = textarea.getAttribute('maxlength');
        var longitudActual = textarea.value.length;
        var caracteresRestantes = maxLength - longitudActual;
        contador.textContent = caracteresRestantes + ' caracteres restantes';
    }
    actualizarContador();

// Vincular el evento de entrada del usuario al textarea
    var textarea = document.getElementById('Observacion');
    textarea.addEventListener('input', actualizarContador);

}

function guardar(ruta){
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


