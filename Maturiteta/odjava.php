<?php
// Start the session
session_start();


session_unset();
session_destroy();//Sprememba
header('Location: GlavnaStran.php');
?>