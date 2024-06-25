function changeStatus(id, action){
    let request = new XMLHttpRequest();
    request.open('GET', `./php/status.php?action=${action}&code=${id}`);
    request.onload = function (){
        if(this.responseText == 1){
            swal({
                type: 'success',
                title: 'Pedido procesado exitosamente'
            })
            updateTable();
        }
    }
    request.send();
}


function manejarPedido(id){
    swal({
        type: 'info',
        title: "opciones",
        html: `
        <div class="container mt-5">
            <div class="d-flex justify-content-around">
                <div class='btn btn-danger' onclick='changeStatus(${id}, 0)'>Cancelar</div>
                <div class='btn btn-success' onclick='changeStatus(${id}, 1)'>Aceptar</div>
            </div>
        </div>`,
        confirmButtonText: "Cerrar"
    });

}

function updateTable(){
    const request = new XMLHttpRequest();
    request.open('GET', './php/buscar_pendientes.php');
    request.onload = function (){
        document.getElementById('table').innerHTML = this.responseText;
    }
    request.send();
}