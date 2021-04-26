<!DOCTYPE html>

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




  <div class="wrapper">
    <?php include "view/header.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="min-height: 100%;">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content" style="">
        <div class="container-fluid" style="margin-top:100px;">
        <div class="row">
          <div class="col-md-6">
            <h1><b>Berbagi Informasi</b></h1><br>
            <h5>Berikan ulasan kepada layanan pendidikan dengan mengisi form berikut ini </h5>
          </div>
          <div class="col-md-6">
            <select class="form-control select2 float-right" style="width: 50%;">
              <option selected="selected" disabled>-- Cari Layanan Pendidikan --</option>
              <option>Bentuk A</option>
            </select>
          </div>
          </div>
          <div style="margin-top:50px;">




            <!-- Main content -->

            <div class="container-fluid">


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <label>Latar Belakang</label>
                </div>
                <div class="col-md-6">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled>-- Pilih Bentuk Sekolah --</option>
                    <option>Bentuk A</option>
                  </select>
                </div>
              </div>
              <!-- /.row (main row) -->

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <label>Nama Lengkap</label>
                </div>
                <div class="col-md-6">
                <input class="form-control" type="text" placeholder="">
                </div>
              </div>
              <!-- /.row (main row) -->

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <label>Email</label>
                </div>
                <div class="col-md-6">
                <input class="form-control" type="email" placeholder="">
                </div>
              </div>
              <!-- /.row (main row) -->


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <label>Topik Ulasan</label>
                </div>
                <div class="col-md-6">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled>-- Pilih Bentuk Sekolah --</option>
                    <option>Bentuk A</option>
                  </select>
                </div>
              </div>
              <!-- /.row (main row) -->

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <label>Ulasan</label>
                </div>
                <div class="col-md-6">
                <textarea  class="form-control" type="textarea" placeholder="" rows="6"></textarea>
                </div>
              </div>
              <!-- /.row (main row) -->

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <label>Lampirkan Foto Pendukung Ulasan Mu</label>
                </div>
                <div class="col-md-6">
                <input  class="form-control" type="file" >
                </div>
              </div>
              <!-- /.row (main row) -->


            </div><!-- /.container-fluid -->



          </div>
          <div class="" style="text-align: right; padding-top: 50px; padding-right: 150px;">
            <a href="cari_sekolah_4.php"
              style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;"
              class="btn btn-primary btn-lg">Kirim</a>
          </div>
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