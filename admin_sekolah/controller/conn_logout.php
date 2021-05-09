<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
$_SESSION['status'] = "logout";
$_SESSION['nik']="";
// mengalihkan halaman sambil mengirim pesan logout
header("location:../../login.php?pesan=logout");
?>