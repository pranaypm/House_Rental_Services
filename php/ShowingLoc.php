
<?php 


function connection()
{

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $id = $_GET['ID'];
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $select = "select latitude,longitude from sethome where houseid= $id";
    $result = $conn->query($select);

    while($row = $result->fetch_assoc()){
    echo $row['latitude']." ".$row['longitude']." ";
  }


}

?>
<html>
<head>
	<title>ShowingLocation</title>
</head>
<body>
	<div id="mapholder">
		<add key="webpages:Enabled" value="true" />
	</div>
</body>

</html>

<script type="text/javascript">
	
alert("in the show location page");
var l = "<?php connection(); ?>";

alert("the values are "+l);
showPosition();
	function showPosition() {
  //var latlon = position.coords.latitude + "," + position.coords.longitude;

  var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+l+"&zoom=14&size=400x300&sensor=false&key=YOUR_KEY";

  document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}
</script>