<?php 
include 'conn.php';
session_start();

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];

$email = $_POST['email'];
$password = $_POST['password'];


$query0  = mysqli_query($db2,"SELECT COUNT(*) FROM admin_layananpendidikan WHERE `nik` = '$nik'");
$query1  = mysqli_query($db2,"SELECT COUNT(*) FROM admin_layananpendidikan WHERE `email` = '$email'");

  while($cCvp = mysqli_fetch_array($query0)){
	  $qktp= $cCvp[0];
  }
  while($cCE = mysqli_fetch_array($query1)){
	  $qeEma= $cCE[0];
  }
  echo "KTP = ".$qktp;
  echo "Email = ".$qeEma;

  if($qktp==1){
    $_SESSION['status'] = "TT";
    echo "<script>if(confirm('Email sudah terdaftar !')){document.location.href='../register.php'}else{document.location.href='../register.php'};</script>";

  }else if($qeEma==1){
    echo "<script>if(confirm('Email sudah terdaftar !')){document.location.href='../register.php'}else{document.location.href='../register.php'};</script>";
  }else{
    $query  = mysqli_query($db2,"INSERT INTO admin_layananpendidikan (nik, nama_lengkap, jenis_kelamin, email, password) VALUES('$nik','$nama','$jenis','$email','$password')");
    
    if (mysqli_connect_errno()){
      echo "Koneksi database gagal : " . mysqli_connect_error();
    }else{
      echo "<script>if(confirm('Register berhasil ! Kembali ke halaman login.')){document.location.href='../login.php'}else{document.location.href='../login.php'};</script>";
    }

  }

    
?>