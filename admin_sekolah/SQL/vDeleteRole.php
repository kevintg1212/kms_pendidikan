<?php 
include 'config.php';
 

$id_e = $_POST['id_ev'];
echo "event= ".$id_e;

$query1  = mysqli_query($koneksi,"DELETE from role_kriteria where id_role = $id_e");
$query2  = mysqli_query($koneksi,"DELETE from event_role where id_role = $id_e");
$query  = mysqli_query($koneksi,"DELETE from role where id_role = $id_e");


 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../role.php");
}	


?>