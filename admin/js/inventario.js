function openAlert(codigo, direccion){
    url = "../"+direccion;
    swal({
        title: "Código: "+codigo,
        html: `
        <figure class="container">
            <img src="${url}" style="width:189px;height:266px;">
        </figure>
        `
    })
}

function search(value){
    let request = new XMLHttpRequest();
    let table = document.getElementById('table');
    request.open('GET', `./php/buscar_producto.php?input=${value}`);
    request.onload = function(){
        if(this.responseText != 0){
            let response = JSON.parse(this.responseText);
            table.innerHTML = buildTable(response);
        }
        else{
            table.innerHTML = buildTable(0);
        }
    }
    request.send();
}

function buildTable(productos){
    let string = "";
    if(productos != 0){
        productos.forEach(producto => {
            string+= "<tr>";
            string += "<td>"+producto.codigo+"</td>";
            string += "<td>"+producto.nombre+"</td>";
            string += "<td>"+producto.descripcion+"</td>";
            string += "<td>"+producto.precio+"</td>";
            string += "<td>"+producto.categoria+"</td>";
            string += "<td>"+producto.cantidad+"</td>";
            string += "<td>"+`<button class='btn btn-outline-info' onclick='openAlert(${producto.codigo}, "${producto.foto}")'>a</button>`+"</td>";
            string += "<td>"+`
            <div class='row'>
                <div class='col-12 col-lg-5'>
                    <button class='btn btn-outline-success'>U</button>
                </div>
                <div class='col-12 col-lg-5'>
                    <button class='btn btn-outline-warning'>D</button>
                </div>
            </div>` +"</td>";
            string+= "</tr>";
        });
    }
    else{
        string = "<tr><td colspan='8' class='text-center'>No hay resultados</td></tr>"
    }
    return string;
}
