<!DOCTYPE html>
<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
// if($_SESSION['status'] !="login"){
// 	header("location:../login.php");
// }

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMS Layanan Pendidikan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-collapse" style="padding-left: 50px; padding-right: 50px; padding-top: 10px; margin-bottom: 200px;">
  <?php include "view/header.php";?>
  <div class="container.fluid p-5">
    <div class="col-12"> 
        <h3>Hasil Pencarian</h3>
        <h5>Berikut layanan pendidikan ABK yang kami rekomendasikan untuk anda</h5>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-3 m-2">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <img src="img/4096093.png" alt="School Image" class="card-img-top shadow-sm">
                <div class="card-body">
                    <div>
                        <b style="font-size:18px;"> Nama sekolah - Jenjang </b>
                        <p> Alamat, Kabupaten </br>
                            Kebutuhan khusus </p>
                    </div>
                    <div class="float-right">
                        <a href="/kms_pendidikan/cari_sekolah_2.php" style=" color: white; width: 100px; background-color: #05319D;" class="btn btn-primary btn-sm ">Lihat detail</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-3 m-2">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <img src="img/4096093.png" alt="School Image" class="card-img-top shadow-sm">
                <div class="card-body">
                    <div>
                        <b style="font-size:18px;"> Nama sekolah - Jenjang </b>
                        <p> Alamat, Kabupaten </br>
                            Kebutuhan khusus </p>
                    </div>
                    <div class="float-right">
                        <a href="/kms_pendidikan/cari_sekolah_2.php" style=" color: white; width: 100px; background-color: #05319D;" class="btn btn-primary btn-sm ">Lihat detail</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-3 m-2">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <img src="img/4096093.png" alt="School Image" class="card-img-top shadow-sm">
                <div class="card-body">
                    <div>
                        <b style="font-size:18px;"> Nama sekolah - Jenjang </b>
                        <p> Alamat, Kabupaten </br>
                            Kebutuhan khusus </p>
                    </div>
                    <div class="float-right">
                        <a href="/kms_pendidikan/cari_sekolah_2.php" style=" color: white; width: 100px; background-color: #05319D;" class="btn btn-primary btn-sm ">Lihat detail</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        
    </div>
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

</body>
</html>