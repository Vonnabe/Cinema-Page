<?php
//make a logout file in order to logout
session_start();

session_destroy();

header("Location:login.php");
?>

