<?php
include('lib/Connection.php');

// Query untuk mengambil data mahasiswa dengan status bebas tanggungan yang sudah diajukan
$sql = "
    SELECT DISTINCT 
        M.mahasiswa_id, 
        M.nama, 
        M.nim
    FROM BebasTanggungan BT
    JOIN Mahasiswa M ON BT.mahasiswa_id = M.mahasiswa_id
    ORDER BY M.nama ASC
";

$params = [];
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

?>

<section class="content-header">
    <?php include('layouts/toggle.php'); ?>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center font-weight-bold">Daftar Mahasiswa Bebas Tanggungan</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="page-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                                        echo "<td><a href='detail.php?id=" . $row['mahasiswa_id'] . "' class='btn btn-info btn-sm'>Detail</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
