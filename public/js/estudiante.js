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
        // Otras opciones...
    });
});

let miInput = document.getElementById('Telefono');

miInput.addEventListener('input', function() {
    let valor = miInput.value;

    if (valor.length > 8) {
        miInput.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
    }

    // Remover caracteres no numéricos


    // Actualizar el valor del input
    miInput.value = valor.replace(/\D/g, '');


});

let miInput2 = document.getElementById('identificador');
miInput2.addEventListener('input', function() {
    let valor = miInput2gi.value;

    if (valor.length > 8) {
        miInput2.value = valor.slice(0, 8); // Limita la longitud del texto a 10 caracteres
    }

    // Remover caracteres no numéricos

    // Actualizar el valor del input
    miInput2.value =  valor.replace(/\D/g, '');


});

const btnUsuario = document.getElementById("btnUsuarios");
const modal = document.getElementById("ModalUsuarios");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById("exampleModalLabel");
let btnGuardar= document.getElementById("btnGuardar");
let password =document.getElementById("Clave");

btnUsuario.addEventListener("click",function(e){
   mymodal.show();

   titulo.innerText="Agregar estudiante";
   btnGuardar.innerText="Guardar";

    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1
    });
    formulario.reset();
    password.setAttribute("required","required");
    $('#Empresa').val("").trigger("change");
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

    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1
    });
    titulo.innerText="Actualizar datos del estudiante";
    btnGuardar.innerText="Actualizar";
    $('#NombreEstudiante').val(info.Nombres);
    $('#ApellidoEstudiante').val(info.Apellidos);
    $('#Genero').val(info.idGenero);
   $('#Direccion').val(info.Direccion);
   $('#identificador').val(info.Identificacion);
   $('#Telefono').val(info.Telefono);
   $('#Empresa').val(info.idEmpresa).trigger("change");
    password.removeAttribute("required");


}
