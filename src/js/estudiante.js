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
    $(document).ready( function () {
        let table = $('#tablaestudiantes').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );        
    } );
    
});