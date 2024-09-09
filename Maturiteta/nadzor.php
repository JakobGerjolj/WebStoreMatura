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
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 75%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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



$sql="select * from uporabnik";


$rs=mysqli_query($povezava,$sql) or die("Napaka2");
echo '
<table id="customers">
  <tr>
    <th>ID</th>
    <th>USRNAME</th>
    <th>Geslo</th>
    <th>Email</th>
     <th>Ime</th>
      <th>Naslov</th>
       <th>Telefonska Številka</th>
        <th>Spol</th>
         <th>Datum rojstva</th>
          <th>Vrsta uporabnika</th>
           
  </tr>

';	
while($zapis=mysqli_fetch_assoc($rs)){


	//print_r($zapis);
	echo'
<tr>
    <td>'.$zapis["idUporabnik"].'</td>
    <td>'.$zapis["username"].'</td>
    <td>'.$zapis["password"].' <a href="resetpsw.php?id='.$zapis["idUporabnik"].'"><button>Resetiraj geslo</button></a></td>
 <td>'.$zapis["email"].'</td>
 <td>'.$zapis["Ime"].'</td>
 <td>'.$zapis["naslov"].'</td>
 <td>'.$zapis["TelSte"].'</td>
 <td>'.$zapis["Spol"].'</td>
 <td>'.$zapis["DatumRojstva"].'</td>
 <td>'.$zapis["idVrstaUporabnika"].'<a href="delete.php?id12='.$zapis["idUporabnik"].'"><button>Izbriši uporabnika</button></a></td>
</tr>';
	
		//echo $zapis["ImeProdukta"];
	
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
echo'</table>';
echo '(Samega sebe ne mores izbrisati )Trenuten uporabnik '.$_SESSION["ime"].'';

?>




</body>
</html>
