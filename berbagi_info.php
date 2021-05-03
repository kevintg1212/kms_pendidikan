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

<body class="sidebar-collapse"
  style="padding-left: 50px; padding-right: 50px; padding-top: 10px; margin-bottom: 200px;">
  <form action="controller/add_ulasan.php" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><b> Terima kasih atas ulasan yang anda berikan </b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Ulasan anda akan divalidasi terlebih dahulu sebelum ditampilkan. <br> 
          Hasil dari validasi akan dikonfirmasi melalui email yang telah anda cantumkan.</p>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="submit" class="btn btn-primary">OK</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="wrapper">
    <?php include "view/header.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="min-height: 100%;">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content" style="">
        <div class="container-fluid" style="margin-top:100px;">
          <div class="row">
            <div class="col"> 
                <h3><b> Berbagi Informasi </b></h3>
                <h5>Berikut ulasan kepada layanan pendidikan dengan mengisi form berikut ini</h5>
            </div>
            <div class="col-3 justify-content-end"> 
              <select class="form-control select2" id="sekolah" name="sekolah" style="width: 100%;" required>
                <option selected="selected" disabled>-- Cari layanan pendidikan --</option>
                <?php 
                $result_head = mysqli_query($db2,"SELECT * FROM `layananpendidikan` where status_data='Accepted'");
                  while($d_head = mysqli_fetch_array($result_head)){
                ?>
                <option value="<?php echo $d_head['npsn']; ?>"><?php echo $d_head['nama_sekolah']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

            <!-- Main content -->
          <div class="container-fluid">
            <div class="card">
              <div class="row">
                <div class="col-12 p-5">
                  <div class="card-body">
                  
                    <div class="row">
                        <div class="col-6">
                          <label>Latar Belakang</label>
                        </div> 
                        <div class="col-6">
                        <select class="form-control select2" id="latarBelakang" name="latarBelakang" style="width: 100%;" required>
                          <option selected="selected" disabled>-- Pilih Latar Belakang --</option>
                          <optio value="Orang Tua">Orang Tua</option>
                          <option value="Pengajar">Pengajar</option>
                          <option value="Tenaga Kesehatan">Tenaga Kesehatan</option>
                        </select>
                        </div> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                          <label>Nama Lengkap</label>
                        </div> 
                        <div class="col-6">
                          <input type="text" id="namaLengkap" name="namaLengkap" class="form-control select2" style="width: 100%;" placeholder="Masukkan nama lengkap">
                        </div> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                          <label>Email</label>
                        </div> 
                        <div class="col-6">
                          <input type="email" id="email" name="email" class="form-control select2" style="width: 100%;" placeholder="Masukkan email" required>
                        </div> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                          <label>Topik Ulasan</label>
                        </div> 
                        <div class="col-6">
                        <select class="form-control select2" id="topikUlasan" name="topikUlasan" style="width: 100%;" required>
                          <option selected="selected" disabled>-- Pilih Topik Ulasan --</option>
                          <?php 
                          $result_head = mysqli_query($db2,"SELECT * FROM `topik`");
                            while($d_head = mysqli_fetch_array($result_head)){
                          ?>
                          <option value="<?php echo $d_head['id_topik']; ?>"><?php echo $d_head['nama_topik']; ?></option>
                          <?php } ?>
                        </select>
                        </div> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                          <label>Ulasan</label>
                        </div> 
                        <div class="col-6">
                          <textarea id="ulasan" name="ulasan" class="form-control" rows="3" placeholder="Tulis ulasanmu disini.."></textarea>
                        </div> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                          <label>Lampirkan Foto Pendukung Ulasan Mu</label>
                        </div> 
                        <div class="col-6">
                        <input  class="form-control" type="file" id="lampiran" name="lampiran">
                        <label for="lampiran"><img id="blah" style="width: 200px; border: 1px solid black; margin-top: 30px; paddingL 10px;" src="img/upload.PNG" alt="your image" /></label>
                        </div> 
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <button type="button" class="btn btn-primary btn-sm float-right" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;" data-toggle="modal" data-target="#modal-default">
                          Selanjutnya
                        </button>
                        </div> 
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
            <!-- /.container-fluid -->
        </div>
      </section>
      <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

</form>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#lampiran").change(function() {
  readURL(this);
});

    $(document).ready(function () {
      $(':checkbox[id="allCheck"]').click(function () {
        if ($(this).is(':checked')) {
          $("input:checkbox").prop("checked", true);
        } else {
          $("input:checkbox").prop("checked", false);
        }
      });

    });
  </script>

</body>

</html>