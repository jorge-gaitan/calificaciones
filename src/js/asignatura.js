$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaasignaturas');
        let contenedorForm = $('#formAsignatura');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarAsignatura').click(function () {
        mostrarFormulario();
        $('button[name="agregarAsignatura"]').val("true");
    });

    $('.btnEditar').click(function () {
        mostrarFormulario();
        let data = $(this).data();

        let idCarrera = data.idcarrera,
            nombreAsignatura = data.nombreasignatura,
            idAsignatura = data.idasignatura;

        $('input[name="nombreAsignatura"]').val(nombreAsignatura);
        $('select[name="carrera"]').val(idCarrera);
        $('button[name="agregarAsignatura"]').val(idAsignatura);

        console.log(data);
    });
});