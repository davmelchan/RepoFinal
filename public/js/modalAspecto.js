const btnAspecto = document.getElementById("btnAspecto");
const modal = document.getElementById("ModalAspecto");
const mymodal = new bootstrap.Modal(modal);

btnAspecto.addEventListener("click", function () {
    mymodal.show();
});