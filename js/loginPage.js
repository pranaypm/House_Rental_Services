
function vallogin() {
  var email = document.logform.email;
  var password = document.logform.password;
  if(valpass(password))
  {
    return true;
  }
  return false;
}
function valpass(pass){
  if(pass.value.length<6){
    alert("invalid password");
    return false;
  }
  return true;
}
