const btnUsuario = document.getElementById("btnUsuarios");
const modal = document.getElementById("ModalUsuarios");
const mymodal = new bootstrap.Modal(modal);
let titulo = document.getElementById("exampleModalLabel");
let btnGuardar= document.getElementById("btnGuardar");
let password =document.getElementById("")

btnUsuario.addEventListener("click",function(e){
   mymodal.show();

   titulo.innerText="Agregar estudiante";
   btnGuardar.innerText="Guardar";

    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1
    });
    formulario.reset();
    password.setAttribute("required","required");
    $('#Empresa').val("").trigger("change");
});

function editar(info){
    mymodal.show();
    console.log(info)
    $(".company").select2({
        dropdownParent: $("#formulario"),
        maximumSelectionLength: 1
    });
    titulo.innerText="Actualizar datos del estudiante";
    btnGuardar.innerText="Actualizar";
    $('#NombreEstudiante').val(info.Nombres);
    $('#ApellidoEstudiante').val(info.Apellidos);
    $('#Genero').val(info.idGenero);
   $('#Direccion').val(info.Direccion);
   $('#identificador').val(info.Identificacion);
   $('#Telefono').val(info.Telefono);
   $('#Empresa').val(info.idEmpresa).trigger("change");
    password.removeAttribute("required");


}
