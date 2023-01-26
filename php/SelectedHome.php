<?php 

function connection()
{

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "houserentalsystems";
  $Id = $_GET['ID'];
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  $select = "select housetype,price,city,bike,car,pets,fstatus,hface,dprice,nfloor,nwashroom,nbalcony from sethome where houseid= $Id";
    $result = $conn->query($select);

    while($row = $result->fetch_assoc()){
    echo $row['housetype']." ".$row['price']." ".$row["city"]." ".$row['bike']." ".$row['car']." ".$row['pets']." ".$row['fstatus']." ".$row['hface']." ".$row['dprice']." ".$row['nfloor']." ".$row['nwashroom']." ".$row['nbalcony'];
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
        <input type="text" class= "inputfields" id ="typeof" readonly >
      </div>
      <div class="input1">
        <label>Price (per Month) : </label>
        <input type="text" class= "inputfields" id="ownerName" readonly >
                <label>Price (per Day) : </label>
        <input type="text" class= "inputfields" id="dprice" readonly>
      </div>
      <div class="input1">
        <label>Location &nbsp &nbsp  &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
       <input type="text" class= "inputfields" id ="Location" readonly>
      <label>Details  &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "details" readonly>
      </div>



      <div class="input1">
        <label>Bike Parking &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "bike" readonly>
                <label>Car Parking  &nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "car" readonly>
      </div>      <div class="input1">
        <label>Pets Allowed &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "pets" readonly>
                <label>furnishing &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "fstatus" readonly>
      </div>



      <div class="input1">
        <label>Facing Direction  &nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "hface" readonly>
        <label>floor   &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "floor" readonly>
      </div>

      <div class="input1">
        <label>Balcony  &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "balcony" readonly>
        <label>Washrooms  &nbsp &nbsp&nbsp&nbsp&nbsp: </label>
        <input type="text" class= "inputfields" id = "wash" readonly>
      </div>

      <div class="input1">
         <label>Number of Months: </label>
        <input type="number" class= "inputfields"  name="months" id="months" placeholder="0" required>
        <label>Number of Days: </label>
        <input type="number" class= "inputfields"  name="days" id="days" placeholder="1" required>
      </div>


      <div class="input2">
        <button id="pay" class="pay" type="submit" >Payment</button>
        <a href="../php/showHomes.php"><button id ="back" type="button">back</button></a>
      </div>
    </form>
  </div>
  <div class="linkClass" id="lc">

  </div>

 </div>
</body>
</html>

<script type="text/javascript">

	var details = "<?php 
    connection();
   ?> ";
	var detail = details.split(" ");
	document.getElementById('typeof').value = detail[0];
	document.getElementById('ownerName').value = detail[1];
  document.getElementById('dprice').value = detail[8];
	document.getElementById('Location').value = detail[2];
	document.getElementById('details').value = "the rooms are good";

  var bik = detail[3];
  if(bik==1){
    document.getElementById('bike').value ="Allowed";
  }
  else{
    document.getElementById('bike').value= "Not Allowed";
  }

  var car = detail[4];
  if(car==1){
    document.getElementById('car').value ="Allowed";
  }
  else{
    document.getElementById('car').value= "Not Allowed";
  }
  var pet = detail[5];
  if(pet==1){
    document.getElementById('pets').value ="Allowed";
  }
  else{
    document.getElementById('pets').value= "Not Allowed";
  }
   var fstatus = detail[6];
  if(fstatus==2){
    document.getElementById('fstatus').value ="Fully Furnished";
  }
  else if(fstatus==1){
    document.getElementById('fstatus').value = "semi Furnished";
  }
  else{
    document.getElementById('fstatus').value= "Not Furnished";
  }

  var hface = detail[7];
  var dir = "East";
  if(hface==2){
    dir="West";
  }
  else if(hface==3){
    dir="North";
  }
  else if(hface==4){
    dir="South";
  }
  document.getElementById('hface').value =dir;

  var nfloor = detail[9];
  document.getElementById('floor').value =nfloor;
   
   var nbal = detail[11];
  document.getElementById('balcony').value =nbal;
   
  var wash = detail[10];
  document.getElementById('wash').value =wash;

    var id = "<?php 
    echo $_GET['ID']; 
    ?>";
/*
" <a href='../php/ShowingLoc.php?id='"+id"'><iframe src='../php/ShowingLoc.php?id='"+id+"'  name='iframename1' height='300px' width='300px'></iframe></a>"


*/
 // document.getElementsByClassName("linkClass").innerHTML = "<iframe src='../php/ShowingLoc.php?id='"+id+"' height='300px' width='300px'></iframe>";
/* var k = "<iframe src='../php/ShowingLoc.php?id='";
 var s = k+id;
 alert("the value is "+s);
 var cc = s+ "' height='300px' width='300px'></iframe>";
 document.getElementById("lc").innerHTML =cc;
*/

var x = document.createElement("IFRAME");
x.style.width = "300px";
x.style.height = "300px";
x.src = "../php/ShowingLoc.php>id="+id+"";

//document.getElementById("lc").appendChild(x);


  function goPay()
  { 
    var months = document.formm.months.value;
    var days = document.formm.days.value;
     
    window.open("../php/payment.php?id="+id+"&mon="+months+"&days="+days+"","_self");
   return false;
  
  }

</script>