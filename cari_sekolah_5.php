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
          <h1><b>Hasil Pencarian</b></h1><br>
          <h5>Berikut layanan pendidikan ABK yang cocok dengan hasil filtering dan prioritas anda</h5>
          <div style="margin-top:100px;">




            <!-- Main content -->

            <div class="container-fluid">


              <div class="row">
                <div class="col-12">
                  <div class="card row">
                    <div class="card-body" style="height: 520px;">
                      <div class="row">
                        <div class="col-4">
                          <img src="img/4096093.png" class="" style="width: 100%; padding-bottom: 20px;">
                          <!-- /.card-header -->

                          <h4><b>Nama Sekolah :</b></h4>
                          <h5>Alamat :</h5>
                          <h5>Telphone :</h5>
                        </div>
                        <div class="col-6" style="margin-left: 30px; padding-left: 30px; border-left: 2px solid gray;">
                          <h4><b>Kelebihan dari sekolah ini:<b></h4>
                          <h5 style="padding-top: 20px;">Keamanan sekolah</h5>
                          <h5 style="padding-top: 20px;">Sarana dan prasarana yang disediakan sesuai kebutuhan khusus anak</h5>
                        </div>
                      </div>
                      <div class="card-footer row" style="background-color: white;">
                        <div class="col-4">
                          <a href="detail_sekolah.php"
                            style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;"
                            class="btn btn-primary btn-sm float-right">Lihat Detail</a>
                        </div>
                        <div class="col-8">
                        <a href="detail_sekolah.php"
                            style="margin-top: 20px; color: white;"
                            class="btn btn-primary btn-sm float-right">5</a>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>




              </div>
              <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->



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