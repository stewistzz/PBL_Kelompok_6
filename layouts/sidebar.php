
<?php
$role = $_SESSION['role'];
// print_r($_SESSION['role']);

?>
<link rel="stylesheet" href="../assets/css/dashboardAdmin.css">

<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php 
                        if ($role == 'Mahasiswa') {
                            echo 'dashboardMahasiswa.php';
                        } else {
                            echo 'dashboardAdmin.php';
                        }
                    ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item 
                    <?= $role != 'Mahasiswa' ? ' d-none' : ''?>
                ">
                    <a href="<?= 'surat_keterangan.php'?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Surat Keterangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="
                    <?php 
                        if ($role == 'Mahasiswa') {
                            echo 'status_mahasiswa.php';
                        } else {
                            echo 'status_admin.php';
                        }
                    ?>
                    " class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Cek Status Tanggungan</p>
                    </a>
                </li>
                <li class="nav-item
                <?= $role != 'Mahasiswa' ? ' d-none' : ''?>
                ">
                    <a href="<?= 'cetak_tanggungan.php'?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Cetak Bebas Tanggungan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="
                    <?php 
                        if ($role == 'Mahasiswa') {
                            echo 'notifikasiMahasiswa.php';
                        } else {
                            echo 'notifikasiAdmin.php';
                        }
                    ?>" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notifikasi</p>
                    </a>
                </li>
                <li class="nav-item">
                <form action="action/auth.php?act=logout" method="post" id="form-login">
                    <button type="submit" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </button>
                </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>