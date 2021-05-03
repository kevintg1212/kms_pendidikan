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
          <p>Apakah anda yakin akan menghapus topik ulasan ini? </p>
        </div>
        <form action="controller/delete_data_topik.php" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ya</button>

            <!-- hidden input -->
            <input class="id_topik2" type="hidden" name="id_topik2">
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-topik-ulasan">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Topik Ulasan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="controller/edit_topik_ulasan.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
                <label for="nik" class="col-sm col-form-label">Topik Ulasan</label>
                <div class="col-9">
                    <input type="text" class="form-control" id="nama_topik" name="nama_topik" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

          <!-- id-pendidikan -->
          <input class="id_topik1" type="hidden" id="id_topik1" name="id_topik1">
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal fade" id="modal-add-topik-ulasan">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Tambah topik ulasan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="controller/add_data_topik_ulasan.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
                <label for="nik" class="col-sm col-form-label">Topik ulasan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_topik" name="nama_topik"
                    value="" placeholder="Topik ulasan">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
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
        <h5><b>Data Topik Ulasan pada Knowledge Management System Layanan Pendidikan untuk Anak Berkebutuhan Khusus</b></h5>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5>Topik Ulasan</h5>
                </div>
              </div>
            </div>

            <div class="card-body">
              <h5 class="my-3">Data Topik Ulasan pada Knowledge Management System</h5>
              <button class="btn btn-success btn-sm float-right my-2"  data-toggle="modal" data-target="#modal-add-topik-ulasan">
                <i class="fas fa-plus">
                </i>
                Tambah
              </button>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Topik Ulasan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                $sql = mysqli_query($db2,"SELECT * FROM topik");
                while($result = mysqli_fetch_array($sql)){
                $no = $no + 1;
                ?>
                <tr>
                  <td><?php echo $result['id_topik'] ?></td>
                  <td><?php echo $result['nama_topik'] ?></td>
                  <td>
                    <div class="row">
                      <button class="btn btn-warning btn-sm" style="margin-right:10px; margin-left:10px;" name="id_ev" 
                      data-e="<?php echo $result['id_topik']; ?>"
                      data-toggle="modal" data-target="#modal-edit-topik-ulasan">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                      </button>
                      <button class="btn btn-danger btn-sm"  data-e="<?php echo $result['id_topik']; ?>" data-toggle="modal" data-target="#modal-cancel">
                        <i class="fas fa-trash">
                        </i>
                        Hapus
                      </button>
                    </div>
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
  $('#modal-cancel').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient_e = button.data('e') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.id_topik2').val(recipient_e);

  })

  $('#modal-edit-topik-ulasan').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient_e = button.data('e'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.id_topik1').val(recipient_e);
  })

</script>

</html>