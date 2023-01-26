
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form name="myform" method="post" action="../php/dpage.php"></form>
<div class="house-input">
              <label name="housetype" id="type">Choose House Type:</label>
                <select name="typeHouse" size="1">
                  <option name="1BHK" value="1BHK">1BHK</option>
                  <option name="2BHK" value="2BHK">2BHK</option>
                  <option name="3BHK" value="3BHK">3BHK</option>
                  <option name="4BHK" value="4BHK">4BHK</option>
			
</div>
<button type="submit" onsubmit="get();">submit</button>

<input type="submit" name="submit" value="submit" onsubmit="get();">
</form>

</body>
</html>


<?php
session_start();
 function se(){
 	$typeHouse = "";
$typeHouse = $_POST['typeHouse'];
$_SESSION['housetype'] = $typeHouse;
 echo $typeHouse;
 }

?>


<script type="text/javascript">

	function get() {
		var e = "<?php
		 se();
		  ?>";
		alert("the value of e is "+e);		
	}
</script>