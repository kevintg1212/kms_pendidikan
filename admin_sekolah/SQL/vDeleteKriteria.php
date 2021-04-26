<?php 
include 'config.php';
 

$id_e = $_POST['id_ev'];
echo "event= ".$id_e;


$query  = mysqli_query($koneksi,"DELETE from kriteria where id_kriteria = $id_e");


 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../kriteria.php");
}	


?>