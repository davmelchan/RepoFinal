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


    let miInput = document.getElementById('Telefono');

    miInput.addEventListener('input', function() {
        let valor = miInput.value;
        if (valor.length > 8) {
            miInput.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
        }

        miInput.value = valor.replace(/\D/g, '');


    });





});



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
    titulo.innerText="Actualizar centro de prácticas";
    btnGuardar.innerText="Actualizar";
    $('#IdEmpresa').val(info.IdEmpresa);
    $('#NombreEmpresa').val(info.Nombre);
    $('#Descripcion').val(info.Descripcion);
    $('#Responsable').val(info.Responsable);
    $('#Telefono').val(info.TelResponsable);


}

function eliminar(ruta,id){

    Swal.fire({
        title: '¿Estás seguro de eliminar este centro de prácticas?',
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
