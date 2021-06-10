$(document).ready(function () {
    const mostrarFormulario = function () {
        let contenedorTabla = $('#tablaCarreras');
        let contenedorForm = $('#formCarreras');

        contenedorTabla.toggle();
        contenedorForm.toggle();
    }

    $('#btnAgregarCarrera').click(function () {
        mostrarFormulario();
        $('button[name="agregarCarrera"]').val('true');
    });

    // Mostrar el formulario y cargar los datos de la tabla
    $('.btnEditar').click(function () {
        mostrarFormulario();
        let data = $(this).data();
        let nombreCarrera = data.nombrecarrera,
            idCarrera = data.idcarrera;

        $('input[name="nombreCarrera"]').val(nombreCarrera);
        $('button[name="agregarestudiantes"]').val(idCarrera);

        console.log(data);
    });
});