function addCart(code){
    let request = new XMLHttpRequest();
    request.open('GET', `./php/checkUser.php`);
    request.onload = function (){
        if(this.responseText == '0'){
            console.log(this.responseText)
            window.location.href = "./login.php";
        }
        else{
            let request2 = new XMLHttpRequest();
            request2.open('POST', './php/uploadCart.php');
            request2.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
            request2.onload = function (){
                console.log(this.responseText);
            }
            request2.send(`code=${code}`);
        }
    }
    request.send();
}