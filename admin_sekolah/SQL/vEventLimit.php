<?php 
include 'config.php';
 
$id = $_POST['id'];
echo "id =".$id."<br>";
$no=0;
foreach ($_POST['idR'] as $id_r)
{
	$array[$no]=$id_r;
	echo "arr =".$array[$no]."<br>";
	$no++;
	

}

$temp=0;
foreach ($_POST['limit'] as $select)
{
		$id_ro=$array[$temp];
		$qrole  = mysqli_query($koneksi,"update event_role set vlimit=$select where id_event=$id and id_role=$id_ro");		
		echo "ro =".$array[$temp]."<br>";
		echo "se =".$select."<br>";
		$temp++;
}
  
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../index.php");
	}



?>