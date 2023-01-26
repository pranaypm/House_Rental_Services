<?php
session_start();
function gettingEmail()
{
  $email = $_POST['email'];
  echo "$email";
}
function connection()
{
$username = $_POST['FullName'];
$email = $_POST['email'];
$pass = $_POST['pass1'];
$mobileno = $_POST['MobileNumber'];
if(!empty($username) || !empty($email) || !empty($pass)) {
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $select = "select email from registration where email = ? Limit 1";
    $insert ="insert into registration values(?,?,?,?)";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==0){
      $stmt->close();

      $stmt = $conn->prepare($insert);
      $stmt->bind_param("ssss",$username,$email,$pass,$mobileno);
      $stmt->execute();
      echo "Yes";
    }
    else {
      echo "No";
    }

}
}
 ?>
<script type="text/javascript">
var Email = { send: function (a) { return new Promise(function (n, e) { a.nocache = Math.floor(1e6 * Math.random() + 1), a.Action = "Send"; var t = JSON.stringify(a); Email.ajaxPost("https://smtpjs.com/v3/smtpjs.aspx?", t, function (e) {
   n(e) }) }) }, ajaxPost: function (e, n, t) { var a = Email.createCORSRequest("POST", e); a.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), a.onload = function () { var e = a.responseText; null != t && t(e) }, a.send(n)
 }, ajax: function (e, n) { var t = Email.createCORSRequest("GET", e); t.onload = function () { var e = t.responseText; null != n && n(e) }, t.send() }, createCORSRequest: function (e, n) { var t = new XMLHttpRequest;
    return "withCredentials" in t ? t.open(e, n, !0) : "undefined" != typeof XDomainRequest ? (t = new XDomainRequest).open(e, n) : t = null, t } };
  var results = "<?php
   connection();
    ?>";
    //alert(results);
  if(results=='Yes'){
    alert(" account is successfully created");

  }
  else if(results=="No"){
    alert("user already exists");

  }
  var name = "<?php gettingEmail(); ?>";
  sendEmail(name);
  window.open("../html/loginPage.html","_self");
  function sendEmail(name ) {
    Email.send({
    Host : "smtp.gmail.com",
    Username : "houserentalserviceweb@gmail.com",
    Password : "House11@",
    To : name,
    From : "houserentalserviceweb@gmail.com",
    Subject : "Greetings from HOUSE RENTAL SYSTEMS",
    Body : "Thankyou for registering in the HOUSE RENTAL SYSTEMS<br><br><br>Thanks & Regards,<br>HOUSE RENTAL SYSTEMS.<br>",
  }).then(
  alert("mail has been sent to your registered email ")
  );
  }


</script>
