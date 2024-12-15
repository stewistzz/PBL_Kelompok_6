<?php
// session_start();
include('lib/Connection.php');
$accountId = $_SESSION['account_id']; // Ambil account_id dari session
$data = [];
$namaMahasiswa = '';

try {
    // Query untuk mendapatkan nama mahasiswa berdasarkan account_id
    $sqlNama = "
        SELECT m.nama 
        FROM Mahasiswa m
        INNER JOIN Account a ON m.account_id = a.account_id
        WHERE a.account_id = ?";
    $paramsNama = [$accountId];
    $queryNama = sqlsrv_query($db, $sqlNama, $paramsNama);

    if ($queryNama === false) {
        throw new Exception('Query error (nama): ' . print_r(sqlsrv_errors(), true));
    }

    // Ambil nama mahasiswa
    if ($rowNama = sqlsrv_fetch_array($queryNama, SQLSRV_FETCH_ASSOC)) {
        $namaMahasiswa = $rowNama['nama'];
    } else {
        $namaMahasiswa = 'Mahasiswa'; // Default jika nama tidak ditemukan
    }

    sqlsrv_free_stmt($queryNama);

    // Query untuk mendapatkan data persyaratan, berkas, dan status
    $sql = "
        SELECT 
            jd.jenis_dokumen, 
            bt.path, 
            bt.status_bebas_tanggungan 
        FROM 
            BebasTanggungan bt
        INNER JOIN 
            Mahasiswa m ON bt.mahasiswa_id = m.mahasiswa_id
        INNER JOIN 
            Account a ON m.account_id = a.account_id
        INNER JOIN 
            KategoriDokumen jd ON bt.kategori_id = jd.kategoriDok_id
        WHERE 
            a.account_id = ?";
    $params = [$accountId];
    $query = sqlsrv_query($db, $sql, $params);

    if ($query === false) {
        throw new Exception('Query error: ' . print_r(sqlsrv_errors(), true));
    }

    // Ambil data
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
    sqlsrv_free_stmt($query);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    die();
}
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
                    <h2 class="display-6"><b>Dashboard Mahasiswa</b></h2>
                    <p class="lead">Pastikan data yang anda kirimkan telah benar dan sesuai.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>


    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Selamat datang, <?= htmlspecialchars($namaMahasiswa); ?></b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Persyaratan</th>
                                <th>Berkas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)): ?>
                                <?php foreach ($data as $index => $row): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($row['jenis_dokumen']) ?></td>
                                        <td><a href="<?= htmlspecialchars($row['path']) ?>" target="_blank">Lihat Berkas</a></td>
                                        <td>
                                            <?php if ($row['status_bebas_tanggungan'] === 'Sudah Terbayar'): ?>
                                                <span class="badge bg-success">Sudah Terbayar</span>
                                            <?php elseif ($row['status_bebas_tanggungan'] === 'Belum Terbayar'): ?>
                                                <span class="badge bg-danger">Belum Terbayar</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning"><?= htmlspecialchars($row['status_bebas_tanggungan']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between mt-3">
                        <span>Menampilkan <?= count($data) ?> data</span>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Sebelumnya</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">Selanjutnya</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
