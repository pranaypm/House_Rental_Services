<?php
session_start();
function getEmail(){
  $email = $_SESSION['email'];
  echo "$email";
}
function seT()
{
$email = $_SESSION['email'];
$address = $_POST['address'];
$typeHouse = $_POST['typeHouse'];
$price = $_POST['price'];
$lati = $_POST['lati'];
$long = $_POST['long'];
$city = $_POST['citytype'];


$housename = $_POST['FullName'];
$dprice = $_POST['dprice'];
$bike = $_POST['parkingb'];
$car = $_POST['parkingc'];
$pets = $_POST['Pets'];
$fstatus = $_POST['furnishing'];
$face = $_POST['facing'];
$floor = $_POST['floor'];
$bal = $_POST['balcony'];
$wash = $_POST['washrooms'];






$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "houserentalsystems";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
$insert ="insert into sethome(email,housetype,price,address,latitude,longitude,city,housename,bike,car,pets,fstatus,hface,dprice,nfloor,nwashroom, nbalcony) values('$email','$typeHouse','$price','$address','$lati','$long','$city','$housename','$bike','$car','$pets','$fstatus','$face','$dprice','$floor','$wash','$bal')";
$stmt = $conn->query($insert);


echo "done";
}
 ?>
<script type="text/javascript">
var Email = { send: function (a) { return new Promise(function (n, e) { a.nocache = Math.floor(1e6 * Math.random() + 1), a.Action = "Send"; var t = JSON.stringify(a); Email.ajaxPost("https://smtpjs.com/v3/smtpjs.aspx?", t, function (e) {
   n(e) }) }) }, ajaxPost: function (e, n, t) { var a = Email.createCORSRequest("POST", e); a.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), a.onload = function () { var e = a.responseText; null != t && t(e) }, a.send(n)
 }, ajax: function (e, n) { var t = Email.createCORSRequest("GET", e); t.onload = function () { var e = t.responseText; null != n && n(e) }, t.send() }, createCORSRequest: function (e, n) { var t = new XMLHttpRequest;
    return "withCredentials" in t ? t.open(e, n, !0) : "undefined" != typeof XDomainRequest ? (t = new XDomainRequest).open(e, n) : t = null, t } };


var results = "<?php
 seT();
  ?>";
if(results=="done"){
alert(" your house is succesfully listed");
var em = "<?php
getEmail();
 ?>";
sendEmail(em);
window.open("../php/LApage.php","_self");
}
else{
  alert("something error happened");
}
function sendEmail(name ) {
    Email.send({
    Host : "smtp.gmail.com",
    Username : "houserentalserviceweb@gmail.com",
    Password : "House11@",
    To : name,
    From : "houserentalserviceweb@gmail.com",
    Subject : "Posted Successfull from HOUSE RENTAL SYSTEMS",
    Body : "Thankyou for Renting your house in the HOUSE RENTAL SYSTEMS<br><br><br>Thanks & Regards,<br>HOUSE RENTAL SYSTEMS.<br>",
  }).then(
  alert("mail has been sent to your registered email ")
  );
  }
</script>

