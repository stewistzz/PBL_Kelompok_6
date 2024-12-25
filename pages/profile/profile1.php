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

<style>
    .custom-card {
        max-width: 600px;
        /* Set maximum width */
        margin: auto;
        /* Center the card */
    }
</style>

<br>
<div class="card card-dark card-outline custom-card" > <!-- Added custom class -->
    <div class="card-body box-profile">
        <div class="text-center">
            <i class="fas fa-user-circle fa-5x"></i>
        </div>

        <br>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Full Name</b>
                <p class="float-right"><?php echo $fullName; ?></p> <!-- Display full name -->
            </li>
            <li class="list-group-item">
                <b>Username</b>
                <p class="float-right"><?php echo $username; ?></p> <!-- Display username -->
            </li>
            <li class="list-group-item">
                <b>Role</b>
                <p class="float-right"><?php echo $role; ?></p> <!-- Display role -->
            </li>
        </ul>
    </div>
    <!-- /.card-body -->
</div>
<br>