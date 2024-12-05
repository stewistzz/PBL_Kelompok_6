<?php
include('../lib/Session.php');
include('../lib/Connection.php');

$session = new Session();
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'login') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Query untuk mengambil data berdasarkan username
    $query = $db->prepare('SELECT * FROM Account WHERE username = ?');
    $query->bind_param('s', $username);
    $query->execute();

    // Ambil data dari hasil query
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Simpan informasi ke dalam session
            $session->set('is_login', true);
            $session->set('username', $data['username']);
            $session->set('role', $data['role_name']); // Tambahkan role ke session

            // Redirect berdasarkan role
            if ($data['role_name'] === 'admin') {
                header('Location: admin/dashboard.php');
            } elseif ($data['role_name'] === 'mahasiswa') {
                header('Location: mahasiswa/dashboard.php');
            } else {
                $session->setFlash('status', false);
                $session->setFlash('message', 'Role tidak dikenali.');
                header('Location: ../login.php');
            }
        } else {
            $session->setFlash('status', false);
            $session->setFlash('message', 'Username atau password salah.');
            header('Location: ../login.php');
        }
    } else {
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username tidak ditemukan.');
        header('Location: ../login.php');
    }

    $session->commit();
} elseif ($act == 'logout') {
    $session->deleteAll();
    header('Location: ../login.php');
}
?>
