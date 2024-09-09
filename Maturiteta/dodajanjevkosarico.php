<?php
session_start();

$imeS=$_SESSION["trenutniIzdelek"];

$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");
$stevilo=$_GET["stevilo"];
$aktivno=1;

$sql="select * from produkt where ImeProdukta='$imeS'";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");

while($zapis=mysqli_fetch_assoc($rs)){
$idP=$zapis["idProdukt"];	
$idV=$zapis["idvrstaProdukta"];


	}
$idU=$_SESSION["iduser"];
echo $imeS;



$sql2="insert into kosarica_izdelek values(NULL,$stevilo,$aktivno,$idP,$idV,$idU)";

$rs2=mysqli_query($povezava,$sql2) or die("Napaka3");




header('Location: izdelek.php?imeizdelka='.$imeS.'');

?>