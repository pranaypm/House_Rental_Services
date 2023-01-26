<?php 

function connection()
{

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $id = $_GET['id'];
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $select = "select housetype,price,city from sethome where houseid= $id";
    $result = $conn->query($select);

    while($row = $result->fetch_assoc()){
    echo $row['housetype']." ".$row['price']." ".$row["city"]." ";
  }


}

 ?>

<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/selectedhome.css">
</head>
<body>

 <div id = "Main">
  <div class ="head1">

    <div class="class1">

        <section>
        <div class="main">
        <div class="p1"><img class="mySlides" src="../images/house1.jpg" height=350px width=400px></div>
        <div class="p1"><img class="mySlides" src="../images/house2.jpg" height=350px width=400px></div>
        <div class="p1"><img class="mySlides" src="../images/house3.jpg" height=350px width=400px></div>
        <div class="p1"><img class="mySlides" src="../images/house4.jpg" height=350px width=400px></div>
        </div>
        </section>
         <script>

        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}
          x[myIndex-1].style.display = "block";
          setTimeout(carousel, 2500);
        }
        </script>


      </div>


    <form class="selectingForm" name ="formm" onsubmit=" return goPay();">
      <div class="input1">
        <label>Type of Home  &nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id ="typeof" >
      </div>

      <div class="input1">
        <label>Price (per Month) : </label>
        <input type="text" class= "inputfields" id="ownerName" >
      </div>

      <div class="input1">
        <label>Location &nbsp &nbsp  &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
       <input type="text" class= "inputfields" id ="Location" >
      </div>

      <div class="input1">
        <label>Details  &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "details" >
      </div>

      <div class="input2">
        <button id="update" type="button" >update</button>
        <button id="delete" type="button" onclick="goDel();">Delete</button>
        <a href="../php/LApage.php"><button id ="back" type="button">back</button></a>

      </div>
    </form>
  </div>
  <div class="linkClass" id="lc">

  </div>

 </div>
</body>
</html>

<script type="text/javascript">
  function goDel(){
     var id = "<?php echo $_GET['id']; ?>";
    if(confirm("Do you really wanted to delete your home")){
      window.open("../php/deleteHome.php?id="+id+"","_self");
    }
    else{

    }
  }
	var details = "<?php 
    connection();
   ?> ";
	var detail = details.split(" ");
	document.getElementById('typeof').value = detail[0];
	document.getElementById('ownerName').value = detail[1];
	document.getElementById('Location').value = detail[2];
	document.getElementById('details').value = "the rooms are good";



</script>