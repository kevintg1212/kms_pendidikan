<?php 

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../login.php");
}
$nik =$_SESSION['nik'];
$result = mysqli_query($db2,"SELECT status_data FROM layananpendidikan where nik ='$nik'");
while($tmp1 = mysqli_fetch_array($result)){
  $status_p = $tmp1['status_data'];
}



?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">5 Notifications</span>

            <div class="dropdown-divider"></div>
            <a href="layanan_pendidikan.php" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 
              <?php
                if ($status_p =='Pending') {
                  echo "Data Layanan Pendidikan ABK<br>sedang di periksa !";
                }else if ($status_p =='Warning') {
                  echo "Data Layanan Pendidikan ABK<br>harus anda ubah !";
                }else if ($status_p =='Accepted') {
                  echo "Data Layanan Pendidikan ABK<br>sudah di terima !";
                }else if ($status_p =='Rejected') {
                  echo "Data Layanan Pendidikan ABK<br>tidak di terima !";
                }
              ?>
            </a>

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-comments mr-2"></i> 4 ulasan baru.
            </a>

          </div>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="controller/conn_logout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>