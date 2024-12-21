<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="pages/profile/profile.php" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append"><button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button></div>
        </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <!-- cek status admin view -->
            <li class="nav-item">
                <a href="index.php?page=status" class="nav-link">
                <i class="nav-icon fas fa-check-circle"></i> 
                    <p>Cek Status Tanggungan</p>
                </a>
            </li>
            <!-- crud untuk tambah akun -->
            <li class="nav-item">
                <a href="index.php?page=akun" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                    <p>Tambah Akun</p>
                </a>
            </li>
            <!-- crud untuk tambah mahasiswa -->
            <li class="nav-item">
                <a href="index.php?page=mahasiswa" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                    <p>Tambah Mahasiswa</p>
                </a>
            </li>
            <!-- crud untuk tambah admin -->
            <li class="nav-item border-bottom">
                <a href="index.php?page=admin" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                    <p>Tambah Admin</p>
                </a>
            </li>
            <!-- logout -->
            <li class="nav-item">
                <a href="action/auth.php?act=logout" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>