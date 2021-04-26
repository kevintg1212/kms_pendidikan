<?php 
include 'config.php';
 

$nama = $_POST['name'];
$job = $_POST['location'];
$sta = $_POST['status'];



$query  = mysqli_query($koneksi,"INSERT INTO kriteria (kriteria, detail, status) VALUES('$nama','$job','$sta')");

 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../kriteria.php");
}


 
?>