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

});

function editar(info)
{

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



