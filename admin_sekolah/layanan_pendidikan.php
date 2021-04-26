<!DOCTYPE html>

<?php 
include '../SQL/config.php';
 
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
          <p>Data ini akan dilakukan validasi terlebih dahulu sebelum ditampilkan pada website "Knowledge Management
          System Layanan Pendidikan untuk ABK"<br><br>

          <b>Maka, pastikan Surat Ijin Operasional Sekolah telah di unggah. </b><br>
          Kami akan mengkonfirmasi proses validasi melalui notifikasi jika layanan pendidikan ABK diterima. 
          Namun apabila layanan pendidikan ABK ini terbukti tidak beroperasional, kami akan menginformasikan melalui 
          email anda karena data layanan pendidikan ABK serta account anda otomatis terhapus. </p>
        </div>
        <form action="SQL/vDeleteEvent.php" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Konfrimasi</button>
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
    <?php include "navbar.php" ?>
    <!-- /.navbar -->

    <?php include "aside.php" ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content" style="">
        <div class="container-fluid">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <h5>Data Layanan Pendidikan ABK</h5><br>
            </div>
            <div class="card-body">
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>NPSN</h5>
                </div>
                <div class="col-md-6">
                  <input name="npsn" type="text" class="form-control select2" style="width: 100%;" required>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Nama Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input name="nama_sekolah" type="text" class="form-control select2" style="width: 100%;" required>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Foto Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="file">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Detail Sekolah</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Bentuk Sekolah</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="bentuk" id="radio1">
                      <label class="form-check-label" for="radio1">Segregasi</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="bentuk" id="radio2">
                      <label class="form-check-label" for="radio2">Integrasi</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="bentuk" id="radio3">
                      <label class="form-check-label" for="radio3">Inklusi</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="bentuk" id="radio4">
                      <label class="form-check-label" for="radio4">Lainnya</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Status Sekolah</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="radio5">
                      <label class="form-check-label" for="radio5">Swasta</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="radio6">
                      <label class="form-check-label" for="radio6">Negri</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Jenjang pendidikan yang diterima</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="jenjang[]" id="check1">
                      <label class="form-check-label" for="check1">TK</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="jenjang[]" id="check2">
                      <label class="form-check-label" for="check2">SD</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="jenjang[]" id="check3">
                      <label class="form-check-label" for="check3">SMP</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="jenjang[]" id="check4">
                      <label class="form-check-label" for="check4">SMA</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Akreditasi</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="akreditasi" id="radio7">
                      <label class="form-check-label" for="radio7">A</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="akreditasi" id="radio8">
                      <label class="form-check-label" for="radio8">B</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="akreditasi" id="radio9">
                      <label class="form-check-label" for="radio9">C</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Visi Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="visi_sekolah" class="form-control select2" style="width: 100%;" required></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Nilai-nilai yang diterapkan sekolah</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="nilai_nilai" class="form-control select2" style="width: 100%;" required></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Alamat Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input name="alamat_sekolah" type="text" class="form-control select2" style="width: 100%;" required>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Provinsi</h5>
                </div>
                <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;" name="provinsi" required>
                    <option selected="selected" disabled>-- Pilih Provinsi --</option>
                    <option>Bentuk A</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kabupaten/Kota</h5>
                </div>
                <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;" name="kota" required>
                    <option selected="selected" disabled>-- Pilih Kabupaten/Kota --</option>
                    <option>Bentuk A</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Telepon</h5>
                </div>
                <div class="col-md-6">
                  <input name="telepon" type="text" class="form-control select2" style="width: 100%;" required>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Email</h5>
                </div>
                <div class="col-md-6">
                  <input name="email" type="email" class="form-control select2" style="width: 100%;" required>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Website</h5>
                </div>
                <div class="col-md-6">
                  <input name="website" type="text" class="form-control select2" style="width: 100%;" required>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kebutuhan khusus yang dilayani</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan1">
                      <label class="form-check-label" for="kebutuhan1">Tunanetra</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan2">
                      <label class="form-check-label" for="kebutuhan2">Tunagrahita</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan3">
                      <label class="form-check-label" for="kebutuhan3">Autisme</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan4">
                      <label class="form-check-label" for="kebutuhan4">Tunarungu</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan5">
                      <label class="form-check-label" for="kebutuhan5">Tunaganda</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan6">
                      <label class="form-check-label" for="kebutuhan6">Indigo</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan7">
                      <label class="form-check-label" for="kebutuhan7">Tunadaksa</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan8">
                      <label class="form-check-label" for="kebutuhan8">Kesulitan Belajar</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan9">
                      <label class="form-check-label" for="kebutuhan9">Hiperaktif</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan10">
                      <label class="form-check-label" for="kebutuhan10">Tunalaras</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan11">
                      <label class="form-check-label" for="kebutuhan11">Cerdas Istimewa</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan12">
                      <label class="form-check-label" for="kebutuhan12">Down Syndrome</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan13">
                      <label class="form-check-label" for="kebutuhan13">Tunawicara</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan14">
                      <label class="form-check-label" for="kebutuhan14">Bakat Istimewa</label>
                    </div>
                  </div>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan15">
                      <label class="form-check-label" for="kebutuhan15">Narkoba</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Biaya Sekolah</h5>
                </div>
                <div class="col-md-6 row">
                  <input name="biaya" type="number" min=0 class="form-control select2" style="width: 80%;" required> <h5>&nbsp; /bulan</h5>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Waktu Penyelenggara Sekolah</h5>
                </div>
                <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;" name="waktu" required>
                    <option selected="selected" disabled>-- Pilih Waktu Penyelenggara Sekolah --</option>
                    <option>Bentuk A</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Penerimaan sekolah terhadap ABK</h5>
                </div>
                <div class="col-md-8 row">
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="penerimaan" id="radio11">
                      <label class="form-check-label" for="radio11">Menerima namun memperlakukan sama dengan anak normal lainnya</label>
                    </div>
                  </div>
                  <div class="col-12" style="margin-top: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="penerimaan" id="radio12">
                      <label class="form-check-label" for="radio12">Menerima dan mampu menangani sesuai kebutuhannya</label>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan hubungan dengan sekolah lain</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hubungan" id="radio13">
                      <label class="form-check-label" for="radio13">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="hubungan" id="radio14">
                      <label class="form-check-label" for="radio14">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan program penempatan ganda</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="program" id="radio15">
                      <label class="form-check-label" for="radio15">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="program" id="radio16">
                      <label class="form-check-label" for="radio16">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Syarat perlu ada tidaknya pendamping</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pendamping" id="radio17">
                      <label class="form-check-label" for="radio17">Perlu</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pendamping" id="radio18">
                      <label class="form-check-label" for="radio18">Tidak Perlu</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Teknis Pendaftaran</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="teknis_pendaftaran" class="form-control select2" style="width: 100%;" required></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Proses Belajar Mengajar</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kurikulum Sekolah</h5>
                </div>
                <div class="col-md-8 row">
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kurikulum" id="kurikulum1">
                      <label class="form-check-label" for="kurikulum1">Kurikulum Reguler Penuh (Kurikulum 2013)</label>
                    </div>
                  </div>
                  <div class="col-12" style="margin-top: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kurikulum" id="kurikulum2">
                      <label class="form-check-label" for="kurikulum2">Kurikulum Reguler dengan Modifikasi</label>
                    </div>
                  </div>
                  <div class="col-12" style="margin-top: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kurikulum" id="kurikulum2">
                      <label class="form-check-label" for="kurikulum2">Kurikulum Program Pendidikan Individual (PPI)</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Dukungan Spesialis</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan dukungan spesialis</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="specialist" id="special5">
                      <label class="form-check-label" for="special5">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="specialist" id="special6">
                      <label class="form-check-label" for="special6">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Staff Operasional</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan pembekalan kepada staff operasional 
                  mengenai pengetahuan praktis menangani anak 
                  berkebutuhan khusus</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="staff" id="staff5">
                      <label class="form-check-label" for="staff5">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="staff" id="staff6">
                      <label class="form-check-label" for="staff6">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Siswa</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan pembekalan kepada siswa lainnya
                      dalam mendidik mereka untuk dapat menerima 
                      siswa berkebutuhan khusus</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pembekalan" id="pembekalan5">
                      <label class="form-check-label" for="pembekalan5">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pembekalan" id="pembekalan6">
                      <label class="form-check-label" for="pembekalan6">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Keterlibatan Orang Tua</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kesediaan asosiasi orang tua dan guru</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="asosiasi" id="asosiasi5">
                      <label class="form-check-label" for="asosiasi5">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="asosiasi" id="asosiasi6">
                      <label class="form-check-label" for="asosiasi6">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kesediaan forum pandangan orang tua</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="forum" id="forum5">
                      <label class="form-check-label" for="forum5">Tersedia</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="forum" id="forum6">
                      <label class="form-check-label" for="forum6">Tidak Tersedia</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Cara orang tua berkomunikasi dengan pengajar
                      dalam mengetahui perkembangan anak</h5>
                </div>
                <div class="col-md-6 row">
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi5">
                      <label class="form-check-label" for="komunikasi5">Lisan</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi6">
                      <label class="form-check-label" for="komunikasi6">Tulisan</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi7">
                      <label class="form-check-label" for="komunikasi7">Lisan dan Tulisan</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Kriteria Informasi Penilaian</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Surat Ijin Operasional/Pendirian Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="file">
                </div>
              </div>


            </div>
            <div class="" style="text-align: right; padding-top: 50px;">
              <button data-toggle="modal" data-target="#modal-cancel"
                style="margin-top: 20px; color: white; width: 150px; background-color: #1D2948;"
                class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
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