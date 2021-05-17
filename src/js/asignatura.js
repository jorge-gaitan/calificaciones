$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaasignaturas');
        let contenedorForm = $('#formAsignatura');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarAsignatura').click(function () {
        mostrarFormulario();
    });
});