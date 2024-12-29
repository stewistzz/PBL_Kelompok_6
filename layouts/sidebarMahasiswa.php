<div class="sidebar bg-white" style="position: fixed; width: 250px; height: 100vh; overflow-y: auto;">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="pages/profile/profile.php" class="d-block" style="color: #000000;">Alexander Pierce</a>
        </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: #cce0ff;">
            <div class="input-group-append">
                <button class="btn btn-sidebar" style="background-color: #cce0ff; color:white">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
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