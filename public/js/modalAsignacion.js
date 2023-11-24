/*Modal para agregar asignaciones */

const btnAsignacion = document.getElementById("btnAsignacion");
const modal = document.getElementById("ModalAsignacion");
const mymodal = new bootstrap.Modal(modal);

btnAsignacion.addEventListener("click", function () {

    mymodal.show();

});
