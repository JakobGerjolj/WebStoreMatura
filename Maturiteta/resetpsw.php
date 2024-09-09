
<?php


$id=$_GET["id"];
echo '
<form action=reset.php>
Id uporabnika:
<input type="text" name="idup" value="'.$id.'">
<br/>
Novo geslo:
<input type="text" name="newpsw">


<button type="Submit">RESET</button>



</form>
'



?>