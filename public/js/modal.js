/*Modal para los usuarios */

const btnUsuario = document.getElementById("btnUsuarios");
const modal = document.getElementById("ModalUsuarios");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById("exampleModalLabel");
let btnGuardar = document.getElementById("btnGuardar");
let formulario = document.getElementById("formulario");
let password = document.getElementById("Clave");
btnUsuario.addEventListener("click", function () {

    mymodal.show();
    titulo.innerText="Agregar datos del maestro";
    btnGuardar.innerText="Guardar";
    password.setAttribute("required","required");
    formulario.reset();


});

function editar(info){
    mymodal.show();
    titulo.innerText="Actualizar datos del maestro";
    btnGuardar.innerText="Actualizar"
    $('#NombreMaestro').val(info.Nombres);
    $('#ApellidoMaestro').val(info.Apellidos);
    $('#IdGenero').val(info.idGenero);
    $('#Especialidad').val(info.especialidad);
    $('#identificador').val(info.Identificacion);
    password.removeAttribute("required");


}
