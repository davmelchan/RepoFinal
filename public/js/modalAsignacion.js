/*Modal para agregar asignaciones */

const btnAsignacion = document.getElementById("btnAsignacion");
const modal = document.getElementById("ModalAsignacion");
const mymodal = new bootstrap.Modal(modal);
const titulo2 = document.getElementById("tituloModal");
const btnGuardar = document.getElementById("btnGuardar");
btnAsignacion.addEventListener("click", function () {
    btnGuardar.innerHTML="Guardar";
    mymodal.show();

    titulo2.innerHTML = "Agregar Evaluación";

});

/*Modal para editar la informacion*/
const btnEditar = document.getElementById("btnEditar");
const modalEditar = document.getElementById("ModalAsignacion");
const mymodal2 = new bootstrap.Modal(modalEditar);

btnEditar.addEventListener("click", function () {
    btnGuardar.innerHTML = "Actualizar";
    mymodal2.show();
    titulo2.innerText = "Actualizar Evaluación";
});

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



