<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../login.php");
}

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin BCS || Volunteer Sistem</title>
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
<body class="hold-transition sidebar-mini">

<div class="modal fade" id="modal-cancel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">PERHATIAN !!!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin menghapus kritria ini ?</p>
            </div>
          <form action="SQL/vDeleteKriteria.php" method="post">
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Yes</button>
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">   
      <li class="nav-item d-none d-sm-inline-block">
      <a href="SQL/vlogout.php" class="nav-link">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin BCS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="role.php" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Role
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="kriteria.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kriteria
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="quest.php" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Questionnaire
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Rekapitulasi
              </p>
            </a>
          </li>
  

                 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content"></section>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Kritria</li>
            </ol>

          <div class="card-tools"></div>
          <form action="addKriteria.php">
            <button type="submit" class="btn btn-success float-sm-right">+ Add Kriteria</button>
          </form>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 15%">
                          Kritria
                      </th>
                      <th style="width: 25%">
                          Detail
                      </th>
                      <th style="width: 15%">
                          Status
                      </th>
                      <th style="width: 20%">
                      Action
                      </th>
                  </tr>
              </thead>
              <?php 
                 $no = 1;
                 $result_ev = mysqli_query($koneksi,"select * from kriteria");                 
                 while($d_ev = mysqli_fetch_array($result_ev)){
               ?>
              <tbody>
                  <tr>
                      <td>
                          <?php echo $no; ?>
                      </td>
                      <td>
                          <a>
                          <?php echo $d_ev['kriteria']; ?>
                          </a>
                      </td>
                      <td>
                          <a>
                          <?php echo $d_ev['detail']; ?>
                          </a>
                      </td>
                      <td>
                      <?php 
                      
                      $stat= $d_ev['status']; 
                      if($stat==1){
                        echo 'Primary';
                      }else{
                        echo 'Secondary';
                      }
                      
                      
                      ?>
                      </td>
                      <td class="project-actions text-left">
                      <div class="row">
                          <form action="editKriteria.php" method="post">
                          <button class="btn btn-info btn-sm" name="id_ev" value="<?php echo $d_ev['id_kriteria']; ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button>
                          </form>

                          <button class="btn btn-danger btn-sm" data-e="<?php echo $d_ev['id_kriteria']; ?>" data-v="0" data-toggle="modal" data-target="#modal-cancel">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>

                          </div>
                      </td>
                  </tr>
                 <?php $no++; } ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; 2020 <a href="https://www.instagram.com/kevin_t_gunawan/">Kevin T. Gunawan</a>.</strong> All rights
    reserved.
  </footer>

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
