<!DOCTYPE html>
<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
if (isset($_GET['id_sekolah'])) {
	$npsn = $_GET['id_sekolah'];

		//echo $id_sekolah.'<br>';
	
}


$sql = mysqli_query($db2,"
SELECT l.*, w.nama as kabupaten, p.nama as provinsi FROM layananpendidikan l 
join wilayah_kabupaten w on l.id_kabupaten = w.id 
join wilayah_provinsi p on l.id_provinsi = p.id
where npsn =$npsn 
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
          <h1><b><?php echo $nama_sekolah ;?></b></h1><br>
          <div style="margin-top:10px;">
            <!-- Main content -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-4 p-2 ">
                      <img src="admin_sekolah/image/foto_sekolah/<?php echo $foto_sekolah; ?>" class="shadow-sm rounded" style="width: 100%;">
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
                        <p><?php 
                            $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 1");
                            while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              while($tmp2 = mysqli_fetch_array($result2)){
                                $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                
                              }if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo $tmp1['parameter'];}} ?>
                        </p>
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
                        <p><?php 
                            $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 2");
                            while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              while($tmp2 = mysqli_fetch_array($result2)){
                                $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                
                              }if($tmp1['id_detail_kriteriainformasi']==$id_dk2){echo $tmp1['parameter'];}} ?>
                          </p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-md-6">
                        <p>Jenjang pendidikan yang diterima</p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p><?php 
                              $result = mysqli_query($db2,"SELECT * FROM `jenjang_pendidikan`");
                              $temp_no=0;
                              
                              while($tmp1 = mysqli_fetch_array($result)){
                                
                                $id_dk = $tmp1['id_jenjangpendidikan'];
                                $id_dk2 = '';
                                $result2 = mysqli_query($db2,"SELECT * FROM `jenjang_layananpendidikan` where npsn=$npsn and id_jenjangpendidikan = $id_dk");
                                $numResults = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_jenjangpendidikan'];
                                  $temp_no++;
                                }if($tmp1['id_jenjangpendidikan']==$id_dk2){
                                  if ($numResults==$temp_no) {
                                    echo $tmp1['jenjang_pendidikan'];
                                }else{
                                  echo $tmp1['jenjang_pendidikan'].", ";
                                }
                                  
                                }
                              } ?>
                            </p>
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
                        <p><?php 
                            $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 3");
                            while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              while($tmp2 = mysqli_fetch_array($result2)){
                                $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                
                              }if($tmp1['id_detail_kriteriainformasi']==$id_dk2){
                                echo $tmp1['parameter'];
                                }
                              } ?></p>
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
                        <p><?php echo $visi_sekolah; ?></p>
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
                        <p><?php echo $nilai_sekolah; ?></p>
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
                        <p><?php echo $alamat; ?></p>
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
                        <p><?php echo $kabupaten; ?></p>
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
                        <p><?php echo $provinsi; ?></p>
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
                        <p><?php echo $telepon; ?></p>
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
                        <p><?php echo $email; ?></p>
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
                        <p><?php echo $website; ?></p>
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
                        <p>
                      <?php 
                          $result = mysqli_query($db2,"SELECT * FROM `kebutuhan_khusus`");
                          $i=0;
                          while($temp1 = mysqli_fetch_array($result)){
                            $id_dk = $temp1['id_kebutuhankhusus'];
                            $id_dk2 = '';
                            $result2 = mysqli_query($db2,"SELECT * FROM `kebutuhankhusus_layananpendidikan` where npsn=$npsn and id_kebutuhankhusus = $id_dk");
                            $number = mysqli_num_rows($result2);
                            // while($tmp2 = mysqli_fetch_array($result2)){
                            //   $i++;
                            //   $temp2 = '';
                              
                            //   $id_dk2 = $tmp2['id_kebutuhankhusus'];

                            //   if($temp1['id_kebutuhankhusus']==$id_dk2) { 
                            //     $temp2 = $temp1['kebutuhan_khusus']; 
                            //   }
                            //   if ($i<$number) {
                            //     echo $temp2.", ";
                            //   }else{
                            //     echo $temp2.".";
                            //   }
                            // }
                            while($tmp2 = mysqli_fetch_array($result2)){
                              if ($i<$number) {
                                echo $temp1['kebutuhan_khusus'].", ";
                              }else{
                                echo $temp1['kebutuhan_khusus'].".";
                              }
                              $i++;
                            }
                        ?>
                      <?php } ?>
                        </p>
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
                        <p><?php echo $biaya_sekolah; ?></p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 4");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 12");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p><?php echo $pengalaman_sekolah; ?> tahun</p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 14");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 15");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 13");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p><?php echo $teknis_pendaftaran; ?></p>
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
                        <p><?php echo $keamanan_sekolah; ?></p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 16");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p><?php echo $pelatihan_pendidikankhusus_pengajar; ?></p>
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
                        <p><?php echo $pengalaman_pengajar; ?> tahun</p>
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
                       <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 17");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 18");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 19");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 20");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                        <p><?php echo $cara_komunikasi_pengajar; ?></p>
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
                      <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_kriteriainformasi = 4");
                          while($tmp1 = mysqli_fetch_array($result)){
                              $id_dk = $tmp1['id_detail_kriteriainformasi'];
                              $id_dk2 = '';
                              $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                              $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  if ($i<$number) {
                                    echo $tmp1['parameter'].", ";
                                  }else{
                                    echo $tmp1['parameter'].".";
                                  }
                                  $i++;
                                }

                            }
                          ?>
                        </p>
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
                      <p>
                        <?php 
                          $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                          on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                          where sub_kriteriainformasi.id_kriteriainformasi=6 AND nilai=1");
                          while($temp1 = mysqli_fetch_array($result)){
                            $id_dk = $temp1['id_detail_kriteriainformasi'];
                            $id_dk2 = '';
                            $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                            while($tmp2 = mysqli_fetch_array($result2)){
                              $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                              echo "<b>".$temp1['sub_kriteriainformasi']."</b> </br> ".$temp1['keterangan']."</br> </br> ";
                            }
                        ?>
                      <?php } ?>
                      </p>
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
                        <p>
                        <?php 
                              $i = 0;
                              $x = 0;
                              $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                              on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                              where sub_kriteriainformasi.id_kriteriainformasi=7 AND nilai=1");
                              while($temp1 = mysqli_fetch_array($result)){
                                $id_dk = $temp1['id_detail_kriteriainformasi'];
                                $id_dk2 = '';
                                $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                                $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  echo "<b>".$temp1['sub_kriteriainformasi']."</b> </br> ".$temp1['keterangan']."</br> </br> ";
                                }
                              }
                        ?>
                        </p>
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
                        <p><?php echo $jumlah_murid; ?> murid</p>
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
                        <p><?php echo $pengaturan_kelas; ?></p>
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
                        <p>
                        <?php 
                              $i = 0;
                              $x = 0;
                              $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                              on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                              where sub_kriteriainformasi.id_kriteriainformasi=9 AND nilai=1");
                              while($temp1 = mysqli_fetch_array($result)){
                                $id_dk = $temp1['id_detail_kriteriainformasi'];
                                $id_dk2 = '';
                                $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                                $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                    echo $temp1['sub_kriteriainformasi']."</br> </br>";
                                }
                              }
                        ?>
                        </p>
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
                      <p>
                        <?php 
                              $i = 0;
                              $x = 0;
                              $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                              on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                              where sub_kriteriainformasi.id_kriteriainformasi=10 AND nilai=1");
                              while($temp1 = mysqli_fetch_array($result)){
                                $id_dk = $temp1['id_detail_kriteriainformasi'];
                                $id_dk2 = '';
                                $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                                $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                    echo $temp1['sub_kriteriainformasi']."</br> </br> ";
                                }
                              }
                        ?>
                        </p>
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
                      <p>
                        <?php 
                              $i = 0;
                              $x = 0;
                              $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                              on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                              where sub_kriteriainformasi.id_kriteriainformasi=11 AND nilai=1");
                              while($temp1 = mysqli_fetch_array($result)){
                                $id_dk = $temp1['id_detail_kriteriainformasi'];
                                $id_dk2 = '';
                                $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                                $number = mysqli_num_rows($result2);
                                while($tmp2 = mysqli_fetch_array($result2)){
                                  $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                                  echo $temp1['sub_kriteriainformasi']."</br> </br> ";
                                }
                              }
                        ?>
                        </p>
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
                        <p class="text-left"><?php echo $kebijakan_sekolah; ?></p>
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
                        <p>
                        <?php 
                          $i = 0;
                          $x = 0;
                          $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
                          on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
                          where sub_kriteriainformasi.id_kriteriainformasi=8 AND nilai=1");
                          while($temp1 = mysqli_fetch_array($result)){
                            $id_dk = $temp1['id_detail_kriteriainformasi'];
                            $id_dk2 = '';
                            $result2 = mysqli_query($db2,"SELECT * FROM `detail_layananpendidikan` where npsn=$npsn and id_detail_kriteriainformasi = $id_dk");
                            $number = mysqli_num_rows($result2);
                            while($tmp2 = mysqli_fetch_array($result2)){
                              $id_dk2 = $tmp2['id_detail_kriteriainformasi'];
                              echo $temp1['sub_kriteriainformasi']."</br> </br> ";
                            }
                          }
                        ?>
                        </p>
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
                  <a href="berbagi_info.php?npsn=<?php echo $npsn;?>" style="color: white; width: 250px; background-color: #05319D;"
                    class="btn btn-primary btn-lg float-right">Tambah Ulasan +</a>
                </div>
              </div>
            </div>
    
            <?php 
            $result = mysqli_query($db2,"SELECT * FROM `ulasan` where npsn = $npsn and status_ulasan ='Accepted'");
            while($temp1 = mysqli_fetch_array($result)){  ?>                     
            <div class="card">
              <div class="row" style="padding: 20px;">
                <div class="col-12">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                          <h3><b><?php echo $temp1['nama_pengirim']?> - <?php echo $temp1['latar_belakang']?> </b></h3>
                        </div>
                        <div class="col-6">
                        <div class="float-right">
                          <h5><?php echo $temp1['tanggal_mengirim']?></h5>
                        </div>
                        </div>  
                    </div>
                    <h5 class="mt-2"><b>
                  <?php 
                  $result2 = mysqli_query($db2,"SELECT * FROM `ulasan`
                  inner join topik_ulasan
                  on ulasan.id_ulasan = topik_ulasan.id_ulasan
                  inner join topik
                  on topik_ulasan.id_topik = topik.id_topik
                  where npsn = $npsn and status_ulasan='Accepted'");
                  $number = mysqli_num_rows($result2);
                  $i=0;
                  while($tmp2 = mysqli_fetch_array($result2)){
                    $i++;
                    if ($i<$number) {
                      echo $tmp2['nama_topik'].", ";
                    }else{
                      echo $tmp2['nama_topik'].".";
                    }
                    
                  }
                ?></b></h5>
                    <h5><?php echo $temp1['ulasan']?></h5>
                  </div>
                </div>

                <div class="col-2">
                  <div class="card-header">
                    <img src="img/pendukung_ulasan/<?php echo $temp1['lampiran_ulasan']?>" class="" style="width: 100%;">
                  </div>
                </div>

              </div>
            </div>
            <?php } ?>
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