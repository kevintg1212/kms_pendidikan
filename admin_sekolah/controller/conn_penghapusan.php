<?php 
// mengaktifkan session
include 'conn.php';
session_start();
 
$stmt1 = $db2->prepare("UPDATE `layananpendidikan` set status_data=?, alasan_penghapusan=? where npsn=? ");
$stmt1->bind_param("sss", $status_data, $alasan_penghapusan, $npsn);

$status_data = "PENGHAPUSAN PENDING";
$npsn = mysqli_real_escape_string($db2,$_POST['npsn']);
$alasan_penghapusan = mysqli_real_escape_string($db2,$_POST['alasan_penghapusan']);
echo $npsn;

$stmt1->execute();
$stmt1->close();
$_SESSION['temp_penghapusan']="aktif";

header("location:../penghapusan.php");
?>