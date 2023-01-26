<?php
session_start();


function connection(){
  //$email = "munnaf.prince.48@gmail.com";
  $email = $_SESSION['email'];
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $select = "select username,email,mobileno from registration where email = '$email' Limit 1";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    echo $row['username']." ".$row['email']." ".$row["mobileno"];
//$conn->close();
}





/*
function updating()
{
  $email = $_SESSION['email'];
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
 
 // if (isset($_POST['FullName'])) {
   // $username = $_POST['FullName'];
//}
  //if(isset($_POST['MobileNumber'])) {
    //$mobileno = $_POST['MobileNumber'];
}


  $mobileno = "";
  $username = "";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


  if (isset($_POST['FullName'])) {
    $username = $_POST['FullName'];
}

  if(isset($_POST['MobileNumber'])) {
    $mobileno = $_POST['MobileNumber'];
}



 //  $username = isset($_POST['FullName']) ? $_POST['FullName'] :" ";
 // $mobileno = isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :" ";


  $update = "update registration set username='$username',mobileno='$mobileno' where email = '$email'";
  if($conn->query($update)===TRUE)
    echo "Yes";
  else
    echo "No";

 // $conn->close();
}
*/
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Profile</title>
    <link rel="stylesheet" href="..\css\RegistrationPage.css">
	<script src="../js/RegistrationPage.js"></script>
  </head>
  <body>
  		<div class="class1">
  			<div class="registration-div">
          <form class="registration-form" name="registrate" method="post">
  		<!--		<form class="registration-form" name="registrate" onsubmit=" return update()" method="post">--> 
  					<span class="registration-form-title"> Profile </span>
				<br />
        <div class="registration-input2">
          <!--<img src="../images/dp.jpg" alt="profile picture" width="200px" height="200px"> -->
          <div class="profilepic">
            <img class="ppic" src="../images/dp.jpg" alt="profile picture" width="195px" height="195px">
            <div class="middle">
              <button class="pbut" type="button" name="button">Edit</button>
            </div>

          </div>
        </div>
            <div class="registration-input" >
              <input class="input100" type="text" id="FullName" name="FullName" placeholder=" Enter Full Name " required readonly>
            </div>
            <div class="registration-input" >
              <input class="input" type="Number" id="MobileNumber" name="MobileNumber" placeholder="Mobile Number" required readonly>
            </div>
			<div class="registration-input" >
			<input class="input" type="email" id="email" name="email" placeholder="Email" required readonly>
			</div>
  			<!--		<div class="registration-input">
  						<input class="input" type="password" id="pass1" name="pass1" placeholder="Password" required readonly>
  					</div> -->
       <!-- <div class="registration-input1">
          <button class="editButton" type="button" name="button" onclick="editing()"><span>edit</span></button>
        </div> -->
        <div class="button1">
				<button class="button" id="sub" type="submit" disabled> <span> submit </span></button>
				<a href="../php/LApage.php"><button class="button" type="button" > <span> Back </span></button></a>
		         </div>
      </form>
  	</div>
  </body>
  
</html>

<script type="text/javascript">
    console.log(" in the profile page");
    var result = "<?php
    connection();
     ?>";
     alert(result);
     console.log(result);
     var arr = result.split(" ");
     document.getElementById('FullName').value = arr[0];
     document.getElementById('MobileNumber').value = arr[2];
     document.getElementById('email').value = arr[1];
     //document.getElementById('pass1').value = arr[2];

     function editing() {
      console.log("the button is clicked");
       document.getElementById('FullName').readOnly = false;
       document.getElementById('MobileNumber').readOnly = false;
       //document.getElementById('email').readOnly = false;
       //document.getElementById('pass1').readOnly = false;
       document.getElementById('sub').disabled = false;
       return true;

     }

     /*
     function update() {
      console.log("in the update");
      var result = "<?php
      //updating();
      ?>";
      console.log("the result is "+result);
      if(result == "Yes"){
        alert("Your profile has been edited successfully");
        window.open("../php/LApage.php","_self");
        return true;
      }
      else{
        alert("No");
        console.log("No");
      }
      
     }
     */

  </script>