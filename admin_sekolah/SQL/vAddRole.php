<?php 
include 'config.php';
 

$nama = $_POST['name'];
$job = $_POST['location'];
$primary = $_POST['primary'];
$secondary = 100-$_POST['primary'];


$query  = mysqli_query($koneksi,"INSERT INTO role (nama_role, job_dek, vPrimary, vSecondary) VALUES('$nama','$job',$primary,$secondary)");

 
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	$result_ev = mysqli_query($koneksi,"select * from role where nama_role = '$nama' ");                 
	while($d_ev = mysqli_fetch_array($result_ev)){
		$id_ev	= $d_ev['id_role'];
	}	
	foreach ($_POST['rolelist'] as $select)
		{
		echo "id role:" .$id_ev;	
		echo "id kriteria:" .$select;
		$qrole  = mysqli_query($koneksi,"INSERT INTO role_kriteria (id_role, id_kriteria) VALUES('$id_ev','$select')");
		}
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}else{
	header("location:../role.php");
	}
}



 
?>