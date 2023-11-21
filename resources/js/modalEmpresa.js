const btnEmpresa = document.getElementById("btnEmpresa");
const modal = document.getElementById("ModalEmpresa");
const mymodal = new bootstrap.Modal(modal);

btnEmpresa.addEventListener("click", function () {
    mymodal.show();
});