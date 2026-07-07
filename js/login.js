const togglePassword =
document.getElementById("togglePassword");

if(togglePassword){

togglePassword.onclick = function(){

const password =
document.getElementById("password");

if(password.type==="password"){
password.type="text";
}
else{
password.type="password";
}

}
}