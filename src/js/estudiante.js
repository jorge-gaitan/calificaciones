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

    //Crear el datatables
    $(document).ready(function () {
        let table = $('#tablaestudiantes').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    $('.btnEditar').click(function () {
        mostrarFormulario();
        let data = $(this).data();

        let nombreEstudiante = data.nombreestudiante,
            idEstudiante = data.idestudiante,
            idCarrera = data.idcarrera;

        console.log(data);

        $('input[name="nombreEstudiante"]').val(nombreEstudiante);
        $('select[name="carrera"]').val(parseInt(idCarrera));
        $('button[name="agregarestudiantes"]').val(idEstudiante);

    });





});