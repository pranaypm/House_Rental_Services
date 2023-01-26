<?php
session_start();
function connection()
{
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $select = "select housetype,price,city,houseid,housename from sethome where booked= 0";
    $result = $conn->query($select);
    while($row = $result->fetch_assoc()){
    echo $row["housename"]." ".$row['housetype']." ".$row['price']." ".$row["city"]." ".$row["houseid"]." ";
  }

}
function getrows()
{
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $select = "select housetype,price,city,houseid from sethome where booked=0";
    $result = $conn->query($select);
    $row = mysqli_num_rows($result);
if ($row)
{
  echo "$row";
}
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>display homes</title>
    <link rel="stylesheet" href="../css/showHomes.css">
  </head>
  <body>
    <div id="main">
    </div>
  </body>
</html>
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
div.style.width = "350px";
div.style.height = "400px";
div.style.background = "powderblue";
div.id = "subdiv["+i+"]";
div.style.color = "black";
document.getElementById("main").appendChild(div);
var div1 = document.createElement("div");
div1.id = "subdivv";
image1 = new Image();
var ii =Math.floor((Math.random()*4));
image1.src = "../images/house"+ii+".jpg";
image1.style.width ="300px";
image1.style.height = "200px";
image1.style.padding= "10px 0px 0px 0px";
document.getElementById("subdiv["+i+"]").appendChild(image1);
div1.style.padding="0px";

document.getElementById("subdiv["+i+"]").appendChild(div1);
div1.innerHTML = "House Name :&nbsp&nbsp"+details[j++]+"<br>House Type &nbsp&nbsp: &nbsp&nbsp"+details[j++]+"<br>Price &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp"+details[j++]+"<br>city &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp"+details[j++]+"<br>";

var btn = document.createElement("button");
btn.style.width="200px";
btn.style.height = "50px";
btn.onclicked="hello("+i+");";
var bname = document.createTextNode("See it!");
bname.id = "nameid";
btn.id="button"+i;
btn.appendChild(bname);
//document.getElementById("subdiv["+i+"]").appendChild(btn);

var atag = document.createElement("a");
atag.href = "../php/SelectedHome.php?ID="+details[j++]+"";
atag.appendChild(btn);

document.getElementById("subdiv["+i+"]").appendChild(atag);
var mid = i;
}



</script>
