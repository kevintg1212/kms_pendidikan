<?php 
include 'config.php';
 
$id = $_POST['id'];
$nama = $_POST['name'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

if($_POST['upload']){
	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$image = $_FILES['file']['name'];
	$x = explode('.', $image);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];	

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 10044070){			
			move_uploaded_file($file_tmp, '../docs/assets/img/user/'.$image);
			$query = mysqli_query($koneksi,"update volunteer set image='$image' where id_volunteer='$id'");
			if($query){
				echo 'FILE BERHASIL DI UPLOAD';
			}else{
				echo 'GAGAL MENGUPLOAD GAMBAR';
			}
		}else{
			echo 'UKURAN FILE TERLALU BESAR';
		}
	}else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	}
}
mysqli_query($koneksi,"update volunteer set email='$email', nama='$nama', telp='$telp', alamat='$alamat' where id_volunteer='$id'");

$login = mysqli_query($koneksi,"select * from volunteer where id_volunteer='$id'");
$cek = mysqli_num_rows($login);
$d = mysqli_fetch_assoc($login);


if($cek > 0){
	session_start();
	$_SESSION['username'] = $d['email'];
	$_SESSION['vol_id'] = $id;
	$_SESSION['status'] = "login";
	echo $_SESSION['username'];
	header("location:../index.php?");
}else{
	session_start();
	$_SESSION['status'] = "xx";
	header("location:../login.php?pesan=error");
		
}

?>