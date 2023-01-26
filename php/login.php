<?php
session_start();
function getvalues(){
  $email = $_POST['email'];

  $_SESSION['email']=$email;
  echo $email;
}




function connection()
{
  $email = $_POST['email'];
  $pass = $_POST['password'];
if(!empty($email) || !empty($pass)) {
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $select = "select username,password from registration where email = '$email' Limit 1";
    $res = $conn->query($select);
    if($res->num_rows>0){
      $row = $res->fetch_assoc();
      if($row["password"]==$pass){
        $_SESSION['username']=$row["username"];
        echo "Yes";
      }
      else{
        echo "No";
      }
    }
    else{
      echo " no entires";
    }

}
}
 ?>
<script type="text/javascript">
  var email = "<?php
   getvalues();
    ?>";
  var results = "<?php
     connection();
      ?>";
  if(results=='Yes'){
    alert(" login successful");
    window.open("../php/LApage.php","_top");
  }
  else if(results=="No"){
    alert("Invalid username or password");
    window.open("../html/registrationPage.html","_self");
  }
  else if(results=="no entires"){
    alert("no username is found in our database");
    window.open("../html/registrationPage.html","_self");
  }


</script>
