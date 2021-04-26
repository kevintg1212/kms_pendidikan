<?php 
include 'config.php';
 
$username = $_POST['username'];
$password = $_POST['pass'];
 
$login = mysqli_query($koneksi,"select * from volunteer where email='$username' and password='$password'");
$cek = mysqli_num_rows($login);

$query_vol = mysqli_query($koneksi,"select id_volunteer from volunteer where email='$username' and password='$password'");

while($tmp1 = mysqli_fetch_array($query_vol)){
	$row = $tmp1['id_volunteer'];
}
echo "test = ".$row;

if($username=='admin@gmail.com' && $password=='12345'){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['vol_id'] = $row;
	$_SESSION['status'] = "login";
	$_SESSION['daftar'] = "xx";
	$_SESSION['xx'] = 0;
	echo "WKWKWK";
	header("location:../admin/SQL/vTotal.php");
}else{
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['vol_id'] = $row;
	$_SESSION['status'] = "login";
	$_SESSION['daftar'] = "xx";
	header("location:../index.php?");
}else{
	session_start();
	$_SESSION['status'] = "xx";
	header("location:../login.php?pesan=error");
		
}
}
?>