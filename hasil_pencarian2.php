<!DOCTYPE html>
<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
$total_knv = $_SESSION['total_akhir'];
$array_id_k = $_SESSION['id_search'];
$array_id_dkk_sub = $_SESSION['id_search_sub'];
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
    <div class="">
    <?php 
    foreach($total_knv as $key => $value){
    $result_head = mysqli_query($db2,"select * from `layananpendidikan`
    inner join wilayah_kabupaten
    on layananpendidikan.id_kabupaten = wilayah_kabupaten.id
    where npsn = $key");
    while($d_head = mysqli_fetch_array($result_head)){
        $nama_sekolah = $d_head['nama_sekolah'];
        $foto_sekolah = $d_head['foto_sekolah'];
        $alamat = $d_head['alamat'];
        $kabupaten = $d_head['nama'];
    }
    ?>
        <div class="card p-3 shadow m-5 bg-white rounded">
            <div class="card-body">
                <div class="row">
                <img id="blah" style="width: 200px; height: 100%;"
                    src="admin_sekolah/image/foto_sekolah/<?php echo $foto_sekolah;?>" alt="your image" />
                    <div class="col px-5">
                        <b style="font-size:18px;"><?php echo $nama_sekolah;?> - <?php 
                            $result_head = mysqli_query($db2,"select * from `jenjang_layananpendidikan` inner join jenjang_pendidikan
                            on  jenjang_layananpendidikan.id_jenjangpendidikan = jenjang_pendidikan.id_jenjangpendidikan
                            where npsn = $key");
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
                                        where npsn = $key");
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

                        <p>
                            <ul style="display:block;">
                                    <?php 
                                    foreach($array_id_k as $key2 => $value2){
                                        $temp_sub = $array_id_dkk_sub[$key2];
                                        if ($temp_sub!="") {
                                            $sql_sub = "and detail_kriteriainformasi.id_sub_kriteriainformasi=$temp_sub";
                                        }else{
                                            $sql_sub = "";
                                        }
                                        
                                        $result_head = mysqli_query($db2,"select * from `detail_layananpendidikan` inner join detail_kriteriainformasi
                                        on  detail_layananpendidikan.id_detail_kriteriainformasi = detail_kriteriainformasi.id_detail_kriteriainformasi
                                        inner join kriteria_informasi on kriteria_informasi.id_kriteriainformasi = detail_kriteriainformasi.id_kriteriainformasi
                                        inner join sub_kriteriainformasi on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi
                                        where npsn = $key and detail_kriteriainformasi.id_kriteriainformasi=$value2
                                        $sql_sub");
                                        while($d_head = mysqli_fetch_array($result_head)){ ?>
                                    <li style="display:block; margin-left: 5px;">&#x25CF; <?php echo $d_head['kriteria_informasi']; ?>
                                    <?php if($d_head['sub_kriteriainformasi']!=""){echo " - ".$d_head['sub_kriteriainformasi'];} ?> : <?php echo $d_head['parameter']; ?></li>
                                    <?php } }?>
                            </ul> 
                        </p>
                    </div>
                    <div class="d-flex align-items-end flex-column-reserve">
                        <div class="d-flex">
                        <a href="detail_sekolah.php?id_sekolah=<?php echo $key; ?>" style="margin-right: 20px; color: white; width: 100px; background-color: #05319D;" class="btn btn-primary btn-sm ">Lihat detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
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