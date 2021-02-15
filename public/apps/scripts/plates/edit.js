$(document).ready(function () {
    /**
     * Form
     */
    $('#save').click(function () {
        if ($("#formPlate").validationEngine('validate')) {
            $('#formPlate').submit();
        }
        return false;
    });

    $('#formPlate').validationEngine({promptPosition: 'bottomLeft'});

});
