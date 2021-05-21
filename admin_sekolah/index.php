<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../login.php");
}
$nik =$_SESSION['nik'];

?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Layanan Pendidikan ABK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="../dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini" style="max-width: 100%; overflow-x: hidden;">

  

  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!-- /.navbar -->

    <?php include "aside.php" ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content"></section>

      <!-- Default box -->
      <div style="padding: 30px;">
        <h3><b>Knowledge Management System<br>
            Layanan Pendidikan untuk Anak Berkebutuhan Khusus</b></h3>
      </div>

      <div class="row">
        <div class="col-12">
              <?php 
                $npsn ="";
                $result_npsn = mysqli_query($db2,"select npsn FROM layananpendidikan where nik = '$nik'");
                while($tmp1 = mysqli_fetch_array($result_npsn)){
                  $npsn = $tmp1['npsn'];
                }


                 $result_ulasan = mysqli_query($db2,"select count(*) FROM ulasan where npsn = '$npsn'");
                 $row_ulasan = mysqli_fetch_array($result_ulasan);
                 $total_ulasan = $row_ulasan[0];

                 $result_ulasan_a = mysqli_query($db2,"select count(*) FROM ulasan where npsn = '$npsn' and status_ulasan = 'Accepted'");
                 $row_ulasan_a = mysqli_fetch_array($result_ulasan_a);
                 $total_ulasan_a = $row_ulasan_a[0];

                 $result_ulasan_p = mysqli_query($db2,"select count(*) FROM ulasan where npsn = '$npsn' and status_ulasan != 'Accepted'");
                 $row_ulasan_p = mysqli_fetch_array($result_ulasan_p);
                 $total_ulasan_p = $row_ulasan_p[0];
               ?>
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="row">
              <div class="col-9">
                <h5><b><?php echo $total_ulasan;?></b><br><br>
                  Ulasan</h5>
              </div>
              <div class="col-3 float-right" style="text-align: right;">
                <img src="../img/conversation.png" style="width: 80px; float; right; padding-right: 20px;">
              </div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card" style="padding: 30px; margin: 30px;">
            <h5><b><?php echo $total_ulasan_a;?></b><br><br>
              Tervalidasi</h5>
          </div>
        </div>
        <div class="col-6">
          <div class="card" style="padding: 30px; margin: 30px;">
            <h5><b><?php echo $total_ulasan_p;?></b><br><br>
              Belum Validasi</h5>
          </div>

        </div>

      </div>
      <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
</body>
<script>
  $('#modal-cancel').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient_e = button.data('e') // Extract info from data-* attributes
    var recipient_v = button.data('v')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.event').val(recipient_e)
    modal.find('.volunteer').val(recipient_v)
  })
</script>

</html>