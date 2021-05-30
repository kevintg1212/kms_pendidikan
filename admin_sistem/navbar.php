<?php 

$result_layanan_p = mysqli_query($db2,"select count(*) FROM layananpendidikan where status_data = 'Pending'");
$row_layanan_p = mysqli_fetch_array($result_layanan_p);
$total_layanan_p = $row_layanan_p[0];

$result_layanan_hapus = mysqli_query($db2,"select count(*) FROM layananpendidikan where status_data = 'PENGHAPUSAN PENDING'");
$row_layanan_hapus = mysqli_fetch_array($result_layanan_hapus);
$total_layanan_hapus = $row_layanan_hapus[0];


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
            <span class="badge badge-warning navbar-badge"><?php echo ($total_layanan_p+$total_layanan_hapus);?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?php echo ($total_layanan_p+$total_layanan_hapus);?> Notifications</span>
          <?php if ($total_layanan_p>0) {  ?>
            <div class="dropdown-divider"></div>
            <a href="validasi_layanan.php" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Data Layanan Pendidikan ABK<br>
              ada <?php echo $total_layanan_p;?> yang perlu divalidasi!
            </a>
            <?php } ?>
            <?php if ($total_layanan_hapus>0) {  ?>
            <div class="dropdown-divider"></div>
            <a href="pengajuan_penghapusan.php" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Terdapat <?php echo $total_layanan_hapus;?> Layanan Pendidikan ABK<br>
              ada mengajukan diri untuk dihapus!
            </a>
            <?php } ?>
          </div>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="controller/conn_logout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>