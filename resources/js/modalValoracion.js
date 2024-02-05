const btnValoracion = document.getElementById("btnValoracion");
const modal = document.getElementById("ModalValoracion");
const mymodal = new bootstrap.Modal(modal);

btnValoracion.addEventListener("click", function () {
    mymodal.show();
});