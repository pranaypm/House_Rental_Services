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

if($_SESSION['email']==false){
  header("location:../index.html");
}
	else{
	function connection()
	{
		$email = $_SESSION["email"];		
		  $dbhost = "localhost";
		  $dbuser = "root";
		  $dbpass = "";
		  $db = "houserentalsystems";
		  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
		  $select = "select houseid from sethome where email ='$email'";
		    $result = $conn->query($select);
		    while($row = $result->fetch_assoc()){
		    echo $row['houseid']." ";
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
atag.href = "../php/dupdate.php?ID="+details[i]+"";
atag.target = "_parent";
atag.appendChild(div);


document.getElementById("main").appendChild(atag);



var div1 = document.createElement("div");
div1.id = "subdivv";
div1.style.padding="0px";
document.getElementById("subdiv["+i+"]").appendChild(div1);
div1.innerHTML = "House"+details[i];

/*
var dd = document.createElement("div");
//dd.setAttribute("id","MyDiv");
dd.id="MyDiv["+i+"]";
document.body.appendChild(dd);
var dl = document.createElement("UL");
//dl.setAttribute("id","MyUl");
dl.id = "Myul["+i+"]";
document.getElementById("MyDiv["+i+"]").appendChild(dl);
var di = document.createElement("LI");
var t = document.createTextNode("UPDATE");
di.appendChild(t);
document.getElementById("Myul["+i+"]").appendChild(di);
var di1 = document.createElement("LI");
var t1 = document.createTextNode("DELETE");
di1.appendChild(t1);
document.getElementById("Myul["+i+"]").appendChild(di1);
*/
}

 </script>