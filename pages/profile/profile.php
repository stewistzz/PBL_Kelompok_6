<?php
include('../../lib/Connection.php');

// Mulai session
session_start();

// Cek apakah session untuk account_id tersedia
if (!isset($_SESSION['account_id'])) {
    echo "Session not found. Please login again.";
    exit();
}

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
        throw new Exception('User data not found.');
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

<!-- Tambahkan CSS -->
<style>
    #profileModal img {
        border: 2px solid #007bff;
    }

    #profileModal h5 {
        font-weight: bold;
        color: #343a40;
    }

    #profileModal small {
        font-size: 0.9rem;
        color: #6c757d;
    }
</style>

<!-- Tombol untuk membuka Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal">
    View Profile
</button>

<!-- Struktur Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Gambar Profil -->
                <div class="text-center mb-3">
                    <img src="assets/img/dosenn.jpg" alt="User Profile Image" class="rounded-circle mb-3" width="150" height="150">
                </div>

                <!-- Form Profil -->
                <form id="profileForm">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" value="<?= $fullName ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" value="<?= $username ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" value="<?= $role ?>" readonly>
                    </div>
                </form>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
