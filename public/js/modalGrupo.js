/*Modal para los usuarios */

const btnGrupo = document.getElementById("btnGrupo");
const modal = document.getElementById("ModalGrupo");
const mymodal = new bootstrap.Modal(modal);

btnGrupo.addEventListener("click", function () {

    mymodal.show();

});

