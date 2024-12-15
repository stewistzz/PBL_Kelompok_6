<?php
include('lib/Connection.php');

// add data mahasiswa

// menghitung jumlah mahasiswa
$queryMahasiswa = "SELECT COUNT(*) AS total_mahasiswa FROM Mahasiswa";
$resultMahasiswa = sqlsrv_query($db, $queryMahasiswa);
$totalMahasiswa = 0;
if ($resultMahasiswa !== false && $row = sqlsrv_fetch_array($resultMahasiswa, SQLSRV_FETCH_ASSOC)) {
    $totalMahasiswa = $row['total_mahasiswa'];
}

// Query untuk menghitung jumlah admin
$queryAdmin = "SELECT COUNT(*) AS total_admin FROM Admin";
$resultAdmin = sqlsrv_query($db, $queryAdmin);
$totalAdmin = 0;
if ($resultAdmin !== false && $row = sqlsrv_fetch_array($resultAdmin, SQLSRV_FETCH_ASSOC)) {
    $totalAdmin = $row['total_admin'];
}

// query untuk menampilkan jumlah data terverifikasi
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
    ORDER BY b.tanggal_pengajuan DESC
";


$resultBebasTanggungan = sqlsrv_query($db, $queryBebasTanggungan);
$dataBebasTanggungan = [];
if ($resultBebasTanggungan !== false) {
    while ($row = sqlsrv_fetch_array($resultBebasTanggungan, SQLSRV_FETCH_ASSOC)) {
        $dataBebasTanggungan[] = $row;
    }
}
// Menutup koneksi
sqlsrv_close($db);
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center font-weight-bold">Sistem Bebas Tanggungan</h1>
            </div>
        </div>
    </div>
</section>

<!-- information -->
<div class="information-data row m-3">
    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $totalMahasiswa; ?></h3>
                <p>Total Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $totalAdmin; ?></h3>
                <p>Total Admin</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog"></i>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dashboard Admin</h3>
            </div>
            <div class="card-body">
                <input type="text" placeholder="Cari Mahasiswa..." class="form-control mb-3 w-50">

                <table class="table table-bordered">
                    <thead>
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
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars($data['nim']); ?></td>
                                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($data['jenis_dokumen']); ?></td>
                                    <td><?php echo htmlspecialchars($data['tanggal_pengajuan']->format('Y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data pengajuan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>