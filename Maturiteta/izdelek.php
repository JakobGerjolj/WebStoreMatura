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
  h4{
	  margin-left: 10px;
	  
	  
  }
  
  .Cena{
	  padding-top: 25px;
  padding-right: 30px;
  padding-bottom: 25px;
  padding-left: 50px;
	  margin-left: 25%;
	  margin-right: 50%;
	  margin-top: -10%;
	  border-style: solid;
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

<?php

$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");

$imeS=$_GET["imeizdelka"];
$_SESSION["trenutniIzdelek"]=$imeS;
$sql="select * from produkt where ImeProdukta='$imeS'";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");

while($zapis=mysqli_fetch_assoc($rs)){
$Cena=$zapis["Cena"];
$Opis=$zapis["Opis"];
$Slika=$zapis["imgsource"];		
$Zaloga=$zapis["zaloga"];		
	}


echo '<h4>'.$_GET["imeizdelka"].'</h4>
<img src="'.$Slika.'.jpg" width=300px height= 300px class="img-thumbnail" alt="Responsive image">
<div class="Cena">
Cena: '.$Cena.' € 
</br>
Na zalogi: '.$Zaloga.'


</br>

';

if(!is_null($_SESSION["ime"])){
if($_SESSION["vrsta"]==2)
echo '

<form action="dodajanjevkosarico.php">
<input type="number" name="stevilo" value="1" min="1" max="23" placeholder="stevilo Izdelkov" required>
<button type="submit">Dodaj v Kosarico </button>
</form>


';

if($_SESSION["vrsta"]==1 or $_SESSION["vrsta"]==3){
	echo '<form action="znizanjezaloge.php">
	
	<input type="number" name="st" value="1" required>
	</br>
	Višanje: <input type="radio" name="visanje" value="plus" required>
	</br>
	Nižanje: <input type="radio" name="visanje" value="minus" required>
</br>
	<button type="submit">Žnižaj/Žvišaj zalogo</button>
	
	
	
	
	
	';
	
	
	
	
	echo '</form>';
}




}else {
	
	echo '<p>Ce zelite nakupovati se prijavite</p>';
	
	
}





echo '


</div>
</br>
</br>
</br>
</br>
</br>
Opis:
'.$Opis.'


';

?>








</body>
</html>
