document.addEventListener('DOMContentLoaded', ()=>{
  localStorage.clear();
  localStorage.setItem("usd-usd", 1);
  peticion();
  setInterval(peticion, 10000);
})


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

function peticion(){
  let request = new XMLHttpRequest();
  request.open('GET', './php/request.php');
  request.onload = function(){
    let datos = JSON.parse(this.responseText);
    console.log(datos);
    if(window.location.href == "./money.html"){
        cajadolar(datos)
    }
    else{
        const ves = document.getElementById('ves');
        const cop = document.getElementById('cop');
        const fecha = document.getElementById('fecha');
        localStorage.setItem("usd-ves", parseFloatWithComma(datos[0].fuente.valor))
        localStorage.setItem("usd-cop", parseFloatWithComma(datos[1].fuente.valor))
        ves.innerHTML = "1usd = "+parseFloatWithComma(datos[0].fuente.valor) + "VES";
        cop.innerHTML = "1usd = "+parseFloatWithComma(datos[1].fuente.valor) + "COP";
        fecha.innerHTML = "Fecha de revision: "+ datos[datos.length-1].fecha;
    }
  }
  request.send();
}

function cajadolar(data){
  const contenedor = document.getElementById('valor');
  
  let string = "";
  for(let i = 0; i < data.length - 1; i++){
    string += `${data[i].nombre} : ${parseFloatWithComma(data[i].fuente.valor)}<br>`;
  }
  string += `Última Búsqueda: ${data[data.length-1].fecha}`;
  contenedor.innerHTML = string;
}