const modal = document.getElementById("EvInfo");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById("tituloModal");


let miInput = document.getElementById('not');
miInput.addEventListener('input', function() {
    let valor = miInput.value;

    miInput2.value =  valor.replace(/\D/g, '');
});


function mostrar(titu,tituloEv,descripcion,unidad,tipo,puntos){
    mymodal.show();


    titulo.innerText= `Información de la  ${titu}`;
    $('#Titulo').val(tituloEv);
    $('#unidad').val(unidad);
    $('#tipo').val(tipo);
    $('#Descripcion').val(descripcion);
    $('#puntaje').val(puntos);


}
const modal1 = document.getElementById("EvCompany");
const mymodal1 = new bootstrap.Modal(modal1);
function mostrarEmpresa(){
    mymodal1.show();

}
const modal2 = document.getElementById("ModalEvCompany");
const mymodal2 = new bootstrap.Modal(modal2);
const btnModal = document.getElementById("btnModal");
const TituloModal = document.getElementById("exampleModalLabel");
const frm = document.getElementById("formulario-Correccion");
function edicion(estudiante,empresa,maestro,inicio,final,nota){
    mymodal2.show();
    $('#IdMaestro').val(estudiante);
    $('#IdEmpresa').val(empresa);
    $('#IdEstudiante').val(maestro);
    $('#Fechainicio').val(inicio);
    $('#Fechafinal').val(final);
    $('#Nota').val(nota);
    btnModal.innerText="Actualizar";
    TituloModal.innerText="Actualizar datos de la valoración";
}

function valoracion(estudiante,empresa,maestro){
    mymodal2.show();
    frm.reset();
    btnModal.innerText="Guardar";
    TituloModal.innerText="Agregar datos de la valoración";

    $('#IdMaestro').val(estudiante);
    $('#IdEmpresa').val(empresa);
    $('#IdEstudiante').val(maestro);
}
function validarNumero(event) {
    // Obtener el valor actual del campo de entrada
    const valorInput = event.target.value;

    // Validar si el último carácter ingresado es un número
    const esNumero = /^[0-9]*$/.test(valorInput);

    // Si no es un número, establecer el valor a 0
    if (!esNumero) {
        event.target.value = 0;
    }
}



function guardarValoracion(ruta){

    var formData = new FormData($('#formulario-Correccion')[0]);

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
