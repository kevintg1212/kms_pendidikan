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


  <div class="modal fade" id="modal-konfirmasi">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Pengajuan Penghapusan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="controller/conn_konfirmasi_penghapusan.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
              <div class="modal-body">
                <p>Layanan Pendidikan ini akan terhapus setelah anda memilih button "Konfrimasi"</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </div>

          <!-- id-pendidikan -->
          <input class="npsn" type="hidden" id="npsn" name="npsn">
          <input class="email" type="hidden" id="email" name="email">
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

      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5>Pengajuan Penghapusan Data Layanan Pendidikan ABK</h5>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NPSN</th>
                  <th>Nama Sekolah</th>
                  <th>Alamat</th>
                  <th>Telephone</th>
                  <th>Alasan Pengajuan Penghapusan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                $sql = mysqli_query($db2,"SELECT l.*, w.nama as kabupaten, p.nama as provinsi, al.email as email FROM layananpendidikan l 
                join wilayah_kabupaten w on l.id_kabupaten = w.id 
                join wilayah_provinsi p on l.id_provinsi = p.id
                join admin_layananpendidikan al on al.nik = l.nik
                WHERE l.status_data = 'PENGHAPUSAN PENDING'");
                while($result = mysqli_fetch_array($sql)){
                ?>
                  <td><?php echo $result['npsn']; ?></td>
                  <td><?php echo $result['nama_sekolah']; ?></td>
                  <td><?php echo $result['alamat']; ?>, <?php echo $result['kabupaten']; ?>, <?php echo $result['provinsi']; ?></td>
                  <td><?php echo $result['telepon']; ?></td>
                  <td><?php echo $result['alasan_penghapusan']; ?></td>
                  <td>
                    <button class="btn btn-info btn-sm" style="margin-right:10px; margin-left:10px;" name="id_ev" 
                      data-e="<?php echo $result['npsn']; ?>"
                      data-v="<?php echo $result['email']; ?>"
                      data-toggle="modal" data-target="#modal-konfirmasi">
                        </i>
                        Konfirmasi
                      </button>
                  </td>
                </tr>
                <?php }; ?>
                </tbody>
              </table>
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
  $('#modal-konfirmasi').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient_e = button.data('e'); 
      var recipient_v = button.data('v');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.npsn').val(recipient_e)
      modal.find('.email').val(recipient_v)
  })

</script>

</html>