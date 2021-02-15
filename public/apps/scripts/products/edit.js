$(document).ready(function () {
    /**
     * Form
     */
    $('#save').click(function () {
        if ($("#formProduct").validationEngine('validate')) {
            $('#formProduct').submit();
        }
        return false;
    });

    $('#formProduct').validationEngine({promptPosition: 'bottomLeft'});

});
