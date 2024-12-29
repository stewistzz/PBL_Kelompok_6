<div class="wrapper" style="display: flex; flex-direction: row; background-color: #f9fafb;">
    <div class="sidebar" style="background-color: #ffffff; color: #000000; padding: 0; margin: 0; width: 250px; position: fixed; top: 0; height: 100vh;">>
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="pages/profile/profile.php" class="d-block" style="color: #000000;">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link" style="color: #000000;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <h7>Dashboard</h7>
                    </a>
                </li>
                <!-- cek status admin view -->
                <li class="nav-item">
                    <a href="index.php?page=status" class="nav-link" style="color: #000000;">
                    <i class="nav-icon fas fa-check-circle"></i> 
                        <h8>Cek Status Tanggungan</h8>
                    </a>
                </li>
                <!-- crud untuk tambah akun -->
                <li class="nav-item">
                    <a href="index.php?page=akun" class="nav-link" style="color: #000000;">
                    <i class="nav-icon fa fa-user-plus"></i>
                        <p>Tambah Akun</p>
                    </a>
                </li>
                <!-- crud untuk tambah mahasiswa -->
                <li class="nav-item">
                    <a href="index.php?page=mahasiswa" class="nav-link" style="color: #000000;">
                    <i class="nav-icon fa fa-user-plus"></i>
                        <p>Tambah Mahasiswa</p>
                    </a>
                </li>
                <!-- crud untuk tambah admin -->
                <li class="nav-item border-bottom">
                    <a href="index.php?page=admin" class="nav-link" style="color: #000000;">
                    <i class="nav-icon fa fa-user-plus"></i>
                        <p>Tambah Admin</p>
                    </a>
                </li>
                <!-- logout -->
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