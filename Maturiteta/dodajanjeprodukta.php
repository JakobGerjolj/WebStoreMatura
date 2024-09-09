<?php




$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");


$sql="select * from produkt order by idprodukt DESC limit 1";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");

while($zapis=mysqli_fetch_assoc($rs)){
$novID=$zapis["idProdukt"]+1;


	}


echo $novID;
$ime=$_GET["prodname"];
$opis=$_GET["opis"];
$cena=$_GET["cena"];
$img=$_GET["img"];
$idV=$_GET["vrsta"];
$zaloga=$_GET["zaloga"];


$sql2="select * from vrstaProdukta where Imevrste='$idV'";


$rs2=mysqli_query($povezava,$sql2) or die("Napaka3");

while($zapis1=mysqli_fetch_assoc($rs2)){
$idreal=$zapis1["idvrstaProdukta"];

	}
	
	
	
	$sql3="insert into produkt values($novID,'$ime','$opis',$cena,'$img',$idreal,$zaloga)";
$rs3=mysqli_query($povezava,$sql3) or die("<h1>Napaka4 - Parametri niso pravilni</h1>
</br>
<a href=\"prodajalec.php\"><button>Nazaj na stran</button></a>
");	

header('Location: prodajalec.php');


?>