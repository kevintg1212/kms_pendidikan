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
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
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
                      $result_head = mysqli_query($db2,"select * from `wilayah_kabupaten` ORDER by nama");
                        while($d_head = mysqli_fetch_array($result_head)){
                      ?>
                      <option value="<?php echo $d_head['id']; ?>"><?php echo $d_head['nama']; ?></option>
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
                      <option value="<?php echo $d_head['id_kebutuhankhusus']; ?>"><?php echo $d_head['kebutuhan_khusus']; ?></option>
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
                      <option value="<?php echo $d_head['id_jenjangpendidikan']; ?>"><?php echo $d_head['jenjang_pendidikan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Biaya Sekolah</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="biayaMinimum" name="biayaMinimum" class="form-control" style="width: 100%;" placeholder="Biaya Minimum">
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <label> - </label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="biayaMaximum" name="biayaMaximum" class="form-control" style="width: 100%;" placeholder="Biaya Maximum">
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Jumlah murid dalam satu kelas</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="jmlMinimum" name="jmlMinimum" class="form-control" style="width: 100%;" placeholder="Jumlah Minimum">
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <label> - </label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="jmlMaximum" name="jmlMaximum" class="form-control" style="width: 100%;" placeholder="Jumlah Maximum">
                  </div>
                </div>

                <div class="row" style="margin-top:50px; margin-left:20px;">
                  <div class="col-md-4">
                    <label>Pengalaman sekolah dalam menangani ABK</label>
                  </div>
                  <div class="col-md-2">
                    <input type="number" id="tahun_sekolah" name="tahun_sekolah" class="form-control" style="width: 100%;" >
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
                    <input type="number" id="tahun_pengajar" name="tahun_pengajar" class="form-control" style="width: 100%;" >
                  </div>
                  <div class="col-md-1" style="text-align: center;">
                    <p> Tahun </p>
                  </div>
                </div>

                <div class="row justify-content-center" style="text-align: center; padding-top: 50px;">
									<button type="submit" class="btn btn-primary btn-sm" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;">
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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <script>

        <?php 
            if(isset($_SESSION['cari']) && $_SESSION['cari']!= "") {
        ?>
            $('#modal-default').modal({
                    show: true
            });
        <?php }
        $_SESSION['cari']="";
        ?>

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>

</html>