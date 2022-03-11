<?php
session_start();
$_SESSION['username']="Guest";
//session_destroy();
header("location:index.php");
?>
