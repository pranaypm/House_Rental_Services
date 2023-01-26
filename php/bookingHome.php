

<?php
session_start();
if($_SESSION['email']==false){
  header("location:../index.html");
}
else{

	$email = $_SESSION["email"];

	function getEmail()
	{
		$email = $_SESSION["email"];
		echo $email;
	}


	function connection()
	{
		$email = $_SESSION["email"];		
		  $dbhost = "localhost";
		  $dbuser = "root";
		  $dbpass = "";
		  $db = "houserentalsystems";
		  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
		  $select = "select * from bookings where renteemail ='$email'";
		    $result = $conn->query($select);
		    while($row = $result->fetch_assoc()){
		    echo $row['houseid']." ".$row['cost']." ".$row["address"]." ";
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
	  $select = "select * from bookings where renteemail = '$email'";
	    //$result = $conn->query($select);
	    //$stmt = $result->execute();
	  $mysqli_result=mysqli_query($conn,$select);
	   $rowcount=mysqli_num_rows($mysqli_result);
	   /* $row = mysqli_num_rows($result);
	if ($row)
	{
	  echo "$row";
	}
	*/
	echo $rowcount;
	}
}

 ?>





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



 <script type="text/javascript">

var d = "<?php
connection()
 ?>";

 var e = "<?php getEmail() ?>";
 
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