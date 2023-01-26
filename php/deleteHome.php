<?php 

function connection()
{

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $id = $_GET['id'];
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $del = "delete from sethome where houseid='$id'";
  //$res = $conn->query($del);
  //echo "$res";
 if($conn->query($del)){
    echo "Yes";
  }
  else{
    echo "No";
  }

}

 ?>

<script type="text/javascript">
  var ans = "<?php connection(); ?>";
  alert("the ans is"+ans);
  if(ans=="Yes"){
    alert("Your home is successfully deleted");

  }
  else if(ans=="No"){
    alert("Your home Removing is unsuccessful");
  }
  else{
    alert("something is fishy");
  }
  window.open("../php/LApage.php","_self");
</script>