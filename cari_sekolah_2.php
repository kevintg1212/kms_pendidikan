<!DOCTYPE html>
<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 


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
  style="padding-left: 50px; padding-right: 50px; padding-top: 10px; margin-bottom: 200px; background-color: #fefefe">




  <div class="wrapper">
    <?php include "view/header.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="min-height: 100%;">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid" style="margin-top:100px;">
			<h1><b>Temukan Informasi Layanan Pendidikan ABK</b></h1><br>
			<div class="d-flex flex-column p-2 col-12 shadow p-3 mb-5 bg-white rounded">
				<h5 class="mx-5" style="margin-bottom:15px; margin-top:20px;"> <b> Lakukan pencarian dengan menggunakan pilihan berikut ini </b></h5>
				<h6 class="mx-5">Berikut pilihan lainnya yang dapat diisi sesuai dengan kriteria yang sangat anda pertimbangkan dalam memilih layanan pendidikan ABK</h6>
				<div class="p-5 mx-5">
					<div class="d-flex flex-column">
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Bentuk sekolah</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="bentukSekolah" name="bentukSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Bentuk Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
									</select>
								</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Status sekolah</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="statusSekolah" name="statusSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Status Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Akreditasi sekolah</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="akreditasiSekolah" name="akreditasiSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Akreditasi Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Waktu penyelenggara sekolah</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="wktPenyelenggaraSekolah" name="wktPenyelenggaraSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Waktu Penyelenggara Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Kurikulum Sekolah</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="kurikulumSekolah" name="kurikulumSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Kurikulum Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Metode penyampaian materi pembelajaran</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="communication" value="option1">
										<label for="communication" class="custom-control-label">Communication</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="taskAnalysis" value="option1">
										<label for="taskAnalysis" class="custom-control-label">Task Analysis</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="directInstruction" value="option1">
										<label for="directInstruction" class="custom-control-label">Direct Instruction</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="verbalPrompts" value="option1">
										<label for="verbalPrompts" class="custom-control-label">Verbal Prompts</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Modelling</label>
									</div>
								</div>
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Gestural Prompts</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Physical Prompts</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Peer Tutorial</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Coorperative Learning</label>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Metode monitoring dan evaluasi perkembangan anak</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Kerja</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Sikap</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Tertulis</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Proyek</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Produk</label>
									</div>
								</div>
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Portofolio</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Penilaian Diri</label>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Kegiatan sekolah yang dapat diikuti AKB</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ekstrakulikuler</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Studywisata</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Tamasya</label>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Sarana & prasana umum yang disediakan sekolah</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Kelas</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Praktikum</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Perpustakaan</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Serbaguna</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang BP/BK</label>
									</div>
								</div>
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang UKS</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Lapangan Olahraga</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Ibadah</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Toilet</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Kantin</label>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Sarana & prasarana khusus yang disediakan sekolah</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Alat Asesmen</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Alat Bantu Belajar</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Alat Terapi</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Kegiatan Asesmen</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Remedial Teaching</label>
									</div>
								</div>
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Ruang Keterampilan</label>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Teknologi yang disediakan sekolah</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Komputer untuk pemberlajaran siswa</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Projector</label>
									</div>
									<div class="custom-control custom-checkbox"> 
										<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
										<label for="customCheckbox1" class="custom-control-label">Internet</label>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Penerimaan sekolah terhadap ABK</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="penerimaanSekolah" name="penerimaanSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Penerimaan Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Syarat perlu ada tidaknya pendamping</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="pendamping" name="pendamping" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Opsi --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan hubungan dengan sekolah lain</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="hubSekolah" name="hubSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Opsi --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan program penempatan ganda</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="programPenempatan" name="programPenempatan" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Opsi --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan dukungan spesialis</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="dukunganSpesialis" name="dukunganSpesialis" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Opsi --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan pembekalan kepada siswa lainnya dalam mendidik mereka untuk dapat menerima siswa berkebutuhan khusus</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="pembekalan" name="pembekalan" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Opsi --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan asosiasi orang tua dan guru</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="asosiasiOrangtua" name="asosiasiOrangtua" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Opsi --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan forum pandangan orang tua</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="ketersediaanForum" name="ketersediaanForum" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Kurikulum Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `jenjang_pendidikan`");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option><?php echo $d_head['jenjang_pendidikan']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<a href="/kms_pendidikan/cari_sekolah_2.php" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;" class="btn btn-primary btn-sm">Selanjutnya ></a>
						</div>
					</div>	
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

    $(document).ready(function(){
        $(':checkbox[id="allCheck"]').click(function(){
            if($(this).is(':checked')){
            $("input:checkbox").prop("checked", true);
            } else {
            $("input:checkbox").prop("checked", false);
            }
        });

        });

  </script>

</body>

</html>