<?php

$role = $_SESSION['role'];
$username = $_SESSION['username'];
// print_r($_SESSION['role']);
include "pages/profile/profile.php";
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

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal">
            View Profile
        </button> -->
                <a href="#" data-toggle="modal" data-target="#profileModal" class="d-block"><?= $username ?></a>
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
                <!-- add new template surat -->
                <li class="nav-item 
                    <?= $role != 'Mahasiswa' ? ' d-none' : ''?>
                ">
                    <a href="<?= 'template_surat.php'?>" class="nav-link">
                    <i class="nav-icon fa fa-arrow-down"></i>
                        <p>Template Surat</p>
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
                <!-- cetak bebas tanggungan -->
                <li class="nav-item
                <?= $role != 'Mahasiswa' ? ' d-none' : ''?>
                ">
                    <a href="<?= 'cetak_tanggungan.php'?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Cetak Bebas Tanggungan</p>
                    </a>
                </li>
                <li class="nav-item 
                <?= $role != 'Mahasiswa' ? ' d-none' : ''?>">    
                    <a href="
                    <?php
                            echo 'notifikasiMahasiswa.php';
                        
                    ?>
                    " class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notifikasi</p>
                    </a>
                </li>
                <!-- add crud admin -->
                <li class="nav-item
                <?= $role != 'Admin' ? ' d-none' : ''?>
                ">
                    <a href="<?= 'modifDataMhs.php'?>" class="nav-link">
                    <i class="nav-icon fa fa-user-plus"></i>
                        <p>Tambah Mahasiswa</p>
                    </a>
                </li>

                <!-- add crud mahasiswa -->
                <li class="nav-item
                <?= $role != 'Admin' ? ' d-none' : ''?>
                ">
                    <a href="<?= 'modifDataAdmin.php'?>" class="nav-link">
                    <i class="nav-icon fa fa-user-plus"></i>
                        <p>Tambah Admin</p>
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