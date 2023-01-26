
<?php
session_start();

if($_SESSION['email']==false){
  header("location:../index.html");
}
else{


  /*
  function getUser(){
    $usermail = $_SESSION["email"];
    echo "$usermail";
  }
  */
  function set()
  {
    # code...

    $email = $_POST['email'];
  $name = $_POST['FullName'];
  $subject = $_POST['subject'];

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $insert ="insert into customercare values('$name','$email','$subject')";
  $stmt = $conn->query($insert);
  //$stmt->bind_param("ssidd",$email,$typeHouse,$price,$lati,$long);
  //$stmt->execute();
  echo "done";

  }

}
 ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/mailsend.js"></script> 
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}


input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #9932CC;
}

input[type=button]:hover {
  background-color: #9932CC;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<link rel="stylesheet" href="..\css\RegistrationPage.css">
<body>
<marquee>Please login to our website to book a house </marquee>
<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p >Leave us a feedback:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="../images/house2.jpg" style="width:100%">
    </div>
    <div class="column">
      <form method="post" onsubmit="return send()">

        <label for="fname">Full Name</label>
         <input  type="text" name="FullName" placeholder=" Enter Full Name " required>
        <label for="lname">Email</label>
        <input  id="lname" type="email" name="email" placeholder="Email" required>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"  required></textarea>
       
  <div class="button1">

        <button class="button" type="submit"  > <span> Submit </span></button>
        <a href="../php/LApage.php"><button class="button" type="button" > <span> Back </span></button></a>
             </div>
      </form>

    </div>
  </div>
</div>

</body>
</html>


<script type="text/javascript">
  
  function send() {
    var details = document.getElementById('subject').value;
    var userEmail = document.getElementById('lname').value;
    var dd=details + "<br><br> your response has been Received <br>Thanks & Regards,<br>HOUSE RENTAL SYSTEMS.<br>"
    sendEmail(userEmail,"Response Received",dd);



  var sending = "<?php set(); ?>";
  if(sending === "Yes"){
    alert("your Response has been posted");
  }
  }

</script>