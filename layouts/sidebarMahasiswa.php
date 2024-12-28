
<!-- sidebar.php -->
<div class="wrapper" style="display: flex; flex-direction: row; background-color: #f9fafb;">
    <div class="sidebar" style="background-color: #ffffff; color: #000000; padding: 0; margin: 0; width: 250px; position: fixed; top: 0; height: 100vh;">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="pages/profile/profile.php" class="d-block" style="color: #000000;">Alexander Pierce</a>
            </div>
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="index.php?page=profile" class="d-block">Alexander Pierce</a>
            <!-- <a href="pages/profile/profile.php" class="d-block">Alexander Pierce</a> -->
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=template" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fa fa-arrow-down"></i>
                        <p>Template Surat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=upload" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Upload Syarat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=status" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Cek Status</p>
                    </a>
                </li>
                <li class="nav-item border-bottom">
                    <a href="index.php?page=notifikasi" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notifikasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="action/auth.php?act=logout" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<style>
    .nav-link:hover{
        background-color: #cce0ff !important;
        color: #171ee9 !important; /* Warna biru pada teks saat hover */
    }
</style>
