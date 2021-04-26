<?php 
include 'config.php';
 

$id_e = $_POST['id_ev'];
echo "event= ".$id_e;


$query3  = mysqli_query($koneksi,"Update vol_event set status=2 where id_event = $id_e and not (status =3 or status =4)");



 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../viewEvent.php");
}	


?>