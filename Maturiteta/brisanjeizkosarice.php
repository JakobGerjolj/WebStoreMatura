<?php

$idK=$_GET["idK"];


$povezava=mysqli_connect('localhost','root','','mydb') or die("Napaka1");


$sql="delete from kosarica_izdelek where idkosarica_izdelek=$idK";

$rs=mysqli_query($povezava,$sql) or die("Napaka2");





header('Location: kosarica.php');








?>