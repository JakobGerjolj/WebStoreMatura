
<?php
session_start();

$id=$_GET["id12"];


if($id!=$_SESSION["iduser"]){

$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");


$sql2="delete from kosarica_izdelek where Uporabnik_idUporabnik='$id'";

$rs2=mysqli_query($povezava,$sql2) or die("Napaka2");






$sql="delete from uporabnik where idUporabnik='$id'";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");
}
header('Location: nadzor.php');



?>