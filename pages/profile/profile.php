<?php
include('lib/Connection.php');

// Mulai session
// session_start();



// Ambil account_id dari session
$account_id = $_SESSION['account_id'];

// Query untuk mendapatkan data pengguna berdasarkan account_id
try {
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

    if ($query === false) {
        throw new Exception('Error executing query: ' . print_r(sqlsrv_errors(), true));
    }

    $userData = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    if (!$userData) {
        throw new Exception('User data not found.');
    }

    $fullName = $userData['full_name'];
    $username = $userData['username'];
    $role = $userData['role_name'];
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Modal</title>

    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
</head>
<body>
    <!-- Button to Trigger Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal">
        View Profile
    </button>

    <!-- Modal Structure -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body (Profile Form) -->
                <div class="modal-body">
                    <!-- Profile Image -->
                    <div class="text-center mb-3">
                        <img src="assets/img/dosenn.jpg" alt="User Profile Image" class="rounded-circle mb-3" width="150" height="150">
                    </div>

                    <!-- Profile Form -->
                    <form id="profileForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" value="<?= htmlspecialchars($fullName) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" value="<?= htmlspecialchars($username) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" id="role" value="<?= htmlspecialchars($role) ?>" readonly>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
