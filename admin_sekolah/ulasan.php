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
<div class="modal fade" id="modal-cancel">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">PERHATIAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Data ini akan dilakukan validasi terlebih dahulu sebelum ditampilkan pada website "Knowledge Management
          System Layanan Pendidikan untuk ABK"<br><br>

          <b>Maka, pastikan Surat Ijin Operasional Sekolah telah di unggah. </b><br>
          Kami akan mengkonfirmasi proses validasi melalui notifikasi jika layanan pendidikan ABK diterima. 
          Namun apabila layanan pendidikan ABK ini terbukti tidak beroperasional, kami akan menginformasikan melalui 
          email anda karena data layanan pendidikan ABK serta account anda otomatis terhapus. </p>
        </div>
        <form action="SQL/vDeleteEvent.php" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Konfrimasi</button>
            <input class="event" type="hidden" name="id_ev">
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


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
        <h3><b>Ulasan</b></h3><br>
        <p>Terima Ulasan : akan ditampilkan pada website "Knowledge Managamenet System Layanan Pendidikan untuk ABK"
          Tolak Ulasan : terhapus dan tidak ditampilkan pada website "Knowledge Management System Layanan Pendidikan
          untuk ABK"
        </p>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5><b>Nerissa Rosalia - Orang Tua</b></h5>
                  <p>23 Juli 2020, 13:00 WIB</p>
                </div>
                <div class="col-4 row">
                  <button href="login.php" data-toggle="modal" data-target="#modal-cancel" style="color: black; background-color: #FFF; border-color: black; height: 40px; width:100px;" class="btn btn-primary btn-sm nav-link"><b>Tolak</b></button>
                  <a href="login.php" style="color: white; background-color: #1D2948; height: 40px; width:100px; margin-left: 20px;" class="btn btn-primary btn-sm nav-link"><b>Terima</b></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5><b>Sarana dan prasarana yang disediakan oleh sekolah sesuai dengan kebutuhan khusus anak</b></h5>
              <p>Fasilitas khusus yang disediakan lengkap untuk mendukung proses pembelajaran anak, tetapi sayangnya beberapa di 
                antaranya tidak terawat.</p>
              <img src="../img/4096093.png" style="width: 200px; margin-top: 20px;">
            </div>
          </div>

          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5><b>Nerissa Rosalia - Orang Tua</b></h5>
                  <p>23 Juli 2020, 13:00 WIB</p>
                </div>
                <div class="col-4 row">
                  <a href="login.php" style="color: black; background-color: #FFF; border-color: black; height: 40px; width:100px;" class="btn btn-primary btn-sm nav-link"><b>Tolak</b></a>
                  <a href="login.php" style="color: white; background-color: #1D2948; height: 40px; width:100px; margin-left: 20px;" class="btn btn-primary btn-sm nav-link"><b>Terima</b></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5><b>Sarana dan prasarana yang disediakan oleh sekolah sesuai dengan kebutuhan khusus anak</b></h5>
              <p>Fasilitas khusus yang disediakan lengkap untuk mendukung proses pembelajaran anak, tetapi sayangnya beberapa di 
                antaranya tidak terawat.</p>
              <img src="../img/4096093.png" style="width: 200px; margin-top: 20px;">
            </div>

          </div>


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