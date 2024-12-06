<?php
include('../lib/Connection.php');

session_start(); // Memulai session PHP

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'login') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    try {
        // Query untuk mengambil data berdasarkan username
        $sql = "SELECT * FROM Account WHERE username = ?";
        $params = [$username];
        $query = sqlsrv_query($db, $sql, $params);

        // Periksa apakah query berhasil
        if ($query === false) {
            throw new Exception('Error executing query: ' . print_r(sqlsrv_errors(), true));
        }

        // Ambil data dari hasil query
        if ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            // Verifikasi password
            // if (password_verify($password, $row['password'])) {
            if ($password == $row['password']) {
                // Simpan informasi ke dalam session
                $_SESSION['is_login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role_name']; // Tambahkan role ke session

                // Redirect berdasarkan role
                if ($row['role_name'] === 'Admin') {
                    header('Location: ../dashboardAdmin.php');
                } elseif ($row['role_name'] === 'Mahasiswa') {
                    header('Location: ../dashboardMahasiswa.php');
                } else {
                    $_SESSION['flash_status'] = false;
                    $_SESSION['flash_message'] = 'Role tidak dikenali.';
                    header('Location: ../index.php');
                }
            } else {
                $_SESSION['flash_status'] = false;
                $_SESSION['flash_message'] = 'Username atau password salah.';
                header('Location: ../index.php');
            }
        } else {
            $_SESSION['flash_status'] = false;
            $_SESSION['flash_message'] = 'Username tidak ditemukan.';
            header('Location: ../index.php');
        }

        sqlsrv_free_stmt($query);
    } catch (Exception $e) {
        // Tangani error
        $_SESSION['flash_status'] = false;
        $_SESSION['flash_message'] = 'Terjadi kesalahan: ' . $e->getMessage();
        header('Location: ../index.php');
    }
} elseif ($act == 'logout') {
    // Hapus semua data session
    session_unset();
    session_destroy();
    header('Location: ../index.php');
}
?>
