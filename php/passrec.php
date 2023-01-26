<?php

function connection()
{
  $email = $_POST['email'];
  $pass = $_POST['password1'];
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $update = "update registration set password = ? where email = ?";
    $select = " select email from registration where email = ? limit 1";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==1){
      $stmt->close();
      $stmt = $conn->prepare($update);
      $stmt->bind_param("ss",$pass,$email);
      $stmt->execute();
      echo "Yes";
    }
    else{
      echo "No";
    }
}
 ?>

 <script type="text/javascript">
   var result = "<?php
   connection(); ?>";
   if(result == "Yes"){
     alert("successfully changed your password");
    window.open("../html/loginPage.html","_self");
   }
   else{
     alert("your email is not registered");
   }
 </script>
