<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
 
$npsn = $_GET['npsn'];
$sql = mysqli_query($db2,"
SELECT l.*, w.nama as kabupaten, p.nama as provinsi FROM layananpendidikan l 
join wilayah_kabupaten w on l.id_kabupaten = w.id 
join wilayah_provinsi p on l.id_provinsi = p.id
");

while($d_head = mysqli_fetch_array($sql)){
  $nik= $d_head['nik'];
  $provinsi= $d_head['provinsi'];
  $kabupaten= $d_head['kabupaten'];
  $nama_sekolah= $d_head['nama_sekolah'];
  $foto_sekolah= $d_head['foto_sekolah'];
  $visi_sekolah= $d_head['visi_sekolah'];
  $nilai_sekolah= $d_head['nilai_sekolah'];
  $alamat= $d_head['alamat'];
  $telepon= $d_head['telepon'];
  $email= $d_head['email'];
  $website= $d_head['website'];
  $biaya_sekolah= $d_head['biaya_sekolah'];
  $pengalaman_sekolah= $d_head['pengalaman_sekolah'];
  $pelatihan_pendidikankhusus_pengajar= $d_head['pelatihan_pendidikankhusus_pengajar'];
  $pengalaman_pengajar= $d_head['pengalaman_pengajar'];
  $cara_komunikasi_pengajar= $d_head['cara_komunikasi_pengajar'];
  $jumlah_murid= $d_head['jumlah_murid'];
  $pengaturan_kelas= $d_head['pengaturan_kelas'];
  $kebijakan_sekolah= $d_head['kebijakan_sekolah'];
  $keamanan_sekolah= $d_head['keamanan_sekolah'];
  $teknis_pendaftaran= $d_head['teknis_pendaftaran'];
  $surat_ijin_operasional= $d_head['surat_ijin_operasional'];
  $status_data= $d_head['status_data'];
}
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


  <div class="modal fade" id="modal-validasi">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-body">
        <form action="controller/update_status_layananpendidikan.php" method="post">
          <div class="container">
            <div class="row">
              <div class="col">
                <label style="font-size:18px;">Validasi Layanan Pendidikan ABK</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 p-2" >
                <div class="col-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"
                      id="status1" value="Accepted" checked>
                    <label class="form-check-label" for="status1">Accepted</label>
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"
                      id="status2" value="Warning">
                    <label class="form-check-label" for="status2">Give Status : Warning</label>
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"
                      id="status3" value="Rejected">
                    <label class="form-check-label" for="status3">Rejected</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary"> Simpan </button>
            <input class="event" type="hidden" name="id_ev">
            <input type="hidden" name="npsn" id="npsn" value=<?php echo $npsn; ?>>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-email">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-body">
        <form action="controller/update_status_layananpendidikan.php" method="post">
          <div class="container p-5">
            <div class="row">
              <div class="col-md p-2" >
                <div class="form-group row">
                  <label for="email" class="col-sm col-form-label font-weight-normal">Email</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email"
                      value="" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subjek" class="col-sm col-form-label font-weight-normal">Subjek</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="subjek" name="subjek"
                      value="" placeholder="subjek">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pesan" class="col-sm col-form-label font-weight-normal">Pesan</label>
                  <div class="col-sm-9">
                    <textarea id="pesan" name="pesan" class="form-control" rows="3" placeholder="Tulis pesanmu disini.."></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary"> Simpan </button>
            <input class="event" type="hidden" name="id_ev">
            <input type="hidden" name="npsn" id="npsn" value=<?php echo $npsn; ?>>
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
      <section class="content"></section>

      <!-- Default box -->

      <div class="row">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5>Validasi Data Layanan Pendidikan ABK</h5>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-4 my-2">
                  NPSN
                </div>
                <div class="col-8 my-2">
                  <?php echo $npsn ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Nama Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $nama_sekolah ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Foto Sekolah
                </div>
                <div class="col-8 my-2">
                  <img src="../img/4096093.png" class="shadow-sm" style="width: 50%;">
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Detail Sekolah</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Bentuk Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 1");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                  <div class="col-3">
                    <div class="form-check">
                      <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="bentuk" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Jenjang pendidikan yang diterima
                </div>
                <div class="col-8 my-2">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `jenjang_pendidikan`");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_jenjangpendidikan'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `jenjang_layananpendidikan` where id_jenjangpendidikan = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_jenjangpendidikan'];
                      
                    }
                  ?>
                  <?php echo "" ;?>
                  <div class="col-3">
                    <div class="form-check">
                      <input disabled <?php if($tmp1['id_jenjangpendidikan']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="jenjang[]" id="check<?php echo $tmp1['jenjang_pendidikan'];?>" value="<?php echo $tmp1['id_jenjangpendidikan'];?>">
                      <label class="form-check-label" for="check<?php echo $tmp1['jenjang_pendidikan'];?>"><?php echo $tmp1['jenjang_pendidikan'];?></label>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Akreditasi
                </div>
                <div class="col-8 my-2">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 3");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                  <div class="col-4">
                    <div class="form-check">
                      <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="akreditasi" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Visi Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $visi_sekolah ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Nilai-nilai yang diterapkan sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $nilai_sekolah ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Alamat Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $alamat ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Provinsi
                </div>
                <div class="col-8 my-2">
                  <?php echo $provinsi ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Kabupaten/Kota
                </div>
                <div class="col-8 my-2">
                  <?php echo $kabupaten ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Telepon
                </div>
                <div class="col-8 my-2">
                  <?php echo $telepon ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Email
                </div>
                <div class="col-8 my-2">
                  <?php echo $email ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Website
                </div>
                <div class="col-8 my-2">
                  <?php echo $website ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Kebutuhan khusus yang dilayani
                </div>
                <div class="col-8 my-2 row">
                  <?php 
                    $result = mysqli_query($db2,"SELECT * FROM `kebutuhan_khusus`");
                    while($temp1 = mysqli_fetch_array($result)){
                      $id_dk = $temp1['id_kebutuhankhusus'];
                      $id_dk2 = '';
                      $result2 = mysqli_query($db2,"SELECT * FROM `kebutuhankhusus_layananpendidikan` where id_kebutuhankhusus = $id_dk");
                      while($tmp2 = mysqli_fetch_array($result2)){
                        $id_dk2 = $tmp2['id_kebutuhankhusus'];
                        
                      }
                  ?>
                  <div class="col-4" style="padding-bottom: 20px;">
                    <div class="form-check">
                      <input disabled <?php if($temp1['id_kebutuhankhusus']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="kebutuhan[]" id="kebutuhan_<?php echo $temp1['kebutuhan_khusus']; ?>"  value="<?php echo $temp1['id_kebutuhankhusus']; ?>">
                      <label class="form-check-label" for="kebutuhan_<?php echo $temp1['kebutuhan_khusus'];?>"><?php echo $temp1['kebutuhan_khusus']; ?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Biaya Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $biaya_sekolah ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Waktu Penyelenggara Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 4");
                  while($tmp1 = mysqli_fetch_array($result)){
                      $id_dk = $tmp1['id_detail_kriteriainformasi'];
                      $id_dk2 = '';
                      $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                      while($tmp2 = mysqli_fetch_array($result2)){
                        $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                        
                      }
                  ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="waktu_penyelenggara" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Penerimaan sekolah terhadap ABK
                </div>
                <div class="col-8 my-2">
                <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 12");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-12" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="penerimaan_sekolah" id="radio<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Pengalaman sekolah menangani ABK
                </div>
                <div class="col-8 my-2">
                 <?php echo $pengalaman_sekolah ;?> &nbsp; tahun
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan hubungan dengan sekolah lain
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 14");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="ketersediaan_hubungan" id="radio_kh_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_kh_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan program penempatan ganda
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 15");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="ketersediaan_program" id="radio_pg_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_pg_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Syarat perlu ada tidaknya pendamping
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 13");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="syarat_p" id="radio_sy_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_sy_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Teknis Pendaftaran
                </div>
                <div class="col-8 my-2">
                  <?php echo $teknis_pendaftaran ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Keamanan Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $keamanan_sekolah ;?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Dukungan Spesialis</b> 
                </div>
              </div>


              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan dukungan spesialis
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 16");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="specialist" id="radio_sp_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_sp_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Pengajar</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Pelatihan pendidikan khusus yang dimiliki pengajar
                </div>
                <div class="col-8 my-2">
                  <?php echo $pelatihan_pendidikankhusus_pengajar ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Rata-rata pengalaman pengajar dalam mendidik ABK
                </div>
                <div class="col-8 my-2">
                  <?php echo $pengalaman_pengajar ;?> &nbsp; tahun
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Staff Operasional</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan pembekalan kepada staff operasional mengenai pengetahuan praktis menangani anak berkebutuhan khusus
                </div>
                <div class="col-6 my-2 row">
                <?php 
                $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 17");
                while($tmp1 = mysqli_fetch_array($result)){
                  $id_dk = $tmp1['id_detail_kriteriainformasi'];
                  $id_dk2 = '';
                  $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                  while($tmp2 = mysqli_fetch_array($result2)){
                    $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                    
                  }
                ?>
                  <div class="col-6" style="margin-bottom:20px;">
                    <div class="form-check">
                      <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="staff_opr" id="radio_sto_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                      <label class="form-check-label" for="radio_sto_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>


              <div class="row my-3">
                <div class="col">
                   <b>Siswa</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan pembekalan kepada siswa lainnya dalam mendidik mereka untuk dapat menerima siswa berkebutuhan khusus
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 18");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="siswa_lain" id="radio_sl_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_sl_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Keterlibatan Orang Tua</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan asosiasi orang tua dan guru
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 19");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="kesediaan_asosiasi" id="radio_kao_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_kao_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Ketersediaan forum pandangan orang tua
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 20");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-6" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="kesediaan_forum" id="radio_fr_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_fr_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Cara orang tua berkomunikasi dengan pengajar dalam mengetahui perkembangan anak
                </div>
                <div class="col-8 my-2">
                  <?php echo $cara_komunikasi_pengajar ;?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                  <b>Proses Belajar Mengajar</b>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Kurikulum Sekolah
                </div>
                <div class="col-8 my-2 row">
                  <?php 
                  $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 5");
                  while($tmp1 = mysqli_fetch_array($result)){
                    $id_dk = $tmp1['id_detail_kriteriainformasi'];
                    $id_dk2 = '';
                    $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                    while($tmp2 = mysqli_fetch_array($result2)){
                      $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                      
                    }
                  ?>
                    <div class="col-12" style="margin-bottom:20px;">
                      <div class="form-check">
                        <input disabled <?php if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="radio" name="kurikulum" id="radio_kr_<?php echo $tmp1['parameter'];?>" value="<?php echo $tmp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="radio_kr_<?php echo $tmp1['parameter'];?>"><?php echo $tmp1['parameter'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Metode Penyampaian Materi Pembelajaran yang diterapkan
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                        $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                        on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                        where sub_kriteriainformasi.id_kriteriainformasi=6 AND nilai=1");
                        while($temp1 = mysqli_fetch_array($result)){
                          $id_dk = $temp1['id_detail_kriteriainformasi'];
                          $id_dk2 = '';
                          $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                          while($tmp2 = mysqli_fetch_array($result2)){
                            $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                            
                          }
                      ?>
                    <div class="col-12" style="padding-bottom: 20px;">
                      <div class="form-check">
                        <input disabled <?php if($temp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="sub_kriteria[]" id="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                        <label style="padding-bottom: 10px;" class="form-check-label" for="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                        <label class="form-check-label" for="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['keterangan'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Metode Monitoring dan Evaluasi Perkembangan Anak yang diterapkan
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                        $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                        on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                        where sub_kriteriainformasi.id_kriteriainformasi=7 AND nilai=1");
                        while($temp1 = mysqli_fetch_array($result)){
                          $id_dk = $temp1['id_detail_kriteriainformasi'];
                          $id_dk2 = '';
                          $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                          while($tmp2 = mysqli_fetch_array($result2)){
                            $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                            
                          }
                      ?>
                    <div class="col-12" style="padding-bottom: 20px;">
                      <div class="form-check">
                        <input disabled <?php if($temp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="metode_m[]" id="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                        <label style="padding-bottom: 10px;" class="form-check-label" for="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                        <label class="form-check-label" for="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['keterangan'];?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Jumlah murid dalam satu kelas
                </div>
                <div class="col-8 my-2">
                  <?php echo $jumlah_murid ;?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Pengaturan situasi di kelas
                </div>
                <div class="col-8 my-2">
                  <?php echo $pengaturan_kelas ;?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Gedung dan perlengkapannya</b> 
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Sarpras Umum
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                        $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                        on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                        where sub_kriteriainformasi.id_kriteriainformasi=9 AND nilai=1");
                        while($temp1 = mysqli_fetch_array($result)){
                          $id_dk = $temp1['id_detail_kriteriainformasi'];
                          $id_dk2 = '';
                          $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                          while($tmp2 = mysqli_fetch_array($result2)){
                            $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                            
                          }
                      ?>
                    <div class="col-12" style="padding-bottom: 20px;">
                      <div class="form-check">
                        <input disabled <?php if($temp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="sarpas_umum[]" id="sarpas_umum_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="sarpas_umum_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Sarpras Khusus
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                        $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                        on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                        where sub_kriteriainformasi.id_kriteriainformasi=10 AND nilai=1");
                        while($temp1 = mysqli_fetch_array($result)){
                          $id_dk = $temp1['id_detail_kriteriainformasi'];
                          $id_dk2 = '';
                          $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                          while($tmp2 = mysqli_fetch_array($result2)){
                            $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                            
                          }
                      ?>
                    <div class="col-12" style="padding-bottom: 20px;">
                      <div class="form-check">
                        <input disabled <?php if($temp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="sarpas_khusus[]" id="sarpas_khusus_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="sarpas_khusus_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-4 my-2">
                  Teknologi
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                        $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                        on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                        where sub_kriteriainformasi.id_kriteriainformasi=11 AND nilai=1");
                        while($temp1 = mysqli_fetch_array($result)){
                          $id_dk = $temp1['id_detail_kriteriainformasi'];
                          $id_dk2 = '';
                          $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                          while($tmp2 = mysqli_fetch_array($result2)){
                            $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                            
                          }
                      ?>
                    <div class="col-12" style="padding-bottom: 20px;">
                      <div class="form-check">
                        <input disabled <?php if($temp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="teknologi[]" id="teknologi_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="teknologi_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Kebijakan Sekolah</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Kebijakan yang diterapkan sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $kebijakan_sekolah ;?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Kegiatan Sekolah</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Kegiatan sekolah yang dapat diikuti ABK
                </div>
                <div class="col-6 my-2 row">
                  <?php 
                        $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                        on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                        where sub_kriteriainformasi.id_kriteriainformasi=8 AND nilai=1");
                        while($temp1 = mysqli_fetch_array($result)){
                          $id_dk = $temp1['id_detail_kriteriainformasi'];
                          $id_dk2 = '';
                          $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where id_detail_kriteriainformasi = $id_dk");
                          while($tmp2 = mysqli_fetch_array($result2)){
                            $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                            
                          }
                      ?>
                    <div class="col-12" style="padding-bottom: 20px;">
                      <div class="form-check">
                        <input disabled <?php if($temp1['id_detail_kriteriainformasi']==$id_dk2){echo 'Checked';} ?> class="form-check-input disabled" type="checkbox" name="kegiatan[]" id="kegiatan_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                        <label class="form-check-label" for="kegiatan_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <div class="row my-3">
                <div class="col">
                   <b>Surat Ijin Operasional/Pendirian Sekolah</b> 
                </div>
              </div>

              <div class="row">
                <div class="col-4 my-2">
                  Surat Ijin Operasional/Pendirian Sekolah
                </div>
                <div class="col-8 my-2">
                  <?php echo $surat_ijin_operasional; ?>
                </div>
              </div>

              <div class="row justify-content-end mt-2">
                <div class="col-2">
                  <a class="btn btn-danger btn" style="margin-right:10px; margin-left:10px;" name="id_ev" href="/kms_pendidikan/admin_sistem/validasi_layanan.php">
                    Batal
                  </a>
                  <button class="btn btn-primary btn" data-toggle="modal" data-target="#modal-validasi">
                    Validasi
                  </button>
                </div>
              </div>




            </div>

            
          </div>
        </div>
      </div>

    </div>
    <!-- /.card -->

    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
  // $('#modal-validasi').on('show.bs.modal', function (event) {
  //   var button = $(event.relatedTarget) // Button that triggered the modal
  //   var recipient_e = button.data('e') // Extract info from data-* attributes
  //   var recipient_v = button.data('v')
  //   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  //   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  //   var modal = $(this)
  //   modal.find('.event').val(recipient_e)
  //   modal.find('.volunteer').val(recipient_v)
  // })

  $('#modal-edit-topik-ulasan').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient_e = button.data('e'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.id_topikulasan1').val(recipient_e);
  })

</script>

</html>