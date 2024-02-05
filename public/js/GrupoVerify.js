$(document).ready(function () {
    $('#staticBackGroup').modal({
        backdrop: 'static',
        keyboard: false
    });


});

var miInput = document.getElementById('IdGrupo');

miInput.addEventListener('input', function() {
    var valor = miInput.value;

    if (valor.length > 8) {
        miInput.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
    }
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
            window.location.href = window.location.href + '?nocache=' + new Date().getTime();

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


