var contador = 0;
var listProduct = [];
var datosProduct = [];
$(document).ready(function() {

    /**
     * Form
     */

    $('#save').click(function() {
        if (listProduct.length > 0) {
            if ($("#formKitchen").validationEngine('validate')) {

                $('#formKitchen').submit();
            }
        } else {
            bootbox.alert({
                message: "Detalle de Productos Vacio",
                size: 'small'
            });
        }
        return false;
    });

    $("#formKitchen").validationEngine({ promptPosition: 'bottomLeft' });

    $("#selectProduct").select2({
        placeholder: "Seleccionar Producto",
        allowClear: true
    });

    $("#selectProduct").change(function() {
        datosProduct = document.getElementById('selectProduct').value.split('_');
        $('#existence').val(datosProduct[1]);
        $('#unit').val(datosProduct[2]);
    });

    $("#agregar").click(function() {
        datosProduct = document.getElementById('selectProduct').value.split('_');

        idProduct = datosProduct[0];
        nameProduct = $("#selectProduct option:selected").text();
        unitProduct = datosProduct[2];
        stockProduct = parseInt($("#existence").val());
        qtyProduct = $("#quantity").val();
        var productControl = nameProduct.split(" ").join("_");
        if (listProduct.indexOf(nameProduct) < 0) {
            if (idProduct != "" && nameProduct != "" && unitProduct != "" && qtyProduct != "") {
                if (stockProduct >= qtyProduct) {

                    listProduct.push(productControl);

                    var fila = '<tr  id="' + productControl + '"><td><input type="hidden" name="product_id[]" class="form-control" value="' + idProduct + '">' + nameProduct + '</td><td><input name="quantity_kitchen[]" class="form-control input-sm" type="number" value="' + qtyProduct + '" readonly></td><td><input class="form-control input-sm" value="' + unitProduct + '" readonly></td><td><button type="button" onClick="Eliminar(this.id);" id="' + productControl + '" class="btn red btn-block btn-outline btn-sm"><i class="fa fa-trash fa-lg"></i>Eliminar</button></td></tr>';
                    Limpiar();

                    $('#tableDetails').append(fila);
                    contador++;
                } else {
                    bootbox.alert({
                        message: "La cantidad solicitada del producto supera el stock",
                        size: 'small'
                    });
                }
            } else {
                bootbox.alert({
                    message: "Producto no seleccionado",
                    size: 'small'
                });
            }
        } else {
            bootbox.alert({
                message: nameProduct + " ya se encuentra en el detalle ",
                size: 'small'
            });
        }


    });

    function Limpiar() {
        $("#selectProduct").val(0);
        $("#existence").val("");
        $("#unit").val("");
    }

});

function Eliminar(id_fila) {

    $('#' + id_fila).remove();
    var position = listProduct.indexOf(id_fila);
    listProduct.splice(position, 1);
}