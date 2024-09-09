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
  

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');

  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  
  .izdeleknad{
	  height:300px;
	  width:100%;
	  
	  
	  
  }
  
  .izdelek{
	  height: 300px;
  width: 20%;
  background-color: #C7CCDB;
   border: 3px solid black;
	  font-family: 'Noto Sans JP', sans-serif;
	  
  }
  
  .imeizdelka{
	    
  margin-bottom: 100px;
  margin-right: 100px;
  margin-left: 80px;
	  
  }
  .slikaizdelka{
	  margin-right: 15%;
  margin-left: 80px; 
	 margin-bottom: 10px;
  }
  .nigguh{
	  color:cyan;
	  
	  
  }
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

<nav class="navbar navbar-expand-sm bg-dark navbar-white">
  
	<form method="get" >
	<div style="color:#25527B;">
	<input type="text" name="iskanje">
	<span class="nigguh">
	</br>
	<strong>
	GPU: <input type="radio" name="vrsta" value=1>
	</br>
	DISKI: <input type="radio" name="vrsta" value=2>
	</br>
	MATIČNE PLOŠČE: <input type="radio" name="vrsta" value=3 >
	</br>
	OPTIČNI POGON: <input type="radio" name="vrsta" value=4>
	</br>
	CPU: <input type="radio" name="vrsta" value=5>
	</br>
	RAM: <input type="radio" name="vrsta" value=6>
	</br>
	OHIŠJE: <input type="radio" name="vrsta" value=7>
	</br>
	NAPAJALNIK: <input type="radio" name="vrsta" value=8>
	</br>
	HLADILNIK: <input type="radio" name="vrsta" value=9>
	</br>
	</strong>
	</span>
	<input type ="submit" name= "Submit">
	
	</div>
	</from>
  
</nav>
<!--
<div>

<div class="izdelek"> 
<img src="PALiTRTX3090.jpg" width="200" height="200" class="slikaizdelka"> 
<p class="imeizdelka"><a href="login1.php">PALiT GeForce RTX 3090 GamingPro OC graficna kartica<a/></p>
</div>
<div class="izdelek"> 
<img src="PALiTRTX3090.jpg" width="200" height="200" class="slikaizdelka"> 
<p class="imeizdelka"><a href="login1.php">PALiT GeForce RTX 3090 GamingPro OC graficna kartica<a/></p>
</div>
<div class="izdelek"> 
<img src="PALiTRTX3090.jpg" width="200" height="200" class="slikaizdelka"> 
<p class="imeizdelka"><a href="login1.php">PALiT GeForce RTX 3090 GamingPro OC graficna kartica<a/></p>
</div>

</div>
-->
<?php







$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");
$pois=$_GET["iskanje"];
$pois1=$_GET["vrsta"];


if(empty($pois1))
$sql="select * from produkt where ImeProdukta like '%$pois%'";
else $sql="select * from produkt where ImeProdukta like '%$pois%' and idvrstaprodukta=$pois1";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");

while($zapis=mysqli_fetch_assoc($rs)){
$slika=$zapis["imgsource"];
$naslov=$zapis["ImeProdukta"];
echo "
</div>
<div class=\"izdelek\"> 
<img src=\"$slika.jpg\" width=\"200\" height=\"200\" class=\"slikaizdelka\"> 
<p class=\"imeizdelka\"><a href=\"izdelek.php?imeizdelka=$naslov\">$naslov<a/></p>
</div>


";
	
	
	
	
		//echo $zapis["ImeProdukta"];
		
		
	}

?>



</body>
</html>
