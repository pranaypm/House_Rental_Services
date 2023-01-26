<!DOCTYPE html>
<html>
<head>
	<title>myRooms</title>
	<link rel="stylesheet" href="../css/myroom.css">
</head>
<body>
	<dir id="main">
		
	</dir>
</body>
</html>

<?php
session_start();
function connection()
{
	$email = $_SESSION["email"];		
	  $dbhost = "localhost";
	  $dbuser = "root";
	  $dbpass = "";
	  $db = "houserentalsystems";
	  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	  $select = "select housetype,price,city from sethome where email ='$email'";
	    $result = $conn->query($select);
	    while($row = $result->fetch_assoc()){
	    echo $row['housetype']." ".$row['price']." ".$row["city"]." ";
	  }

}
function getrows()
{
	$email = $_SESSION["email"];
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $select = "select housetype,price,city from sethome where email = '$email'";
    $result = $conn->query($select);
    $row = mysqli_num_rows($result);
if ($row)
{
  echo "$row";
}
}

 ?>

 <script type="text/javascript">
var d = "<?php
connection();
 ?>";
 var n ="<?php
 getrows();
  ?>";
 var details = d.split(" ");
for(var i=0,j=0;i<n;i++){

var div = document.createElement("div");
div.style.width = "70px";
div.style.height = "70px";
div.style.background = "powderblue";
div.id = "subdiv["+i+"]";
div.style.color = "black";

var atag = document.createElement("a");
atag.href = "#";
atag.appendChild(div);

document.getElementById("main").appendChild(atag);



//document.getElementById("main").appendChild(div);
var div1 = document.createElement("div");
div1.id = "subdivv";
div1.style.padding="0px";
document.getElementById("subdiv["+i+"]").appendChild(div1);
div1.innerHTML = "House"+(i+1);
}

 </script>