<?php 
include 'config.php';
 
$nama = $_POST['name'];
$lokasi = $_POST['location'];
$id = $_POST['id'];
$primary = $_POST['primary'];
$secondary = $_POST['Secondary'];


 
$query  = mysqli_query($koneksi,"update role set nama_role='$nama', job_dek='$lokasi', vPrimary=$primary, vSecondary=$secondary where id_role='$id'");



if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	$qrole1  = mysqli_query($koneksi,"DELETE from role_kriteria where id_role = $id");
	foreach ($_POST['rolelist'] as $select)
		{
		echo "id event:" .$id;	
		echo "id role:" .$select;
		echo "pr:" .$primary ;
		$qrole  = mysqli_query($koneksi,"INSERT INTO role_kriteria (id_role, id_kriteria) VALUES('$id','$select')");
		}
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}else{
	header("location:../role.php");
	}
}


?>