$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaProfesores');
        let contenedorForm = $('#formProfesores');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarProfesores').click(function () {
        mostrarFormulario();
        $('button[name="agregarProfesores"]').val(true);
    });

    $('.btnEditar').click(function() {
        mostrarFormulario();
        let data = $(this).data();
        console.log(data);
        let nombreprofesores = data.nombreprofesores;
            idprofesores = data.idprofesores;

        $('input[name="nombreProfesores"]').val(nombreprofesores);
        $('button[name="agregarProfesores"]').val(idprofesores);

            console.log(data);


    });
});