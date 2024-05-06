document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
    evento.preventDefault();
    var first_name = document.getElementById('nombre').value;
    if(first_name.length == 0) {
        alert('El nombre es obligatorio');
        return;
    }
    var second_name = document.getElementById('nombre2').value;
    if(second_name.length == 0){
        alert('El segundo nombre es obligatorio');
        return;
    }
    var last_name = document.getElementById('apellido').value;
    if (last_name.length == 0) {
        alert('El apellido es obligatorio');
        return;
    }
    // var tipoSex = document.getElementById('tiposex');
    // if(tipoSex.value == 0){
    //     alert('Seleccione un tipo de identificacion');
    //     return;
    // }
    var tipoId = document.getElementById('tipoID');
    if(tipoId.value == 0){
        alert('Seleccione un tipo de identificacion');
        return;
    }
    var id = document.getElementById('id').value;
    if (id.length < 5) {
        alert('Ingrese una cedula real');
        return;
    }
    var correo = document.getElementById('correo').value;
    if(correo.length == 0){
        alert('correo obligatorio');
    }
    var password = document.getElementById('password').value;
    if (password.length > 16) {
      alert('La clave no puede contener más de 16 carácteres');
      return;
    }
    var password2 = document.getElementById('password2').value;
    if (password2 != password){
        alert('Las claves deben ser iguales');
        return;
    }
    
    // var agree = document.getElementById('disclaimer');
    // if(!agree.checked){
    //     alert('Para usar el servicio debe aceptar los terminos y condiciones');
    //     return;
    // }
    checkUsers(id, document.getElementById("formulario"));
}

const showPasswordCheckbox1 = document.querySelector("#show-password-1");
const passwordInput1 = document.querySelector("#password");

showPasswordCheckbox1.addEventListener("change", () => {
  passwordInput1.type = showPasswordCheckbox1.checked ? "text" : "password";
});

const showPasswordCheckbox2 = document.querySelector("#show-password-2");
const passwordInput2 = document.querySelector("#password2");

showPasswordCheckbox2.addEventListener("change", () => {
  passwordInput2.type = showPasswordCheckbox2.checked ? "text" : "password";
});

function checkUsers(id, form){
    const request = new XMLHttpRequest();
    request.open('GET', `./php/confirmUser.php?id=${id}&mode=${2}`);
    request.onload = function(){
        console.log(this.responseText);
        if(this.responseText == 101){
                swal({
                  title: 'Error',
                  text: 'Su cédula no figura en nuestros datos, por favor pongase en conctacto con el Consejo Comunal',
                  type: 'error',
                  confirmButtonText: 'Comprendo'
                });
        }
        else if(this.responseText == 102){
            swal({
              title: 'Error',
              text: 'Al parecer su cedula ya ha sido utilizada en un registro, si usted no se ha registrado pongase en contacto con el Consejo Comunal',
              type: 'error',
              confirmButtonText: 'Comprendo'
            });
        }
        else{
            swal({
              title: 'Registro en proceso',
              text: 'En breves segundos sera redirigido al sistema',
              type: 'success'
            },
            function (isConfirm){
                form.submit();
            });
        }
    }
    request.send();
}