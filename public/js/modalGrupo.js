/*Modal para los usuarios */

const btnGrupo = document.getElementById("btnGrupo");
const modal = document.getElementById("ModalGrupo");
const mymodal = new bootstrap.Modal(modal);
const formulario = document.getElementById("formulario");

let titulo = document.getElementById("exampleModalLabel");
let btnGuardar= document.getElementById("btnGuardar");
let fotografia = document.getElementById("imgGrupo");

btnGrupo.addEventListener("click", function () {

    mymodal.show();
    formulario.reset();
    titulo.innerText= "Agregar grupo";
    btnGuardar.innerText= "Guardar";
    fotografia.setAttribute("hidden",true);
});
function editar(nombre,identificacion,img){
    $('#IdGrupo').val(identificacion);
    $('#NombreGrupo').val(nombre);
    titulo.innerText= "Editar información del grupo";
    btnGuardar.innerText= "Guardar";
    fotografia.src= img
    fotografia.onerror= function(){
        fotografia.setAttribute("hidden",true);
    };
    fotografia.onload= function(){
        fotografia.removeAttribute("hidden");
    };




    mymodal.show();

}

