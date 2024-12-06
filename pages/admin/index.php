<?php
include('lib/Connection.php');

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
// command

// Menutup koneksi
sqlsrv_close($db);
?>


<style>
    .content {
        margin-top: 10px;
    }
</style>
<section class="content-header">
    <!-- toggle -->
    <?php include('layouts/toggle.php'); ?>
    <!-- toggle -->
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
                            <th>Status Foto</th>
                            <th>Status UKT</th>
                            <th>Status SKKM</th>
                            <th>File</th>
                            <th>Waktu Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2341760188</td>
                            <td>Rahmalia Mutia Farda</td>
                            <td>
                                <span class="badge bg-success">Valid</span>
                                <i class="fas fa-eye"></i>
                            </td>
                            <td>
                                <span class="badge bg-success">Valid</span>
                                <i class="fas fa-eye"></i>
                            </td>
                            <td><span class="badge bg-danger">Tidak Valid</span></td>
                            <td><i class="fas fa-edit text-primary"></i></td>
                            <td>14/06/2024 08:41:54</td>
                            <td><span class="badge bg-warning">Menunggu Verifikasi</span></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-3">
                    <span>Menampilkan 1 dari 280 data</span>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Sebelum</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Selanjutnya</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>