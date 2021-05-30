<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
$nik =$_SESSION['nik'];
$result = mysqli_query($db2,"SELECT * FROM layananpendidikan where nik ='$nik'");
while($tmp1 = mysqli_fetch_array($result)){
  $npsn = $tmp1['npsn']; 
  $nama_sekolah = $tmp1['nama_sekolah']; 
}

$result_layanan_count = mysqli_query($db2,"select count(*) FROM layananpendidikan where nik ='$nik'");
$row_layanan_count = mysqli_fetch_array($result_layanan_count);
$total_layanan_count = $row_layanan_count[0];

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
          <p>Pengajuan penghapusan akan segera diproses.
          Setelah proses pengajuan penghapusan ini dikonfrimasi, maka data layanan pendidikan akan terhapus. 
          Kami akan mengkonfrimasi penghapusan melalui notifikasi di laman anda, Terima kasih.</p>
        </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <form action="controller/conn_penghapusan.php" method="post">
  <div class="modal fade" id="modal-terima">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">PERHATIAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menghapus layanan pendidikan ini? </p>
        </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ya</button>
            <input class="npsn" type="hidden" name="npsn">
          </div>
        
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
      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5><b>Pengajuan Penghapusan</b></h5>
                </div>
                <div class="col-4 row">

                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>NPSN</h5>
                </div>
                <div class="col-md-6">
                  <input type="text" disabled value="<?php echo $npsn;?>" name="npsn2"
                    class="form-control select2" style="width: 100%;">
                </div>
              </div>
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Nama Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input type="text" disabled value="<?php if ($total_layanan_count>0) { echo $nama_sekolah; }?>" name="nama_sekolah"
                    class="form-control select2" style="width: 100%;">
                </div>
              </div>
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-12">
                  <h5>Alasan Penghapusan</h5>
                </div>
                <div class="col-md-12">
                  <textarea rows="4" name="alasan_penghapusan" class="form-control select2" style="width: 100%;" required></textarea>
                </div>
              </div>
              <button type="button" <?php if($total_layanan_count==0){echo "disabled"; } ?> data-toggle="modal" data-target="#modal-terima" data-e="<?php echo $npsn;?>"
                style="color: white; background-color: #1D2948; height: 40px; float: right; margin-top: 30px;"
                class="btn btn-primary btn-sm nav-link"><b>Ajukan Penghapusan</b></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->

  </form>

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

<?php 
    if(isset($_SESSION['temp_penghapusan']) && $_SESSION['temp_penghapusan']!= "") {
  ?>
    $('#modal-cancel').modal({
      show: true
    });
  <?php }
  $_SESSION['temp_penghapusan']="";
  ?>

  $('#modal-terima').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient_e = button.data('e') // Extract info from data-* attributes

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.npsn').val(recipient_e)

  })
</script>

</html>