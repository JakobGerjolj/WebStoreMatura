
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>

<h2>Prijava</h2>
<?php


echo'
<form action="login2.php" method="post">
 

  <div class="container">
    <label for="uname"><b>Uporabniško ime</b></label>
    <input type="text" placeholder="Enter Username" name="luname">

    <label for="psw"><b>Geslo</b></label>
    <input type="password" placeholder="Enter Password" name="lpsw">
        
    <button type="submit">Prijava</button>
    
  </div>

  
    
	<a href="GlavnaStran.php"><button type="button" class="cancelbtn" formaction="GlavnaStran.php">Odpoved prijave</button></a>
  
</form>
';
?>
</body>
</html>
