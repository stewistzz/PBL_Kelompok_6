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
        <h5>Notifikasi Catatan</h5>
        <ul class="list-group">
            <?php while ($row = ($use_driver == 'mysql') ? $result->fetch_assoc() : sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><?= htmlspecialchars($row['nama_admin']) ?>:</strong> <?= htmlspecialchars(substr($row['catatan'], 0, 50)) ?>...</span>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= htmlspecialchars($row['nama_admin']) ?>">Lihat Detail</button>
                </li>

                <!-- Modal untuk detail catatan -->
                <div class="modal fade" id="modal<?= htmlspecialchars($row['nama_admin']) ?>" tabindex="-1" aria-labelledby="modalLabel<?= htmlspecialchars($row['nama_admin']) ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?= htmlspecialchars($row['nama_admin']) ?>">Detail Catatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Admin:</strong> <?= htmlspecialchars($row['nama_admin']) ?></p>
                                <p><?= htmlspecialchars($row['catatan']) ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else: ?>
    <p class="text-center my-4">Tidak ada catatan.</p>
<?php endif; ?>