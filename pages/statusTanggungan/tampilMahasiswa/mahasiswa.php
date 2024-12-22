<?php
include('lib/Connection.php');

// Query untuk mendapatkan data persyaratan, berkas, dan status
$sql = "
SELECT 
    jd.jenis_dokumen, 
    bt.status_bebas_tanggungan AS Status,
    bt.catatan AS Keterangan
FROM 
    BebasTanggungan bt
INNER JOIN 
    Mahasiswa m ON bt.mahasiswa_id = m.mahasiswa_id
INNER JOIN 
    Account a ON m.account_id = a.account_id
INNER JOIN 
    KategoriDokumen jd ON bt.kategori_id = jd.kategoriDok_id
WHERE 
    a.account_id = ?;
";

$params = [$_SESSION['account_id']];
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    throw new Exception('Query error: ' . print_r(sqlsrv_errors(), true));
}

// Ambil data
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}
sqlsrv_free_stmt($query);

?>

<!-- Content Header -->
<style>
    .jumbotron {
        background: linear-gradient(135deg, #0056b3, #003366);
        border-radius: 15px;
        color: #fff;
    }
</style>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <!-- Header Section -->
            <div class="col-12">
                <div class="jumbotron bg-dark text-center shadow-sm">
                    <h2 class="display-6"><b>Cek Status Dokumen</b></h2>
                    <p class="lead">Pastikan untuk mengecek status dari dokumen anda agar tidak terjadi keterlambatan pengumpulan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>

<!-- Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Status Dokumen</h3>
                    </div>
                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokumen</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)): ?>
                                        <?php $no = 1; // Nomor urut 
                                        ?>
                                        <?php foreach ($data as $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($row['jenis_dokumen']); ?></td>
                                                <td>
                                                    <?= htmlspecialchars($row['Keterangan'] ?? ''); ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['Status'] === 'sukses'): ?>
                                                        <span class="badge badge-success"><?= htmlspecialchars($row['Status']); ?></span>
                                                    <?php elseif ($row['Status'] === 'gagal'): ?>
                                                        <span class="badge badge-danger"><?= htmlspecialchars($row['Status']); ?></span>
                                                    <?php elseif ($row['Status'] === 'pending'): ?>
                                                        <span class="badge badge-warning"><?= htmlspecialchars($row['Status']); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-info"><?= htmlspecialchars($row['Status'] ?? 'Belum Diproses'); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data dokumen.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="bukti.php" class="btn btn-primary" target="_blank">
                            <i class="fas fa-print"></i> Cetak Surat Keterangan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>