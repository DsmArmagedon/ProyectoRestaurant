var contador = 0;
var total=0;
var listPlate = [];
var datosPlate = [];
$(document).ready(function () {

    /**
     * Form
     */

    $('#save').click(function () {
        if (listPlate.length > 0)
        {
            if ($("#formSale").validationEngine('validate'))
            {

                $('#formSale').submit();
            }
        } 
        else
        {
            bootbox.alert({
                message: "Detalle de Venta Vacio",
                size: 'small'
            });
        }
        return false;
    });

    $("#formSale").validationEngine({promptPosition: 'bottomLeft'});

    $("#selectPlate").select2({
        placeholder: "Seleccionar Plato",
        allowClear: true
    });

    $("#selectPlate").change(function ()
    {
        datosPlate = document.getElementById('selectPlate').value.split('_');
        $('#existence').val(datosPlate[1]);
        $('#price').val(datosPlate[2]);
        $('#quantity').attr('max',datosPlate[1]);
    });

    $("#agregar").click(function () {
        datosPlate = document.getElementById('selectPlate').value.split('_');

        idPlate = datosPlate[0];
        namePlate = $("#selectPlate option:selected").text();
        stockPlate = parseInt($("#existence").val());
        pricePlate=datosPlate[2];
        quantityPlate = $("#quantity").val();
        var plateControl = namePlate.split(" ").join("_");
        if (listPlate.indexOf(plateControl) < 0)
        {
            if (idPlate != "" && namePlate != "" && pricePlate != "" && quantityPlate != "")
            {
                if (stockPlate >= quantityPlate)
                {
                    var plateControl = namePlate.split(" ").join("_");
                    listPlate.push(plateControl);
                    total += pricePlate*quantityPlate;
                    var subTotal = quantityPlate*pricePlate;
                    $('#total').val(total);
                    var fila = '<tr  id="' + plateControl + '"><td><input type="hidden" name="plate_id[]" class="form-control" value="' + idPlate + '">' + namePlate + '</td><td><input name="quantity[]" class="form-control input-sm" type="number" value="' + quantityPlate + '" readonly></td><td><input class="form-control input-sm" name="price_unitary[]" value="' + pricePlate + '" readonly></td><td><input class="form-control input-sm" value="' + subTotal + '" readonly></td><td><button type="button" onClick="Eliminar(this.id);" id="' + plateControl + '-'+subTotal+'" class="btn red btn-block btn-outline btn-sm"><i class="fa fa-trash fa-lg"></i>Eliminar</button></td></tr>';
                    Limpiar();
                    $('#tableDetails').append(fila);
                    contador++;
                } else
                {
                    bootbox.alert({
                        message: "La cantidad solicitada del plato supera el stock",
                        size: 'small'                    
                    });
                }
            } else
            {
                bootbox.alert({
                    message: "Plato no seleccionado",
                    size: 'small'
                });
            }
        }   
        else 
        {
            bootbox.alert({
                message: namePlate + " ya se encuentra en el detalle ",
                size: 'small'
            });
        }


    });

    function Limpiar()
    {
        $("#selectPlate").val(0);
        $("#existence").val("");
        $("#price").val("");
    }

});

function Eliminar(id_fila) {
    var datos = id_fila.split('-');
    $('#' + datos[0]).remove();
    total -=  datos[1];
    $('#total').val(total);
    var position = listPlate.indexOf(id_fila);
    listPlate.splice(position, 1);
}


    