let prevCurrency;

document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('usd').checked = true;
    prevCurrency = "usd"
})


let currenciesInput = document.getElementById("currencies");
currenciesInput.addEventListener('change', ()=>{
    let precios = document.querySelectorAll('.precio');
    const selected = document.querySelector('input[name="value-radio"]:checked');
    switch (selected.id) {
        case 'usd':
            if(localStorage.getItem("usd-usd") != null){
                if(prevCurrency == "ves"){
                    convertPricesToUSD(localStorage.getItem("usd-ves"), precios, "ves");
                }
                else if(prevCurrency == "cop"){
                    convertPricesToUSD(localStorage.getItem("usd-cop"), precios, "cop");
                }
                prevCurrency = selected.id;
            }
            break;
        case 'ves':
            if(localStorage.getItem("usd-ves") != null){
                if(prevCurrency == "usd"){
                    convertPricesToOther(localStorage.getItem("usd-ves"), precios, "ves");
                }
                else if(prevCurrency == "cop"){
                    convertPricesToUSD(localStorage.getItem("usd-cop"), precios);
                    convertPricesToOther(localStorage.getItem("usd-ves"), precios, "ves");
                }
                prevCurrency = selected.id;
            }
          break;
        case 'cop':
            if(localStorage.getItem("usd-cop") != null){
                if(prevCurrency == "usd"){
                    convertPricesToOther(localStorage.getItem("usd-cop"), precios, "cop");
                }
                else if(prevCurrency == "ves"){
                    convertPricesToUSD(localStorage.getItem("usd-ves"), precios);
                    convertPricesToOther(localStorage.getItem("usd-cop"), precios, "cop");
                }
                prevCurrency = selected.id;
            }
          break;
      }
});

function convertPricesToUSD(rate, precios, siglas){
    const regex = /[^0-9.]/g; // Coincide con cualquier caracter que no sea un numero o un punto
    precios.forEach(precio => {
        precio.innerText = precio.innerText.replace(regex, "");
        precio.innerText = (Number(precio.innerText) / Number(rate)).toFixed(2);
        precio.innerText = "$" + precio.innerText.toString();
    });
}

function convertPricesToOther(rate, precios, siglas){
    precios.forEach(precio => {
        precio.innerText = precio.innerText.replace("$", "");
        precio.innerText = (Number(precio.innerText) * Number(rate)).toFixed((siglas == "cop")? 3: 2);
        precio.innerText = precio.innerText.toString() + " " + siglas;
    });
}