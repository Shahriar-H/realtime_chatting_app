var eye = document.getElementById('openeye');
var password = document.querySelector('.Password');
var pastype = document.querySelector('#passtype');

eye.onclick=()=>{
    password.classList.toggle('eyeflotbef');
    eye.classList.toggle('text-col');
    if(pastype.type=='password'){
        pastype.type="text";
    }else{
        pastype.type="password";
    }
}



var savebtn = document.getElementById('savebtn');
var signupform = document.querySelector('form');
signupform.onsubmit=(e)=>{
    e.preventDefault();
}




























