document.addEventListener('DOMContentLoaded', ()=>{
    let categoriaBtn = document.getElementById('categoriaBtn');
    categoriaBtn.addEventListener('click', newCategory)
});

function newCategory(){
    swal({
        title: "Nueva Categoria",
        html: `
        <form>
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" id="nombre_categoria">
        </form>
        `,
    },
    function(isCorrect){
        if(isCorrect){
            let nombre = document.getElementById('nombre_categoria');
            if(nombre.value != ""){
                let request = new XMLHttpRequest();
                request.open('GET', `./php/new_category.php?categoria=${nombre.value}`);
                request.onload = function(){
                    console.log(this.responseText);
                    (this.responseText == 1) ? showWarning() : updateSelect();
                }
                request.send();
            }
        }
    });
}

function showWarning(){
    swal({
        type: 'warning',
        title: "Ha habido un error",
        text: "No se pudo crear la categoria"
    })
}

function updateSelect(){
    let categoria = document.getElementById('categoria');
    let request = new XMLHttpRequest();
    request.open('GET', `./php/search_categories.php?categoria=${categoria.value}`);
    request.onload = function(){
        console.log(this.responseText);
        let string = "";
        JSON.parse(this.responseText).forEach(categoria => {
            string += `<option value=${categoria.id}>${categoria.categoria}</option>`;
        });
        categoria.innerHTML = string;
    }
    request.send();
}