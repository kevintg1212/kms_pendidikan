<?php 
include 'config.php';
 

$id_e = $_POST['id_ev'];
$id_v = $_POST['id_vol'];
echo "event= ".$id_e;
echo "vol= ".$id_v;


mysqli_query($koneksi,"INSERT INTO vol_event (id_volunteer, id_event) VALUES('$id_v','$id_e')");
                  
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