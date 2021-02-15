$(document).ready(function () {
    
    $(".show").click(function(){
    	var id = $(this).attr('data-id');
    	var url = $(this).attr('data-url');
    	$.ajax({
            type: 'get',
            url: url,
            datatype: 'json',
            success: function (data) {
            	$('#name').val(data.product.name);
                $('#unit').val(data.product.unit);
                $('#existence').val(data.product.existence);
                $('#quantity').val(data.purchase.quantity);
                $('#date_purchase').val(data.purchase.date_purchase);
                $('#description').val(data.purchase.description);
                dirImg="../images/products/"+data.product.id+"."+data.product.extension;
                $('#imagenProducto').attr("src",dirImg);
            	$('#modalPurchase').modal('show');
            }
        });
    });
});	