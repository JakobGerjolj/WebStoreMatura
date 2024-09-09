<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>
.velikiNapis{
	margin: left;
  width: 50%;
  border: 3px solid green;
padding: 10px;}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}	
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
  float: left;
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
     width: 25%;
  }
}
	
	

</style>
<title>Registracija</title>
</head>
<body>
<?php
$nameError=$emailErr="";

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
if (!preg_match("/^[0-9a-zA-Z-čšž' ]*$/",$_POST['luname'])) {
		$deluje=false;
      
	  echo '<span style="color:red">Samo navadne črke dovoljene za uporabniško ime</span>';
    }

if (!preg_match("/^[0-9a-zA-Z-čšž' ]*$/",$_POST['lpsw'])) {
		$deluje=false;
      
	  echo '<span style="color:red">Neveljavno geslo</span>';
    }
	
	
	
	
if($deluje){
$pravi=false;
$povezava=mysqli_connect('localhost','root','','mydb');
if(!$povezava){
	echo "Napaka";
	exit();
	
	
}else{




	//echo 'uspesno';

	
	
	$sql="select * from uporabnik";
	
	
	$rs=mysqli_query($povezava,$sql) or die("Napaka");
	
	
	//$sql1="select idkosarice from kosarica order by idkosarice DESC limit 1"
	
	
	
	echo '<br>';
	while($zapis=mysqli_fetch_assoc($rs)){
		
		if($zapis['username']==$_POST['luname'] and $zapis['password']==md5($_POST['lpsw'])){
			
			$pravi=true;
			$_SESSION["vrsta"]=$zapis["idVrstaUporabnika"];
			$_SESSION["ime"]=$zapis["Ime"];
			$_SESSION["username"]=$zapis["username"];
			$_SESSION["iduser"]=$zapis["idUporabnik"];
		}
		
		
	}
}
	
	



mysqli_close($povezava);

}	
	if($pravi==false){
		$deluje=false;
		echo 'Napačna prijava';
		
		
		
	}
	
if(!$deluje){
echo '<div class="velikiNapis"><p style="font-size: 40px">Prijava ni uspela</p></div>';	

echo '
<form action="login1.php">

<div class="clearfix">
      
      <button type="submit" class="signupbtn">Ponovno poskusi prijavo</button>
    </div>
   
</form>
<form action="GlavnaStran.php">

<div class="clearfix">
      
      <button type="submit" class="cancelbtn">Odpoved prijave</button>
    </div>
   
</form>

';}

else{
	echo '<div class="velikiNapis"><p style="font-size: 40px">Prijava je uspela</p></div>';	

echo '
<form action="GlavnaStran.php">

<div class="clearfix">
      
      <button type="submit" class="signupbtn">Nadaljuj na stran</button>
    </div>
   
</form>


';

	
	
	
	
	
}




?>
</body>
</html>
