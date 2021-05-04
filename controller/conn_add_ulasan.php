<?php 
include 'conn.php';
session_start();
 
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

	header("location:../berbagi_info.php")


?>