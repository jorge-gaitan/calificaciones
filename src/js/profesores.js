$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaProfesores');
        let contenedorForm = $('#formProfesores');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarProfesores').click(function () {
        mostrarFormulario();
    });
});