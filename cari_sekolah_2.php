<!DOCTYPE html>
<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();

if (isset($_SESSION['arr_layanan'])) {
	$arr_layanan = $_SESSION['arr_layanan'];
	foreach($arr_layanan as $result) {
		//echo $result.'<br>';
	}
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
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-collapse"
  style="padding-left: 50px; padding-right: 50px; padding-top: 10px; margin-bottom: 200px; background-color: #fefefe">




  <div class="wrapper">
    <?php include "view/header.php";?>

	<form class="form-horizontal" action="controller/conn_cari_sekolah_2.php" method="post">
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
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '1'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
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
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '2'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
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
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '3'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
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
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '4'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
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
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '5'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Metode penyampaian materi pembelajaran</div>
								<div class="d-flex p-2" style="width:100%">
									<div class="d-flex flex-column " style="width:100%">
										<?php 
											$result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
											on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
											where sub_kriteriainformasi.id_kriteriainformasi=6 AND nilai=1");
											while($temp1 = mysqli_fetch_array($result)){
										?>
									<div class="custom-control custom-checkbox"> 
										<input class="form-check-input" type="checkbox" name="metode_penyampaian[]" id="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="metode_d_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>                      				
									</div>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Metode monitoring dan evaluasi perkembangan anak</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
										<?php 
											$result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
											on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
											where sub_kriteriainformasi.id_kriteriainformasi=7 AND nilai=1");
											while($temp1 = mysqli_fetch_array($result)){
										?>
									<div class="custom-control custom-checkbox"> 
										<input class="form-check-input" type="checkbox" name="monitoring[]" id="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="metode_m_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>                      				
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Kegiatan sekolah yang dapat diikuti AKB</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
									<?php 
											$result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
											on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
											where sub_kriteriainformasi.id_kriteriainformasi=8 AND nilai=1");
											while($temp1 = mysqli_fetch_array($result)){
									?>
									<div class="custom-control custom-checkbox"> 
										<input class="form-check-input" type="checkbox" name="kegiatan_sekolah[]" id="metode_s_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="metode_s_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>                      				
									</div>
									<?php } ?>									
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Sarana & prasarana umum yang disediakan sekolah</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
								<?php 
											$result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
											on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
											where sub_kriteriainformasi.id_kriteriainformasi=9 AND nilai=1");
											while($temp1 = mysqli_fetch_array($result)){
									?>
									<div class="custom-control custom-checkbox"> 
										<input class="form-check-input" type="checkbox" name="sarana_prasarana[]" id="metode_sp_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="metode_sp_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>                      				
									</div>
									<?php } ?>
									
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Sarana & prasarana khusus yang disediakan sekolah</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
								<?php 
											$result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
											on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
											where sub_kriteriainformasi.id_kriteriainformasi=10 AND nilai=1");
											while($temp1 = mysqli_fetch_array($result)){
									?>
									<div class="custom-control custom-checkbox"> 
										<input class="form-check-input" type="checkbox" name="sarana_khusus[]" id="metode_spk_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="metode_spk_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>                      				
									</div>
									<?php } ?>									
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Teknologi yang disediakan sekolah</div>
							<div class="d-flex p-2" style="width:100%">
								<div class="d-flex flex-column " style="width:100%">
								<?php 
											$result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
											on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
											where sub_kriteriainformasi.id_kriteriainformasi=11 AND nilai=1");
											while($temp1 = mysqli_fetch_array($result)){
									?>
									<div class="custom-control custom-checkbox"> 
										<input class="form-check-input" type="checkbox" name="teknologi[]" id="metode_tn_<?php echo $temp1['sub_kriteriainformasi'];?>"  value="<?php echo $temp1['id_detail_kriteriainformasi'];?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="metode_tn_<?php echo $temp1['sub_kriteriainformasi'];?>"><?php echo $temp1['sub_kriteriainformasi']; ?></label>                      				
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Penerimaan sekolah terhadap ABK</div>
							<div class="p-2 flex-fill " style="width:100%">
								<select class="form-control select2" id="penerimaanSekolah" name="penerimaanSekolah" style="width: 100%;" required>
									<option selected="selected" disabled>-- Pilih Penerimaan Sekolah --</option>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '12'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
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
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '13'");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
									<option value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>"><?php echo $d_head['parameter']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="d-flex p-2 justify-content-center">
							<div class="p-2 flex-fill " style="width:100%">Ketersediaan</div>
							<div class="p-2 flex-fill " style="width:100%">
								<div class="custom-control custom-checkbox"> 
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '14' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="hubSekolah" id="hubSekolah"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="hubSekolah">Ketersediaan hubungan dengan sekolah lain</label> <br>                     				
									<?php } ?>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '15' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="programPenempatan" id="programPenempatan"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="programPenempatan">Ketersediaan program penempatan ganda</label> <br>                     				
									<?php } ?>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '16' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="dukunganSpesialis" id="dukunganSpesialis"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="dukunganSpesialis">Ketersediaan dukungan spesialis</label> <br>                     				
									<?php } ?>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '17' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="pembekalanStaff" id="pembekalanStaff"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="pembekalanStaff">Ketersediaan pembekalan kepada staff mengenai pengetahuan praktis menangani anak berkebutuhan khusus</label> <br>                     				
									<?php } ?>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '18' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="pembekalan" id="pembekalan"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="pembekalan">Ketersediaan pembekalan kepada siswa lainnya dalam mendidik mereka untuk dapat menerima siswa berkebutuhan khusus</label> <br>                     				
									<?php } ?>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '19' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="asosiasiOrangtua" id="asosiasiOrangtua"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="asosiasiOrangtua">Ketersediaan asosiasi orang tua dan guru</label> <br>                     				
									<?php } ?>
									<?php 
									$result_head = mysqli_query($db2,"select * from `detail_kriteriainformasi` where id_kriteriainformasi = '20' limit 1");
										while($d_head = mysqli_fetch_array($result_head)){
									?>
										<input class="form-check-input" type="checkbox" name="ketersediaanForum" id="ketersediaanForum"  value="<?php echo $d_head['id_detail_kriteriainformasi']; ?>">
                      					<label style="padding-bottom: 10px;" class="form-check-label" for="ketersediaanForum">Ketersediaan forum pandangan orang tua</label> <br>                     				
									<?php } ?>
									</div>
							</div>
						</div>

						<div class="d-flex p-2 justify-content-center">
							<button type="submit" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;" class="btn btn-primary btn-sm">Cari Sekolah ></button>
						</div>
					</div>	
				</div>
			</div>
      </section>
      <!-- /.content -->
    </div>
	</form>

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