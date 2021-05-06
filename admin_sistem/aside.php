<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[3];

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1D2948 !important;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Sistem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if ($first_part=="index.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="data_master.php" class="nav-link <?php if ($first_part=="data_master.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Master
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="data_kriteria.php" class="nav-link <?php if ($first_part=="data_kriteria.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Kriteria
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="data_topik_ulasan.php" class="nav-link <?php if ($first_part=="data_topik_ulasan.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Topik Ulasan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="validasi_layanan.php" class="nav-link <?php if ($first_part=="validasi_layanan.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Validasi Layanan
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>