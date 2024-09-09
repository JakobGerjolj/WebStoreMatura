<!DOCTYPE html>
<html>


<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
<title>Registracija</title>
</head>
<style>
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
  float: right;
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
<body>
<?php


echo '
<form action="registracija2.php" method="get" style="border:1px solid #ccc">
  <div class="container">
    <h1>Registracija</h1>
    <p>Prosim izpolnite polja da se registrirate v našo spletno stran</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Vnesi Email" name="email" required>
	
	<label for="usrname"><b>Uporabniško ime</b></label>
    <input type="text" placeholder="Vnesi uporabniško ime" name="usrname" required>

	<label for="namesur"><b>Ime in priimek</b></label>
    <input type="text" placeholder="Vnesi ime" name="namesur" required>
		
	
    <label for="psw"><b>Geslo</b></label>
    <input type="password" placeholder="Vnesi geslo" name="psw" required>
	
    <label for="psw-repeat"><b>Ponovno Geslo</b></label>
    <input type="password" placeholder="Ponovno vensi geslo" name="psw-repeat" required>
    
	<label for="naslov"><b>Naslov</b></label>
    <input type="text" placeholder="Vnesi Naslov" name="naslov" required>
	
	<label for="telst"><b>Tel St</b></label>
    <input type="text" placeholder="Vnesi Tel st" name="telst" required>
	
	  <br><br>
  Spol:
  <input type="radio" name="spol" value="f">ženska
  <input type="radio" name="spol" value="m">moški
  <input type="radio" name="spol" value="d">drugo
  <br><br>
	
	
	
	
	<label for="datrojstva"><b>Datum rojstva</b></label>
    <input type="date" placeholder="Vnesi datum rojstva" name="datrojstva" required>
	
    
    
  

    <div class="clearfix">
     <a href="GlavnaStran.php" ><button type="button" class="cancelbtn">Odpoved registracije</button></a>
      <button type="submit" class="signupbtn">Registracija</button>
    </div>
  </div>
</form>
'

?>
</body>
</html>
