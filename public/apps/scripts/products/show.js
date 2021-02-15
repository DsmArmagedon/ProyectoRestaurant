$(document).ready(function () {
    
    $(".show").click(function(){
    	var id = $(this).attr('data-id');
    	var url = $(this).attr('data-url');
    	$.ajax({
            type: 'get',
            url: url,
            datatype: 'json',
            success: function (data) {
            	$('#name').val(data.name);
                $('#unit').val(data.unit);
                $('#existence').val(data.existence);
                if(data.status == 1)
                {
                    $('#status').val("Habilitado");
                
                }
                else
                {
                    $('#status').val("Desabilitado");
                }
                dirImg="../images/products/"+data.id+"."+data.extension;
                $('#imagenProducto').attr("src",dirImg);
            	$('#modalProduct').modal('show');
            }
        });
    });
});	