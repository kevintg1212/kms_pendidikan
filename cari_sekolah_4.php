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
          <h1><b>Temukan Informasi Layanan Pendidikan ABK</b></h1><br>
          <div style="margin-top:100px; margin-left:100px;">
            <h4><b>Tentukan prioritas anda pada kriteria yang dipertimbangkan saat mencari layanan pendidikan ABK</b>
            </h4><br>
            <h5>Anda hanya perlu menentukan prioritas anda pada setiap kriteria</h5>


            <!-- Main content -->

            <div class="container-fluid">


              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="row" style="text-align: center;">
                        <div class="col-6">
                        </div>
                        <div class="col-2">
                          <h3 class="card-title" style="width: 100%;">Sangat <br>Dipertimbangkan</h3>
                        </div>
                        <div class="col-2">
                          <h3 class="card-title" style="width: 100%;">Cukup <br>Dipertimbangkan</h3>
                        </div>
                        <div class="col-2">
                          <h3 class="card-title" style="width: 100%;">Kurang <br>Dipertimbangkan</h3>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="form-group">

                        <div class="row" style="padding-bottom: 20px;">
                          <div class="col-6" style="text-align: left;">Pengalaman sekolah dalam menangani ABK
                          </div>
                          <div class="col-2" style="text-align: center;">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio1">
                            </div>
                          </div>
                          <div class="col-2" style="text-align: center;">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio1" checked>
                            </div>
                          </div>
                          <div class="col-2" style="text-align: center;">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio1">
                            </div>
                          </div>
                        </div>


                        <div class="row" style="padding-bottom: 20px;">
                          <div class="col-6" style="text-align: left;">Jumlah murid ABK yang diterima dalam satu kelas
                          </div>
                          <div class="col-2" style="text-align: center;">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio2">
                            </div>
                          </div>
                          <div class="col-2" style="text-align: center;">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio2" checked>
                            </div>
                          </div>
                          <div class="col-2" style="text-align: center;">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio2">
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <!-- /.row (main row) -->




            </div><!-- /.container-fluid -->



          </div>
          <div class="" style="text-align: center; padding-top: 50px;">
            <a href="cari_sekolah_5.php"
              style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;"
              class="btn btn-primary btn-sm">CARI SEKOLAH</a>
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