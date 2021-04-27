<?php 
include 'conn.php';
 
$email = $_POST['email'];
$password = $_POST['password'];
 
$login = mysqli_query($db2,"select * from admin_layananpendidikan where email='$email' and password='$password'");
$cek = mysqli_num_rows($login);

$query_vol = mysqli_query($db2,"select nik, nama_lengkap from admin_layananpendidikan where email='$email' and password='$password'");

while($tmp1 = mysqli_fetch_array($query_vol)){
	$row = $tmp1['nik'];
	$nama_lengkap = $tmp1['nama_lengkap'];
}
echo "test = ".$row;

if($email=='admin@gmail.com' && $password=='12345'){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['xx'] = 0;
	header("location:../admin_sistem/index.php");
}else{
if($cek > 0){
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['nik'] = $row;
	$_SESSION['status'] = "login";
	$_SESSION['nama_lengkap'] = $nama_lengkap;

	header("location:../admin_sekolah/index.php?");
}else{
	session_start();
	$_SESSION['status'] = "xx";
	echo "<script>if(confirm('Email atau password tidak sesuai!')){document.location.href='../login.php'}else{document.location.href='../login.php'};</script>";
		
}
}
?>