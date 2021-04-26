<?php 
include 'config.php';
 
$no = $_POST['no'];
$id = $_POST['id'];
for ($i=1; $i < $no ; $i++) { 
	if (isset($_POST['customRadio'.$i])) {
		$isi[$i-1] = $_POST['customRadio'.$i];
	}
	
	
}

for ($i=0; $i < $no-1 ; $i++) { 
	if (isset($isi[$i])) {
		echo "Isi ".($i+1)." = ".$isi[$i];
		mysqli_query($koneksi,"INSERT INTO vol_pilihan (id_vol, id_pilihan) VALUES('$id','$isi[$i]')");
	}
}


$login = mysqli_query($koneksi,"select * from volunteer where id_volunteer='$id'");
$cek = mysqli_num_rows($login);
$d = mysqli_fetch_assoc($login);
echo "cek = ".$cek;
echo "id = ".$id;

if($cek > 0){
	session_start();
	$_SESSION['username'] = $d['email'];
	$_SESSION['vol_id'] = $id;
	$_SESSION['status'] = "login";
	$_SESSION['daftar'] = "xx";
	echo $_SESSION['username'];
	header("location:../index.php?");
}else{
	session_start();
	$_SESSION['status'] = "xx";
	header("location:../login.php?pesan=error");
		
}

?>