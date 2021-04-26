<?php 
include 'config.php';
 

$id_r = $_POST['id_role'];
$id_e = $_POST['id_ev'];
$id_v = $_POST['id_vol'];

$query3  = mysqli_query($koneksi,"Update vol_event set status=4 where (id_event = $id_e and id_volunteer = $id_v)");
$query3  = mysqli_query($koneksi,"Update foramsisub set status=3 where (id_event = $id_e and id_volunteer = $id_v)");

$login = mysqli_query($koneksi,"select * from volunteer where id_volunteer='$id_v'");
$cek = mysqli_num_rows($login);
$d = mysqli_fetch_assoc($login);


if($cek > 0){
	session_start();
	$_SESSION['username'] = $d['email'];
	$_SESSION['vol_id'] = $id_v;
	$_SESSION['status'] = "login";
	$_SESSION['daftar'] = "ok";
	echo $_SESSION['username'];
	header("location:../index.php?");
}else{
	session_start();
	$_SESSION['status'] = "xx";
	header("location:../login.php?pesan=error");
		
}

?>