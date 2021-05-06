<?php 
include 'conn.php';
session_start();


	$stmt1 = $db2->prepare("UPDATE `ulasan` set status_ulasan = ? where id_ulasan = ?");
	$stmt1->bind_param("ss", $status, $id_ulasan);

	$status = 'Rejected';
	$id_ulasan = $_POST['id_ulasan'];
    echo $id_ulasan."<br>";

	$stmt1->execute();
	$stmt1->close();

	header("location:../ulasan.php")


?>