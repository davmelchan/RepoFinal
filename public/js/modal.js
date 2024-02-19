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

let miInput2 = document.getElementById('identificador');
miInput2.addEventListener('input', function() {
    let valor = miInput2.value;

    if (valor.length > 8) {
        miInput2.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
    }


});





/*Modal para los usuarios */

const btnUsuario = document.getElementById("btnUsuarios");
const modal = document.getElementById("ModalUsuarios");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById("exampleModalLabel");
let btnGuardar = document.getElementById("btnGuardar");
let formulario = document.getElementById("formulariov");
let password = document.getElementById("Clave");
let inputId = document.getElementById("idform");
let frmIdentificador = document.getElementById("frmIdentificador");
let vIdentificacion = 0;
btnUsuario.addEventListener("click", function () {

    mymodal.show();
    titulo.innerText="Agregar datos del usuario";
    btnGuardar.innerText="Guardar";
    password.setAttribute("required","required");
    $(".rolon").select2({
        dropdownParent: $("#formulariov"),
        maximumSelectionLength: 1
    });
    formulario.reset();
    frmIdentificador.removeAttribute("hidden");
    inputId.value = 1;
    $('#Roles').val("").trigger("change");
    vIdentificacion= 1;
});




function guardar(ruta){

if(vIdentificacion==1){
    Swal.fire({
        title: '¿Estás seguro de guardar los datos?',
        text: 'El identificador no podra ser modificado',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData($('#formulariov')[0]);

            // Realiza la llamada AJAX
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
    });
}else{

    var formData = new FormData($('#formulariov')[0]);

    // Realiza la llamada AJAX
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


}














function editar(info,rolo){
    mymodal.show();
    $(".rolon").select2({
        dropdownParent: $("#formulariov"),
        maximumSelectionLength: 1
    });
    titulo.innerText="Actualizar datos del usuario";
    btnGuardar.innerText="Actualizar"
    frmIdentificador.setAttribute("hidden",true);
    $('#NombreMaestro').val(info.Nombres);
    $('#ApellidoMaestro').val(info.Apellidos);
    $('#IdGenero').val(info.idGenero);
    $('#Especialidad').val(info.especialidad);
    $('#identificador').val(info.Identificacion);
    $('#Roles').val(rolo).trigger("change");
    password.removeAttribute("required");
    inputId.value = "";
    vIdentificacion= 0;
}

function eliminar(ruta,id){

    Swal.fire({
        title: '¿Estás seguro de eliminar este maestro?',
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
