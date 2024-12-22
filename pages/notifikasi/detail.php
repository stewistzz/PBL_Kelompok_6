<!-- Content Header -->
<style>
    .list-group-item {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        margin-bottom: 0.8rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .list-group-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    }

    .list-group-item span {
        display: flex;
        align-items: center;
    }

    .list-group-item i {
        color: #007bff;
        margin-right: 15px;
        font-size: 1.5rem;
    }

    .text-muted {
        font-size: 0.9rem;
        color: #6c757d !important;
    }

    .jumbotron {
        background: linear-gradient(135deg, #0056b3, #003366);
        border-radius: 15px;
        color: #fff;
    }
</style>

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <!-- Header Section -->
            <div class="col-12">
                <div class="jumbotron bg-dark text-center shadow-sm">
                    <h2 class="display-6"><b>Notifikasi Dokumen</b></h2>
                    <p class="lead">Pastikan untuk mengecek notifikasi dari dokumen agar dapat terus update mengenai dokumen Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>

<?php
// Include file koneksi
include('lib/Connection.php'); // Sesuaikan path dengan file Connection.php Anda

// Query untuk mendapatkan data nama admin dan catatan
$query = "
    SELECT Admin.nama AS nama_admin, BebasTanggungan.catatan 
    FROM BebasTanggungan
    JOIN Admin ON BebasTanggungan.admin_id = Admin.admin_id";
$result = null;

if ($use_driver == 'mysql') {
    $result = $db->query($query); // Menggunakan MySQL
} else if ($use_driver == 'sqlsrv') {
    $result = sqlsrv_query($db, $query); // Menggunakan SQL Server
}

// Tampilkan notifikasi jika ada data
if ($result && (($use_driver == 'mysql' && $result->num_rows > 0) || ($use_driver == 'sqlsrv' && sqlsrv_has_rows($result)))): ?>
    <div class="container my-4">
        <ul class="list-group">
            <?php while ($row = ($use_driver == 'mysql') ? $result->fetch_assoc() : sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-user-circle"></i>
                        <strong><?= htmlspecialchars($row['nama_admin']) ?>:</strong>
                        <?= htmlspecialchars(substr($row['catatan'] ?? '', 0, 50)) ?>...
                    </span>
                    <span class="text-muted"><?= date('d M Y') // Tambahkan tanggal jika tersedia ?></span>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="container my-4">
        <p class="text-center text-muted">Tidak ada catatan.</p>
    </div>
<?php endif; ?>

<!-- Tambahkan fontawesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
