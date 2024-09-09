
<?php


$id=$_GET["idup"];
$newpsw=$_GET["newpsw"];



$hash=md5($newpsw);





$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");


$sql="update uporabnik set password='$hash' where idUporabnik=$id";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");


header('Location: nadzor.php');



?>