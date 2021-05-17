$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaestudiantes');
        let contenedorForm = $('#formEstudiantes');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarEstudiante').click(function () {
        mostrarFormulario();
    });
});