/*Modal para los usuarios */

const btnUsuario = document.getElementById("btnUsuarios");
const modal = document.getElementById("ModalUsuarios");
const mymodal = new bootstrap.Modal(modal);

btnUsuario.addEventListener("click", function () {

    mymodal.show();

});

