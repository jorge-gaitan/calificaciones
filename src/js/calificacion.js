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

    //Crear el datatables
    $(document).ready( function () {
        let table = $('#tablacalificaciones').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );        
    } );
    
});