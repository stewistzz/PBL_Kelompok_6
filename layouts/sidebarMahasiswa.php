<?php
include('lib/Connection.php');

// Ambil account_id dari session
$account_id = $_SESSION['account_id'];



try {
    // Query untuk mendapatkan data pengguna berdasarkan account_id
    $sql = "SELECT A.username, A.role_name, 
                   CASE 
                       WHEN A.role_name = 'Mahasiswa' THEN M.nama 
                       WHEN A.role_name = 'Admin' THEN AD.nama 
                   END AS full_name
            FROM Account A
            LEFT JOIN Mahasiswa M ON A.account_id = M.account_id
            LEFT JOIN Admin AD ON A.account_id = AD.account_id
            WHERE A.account_id = ?";
    $params = [$account_id];
    $query = sqlsrv_query($db, $sql, $params);

    // Cek jika query gagal
    if ($query === false) {
        throw new Exception('Error executing query: ' . print_r(sqlsrv_errors(), true));
    }

    $userData = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    if (!$userData) {
        throw new Exception('User  data not found.');
    }

    // Simpan data pengguna
    $fullName = htmlspecialchars($userData['full_name']);
    $username = htmlspecialchars($userData['username']);
    $role = htmlspecialchars($userData['role_name']);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
<div class="sidebar bg-white" style="position: fixed; width: 250px; height: 100vh; overflow-y: auto;">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <i class="fas fa-user" class="img-circle elevation-2" alt="User Image"></i>
        </div>
        <div class="info">
            <a href="index.php?page=profile" class="d-block" style="color: #000000;"><?php echo $fullName; ?></a>
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
    .nav-link:hover {
        background-color: #cce0ff !important;
        color: #171ee9 !important;
        /* Warna biru pada teks saat hover */
    }
</style>