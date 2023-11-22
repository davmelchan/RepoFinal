/*Modal para las unidades de clase */

const btnUnidad = document.getElementById("AddUnidad");
const modalUnidad = document.getElementById("Modalunidad");
const unitModal = new bootstrap.Modal(modalUnidad);

btnUnidad.addEventListener("click", function () {
    unitModal.show();
});
