<?php 
include 'config.php';
 
$nama = $_POST['name'];
$lokasi = $_POST['location'];
$id = $_POST['id'];
$sta = $_POST['status'];


 
$query  = mysqli_query($koneksi,"update kriteria set kriteria='$nama', detail ='$lokasi', status ='$sta' where id_kriteria='$id'");



 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../kriteria.php");
}	


?>