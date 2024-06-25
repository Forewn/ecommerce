document.addEventListener('DOMContentLoaded', () => {
    total();
})

function changeQuantity(action, id) {
    const cantidad = document.getElementById('precio' + id)
    switch (action) {
        case 1:
            cantidad.value++;
            break;
        default:
            if (cantidad.value != 1) {
                cantidad.value--;
            }
            break;
    }
    updateCart(document.getElementById('precio' + id).value, id);
}


function total() {
    let request = new XMLHttpRequest();
    request.open('GET', './php/cartPrices.php?action=0');
    request.onload = function () {
        document.getElementById('subtotal').innerText = '$' + this.responseText;
        document.getElementById('total').innerText = '$' + this.responseText;
    }
    request.send();
}

function updateCart(value, code) {
    let request = new XMLHttpRequest();
    request.open('GET', `./php/cartPrices.php?action=1&code=${code}&value=${value}`);
    request.onload = function () {
        document.getElementById('total' + code).innerText = '$' + this.responseText;
        total();
    }
    request.send();
}

function Delete(code) {
    let request = new XMLHttpRequest();
    request.open('GET', `./php/deleteCart.php?code=${code}`);
    request.onload = function () {
        let productos = JSON.parse(this.responseText);
        formCart(productos);
        total();
    }
    request.send();
}

function formCart(productos) {
    let table = document.getElementById("table");
    let string = ""
    productos.forEach(producto => {
        string += `<tr class='text-center'>
                    <td class='product-remove'><a onclick='Delete({$codigo_producto})'><span class='ion-ios-close'></span></a></td>
                    
                    <td class='image-prod'><div class='img' style='background-image:url(${producto.foto});'></div></td>
                    
                    <td class='product-name'>
                        <h3>${producto.nombre}</h3>
                        <p>${producto.descripcion}</p>
                    </td>
                    
                    <td class='precio'>\$${producto.precio}</td>
                    
                    <td class='quantity'>
                        <div class='input-group mb-3 align-items-center'>												
                            <i class='btn btn-outline-warning px-3' onclick='changeQuantity(0, ${producto.codigo})'>-</i>
                            <input type='number' name='quantity' id='precio${producto.codigo}' disabled class='quantity form-control input-number' value='${producto.cantidad}' min='1' max='100'>
                            <i class='btn btn-outline-warning px-3' onclick='changeQuantity(1, ${producto.codigo})'>+</i>													
                        </div>
                </td>
                    
                    <td class='precio total' id='total${producto.codigo}'>\$${producto.precio * producto.cantidad}</td>
                </tr><!-- END TR-->`;
    });
    table.innerHTML = string;
}

function askMethod() {
    swal({
        title: "Seleccione un metodo de pago",
        type: 'info',
        html: `
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <img src="./images/zelle.jpg" class="img-fluid" alt="Imagen 1" width="100px">
                <img src="./images/pago-movil.webp" class="img-fluid mx-2 opcion" alt="Imagen 2" width="100px" onclick="newBill()">
                <img src="./images/bancolombia.jpeg" class="img-fluid" alt="Imagen 3" width="100px">
            </div>
        </div>`
    })
}

function newBill() {
    let request = new XMLHttpRequest();
    request.open('GET', `./php/request.php`);
    request.onload = function () {
        const tasa_dolar = parseFloatWithComma(JSON.parse(this.responseText)[0].fuente.valor);
        console.log(tasa_dolar)
        let request2 = new XMLHttpRequest();
        request2.open('POST', `./php/newBill.php`);
        request2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request2.onload = function (){
            console.log(this.responseText);
            if(this.responseText == "1"){
                window.location.href = "checkout.php";
            }
        }
        request2.send(`tasa=${tasa_dolar}`);    }
    request.send();
}

function parseFloatWithComma(str) {
    // Reemplazar la coma por un punto
    const strWithDot = str.replace(/,/g, ".");
    // Convertir el string a un número flotante
    const number = parseFloat(strWithDot);
    // Si la conversion falla, devolver NaN
    if (isNaN(number)) {
      return NaN;
    }
    // Devolver el número flotante
    return number;
}