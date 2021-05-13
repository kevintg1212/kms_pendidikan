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
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-collapse" style="padding-left: 50px; padding-right: 50px; padding-top: 10px; margin-bottom: 200px;">
  <?php include "view/header.php";?>
  <div class="container.fluid p-5">
    <div class="col-12"> 
        <h3>Hasil Pencarian</h3>
        <h5>Berikut layanan pendidikan ABK yang kami rekomendasikan untuk anda</h5>
    </div>
    <div class="row d-flex justify-content-center">
    <?php 
    foreach($arr_layanan as $key => $value){
    $result_head = mysqli_query($db2,"select * from `layananpendidikan`
    inner join wilayah_kabupaten
    on layananpendidikan.id_kabupaten = wilayah_kabupaten.id
    where npsn = $value");
    while($d_head = mysqli_fetch_array($result_head)){
        $nama_sekolah = $d_head['nama_sekolah'];
        $foto_sekolah = $d_head['foto_sekolah'];
        $alamat = $d_head['alamat'];
        $kabupaten = $d_head['nama'];
    }
    ?>
        <div class="col-md-3 m-2">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <img src="admin_sekolah/image/foto_sekolah/<?php echo $foto_sekolah;?>" alt="School Image" class="card-img-top shadow-sm" style="width: 100%;">
                <div class="card-body">
                    <div>
                        <b style="font-size:18px;"><?php echo $nama_sekolah;?> - <?php 
                            $result_head = mysqli_query($db2,"select * from `jenjang_layananpendidikan` inner join jenjang_pendidikan
                            on  jenjang_layananpendidikan.id_jenjangpendidikan = jenjang_pendidikan.id_jenjangpendidikan
                            where npsn = $value");
                            $numResults = mysqli_num_rows($result_head);
                            $temp_no=0;
                            while($d_head = mysqli_fetch_array($result_head)){
                                $temp_no++;
                                if ($numResults==$temp_no) {
                                    
                                    echo $d_head['jenjang_pendidikan'];
                                }else{
                                    echo $d_head['jenjang_pendidikan'].", ";
                                }
                            }
                        ?></b>
                        <p><?php echo $alamat; ?>, <?php echo $kabupaten; ?> </br>
                            Kebutuhan Khusus :
                                    <?php 
                                        $result_head = mysqli_query($db2,"select * from `kebutuhankhusus_layananpendidikan` inner join kebutuhan_khusus
                                        on  kebutuhankhusus_layananpendidikan.id_kebutuhankhusus = kebutuhan_khusus.id_kebutuhankhusus
                                        where npsn = $value");
                                        $numResults = mysqli_num_rows($result_head);
                                        $temp_no=0;
                                        while($d_head = mysqli_fetch_array($result_head)){
                                            $temp_no++;
                                            if ($numResults==$temp_no) {
                                                echo $d_head['kebutuhan_khusus'];
                                            }else{
                                                echo $d_head['kebutuhan_khusus'].", ";
                                            }
                                        }
                                        ?>
                        </p>
                    </div>
                    <div class="float-right">
                        <a href="detail_sekolah.php?id_sekolah=<?php echo $value; ?>" style=" color: white; width: 100px; background-color: #05319D;" class="btn btn-primary btn-sm ">Lihat detail</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    <?php } ?>

        
    </div>
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

</body>
</html>