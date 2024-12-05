<?php
include('../lib/Session.php');
include('../lib/Connection.php');

$session = new Session();
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengambil data berdasarkan username
    $query = $db->prepare('SELECT * FROM Account WHERE username = ?');
    $query->bind_param('s', $username);
    $query->execute();

    // Ambil data dari hasil query
    $data = $query->get_result()->fetch_assoc();

    // Jika data ditemukan dan password sesuai
    if ($data && password_verify($password, $data['password'])) {
        // Simpan informasi ke dalam session
        $session->set('is_login', true);
        $session->set('username', $data['username']);
        $session->set('role', $data['role_name']); // Tambahkan role ke session

        // Redirect berdasarkan role
        if ($data['role_name'] === 'admin') {
            header('Location: admin/dashboard.php', false);
        } elseif ($data['role_name'] === 'mahasiswa') {
            header('Location: mahasiswa/dashboard.php', false);
        } else {
            $session->setFlash('status', false);
            $session->setFlash('message', 'Role tidak dikenali.');
            header('Location: ../login.php', false);
        }
    } else {
        // Jika login gagal
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username atau password salah.');
        header('Location: ../login.php', false);
    }

    $session->commit();
} elseif ($act == 'logout') {
    $session->deleteAll();
    header('Location: ../login.php', false);
}
?>