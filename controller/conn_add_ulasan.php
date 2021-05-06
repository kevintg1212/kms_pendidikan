<?php 
include 'conn.php';
session_start();
date_default_timezone_set("Asia/Bangkok");
$sekolah = $_POST['sekolah'];
echo $sekolah."<br>";

$latarBelakang = $_POST['latarBelakang'];
echo $latarBelakang."<br>";

$namaLengkap = $_POST['namaLengkap'];
echo $namaLengkap."<br>";

$email = $_POST['email'];
echo $email."<br>";

$ulasan = $_POST['ulasan'];
echo $ulasan."<br>";

$tanggal = date("Y/m/d");
echo $tanggal."<br>";

$statusUlasan = "Pending";
echo $statusUlasan."<br>";



$target_dir = "../img/pendukung_ulasan/";
$target_file = $target_dir . basename($_FILES["lampiran"]["name"]);
$name_image1 = basename($_FILES["lampiran"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["lampiran"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	  // if everything is ok, try to upload file
	  } else {
		if (move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file)) {
		  echo "The file ". htmlspecialchars( basename( $_FILES["lampiran"]["name"])). " has been uploaded.";
		} else {
		  echo "Sorry, there was an error uploading your file.";
		}
	  }
	echo $name_image1."<br>";

	$stmt1 = $db2->prepare("INSERT INTO `ulasan`(`npsn`, `nama_pengirim`, `latar_belakang`, `email`, `ulasan`, `lampiran_ulasan`, `tanggal_mengirim`, `status_ulasan`) VALUES (? ,? ,? ,? ,? ,? ,? ,? )");
	$stmt1->bind_param("ssssssss", $sekolah, $namaLengkap, $latarBelakang, $email, $ulasan, $name_image1, $tanggal, $statusUlasan);

	$stmt1->execute();
	$stmt1->close();

	$query_vol = mysqli_query($db2,"SELECT * from ulasan ORDER BY id_ulasan DESC LIMIT 1");

	while($tmp1 = mysqli_fetch_array($query_vol)){
		$id_ulasan = $tmp1['id_ulasan'];
	}
	echo "test = ".$id_ulasan;

	$topikUlasan = $_POST['topikUlasan'];
	foreach ($topikUlasan as $item) {
		$stmt2 = $db2->prepare("INSERT INTO `topik_ulasan`(`id_ulasan`, `id_topik`) VALUES (? ,?)");
		$stmt2->bind_param("ss", $id_ulasan, $item);
	
		$stmt2->execute();
		$stmt2->close();
	}
	


	header("location:../berbagi_info.php")


?>