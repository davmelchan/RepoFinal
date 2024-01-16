var tabla;
$(document).ready(function()
    {



      tabla =  $('.table').dataTable({
            responsive:true,



        });

    }
);

$(window).resize(function () {
    // Destruir DataTables
    tabla.destroy();

    // Volver a inicializar DataTables
    tabla = $('.table').DataTable({
        responsive: true,
        // Otras opciones...
    });
});
const btnRol = document.getElementById("btnRol");
const modal = document.getElementById("ModalRol");
const mymodal = new bootstrap.Modal(modal);
const formulario = document.getElementById('formulario');

btnRol.addEventListener("click", function () {
    mymodal.show();
    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnGuardar');
    formulario.reset();
    titulo.innerText = 'Agregar nuevo rol';
    btnFormulario.innerText = 'Guardar';

});
/*
$('#btnEditar').click(function(e){
   mymodal.show();
    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnFormulario');
    titulo.innerText = 'Actualizar rol';

    btnFormulario.innerText = 'Actualizar';
});
*/
function editar(info){

    mymodal.show();

    let titulo = document.getElementById('exampleModalLabel');
    let btnFormulario = document.getElementById('btnGuardar');
    titulo.innerText = 'Actualizar rol';
    btnFormulario.innerText = 'Actualizar';

    ///datos formulario

    $('#IdRol').val(info.IdRol);
    $('#NombreRol').val(info.Nombre);

    /*
    IdRol
    * */
}



function eliminar(ruta,id){

    Swal.fire({
        title: '¿Estás seguro de eliminar el rol?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar el formulario de eliminación

            $.ajax({
                type: 'DELETE',
                url: ruta.replace(':id',id),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1550);

                },
                error: function(xhr,status,error) {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: xhr.responseJSON.error,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });










        }
    });




}




