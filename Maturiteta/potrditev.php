<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Silent Case - spletna trgovina računalniških delov</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
  </style>
</head>
<body>

<div class="jumbotron text-left" style="margin-bottom:0;background-color:#25527B;">

  <a href="GlavnaStran.php"><img src="logo.jpg" width="250" height="250"></a> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
      <li class="nav-item">
        <a class="nav-link" href="iskanje.php">Iskanje</a>
      
	  
	  </li>   

<?php
if(!empty($_SESSION) and !is_null($_SESSION["ime"])){
	
if($_SESSION["vrsta"]==3){
	
echo'<li class="nav-item">
        <a class="nav-link" href="nadzor.php">Nadzor nad uporabniki </a>
      
	  
	  </li> ';
	
	
	
	
	
	
	
}	
	
	
	
if($_SESSION["vrsta"]==1 or $_SESSION["vrsta"]==3){
	
echo'<li class="nav-item">
        <a class="nav-link" href="prodajalec.php">Dodajanje novega produkta </a>
      
	  
	  </li> ';
	
	
	
	
	
	
	
}	
	if($_SESSION["vrsta"]==2){
	
echo '

<li class="nav-item nav-right">
        <a class="nav-link" href="kosarica.php">Košarica</a>
      
	  
	  </li> 
';

	
	
	
	
	
}
	


echo '

<li class="nav-item">
        <a class="nav-link" href="iskanje.php">Pozdravljen <strong>'.$_SESSION["ime"].'</strong> </a>
      
	  
	  </li> 
	  
	  

	  
	  
<li class="nav-item ">
        <a class="nav-link" href="odjava.php"><span style="color:red;font-size: 10px">Odjavi se</span></a>
      
	  
	  </li> 



';
}else echo '

 <li class="nav-item">
        <a class="nav-link" href="login1.php">Prijava</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registracija1.php">Registracija</a>
      </li>


'








?>



	   </ul>

  </div>  
</nav>

	
	<?php
	
	$stevilo=array();
	$uspesno=false;
	$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");
$id=$_SESSION["iduser"];
$sql="select * from kosarica_izdelek where Uporabnik_idUporabnik=$id";
$skupnacena=0;
$rs=mysqli_query($povezava,$sql) or die("Napaka2");


while($zapis=mysqli_fetch_assoc($rs)){
$stevilo[]=array($zapis["stevilo"],$zapis["Produkt_idProdukt"],$zapis["idkosarica_izdelek"]);

	
	
	
	
		//echo $zapis["ImeProdukta"];
		
		
	}

$sql2="select * from produkt";
echo '<h4>Košarica <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span></h4>';
$rs2=mysqli_query($povezava,$sql2) or die("Napaka3");
while($zapis1=mysqli_fetch_assoc($rs2)){
	for($ko=0;$ko<count($stevilo);$ko++){
		if($stevilo[$ko][1]==$zapis1["idProdukt"]){
			$skupnacena=$skupnacena+$zapis1["Cena"];
			
			if($stevilo[$ko][0]<$zapis1["zaloga"]){
				
				$uspesno=true;
				
			}else $uspesno=false;
			
			echo '
			<p><a href="#">'.$zapis1["ImeProdukta"].'*'.$stevilo[$ko][0].'</a> <span class="price">'.$stevilo[$ko][0]*$zapis1["Cena"].' €</span></p>
						
			
			
			
			
			';
			
		}
		
	}
	
	
}

if($uspesno){
	for($ko1=0;$ko1<count($stevilo);$ko1++){
	$stir=$stevilo[$ko1][0];
	$ids=$stevilo[$ko1][1];
	$sql3="update produkt set zaloga=zaloga-$stir where idProdukt=$ids";
	
	$rs4=mysqli_query($povezava,$sql3) or die("Napaka4");
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
for($ko2=0;$ko2<count($stevilo);$ko2++){
	$ids1=$stevilo[$ko2][2];
	$sql4="delete from kosarica_izdelek where idkosarica_izdelek=$ids1";
	
	$rs5=mysqli_query($povezava,$sql4) or die("Napaka5");
	
	
	
}
	

	
	
	
	
	
	
	
echo '<h1>Naročitev ušpešna</h1>';	
	
	
	
}else echo '<h1>Delov ni v zalogi</h1>';	

	
	
	
	
	
	
	?>
	
	
	
	
      
      





</body>
</html>
