<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../login.php");
}
$nik =$_SESSION['nik'];
$result = mysqli_query($db2,"SELECT status_data FROM layananpendidikan where nik ='$nik'");
while($tmp1 = mysqli_fetch_array($result)){
  $status_p = $tmp1['status_data'];
}
if (!isset($status_p)) {
  $status_p="";
}
if ($status_p=='Pending') {
  header("location:layanan_pendidikan_pending.php");
}
if ($status_p=='Warning' || $status_p=='Accepted' || $status_p=='Perubahan') {
  header("location:layanan_pendidikan_edit.php");
}
if ($status_p=='Rejected') {
  header("location:layanan_pendidikan_tolak.php");
}
if ($status_p=='PENGHAPUSAN PENDING') {
  header("location:layanan_pendidikan_penghapusan.php");
}

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
<form id="layanan_p" action="controller/add_layanan_pendidikan.php" method="post" enctype="multipart/form-data">
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
          Kami akan mengkonfirmasi hasil validasi melalui notifikasi di laman anda.
          Namun apabila layanan pendidikan ABK ini terbukti tidak beroperasional, maka data layanan pendidikan yang anda bagikan akan dinonaktifkan. </p>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Konfrimasi</button>
          </div>
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

      <input name="nik" type="hidden" value="<?php echo $nik;?>" >
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
                  <input name="npsn" type="text" class="form-control select2" style="width: 100%;" data-inputmask='"mask": "99999999"' data-mask >
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Nama Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input name="nama_sekolah" type="text" class="form-control select2" style="width: 100%;" >
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Foto Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="file" required name="foto_sekolah">
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
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 1");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="bentuk" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Status Sekolah</h5>
                </div>
                <div class="col-md-6 row">

                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 2");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>


                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Jenjang pendidikan yang diterima</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `jenjang_pendidikan`");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="jenjang[]" id="check<?php echo $tmp1['jenjang_pendidikan'];?>" value="<?php echo $tmp1['id_jenjangpendidikan'];?>">
                      <label class="form-check-label" for="check<?php echo $tmp1['jenjang_pendidikan'];?>"><?php echo $tmp1['jenjang_pendidikan'];?></label>
                    </div>
                  </div>
                  <?php } ?>

                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Akreditasi</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 3");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="akreditasi" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Visi Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="visi_sekolah" class="form-control select2" style="width: 100%;" ></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Nilai-nilai yang diterapkan sekolah</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="nilai_nilai" class="form-control select2" style="width: 100%;" ></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Alamat Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input name="alamat_sekolah" type="text" class="form-control select2" style="width: 100%;" >
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Provinsi</h5>
                </div>
                <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;" name="provinsi" id="provinsi"
                onchange="showDiv()" >
                    <option selected="selected" disabled>-- Pilih Provinsi --</option>
                    <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `wilayah_provinsi`");
                      while($tmp1 = mysqli_fetch_array($result)){
                    ?>
                    <option id="p-<?php echo $tmp1['id'];?>" value="<?php echo $tmp1['id'];?>"><?php echo $tmp1['nama'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kabupaten/Kota</h5>
                </div>
                <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;" name="kota" id="kota" >
                    <option selected="selected" value="" disabled>-- Pilih Kabupaten/Kota --</option>
                    <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `wilayah_kabupaten`");
                      while($tmp1 = mysqli_fetch_array($result)){
                    ?>
                    <option style="display: none;" class="city c-<?php echo $tmp1['provinsi_id'];?>" id="c-<?php echo $tmp1['provinsi_id'];?>" value="<?php echo $tmp1['id'];?>"><?php echo $tmp1['nama'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Telephone</h5>
                </div>
                <div class="col-md-6">
                  <input name="telephone" type="text" class="form-control select2" style="width: 100%;" >
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Email</h5>
                </div>
                <div class="col-md-6">
                  <input name="email" type="email" class="form-control select2" style="width: 100%;" >
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Website</h5>
                </div>
                <div class="col-md-6">
                  <input name="website" type="text" class="form-control select2" style="width: 100%;" >
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kebutuhan khusus yang dilayani</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `kebutuhan_khusus`");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kebutuhan[]" id="kebutuhan_<?php echo $temp1['kebutuhan_khusus']; ?>"  value="<?php echo $temp1['id_kebutuhankhusus']; ?>">
                      <label class="form-check-label" for="kebutuhan_<?php echo $temp1['kebutuhan_khusus'];?>"><?php echo $temp1['kebutuhan_khusus']; ?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Biaya Sekolah</h5>
                </div>
                <div class="col-md-6 row">
                  <input name="biaya" type="number" min=0 class="form-control select2" style="width: 80%;" > <h5>&nbsp; /bulan</h5>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Waktu Penyelenggara Sekolah</h5>
                </div>
                <div class="col-md-6">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 4");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="waktu_penyelenggara" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Penerimaan sekolah terhadap ABK</h5>
                </div>
                <div class="col-md-8 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 12");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-12" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="penerimaan_sekolah" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Pengalaman sekolah menangani ABK</h5>
                </div>
                <div class="col-md-6 row">
                  <input name="penglaman_sekolah" type="number" min=0 class="form-control select2" style="width: 50%; text-align: right;"
                  > <h5>&nbsp; tahun</h5>
                </div>
              </div>



              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan hubungan dengan sekolah lain</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 14");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ketersediaan_hubungan" id="radio_kh_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_kh_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan program penempatan ganda</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 15");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ketersediaan_program" id="radio_pg_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_pg_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Syarat perlu ada tidaknya pendamping</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 13");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="syarat_p" id="radio_sy_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_sy_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Teknis Pendaftaran</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="teknis_pendaftaran" class="form-control select2" style="width: 100%;" ></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Keamanan Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="keamanan_sekolah" class="form-control select2" style="width: 100%;" ></textarea>
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
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 16");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="specialist" id="radio_sp_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_sp_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Pengajar</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>
                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <h5>Pelatihan pendidikan khusus yang dimiliki pengajar</h5>
                  </div>
                  <div class="col-md-6">
                    <textarea rows="4" name="pelatihan" class="form-control select2" style="width: 100%;" ></textarea>
                  </div>
                </div>

                
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Rata-rata pengalaman pengajar dalam mendidik ABK</h5>
                </div>
                <div class="col-md-6 row">
                  <input name="rata_pengalaman" type="number" min=0 class="form-control select2" style="width: 50%; text-align: right;"><h5>&nbsp; tahun</h5>
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
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 17");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="staff_opr" id="radio_sto_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_sto_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
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
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 18");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="siswa_lain" id="radio_sl_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_sl_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
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
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 19");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kesediaan_asosiasi" id="radio_kao_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_kao_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Ketersediaan forum pandangan orang tua</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 20");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kesediaan_forum" id="radio_fr_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_fr_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <h5>Cara orang tua berkomunikasi dengan pengajar dalam mengetahui perkembangan anak</h5>
                  </div>
                  <div class="col-md-6">
                    <textarea rows="4" name="berkomunikasi_pengajar" class="form-control select2" style="width: 100%;" ></textarea>
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
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 5");
                while($tmp1 = mysqli_fetch_array($result)){
                ?>
                  <div class="col-12" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kurikulum" id="radio_kr_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_kr_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Metode Penyampaian Materi Pembelajaran yang diterapkan</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                      on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                      where sub_kriteriainformasi.id_kriteriainformasi=6 AND nilai=1");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="sub_kriteria[]" id="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      <label style="padding-bottom: 10px;" class="form-check-label" for="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                      <label class="form-check-label" for="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['keterangan'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
              
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Metode Monitoring dan Evaluasi Perkembangan Anak yang diterapkan</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                      on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                      where sub_kriteriainformasi.id_kriteriainformasi=7 AND nilai=1");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="metode_m[]" id="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      <label style="padding-bottom: 10px;" class="form-check-label" for="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                      <label class="form-check-label" for="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['keterangan'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
              
              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Jumlah murid dalam satu kelas</h5>
                </div>
                <div class="col-md-6 row">
                  <input name="jumlah_murid" type="number" min=0 class="form-control select2" style="width: 50%; text-align: right;"
                  > <h5>&nbsp; murid</h5>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Pengaturan situasi di kelas</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="pengaturan_kelas" class="form-control select2" style="width: 100%;" ></textarea>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-6">
                  <h4><b>Gedung dan perlengkapannya</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>     


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Sarpras Umum</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                      on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                      where sub_kriteriainformasi.id_kriteriainformasi=9 AND nilai=1");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="sarpas_umum[]" id="sarpas_umum_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="sarpas_umum_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Sarpras Khusus</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                      on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                      where sub_kriteriainformasi.id_kriteriainformasi=10 AND nilai=1");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="sarpas_khusus[]" id="sarpas_khusus_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="sarpas_khusus_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Teknologi</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                      on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                      where sub_kriteriainformasi.id_kriteriainformasi=11 AND nilai=1");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="teknologi[]" id="teknologi_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="teknologi_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Kebijakan Sekolah</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kebijakan yang diterapkan sekolah</h5>
                </div>
                <div class="col-md-6">
                  <textarea rows="4" name="kebijakan_sekolah" class="form-control select2" style="width: 100%;" ></textarea>
                </div>
              </div>


              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h4><b>Kegiatan Sekolah</b></h4>
                </div>
                <div class="col-md-6">
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Kegiatan sekolah yang dapat diikuti ABK</h5>
                </div>
                <div class="col-md-6 row">
                <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                      on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                      where sub_kriteriainformasi.id_kriteriainformasi=8 AND nilai=1");
                      while($temp1 = mysqli_fetch_array($result)){
                    ?>
                  <div class="col-12" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="kegiatan[]" id="kegiatan_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="kegiatan_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>



              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-12">
                  <h4><b>Surat Ijin Operasional/Pendirian Sekolah</b></h4>
                </div>
              </div>

              <div class="row" style="margin-top:50px; margin-left:20px;">
                <div class="col-md-4">
                  <h5>Surat Ijin Operasional/Pendirian Sekolah</h5>
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="file" required name="surat">
                </div>
              </div>


            </div>
            <div class="" style="text-align: right; padding-top: 50px;">
              <button type="button" data-toggle="modal" data-target="#modal-cancel"
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
  </form>
  <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
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
    
    function showDiv(){
      var hidemask = document.querySelectorAll(".city");
      document.getElementById("kota").value = "";
        for (var i = 0; i < hidemask.length; i++) {
            hidemask[i].style.display = "none";
        }
      
      var x = document.getElementById("provinsi").value;
      var hidemask = document.querySelectorAll(".c-"+x);
      document.getElementById("kota").value = "";
        for (var i = 0; i < hidemask.length; i++) {
            hidemask[i].style.display = "block";
        }

        
       
    }

  $(function () {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()





  })

</script>

</html>