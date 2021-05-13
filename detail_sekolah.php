<!DOCTYPE html>
<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
if (isset($_GET['id_sekolah'])) {
	$id_sekolah = $_GET['id_sekolah'];

		echo $id_sekolah.'<br>';
	
}

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

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="min-height: 100%;">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content" style="">
        <div class="container-fluid" style="margin-top:100px;">
          <h1><b>SLB ABCD Caringin </b></h1><br>
          <div style="margin-top:10px;">
            <!-- Main content -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-4 p-2 ">
                      <img src="img/4096093.png" class="shadow-sm rounded" style="width: 100%;">
                </div>

                <div class="card card-default col-sm-12 mt-5">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12" style="font-weight:bold; font-size: 20px">
                        <p>Detail Sekolah</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Bentuk sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Status sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Jenjang pendidikan yang diterimma</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Akreditasi</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Visi sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Nilai-nilai sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Alamat</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Kabupaten/Kota</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Provinsi</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Telepon</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Email</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Website</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Kategori kebutuhan khusus yang dilayani</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Biaya sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Waktu penyelenggara</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Penerimaan sekolah terhadap ABK</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Pengalaman sekolah menangani ABK</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan hubungan dengan sekolah lain</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan program penempatan ganda</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Syarat perlu ada tidaknya pendamping</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Teknis pendaftaran</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Keamanan sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Dukungan Spesialis</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan dukungan spesialis</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Pengajar</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Pelatihan pendidikan khusus yang dimiliki pengajar</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Rata-rata pengalaman pengajar dalam mendidik ABK</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Staff Operasional</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan pembekalan kepada staff operasional mengenai pengetahuan praktis menangani anak berkebutuhan khusus</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Siswa</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan pembekalan kepada siswa lainnya dalam mendidik mereka untuk dapat menerima siswa berkebutuhan khusus</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Keterlibatan Orang Tua</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan asosiasi orang tua dan guru</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Ketersediaan forum pandangan orang tua</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Cara orang tua berkomunikasi dengan pengajar dalam mengetahui perkembangan anak</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Proses Belajar Mengajar</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Kurikulum Sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Metode Penyampaian Materi Pembelajaran yang diterapkan</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Metode Monitoring dan Evaluasi Perkembangan Anak yang diterapkan</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Jumlah murid dalam satu kelas</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Pengaturan situasi di kelas</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Gedung dan perlengkapannya</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Sarana & prasarana umum yang disediakan sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Sarana & prasarana khusus yang disediakan sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Teknologi yang disediakan sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Kebijakan Sekolah</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Kebijakan yang diterapkan sekolah</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md" style="font-weight:bold; font-size: 20px">
                        <p>Kegiatan Sekolah</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Kegiatan sekolah yang dapat diikuti ABK</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p>Get value</p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->

            <div class="container-fluid" style="margin-top:100px;">
              <div class="row">
                <div class="col-sm-6">
                  <h1><b>Ulasan </b></h1><br>
                </div>
                <div class="col-sm-6">
                  <a href="berbagi_info.php" style="color: white; width: 250px; background-color: #05319D;"
                    class="btn btn-primary btn-lg float-right">Tambah Ulasan +</a>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="row" style="padding: 20px;">
                <div class="col-12">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                          <h3><b>Nama Lengkap - Latar Belakang</b></h3>
                        </div>
                        <div class="col-6">
                        <div class="float-right">
                          <h5>23 Juli 2020, 13:00 WIB</h5>
                        </div>
                        </div>  
                    </div>
                    <h5 class="mt-2"><b>Kriteria Informasi</b></h5>
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