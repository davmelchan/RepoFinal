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
$(document).ready(function() {
    // Manejar el evento de cambio en la barra de búsqueda
    $('#barraBusqueda').on('input', function() {
        let filtro = $(this).val().toLowerCase();

        // Filtrar los elementos dentro del contenedor
        $('#contenedor .objeto').each(function() {
            let textoElemento = $(this).text().toLowerCase();
            $(this).toggle(textoElemento.indexOf(filtro) > -1);
        });
    });
    $('#barraBusqueda2').on('input', function() {
        let filtro = $(this).val().toLowerCase();

        // Filtrar los elementos dentro del contenedor
        $('#contenedor .objeto').each(function() {
            let textoElemento = $(this).text().toLowerCase();
            $(this).toggle(textoElemento.indexOf(filtro) > -1);
        });
    });



});








/*Modal para agregar asignaciones */

const btnAsignacion = document.getElementById("btnAsignacion");
const modal = document.getElementById("ModalAsignacion");
const mymodal = new bootstrap.Modal(modal);
const titulo2 = document.getElementById("tituloModal");
const btnGuardar = document.getElementById("btnGuardar");
btnAsignacion.addEventListener("click", function () {
    btnGuardar.innerHTML="Guardar";
    mymodal.show();
    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1
    });
    formulario.reset();
    titulo2.innerHTML = "Agregar Evaluación";
    $('#UnidadId').val(0).trigger("change");
    $('#Empresa').val(0).trigger("change");

});

function editar(info)
{
    titulo2.innerHTML = "Actualizar Evaluación";
    btnGuardar.innerHTML = "Actualizar";
    mymodal.show();
    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1
    });
    $('#IdEvaluacion').val(info.IdEvaluacion);
    $('#Titulo').val(info.Nombre);
    $('#UnidadId').val(info.IdUnidad).trigger("change");
    $('#TipoId').val(info.IdTipo).trigger("change");
    $('#grupoId').val(info.IdGrupo);
    $('#Descripcion').val(info.Descripcion);

    $('#puntaje').val(info.Puntaje);
    titulo2.innerText = "Actualizar Evaluación";

}

/*Modal de eliminar la informacion*/
function eliminar(){
    Swal.fire({
        title: '¿Estas seguro de esta evaluacion?',
        text: "Los cambios no son reversibles",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.reload();
        }
    })



}



