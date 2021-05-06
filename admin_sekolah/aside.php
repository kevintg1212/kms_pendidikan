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
        <span class="brand-text font-weight-light">Pendidikan ABK</span>
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
                    <a href="#" class="nav-link <?php if ($first_part=="layanan_pendidikan.php" || $first_part=="layanan_pendidikan_edit.php" || $first_part=="penghapusan.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Layanan Pendidikan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="layanan_pendidikan.php" class="nav-link <?php if ($first_part=="layanan_pendidikan.php" || $first_part=="layanan_pendidikan_edit.php") {echo "active"; } else  {echo "noactive";}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Layanan Pendidikan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="penghapuan.php" class="nav-link <?php if ($first_part=="penghapusan.php") {echo "active"; } else  {echo "noactive";}?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan Penghapusan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="ulasan.php" class="nav-link <?php if ($first_part=="ulasan.php") {echo "active"; } else  {echo "noactive";}?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Ulasan
                        </p>
                    </a>
                </li>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>