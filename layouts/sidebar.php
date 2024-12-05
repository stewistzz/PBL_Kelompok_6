<style>
    /* Warna dan elemen sidebar */
    .main-sidebar,
    .main-sidebar a,
    .main-sidebar .info,
    .main-sidebar .nav-icon,
    .main-sidebar p,
    .main-sidebar input {
        color: white !important;
    }

    .main-sidebar .nav-icon {
        opacity: 0.8; /* Opsional jika ingin ikon lebih samar */
    }

    .main-sidebar .form-control-sidebar {
        background-color: #2e4b93;
        border: 1px solid white;
        color: white;
    }

    /* Efek transisi sidebar */
    .main-sidebar {
        transition: all 0.3s ease; /* Transisi efek smooth */
        width: 250px; /* Default width */
    }

    /* Sidebar dalam keadaan collapsed (tersembunyi) */
    .main-sidebar.collapsed {
        width: 80px; /* Lebar lebih kecil */
    }

    .main-sidebar.collapsed a {
        opacity: 0.5;
        pointer-events: none; /* Nonaktifkan klik jika di-collapse */
    }

    /* Animasi untuk hover */
    .main-sidebar:hover {
        background-color: #3a5db6;
        transition: background-color 0.3s ease;
    }
</style>

<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #2e4b93;">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info text-light">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item active">
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
                    <a href="action/auth.php?act=logout" class="nav-link">
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

<!-- Tambahkan tombol untuk mengubah status collapse -->
<button id="toggleSidebar" class="btn btn-primary mt-3">Toggle Sidebar</button>

<script>
    // Script untuk toggle sidebar collapsed state
    const sidebar = document.querySelector('.main-sidebar');
    const toggleButton = document.getElementById('toggleSidebar');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
</script>
