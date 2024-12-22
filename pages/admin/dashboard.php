<?php
include('lib/Connection.php');

// Mendapatkan input pencarian dari sidebar (GET atau POST)
$searchQuery = isset($_GET['search']) ? $_GET['search'] : ''; // Input dari form pencarian
$searchQuery = trim($searchQuery); // Menghapus spasi berlebih

// Menghitung jumlah mahasiswa
$queryMahasiswa = "SELECT COUNT(*) AS total_mahasiswa FROM Mahasiswa";
$resultMahasiswa = sqlsrv_query($db, $queryMahasiswa);
$totalMahasiswa = 0;
if ($resultMahasiswa !== false && $row = sqlsrv_fetch_array($resultMahasiswa, SQLSRV_FETCH_ASSOC)) {
    $totalMahasiswa = $row['total_mahasiswa'];
}

// Menghitung jumlah admin
$queryAdmin = "SELECT COUNT(*) AS total_admin FROM Admin";
$resultAdmin = sqlsrv_query($db, $queryAdmin);
$totalAdmin = 0;
if ($resultAdmin !== false && $row = sqlsrv_fetch_array($resultAdmin, SQLSRV_FETCH_ASSOC)) {
    $totalAdmin = $row['total_admin'];
}

// Menghitung jumlah akun
$queryAkun = "SELECT COUNT(*) AS total_akun FROM Account";
$resultAkun = sqlsrv_query($db, $queryAkun);
$totalAkun = 0;
if ($resultAkun !== false && $row = sqlsrv_fetch_array($resultAkun, SQLSRV_FETCH_ASSOC)) {
    $totalAkun = $row['total_akun'];
}

// Query untuk menampilkan data bebas tanggungan
$queryBebasTanggungan = "
    SELECT 
        b.bt_id, 
        m.nim, 
        m.nama, 
        b.tanggal_pengajuan, 
        k.jenis_dokumen
    FROM BebasTanggungan b
    JOIN Mahasiswa m ON b.mahasiswa_id = m.mahasiswa_id
    JOIN KategoriDokumen k ON b.kategori_id = k.kategoriDok_id
";

// Menambahkan filter pencarian jika ada input
if (!empty($searchQuery)) {
    $queryBebasTanggungan .= " WHERE m.nama LIKE ?";
}

$queryBebasTanggungan .= " ORDER BY b.tanggal_pengajuan DESC";

// Eksekusi query dengan parameter
$params = [];
if (!empty($searchQuery)) {
    $params[] = "%" . $searchQuery . "%"; // Menambahkan wildcard untuk pencarian
}
$resultBebasTanggungan = sqlsrv_query($db, $queryBebasTanggungan, $params);

// Memproses hasil query
$dataBebasTanggungan = [];
if ($resultBebasTanggungan !== false) {
    while ($row = sqlsrv_fetch_array($resultBebasTanggungan, SQLSRV_FETCH_ASSOC)) {
        $dataBebasTanggungan[] = $row;
    }
}

// Menutup koneksi
sqlsrv_close($db);
?>


<style>
    .table-hover-row:hover {
    background-color: #f8f9fa;
    transition: background-color 0.2s ease-in-out;
}

</style>

<!-- information -->
<div class="information-data row m-3">
    <!-- Total Mahasiswa -->
    <div class="col-md-4">
        <div class="small-box bg-primary text-white">
            <div class="inner">
                <h3><?php echo $totalMahasiswa; ?></h3>
                <p>Total Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate fa-3x"></i>
            </div>
            <a href="index.php?page=mahasiswa" class="small-box-footer text-white">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Total Admin -->
    <div class="col-md-4">
        <div class="small-box bg-warning text-white">
            <div class="inner">
                <h3><?php echo $totalAdmin; ?></h3>
                <p>Total Admin</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog fa-3x"></i>
            </div>
            <a href="index.php?page=admin" class="small-box-footer text-white">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Total Akun -->
    <div class="col-md-4">
        <div class="small-box bg-success text-white">
            <div class="inner">
                <h3><?php echo $totalAkun; ?></h3>
                <p>Total Akun</p>
            </div>
            <div class="icon">
                <i class="fas fa-users fa-3x"></i>
            </div>
            <a href="index.php?page=akun" class="small-box-footer text-white">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>


<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Dashboard Admin</h3>
            </div>
            <div class="card-body">
                <!-- Search Bar -->
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" placeholder="Cari Mahasiswa..." class="form-control w-50">
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center align-middle">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jenis Dokumen</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataBebasTanggungan)) : ?>
                                <?php foreach ($dataBebasTanggungan as $index => $data) : ?>
                                    <tr class="table-hover-row">
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo htmlspecialchars($data['nim']); ?></td>
                                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($data['jenis_dokumen']); ?></td>
                                        <td><?php echo htmlspecialchars($data['tanggal_pengajuan']->format('Y-m-d')); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data pengajuan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
