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
          <div class="col-12"> 
              <h3><b> Berbagi Informasi </b></h3>
              <h5>Berikut ulasan kepada layanan pendidikan dengan mengisi form berikut ini</h5>
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
                            <option>Orang Tua</option>
                            <option>Pengajar</option>
                            <option>Tenaga Kesehatan</option>
                          </select>
                         </div> 
                      </div>
                      <div class="row mt-3">
                         <div class="col-6">
                           <label>Nama Lengkap</label>
                         </div> 
                         <div class="col-6">
                           <input type="text" id="namaLengkap" name="namaLengkap" class="form-control select2" style="width: 100%;" >
                         </div> 
                      </div>
                      <div class="row mt-3">
                         <div class="col-6">
                           <label>Email</label>
                         </div> 
                         <div class="col-6">
                           <input type="text" id="email" name="email" class="form-control select2" style="width: 100%;" >
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
                            $result_head = mysqli_query($db2,"select * from `Topik`");
                              while($d_head = mysqli_fetch_array($result_head)){
                            ?>
                            <option>_________</option>
                            <?php } ?>
                          </select>
                         </div> 
                      </div>
                      <div class="row mt-3">
                         <div class="col-6">
                           <label>Ulasan</label>
                         </div> 
                         <div class="col-6">
                           <textarea id="ulasan" name="ulasan" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                         </div> 
                      </div>
                      <div class="row mt-3">
                         <div class="col-6">
                           <label>Lampirkan Foto Pendukung Ulasan Mu</label>
                         </div> 
                         <div class="col-6">
                           <input type="text" id="biayaMinimum" name="biayaMinimum" class="form-control select2" style="width: 100%;" >
                         </div> 
                      </div>
                      <div class="row mt-3">
                         <div class="col">
                          <a href="/kms_pendidikan/cari_sekolah_2.php" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;"
                          class="btn btn-primary btn-sm float-right">Selanjutnya ></a>
                         </div> 
                      </div>
                    </div>
                  </div>
  
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.container-fluid -->


            <div class="card">
              <div class="row" style="padding: 20px;">
                <div class="col-6">
                  <h3><b>Nama Lengkap - Latar Belakang</b></h3>
                </div>
                <div class="col-6">
                  <div class="float-right">
                    <h5>23 Juli 2020, 13:00 WIB</h5>
                  </div>
                </div>

                <div class="col-12">
                  <div class="card-body">
                  <h5><b>Kriteria Informasi</b></h5>
                  <h5>Fasilitas khusus yang disediakan lengkap untuk mendukung proses pembelajaran anak, tetapi sayangnya beberapa di antaranya tidak terawat</h5>
                  </div>
                </div>

                <div class="col-2">
                  <div class="card-header">
                    <img src="img/4096093.png" class="" style="width: 100%;">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
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