$(document).ready(function() {
    $('#myTable').DataTable({
        responsive: true,

});
});
const btnRol = document.getElementById("btnRol");
const modal = document.getElementById("ModalRol");
const mymodal = new bootstrap.Modal(modal);

btnRol.addEventListener("click", function () {
    mymodal.show();
});









