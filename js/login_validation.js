document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento){
  evento.preventDefault();
  var id = document.getElementById('DNIClient').value;
  if(id.length == '') {
      alert('El campo es obligatorio');
      return;
    }
    if(id.length > 8){
      alert('Cédula no debe contener mayor a 8 digitos');
  }

  var password = document.getElementById('passwordClient').value;
  if(password.length == ''){
      alert('No ha ingresado contraseña');
      return;
  } 
  if(password.length > 16){
      alert('Contraseña maximo de caracteres 16');
  }
  checkUser(id, document.getElementById("formulario"));
}
const showPasswordCheckbox = document.querySelector("#show-password");
const passwordInput = document.querySelector("#passwordClient");

showPasswordCheckbox.addEventListener("change", () => {
  passwordInput.type = showPasswordCheckbox.checked ? "text" : "password";
});

function checkUser(id, form){
    const password = document.getElementById('passwordClient').value;
    const request = new XMLHttpRequest();
    request.open('GET', `./php/confirmUser.php?id=${id}&mode=${1}&password=${password}`);
    request.onload = function(){
        console.log(this.responseText);
        if(this.responseText == 101){
            swal({
                title: 'No es posible iniciar sesion',
                text: 'Su cedula no se ha registrado aun',
                type: 'warning'
            });
        }
        if(this.responseText == 102){
            swal({
                title: 'Contraseña Incorrecta!',
                type: 'error'
            })
        }
        else if(this.responseText == 200){
            form.submit();
        }
    }
    request.send();
}