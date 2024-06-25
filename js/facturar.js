function facturar(id, status){
    if(status == 0){
        swal({
            type: 'warning',
            text: "Su pago aun no ha sido verificado",
            title: "No se pudo generar la factura"
        });
    }
    else{
        window.location.href = `./php/factura.php?id=${id}`
    }
}