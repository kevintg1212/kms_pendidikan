<?php 
include 'config.php';
 

$nama = $_POST['name'];
$lokasi = $_POST['location'];
$mul = $_POST['mulai'];
$sel = $_POST['selesai'];
$detail = $_POST['detail'];


$query  = mysqli_query($koneksi,"INSERT INTO event (nama_event,tanggal_mulai, tanggal_akhir, lokasi_event, detail_event) VALUES('$nama','$mul','$sel','$lokasi','$detail')");


 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	$result_ev = mysqli_query($koneksi,"select * from event where nama_event = '$nama' ");                 
	while($d_ev = mysqli_fetch_array($result_ev)){
		$id_ev	= $d_ev['id_event'];
	}	
	foreach ($_POST['rolelist'] as $select)
		{
		echo "id event:" .$id_ev;	
		echo "id role:" .$select;
		$qrole  = mysqli_query($koneksi,"INSERT INTO event_role (id_event, id_role) VALUES('$id_ev','$select')");
		}
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}else{
	
	session_start();
	$_SESSION['id_ev'] = $id_ev;
	header("location:../addLimit.php");
	}
}


 
?>