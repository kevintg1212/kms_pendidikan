<?php 
include 'config.php';
 
$nama = $_POST['name'];
$lokasi = $_POST['location'];
$mul = $_POST['mulai'];
$sel = $_POST['selesai'];
$detail = $_POST['detail'];
$id = $_POST['id'];


 
$query  = mysqli_query($koneksi,"update event set nama_event='$nama', tanggal_mulai='$mul', tanggal_akhir='$sel', lokasi_event='$lokasi', detail_event ='$detail' where id_event='$id'");
$queryBr  = mysqli_query($koneksi,"Select * from event_role where id_event = $id");
$tempy= 0;
while($d_Br = mysqli_fetch_array($queryBr)){
	$tempLim[$tempy] = $d_Br['vlimit'];
	$tempy ++;
}

  
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	$qrole1  = mysqli_query($koneksi,"DELETE from event_role where id_event = $id");
	$xx=0;
	foreach ($_POST['rolelist'] as $select)
		{
		echo "id event:" .$id_ev;	
		echo "id role:" .$select;

		$qrole  = mysqli_query($koneksi,"INSERT INTO event_role (id_event, id_role, vlimit) VALUES('$id','$select','$tempLim[$xx]')");
		$xx++;
	}
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}else{
			session_start();
			$_SESSION['id_ev'] = $id;
			header("location:../addLimit.php");
	}
}


?>