

var otp="";
function generateOtp(){
  for(var i=0;i<5;i++){
    otp=otp +Math.floor(Math.random()*10)+"";
  }

  var to=document.getElementById("email").value;

  var subject = "Password changing HOUSE RENTAL SYSTEMS",
  body = " You tried to change the password for the HOUSE RENTAL SERVICES,"+
  "The OTP for password changing is <b>"+otp +"<b>.<br><br><br>Thanks & Regards,<br>HOUSE RENTAL SERVICES.<br>";
  sendEmail(to,subject,body);
}

function validateotp(){
  var otp1 = document.prform.OTP;
  var otp2 = otp1.value; 
  if(otp2==otp){
    alert("otp is correct");
    document.getElementById('password1').disabled=false;
    document.getElementById('password2').disabled=false;
    document.getElementById("submitbutton").disabled=false;
  alert("enter password");
  document.getElementById("password1").focus();
  
  }
  else{
    alert("your otp  is wrong");
    window.open("../html/registrationPage.html","_self");
  
  }
  return false;

}
/*
function fun(){
  document.getElementById('password1').disabled=false;
  document.getElementById('password2').disabled=false;
  document.getElementById("submitbutton").disabled=false;
  alert("enter password");
return true;
}
*/
function valpass(){
  var p1 = document.prform.password1;
  var p2 = document.prform.password2;
  if(p1.value==p2.value){
    return true;
  }
  else{
    alert("enter the correct passwords");
    document.getElementById("password1").focus();
    return false;
  }
}
