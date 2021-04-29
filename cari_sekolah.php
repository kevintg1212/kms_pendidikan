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




  <div class="wrapper">
    <?php include "view/header.php";?>

		<div class="modal fade" id="modal-default">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p>Maaf, layanan pendidikan ABK yang anda cari tidak ditemukan</p>
					</div>
					<div class="modal-footer justify-content-end" style="height: 50px;">
						<a href="/kms_pendidikan/cari_sekolah.php" class="btn btn-sm btn-primary">OK</a>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="min-height: 100%;">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
      <form class="form-horizontal" action="controller/conn_cari_sekolah.php" method="post">
        <div class="container-fluid" style="margin-top:100px;">
          <h1><b>Temukan Informasi Layanan Pendidikan ABK</b></h1> <br>
          <div class="row px-5 py-2">
            <div class="col-md-12">
              <div class ="shadow p-3 mb-5 bg-white rounded" style="padding: 25px 100px">
                <h4><b>Lakukan pencarian dengan menggunakan pilihan berikut ini</b></h4><br>
                <h5>*Wajib di isi.</h5><br>
                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Lokasi Sekolah *</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select2" id="lokasiSekolah" name="lokasiSekolah" style="width: 100%;" required>
                      <option selected="selected" disabled>-- Pilih Lokasi Sekolah --</option>
                      <?php 
                      $result_head = mysqli_query($db2,"select * from `wilayah_kabupaten`");
                        while($d_head = mysqli_fetch_array($result_head)){
                      ?>
                      <option><?php echo $d_head['nama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Kebutuhan khusus yang dilayani *</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select2" style="width: 100%;" id="kebutuhanKhusus" name="kebutuhanKhusus" required>
                      <option selected="selected" disabled>-- Pilih Kebutuhan khusus  --</option>
                      <?php 
                      $result_head = mysqli_query($db2,"select * from `kebutuhan_khusus`");
                        while($d_head = mysqli_fetch_array($result_head)){
                      ?>
                      <option><?php echo $d_head['kebutuhan_khusus']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Jenjang Pendidikan *</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select2" id="jenjangPendidikan" name="jenjangPendidikan" style="width: 100%;" required>
                      <option selected="selected" disabled>-- Pilih Jenjang Pendidikan --</option>
                      <?php 
                      $result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
                        while($d_head = mysqli_fetch_array($result_head)){
                      ?>
                      <option><?php echo $d_head['jenjang_pendidikan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Biaya Sekolah</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="biayaMinimum" name="biayaMinimum" class="form-control select2" style="width: 100%;" placeholder="Biaya Minimum">
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <label> - </label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="biayaMaximum" name="biayaMaximum" class="form-control select2" style="width: 100%;" placeholder="Biaya Maximum">
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Jumlah murid dalam satu kelas</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="jmlMinimum" name="jmlMinimum" class="form-control select2" style="width: 100%;" placeholder="Jumlah Minimum">
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <label> - </label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="jmlMaximum" name="jmlMaximum" class="form-control select2" style="width: 100%;" placeholder="Jumlah Maximum">
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Pengalaman sekolah dalam menangani ABK</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="tahun_sekolah" name="tahun_sekolah" class="form-control select2" style="width: 100%;" >
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <p> Tahun </p>
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Pengalaman pengajar dalam menangani ABK</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="tahun_pengajar" name="tahun_pengajar" class="form-control select2" style="width: 100%;" >
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <p> Tahun </p>
                  </div>
                </div>

                <div class="row justify-content-center" style="text-align: center; padding-top: 50px;">
									<button type="button" class="btn btn-primary btn-sm" href="/kms_pendidikan/cari_sekolah_2.php" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;" data-toggle="modal" data-target="#modal-default">
										Selanjutnya
									</button>
                </div>

              </div>
            </div>
          </div>
          
        </div>
      </form>
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



  </script>

</body>

</html>