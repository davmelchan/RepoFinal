

// Desactivar el botón de cerrar por defecto
$(document).ready(function () {

    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1,


    });

    $('#staticBackdrop').modal({
        backdrop: 'static',
        keyboard: false
    });

    // Habilitar el botón de cerrar cuando se haga clic en el botón personalizado

    $('#miCheckbox').change(function() {
        // Realiza la acción inmediata al cambiar el estado del checkbox
        realizarAccion();
    });


});


var miInput = document.getElementById('IdGrupo');

miInput.addEventListener('input', function() {
    var valor = miInput.value;

    if (valor.length > 8) {
        miInput.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
    }
});



function realizarAccion(){
    var checkbox = document.getElementById("miCheckbox").checked;
    let inputEmpresa = document.getElementById("nombreEmpresa");
    let seleccion = document.getElementById("seleccion");
    let frmDescripcion = document.getElementById("frmDescripcion");
    let frmResponsable= document.getElementById("frmResponsable");
    let miInput = document.getElementById('Telefono');

    miInput.addEventListener('input', function() {
        let valor = miInput.value;
        if (valor.length > 8) {
            miInput.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
        }

        miInput.value = valor.replace(/\D/g, '');


    });
    let frmTelefono = document.getElementById('frmTelefono');
    if (checkbox){
        inputEmpresa.removeAttribute("hidden")
        inputEmpresa.setAttribute("required","required");
        $('.company').val('').trigger('change');
        seleccion.setAttribute("hidden","hidden");
        seleccion.removeAttribute("required");
        inputEmpresa.removeAttribute("hidden")
        frmDescripcion.removeAttribute("hidden");
        frmDescripcion.setAttribute("required","required");
        frmResponsable.removeAttribute("hidden");
        frmResponsable.setAttribute("required","required");
        frmTelefono.removeAttribute("hidden");
        frmTelefono.setAttribute("required","required");

    }else{
        inputEmpresa.setAttribute("hidden","hidden");
        seleccion.removeAttribute("hidden");
        seleccion.setAttribute("required","required");
        frmDescripcion.setAttribute("hidden","hidden");
        frmResponsable.setAttribute("hidden","hidden");
        frmTelefono.setAttribute("hidden","hidden");
        frmDescripcion.removeAttribute("required");
        frmResponsable.removeAttribute("required");
        inputEmpresa.removeAttribute("required");
        frmTelefono.removeAttribute("required");
        $('#EmpresaName').val('');
        $('#Descripcion').val('');
        $('#Responsable').val('');
        $('#Telefono').val('');


    }

}


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

