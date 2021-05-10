$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaCarreras');
        let contenedorForm = $('#formCarreras');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarCarrera').click(function () {
        mostrarFormulario();
    });
});