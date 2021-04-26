<?php 
include 'config.php';
 

$id_e = $_POST['id_ev'];
echo "event= ".$id_e;

$query1  = mysqli_query($koneksi,"DELETE from event_role where id_event = $id_e");
$query3  = mysqli_query($koneksi,"DELETE from vol_event where id_event = $id_e");
$query2  = mysqli_query($koneksi,"DELETE from event where id_event = $id_e");


 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../index.php");
}	


?>