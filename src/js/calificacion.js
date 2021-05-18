$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablacalificaciones');
        let contenedorForm = $('#formcalificacion');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarCalificacion').click(function () {
        mostrarFormulario();
    });
});