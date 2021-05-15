<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');
$email_pengirim = 'kmspendidikan@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'KMS Pendidikan'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
$nama_sekolah = $_POST['nama']; // Ambil email penerima dari inputan form
$subjek = "Ulasan pada KMS Pendidikan"; // Ambil subjek dari inputan form
$pesan = "Ulasan anda pada sekolah $nama_sekolah sudah diterima. Ulasan akan muncul pada sekolah terkait. Terimakasih sudah berbagi informasi dengan kami."; // Ambil pesan dari inputan form

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'kmspendidikan1217001'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
// Load file content.php
ob_start();
// include "content.php";
// $content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
// ob_end_clean();
$mail->Subject = $subjek;
$mail->Body = $pesan;
//$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email
// Jika tanpa attachment
	$send = $mail->send();

	include 'conn.php';
	session_start();
	
	$stmt1 = $db2->prepare("UPDATE `ulasan` set status_ulasan = ? where id_ulasan = ?");
	$stmt1->bind_param("ss", $status, $id_ulasan);

	$status = 'Accepted';
	$id_ulasan = $_POST['id_ulasan'];
    echo $id_ulasan."<br>";

	$stmt1->execute();
	$stmt1->close();

	header("location:../ulasan.php")


?>