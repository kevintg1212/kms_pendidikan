<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];

?>
<!-- Navbar -->
<nav style="margin-bottom: 20px;" class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">

        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link <?php if ($first_part=="index.php" || $first_part=="") {echo "active"; } else  {echo "noactive";}?>">Beranda</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="cari_sekolah.php" class="nav-link <?php if ($first_part!="index.php" && $first_part!="berbagi_informasi.php" && $first_part!="") {echo "active"; } else  {echo "noactive";}?>">Cari Sekolah</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="berbagi_info.php" class="nav-link <?php if ($first_part=="berbagi_info.php") {echo "active"; } else  {echo "noactive";}?>">Berbagi Info</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="login.php" style="color: white; background-color: #05319D;" class="btn btn-primary btn-sm nav-link">Login</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->