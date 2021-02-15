
$(document).ready(function () {
    /**
     * Table Users
     */
    $("#tableProducts").DataTable({
        "sPaginationType": "full_numbers",
        "iDisplayLength": 25,
        "bFilter": true,
        "aaSorting": [[0, "asc"]],
        "oLanguage": {
            "sProcessing": "Esperar por favor",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No he encontrado nada - lo siento",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primero",
                "sPrevious": "Anterior",
                "sNext": "Siguiente",
                "sLast": "Último"
            }
        }
    });

});
