<?php 

session_start();
$_SESSION['xx'] = $_POST['yy'];

	header("location:../dashboard.php");

 
?>