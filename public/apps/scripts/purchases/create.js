$(document).ready(function () {
    /**
     * Form
     */
    $('#save').click(function () {
        if ($("#formPurchase").validationEngine('validate')) {
            $('#formPurchase').submit();
        }
        return false;
    });
    
    $("#single-append-text").change(function(event){
        event.preventDefault();
    	var id = event.target.value;
        var route = $(this).attr('data-url');
        var url = route.replace(':ID',id); 
    	$.ajax({
            type: 'get',
            url: url,
            datatype: 'json',
            success: function (data) {
               dirImg="../images/products/"+data.id+"."+data.extension;
               $("#existence").val(data.existence);
               $("#unit").val(data.unit);
               $('#imagenProducto').attr("src",dirImg);
            }
        });
    });
    
    $('#formPurchase').validationEngine({promptPosition: 'bottomLeft'});
   // $("#products").select2();

});
