<?php
include('lib/Connection.php');

$mahasiswa_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data bebas tanggungan mahasiswa berdasarkan mahasiswa_id
$sql = "
    SELECT 
        BT.bt_id, 
        K.nama_dokumen, 
        BT.status_bebas_tanggungan, 
        BT.tanggal_pengajuan, 
        BT.catatan
    FROM BebasTanggungan BT
    JOIN KategoriDokumen K ON BT.kategori_id = K.kategoriDok_id
    WHERE BT.mahasiswa_id = ?
";

$params = [$mahasiswa_id];
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}
var_dump($query);
?>

<h3>Haloo guyss</h3>

<!-- Tampilan halaman detail -->
<section class="content">
    <div class="container-fluid">
        <h1>Detail Bebas Tanggungan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Dokumen</th>
                    <th>Status</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama_dokumen']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status_bebas_tanggungan']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tanggal_pengajuan']->format('Y-m-d')) . "</td>";
                    echo "<td>" . htmlspecialchars($row['catatan']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
