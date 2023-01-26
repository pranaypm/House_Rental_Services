function valregis() {
  var name = document.registrate.FullName;
  var email = document.registrate.email;
  var mobile = document.registrate.MobileNumber;
  var pass1 = document.registrate.pass1;
  var pass2 = document.registrate.pass2;
  if(valname(name))
  {
    if(valemail(email))
    {
      if(valmobile(mobile))
      {
        if(valpass(pass1,pass2)){
          return true;
        }
      }
    }
  }
  return false;

}

function valname(name){
  if(name.value.length<4){
    alert("enter the name properly");
    name.focus();
  }
  else{
    if(/^[a-zA-Z]*/.test(name.value)){
      return true;
    }
  }
  return false;
}

function valemail(mail)
{
 if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
function valmobile(mobile) {
  var num = mobile.value;
  if(num.length==10){
    return true;
  }
  else{
    alert("enter the correct mobile number");
    mobile.focus();
  }
  return false;
}

function valpass(pass1,pass2){
  if(pass1.value.length<6 || pass2.value.length<6){
    alert("enter the password of length minimum 6");
    pass1.focus();
    return false;
  }
  if(pass1.value==pass2.value){
    return true;
  }
  else{
    alert("check your passwords");
    pass1.focus();
  }
  return false;
}
