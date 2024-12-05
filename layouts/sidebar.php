<!-- <div class="sidebar">
    <div class="logo">
        <img src="https://via.placeholder.com/150x50" alt="Logo">
        <h3>Jurusan Teknologi Informasi<br>Politeknik Negeri Malang</h3>
    </div>
    <ul class="menu">
        <li><a href="dashboard.php"><i class="icon">🏠</i> Beranda</a></li>
        <li><a href="#"><i class="icon">📄</i> Surat Keterangan</a></li>
        <li><a href="#"><i class="icon">✅</i> Cek Status Tanggungan</a></li>
        <li><a href="#"><i class="icon">🖨️</i> Cetak Bebas Tanggungan</a></li>
        <li><a href="#"><i class="icon">🔔</i> Notifikasi</a></li>
        <li><a href="logout.php"><i class="icon">🚪</i> Logout</a></li>
    </ul>
</div> -->

<style>
/* Mengubah warna background sidebar */
.main-sidebar {
    background-color: #2e4b93 !important;
}

/* Mengubah warna link dalam sidebar */
.main-sidebar .nav-link {
    color: #ffffff; /* Warna teks */
}

.main-sidebar .nav-link:hover {
    background-color: #1e3870; /* Warna saat hover */
    color: #ffffff; /* Tetap putih saat hover */
}

/* Mengubah warna header user-panel */
.main-sidebar .user-panel {
    border-bottom: 1px solid #ffffff; /* Tambahkan garis pemisah putih */
}

/* Mengubah warna teks pada user info */
.main-sidebar .user-panel .info a {
    color: #ffffff;
}

.main-sidebar .user-panel .info a:hover {
    color: #c2c7d0; /* Warna saat hover */
}
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Surat Keterangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Cek Status Tanggungan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Cetak Bebas Tanggungan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notifikasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>