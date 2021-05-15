<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
$nik =$_SESSION['nik'];
$result = mysqli_query($db2,"SELECT * FROM layananpendidikan where nik ='$nik'");
while($tmp1 = mysqli_fetch_array($result)){
  $npsn = $tmp1['npsn']; 
}

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
          <p>Apakah anda yakin akan menolak ulasan ini?</p>
        </div>
        <form action="controller/conn_tolak_ulasan.php" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ya</button>
            <input class="id_ulasan" type="hidden" name="id_ulasan">
            <input class="nama" type="hidden" name="nama">
            <input class="email" type="hidden" name="email">
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


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
          <p>Apakah anda akan menerima ulasan ini? </p>
        </div>
        <form action="controller/conn_terima_ulasan.php" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ya</button>
            <input class="id_ulasan" type="hidden" name="id_ulasan">
            <input class="nama" type="hidden" name="nama">
            <input class="email" type="hidden" name="email">
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
        <p>Terima Ulasan : akan ditampilkan pada website "Knowledge Management System Layanan Pendidikan untuk ABK" <br>
          Tolak Ulasan : terhapus dan tidak ditampilkan pada website "Knowledge Management System Layanan Pendidikan
          untuk ABK"
        </p>
      </div>


      <?php 
         $result = mysqli_query($db2,"SELECT *, ulasan.email as ulasan_email FROM `ulasan` inner join
         layananpendidikan on layananpendidikan.npsn = ulasan.npsn
         where ulasan.npsn = $npsn and status_ulasan='Pending'");
         while($tmp1 = mysqli_fetch_array($result)){
           $id_ulasan = $tmp1['id_ulasan'];
      ?>
      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5><b><?php echo $tmp1['nama_pengirim'];?> - <?php echo $tmp1['latar_belakang'];?></b></h5>
                  <p><?php echo date_format(date_create($tmp1['tanggal_mengirim']),"d F Y, H:i");?> WIB</p>
                </div>
                <div class="col-4 row">
                  <button data-toggle="modal" data-target="#modal-cancel" data-e="<?php echo $id_ulasan; ?>"
                  data-c="<?php echo $tmp1['ulasan_email']; ?>" data-v="<?php echo $tmp1['nama_sekolah']; ?>"
                    style="color: black; background-color: #FFF; border-color: black; height: 40px; width:100px;"
                    class="btn btn-primary btn-sm nav-link"><b>Tolak</b></button>
                  <button data-toggle="modal" data-target="#modal-terima" data-e="<?php echo $id_ulasan; ?>"
                  data-c="<?php echo $tmp1['ulasan_email']; ?>" data-v="<?php echo $tmp1['nama_sekolah']; ?>"
                    style="color: white; background-color: #1D2948; height: 40px; width:100px; margin-left: 20px;"
                    class="btn btn-primary btn-sm nav-link"><b>Terima</b></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5><b>
                  <?php 
                  $result2 = mysqli_query($db2,"SELECT * FROM `ulasan`
                  inner join topik_ulasan
                  on ulasan.id_ulasan = topik_ulasan.id_ulasan
                  inner join topik
                  on topik_ulasan.id_topik = topik.id_topik
                  where npsn = $npsn and status_ulasan='Pending'");
                  $number = mysqli_num_rows($result2);
                  $i=0;
                  while($tmp2 = mysqli_fetch_array($result2)){
                    $i++;
                    if ($i<$number) {
                      echo $tmp2['nama_topik'].", ";
                    }else{
                      echo $tmp2['nama_topik'].".";
                    }
                    
                  }
                ?></b></h5>
              <p><?php echo $tmp1['ulasan'];?></p>
              <img src="../img/pendukung_ulasan/<?php echo $tmp1['lampiran_ulasan'];?>"
                style="width: 200px; margin-top: 20px;">
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php 
         $result = mysqli_query($db2,"SELECT * FROM `ulasan`
         where npsn = $npsn and status_ulasan='Accepted'");
         while($tmp1 = mysqli_fetch_array($result)){
           $id_ulasan = $tmp1['id_ulasan'];
      ?>
      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5><b><?php echo $tmp1['nama_pengirim'];?> - <?php echo $tmp1['latar_belakang'];?></b></h5>
                  <p><?php echo date_format(date_create($tmp1['tanggal_mengirim']),"d F Y, H:i");?> WIB</p>
                </div>
                <div class="col-4 row">
                  <a style="color: white; background-color: green; height: 40px; width:200px; margin-left: 20px;"
                    class="btn btn-primary btn-sm nav-link"><b>Sudah di Terima</b></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5><b>
                  <?php 
                  $result2 = mysqli_query($db2,"SELECT * FROM `ulasan`
                  inner join topik_ulasan
                  on ulasan.id_ulasan = topik_ulasan.id_ulasan
                  inner join topik
                  on topik_ulasan.id_topik = topik.id_topik
                  where npsn = $npsn and status_ulasan='Accepted'");
                  $number = mysqli_num_rows($result2);
                  $i=0;
                  while($tmp2 = mysqli_fetch_array($result2)){
                    $i++;
                    if ($i<$number) {
                      echo $tmp2['nama_topik'].", ";
                    }else{
                      echo $tmp2['nama_topik'].".";
                    }
                    
                  }
                ?></b></h5>
              <p><?php echo $tmp1['ulasan'];?></p>
              <img src="../img/pendukung_ulasan/<?php echo $tmp1['lampiran_ulasan'];?>"
                style="width: 200px; margin-top: 20px;">
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

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
    var recipient_c = button.data('c')
    var recipient_v = button.data('v')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.id_ulasan').val(recipient_e)
    modal.find('.email').val(recipient_c)
    modal.find('.nama').val(recipient_v)

  })

  $('#modal-terima').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient_e = button.data('e') // Extract info from data-* attributes
    var recipient_c = button.data('c')
    var recipient_v = button.data('v')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.id_ulasan').val(recipient_e)
    modal.find('.email').val(recipient_c)
    modal.find('.nama').val(recipient_v)

  })
</script>

</html>