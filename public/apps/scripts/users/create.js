$(document).ready(function () {
    /**
     * Form
     */
    $('#save').click(function () {
        if ($("#formUser").validationEngine('validate')) {
            $('#formUser').submit();
        }
        return false;
    });

    $('#formUser').validationEngine({promptPosition: 'bottomLeft'});

    $("#roles").select2();

});
