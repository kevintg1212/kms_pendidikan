<?php 
include 'config.php';
 

$id_e = $_POST['id_ev'];
echo "quest= ".$id_e;

$queryD2  = mysqli_query($koneksi,"DELETE vol_pilihan.* from vol_pilihan INNER JOIN pilihan ON vol_pilihan.id_pilihan=pilihan.id_pilihan where pilihan.id_questionnaire = $id_e");
$query1  = mysqli_query($koneksi,"DELETE from pilihan where id_questionnaire = $id_e");
$query2  = mysqli_query($koneksi,"DELETE from questionnaire where id_questionnaire = $id_e");


 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../quest.php");
}	


?>