$(document).ready(function() {
    // Manejar el evento de cambio en la barra de búsqueda
    $('#barraBusqueda').on('input', function() {
        let filtro = $(this).val().toLowerCase();

        // Filtrar los elementos dentro del contenedor
        $('#contenedor .objeto').each(function() {
            let textoElemento = $(this).text().toLowerCase();
            $(this).toggle(textoElemento.indexOf(filtro) > -1);
        });
    });
    $('#barraBusqueda2').on('input', function() {
        let filtro = $(this).val().toLowerCase();

        // Filtrar los elementos dentro del contenedor
        $('#contenedor .objeto').each(function() {
            let textoElemento = $(this).text().toLowerCase();
            $(this).toggle(textoElemento.indexOf(filtro) > -1);
        });
    });



});
