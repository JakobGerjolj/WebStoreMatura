<!DOCTYPE html>
<html>
<head>
<style>
.velikiNapis{
	margin: left;
  width: 50%;
  border: 3px solid green;
padding: 10px;}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;
background-color:#25527B;
font-family: 'Dela Gothic One', cursive;


}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #6a9ad9;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #8ab1e6;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #0c366e;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: center;
  width: 25%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
	

</style>
<title>Registracija</title>
</head>
<body>
<?php
$nameError=$emailErr="";
$povezava=mysqli_connect('localhost','root','','mydb');
$deluje=true;
/*


echo '
ime- $_GET['namesur']
<br>
mail- $_GET['email']
<br>
pass- $_GET['psw']
<br>
usrname- $_GET['usrname']
<br>
naslov- $_GET['naslov']
<br>
telst - $_GET['telst']
'





*/
$sql2="select * from uporabnik";


$rs2=mysqli_query($povezava,$sql2);



while($zapis2=mysqli_fetch_assoc($rs2) and $deluje){
	if($zapis2["username"]==$_GET["usrname"]){
		$deluje=false;
		echo 'To uporabniško ime že obstaja!';
		
	}
	
	
	
}







if (!preg_match("/^[a-zA-Z-čšž' ]*$/",$_GET['namesur'])) {
      $deluje=false;
	  echo "Samo navadne črke dovoljene za ime in priimek";
    }
  
$email = $_GET["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$deluje=false;
      $emailErr = '<span style="color:red">Napačen email format</span>';
	  echo '<br>'.$emailErr;
    }
	
	if(!($_GET['psw']==$_GET['psw-repeat'])){
		$deluje=false;
		echo '<br>Ponovno Geslo se ne ujema';
		
	}
	
	
	if (!preg_match("/^[0-9a-zA-Z-čšž' ]*$/",$_GET['usrname'])) {
		$deluje=false;
      
	  echo '<span style="color:red">Samo navadne črke dovoljene za uporabniško ime</span>';
    }
	
	if (!preg_match("/^[0-9a-zA-Z-čšž' ]*$/",$_GET['psw'])) {
		$deluje=false;
      
	  echo '<span style="color:red">Neveljavno geslo</span>';
    }
	
	if (!preg_match("/^[0-9a-zA-Z-čšž' ]*$/",$_GET['naslov'])) {
		$deluje=false;
      
	  echo '<br><span style="color:red">Naslov je neveljaven</span>';
    }
	
	if (!preg_match("/^[0-9a-zA-Z-čšž' ]*$/",$_GET['telst'])) {
		$deluje=false;
      
	  echo '<br><span style="color:red">Telefonska stevilka neveljavna</span>';
    }
	
	
if(!$deluje){
echo '<div class="velikiNapis"><p style="font-size: 40px">Registracija ni uspela</p></div>';	

echo '
<form action="registracija1.php">

<div class="clearfix">
      
      <button type="submit" class="signupbtn">Ponovno poskusi registracijo</button>
    </div>
   
</form>
<form action="GlavnaStran.php">

<div class="clearfix">
      
      <button type="submit" class="cancelbtn">Odpoved registracije</button>
    </div>
   
</form>

';}

else{
	echo '<div class="velikiNapis"><p style="font-size: 40px">Registracija je uspela</p></div>';	

echo '
<form action="GlavnaStran.php">

<div class="clearfix">
      
      <button type="submit" class="signupbtn">Nadaljuj na stran</button>
    </div>
   
</form>


';

	
	
	
	
	
}


if($deluje){

if(!$povezava){
	echo "Napaka";
	exit();
	
	
}else{
$usrname=$_GET['usrname'];
$pass=$_GET['psw'];

$passhash=md5($pass);


$mail=$_GET['email'];
$ime=$_GET['namesur'];
$naslov=$_GET['naslov'];
$telst=$_GET['telst'];
$spol=$_GET['spol'];
$datum=$_GET['datrojstva'];



	echo 'uspesno';

	
	
	$sql="insert into Uporabnik values(NULL,'$usrname','$passhash','$mail','$ime','$naslov','$telst','$spol','$datum',2)";
	
	
	$rs=mysqli_query($povezava,$sql) or die("Napaka");
	
	
	//$sql1="select idkosarice from kosarica order by idkosarice DESC limit 1"
	
	
	
	//echo '<br>';
	//while($zapis=mysqli_fetch_assoc($rs)){
	//	echo $zapis["idVrstaUporabnika"].' '.$zapis["ImeVrste"].'<br/>' ;
		
		
	//}
}
	
	



mysqli_close($povezava);

}

?>
</body>
</html>
