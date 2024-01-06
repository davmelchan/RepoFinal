

// Desactivar el botón de cerrar por defecto
$(document).ready(function () {
    $('#staticBackdrop').modal({
        backdrop: 'static',
        keyboard: false
    });

    // Habilitar el botón de cerrar cuando se haga clic en el botón personalizado
    $('#btnCerrarModal').on('click', function () {
        $('#miModal').modal('hide');
    });
});
