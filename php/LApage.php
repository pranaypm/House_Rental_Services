<?php
session_start();
if($_SESSION['email']==false){
  header("location:../index.html");
}
else{

function getUser(){
  $username = $_SESSION["username"];
  echo "$username";
}
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/LApage1.css">
  </head>
  <body>
    <div class="first">
      <ul>
        <li><a href="LApage.php">Home</a></li>
        <li><a href="../php/customerPage.php">customer care</a></li>
        <li><a href="../html/about.html">About us</a></li>
        <li id="user"><a href="#"><img src="../images/profile.png" width="40px" height="40px"></a>
        <ul>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="bookingHome.php">Bookings</a></li>
          <li><a href="../html/Sethouse.html">My Rentals</a></li>
          <li><a href="../php/logout.php"> logout</a></li>
        </ul>
        </li>
      </ul>
    </div>
    <div class="second">
      <iframe src="../php/showHomes.php" style="border:none;" name="iframename1" height="650px" width="1550px"></iframe>
    </div>
  </body>
  <script type="text/javascript">
    var username = "<?php
    getUser();
     ?>"
//document.getElementById('user').innerHTML = username;

  </script>
</html>
