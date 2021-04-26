<?php 
include 'config.php';
session_start();

$password = $_POST['pass'];
$email = $_POST['email'];
$name = $_POST['name'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$KTP = $_POST['KTP'];

$query0  = mysqli_query($koneksi,"SELECT COUNT(*) FROM volunteer WHERE `no_ktp` = $KTP");
$query1  = mysqli_query($koneksi,"SELECT COUNT(*) FROM volunteer WHERE `email` = $email");
while($cCvp = mysqli_fetch_array($query0)){
	$qktp= $cCvp[0];
  }
  while($cCE = mysqli_fetch_array($query1)){
	$qeEma= $cCE[0];
  }
  echo "KTP = ".$qktp;
  echo "Email = ".$qeEma;

  if($qktp==1){
	$_SESSION['status'] = "TT";
	header("location:../register.php");
  }else if($qeEma==1){
	$_SESSION['status'] = "EE";
	header("location:../register.php");
  }else{
$query  = mysqli_query($koneksi,"INSERT INTO volunteer (email,password, nama, telp, alamat, no_ktp) VALUES('$email','$password','$name','$telephone','$address',$KTP)");

 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../login.php");
}
  }

 
?>