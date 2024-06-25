document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('container').addEventListener('mouseover', () => {
        document.getElementById('s').focus();
    })
});

let results = document.getElementById('searchResults');
results.setAttribute('width', document.getElementById('s').getAttribute('width'));

function search(text) {
    document.getElementById('s').focus();
    results.innerHTML = "";
    if (text != "") {
    let request = new XMLHttpRequest();
        request.open('GET', `./php/searchProducts.php?name=${text}`);
        request.onload = function () {
            if(!this.responseText.includes("<br>")){
                let productos = JSON.parse(this.responseText);
                showResults(productos, results);
            }
        }
        request.send();
    }
}

function showResults(productos, results){
    let child = "";
    productos.forEach(producto => {
        child += `<li class="row result" onclick="window.location.href = './product-single.php?producto=${producto.codigo_producto}';"><div class="col-2"><img src='${producto.foto_producto}' width='60px'></div><div class="col-10"><p>${producto.nombre}</p></div></li>`;
    });
    results.innerHTML += child;
}