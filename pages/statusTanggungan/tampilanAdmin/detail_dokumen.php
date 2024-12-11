<?php
include('lib/Connection.php');

// Mengambil ID mahasiswa dari parameter URL
$mahasiswa_id = $_SESSION['account_id'];

// Query untuk mengambil data dokumen yang diupload oleh mahasiswa
$sql = "
    SELECT 
        BD.bt_id, 
        KD.jenis_dokumen, 
        BD.path, 
        BD.status_bebas_tanggungan, 
        BD.catatan
    FROM BebasTanggungan BD
    JOIN KategoriDokumen KD ON BD.kategori_id = KD.kategoriDok_id
    WHERE BD.mahasiswa_id = ?
";

$params = array($mahasiswa_id);
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

$documents = [];
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $documents[] = $row;
}

// Menyimpan perubahan (status dan catatan) jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bt_id = $_POST['bt_id'];
    $status_bebas_tanggungan = $_POST['status_bebas_tanggungan'];
    $catatan = $_POST['catatan'];

    // Update query untuk menyimpan perubahan
    $update_sql = "
        UPDATE BebasTanggungan 
        SET status_bebas_tanggungan = ?, catatan = ? 
        WHERE bt_id = ?
    ";

    $update_params = array($status_bebas_tanggungan, $catatan, $bt_id);
    $update_query = sqlsrv_query($db, $update_sql, $update_params);

    if ($update_query === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Redirect ke halaman yang sama untuk menampilkan pesan sukses
    header("Location: detail_dokumen.php?mahasiswa_id=$mahasiswa_id");
    exit();
}
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center font-weight-bold">Detail Dokumen Mahasiswa</h1>
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
                            <form method="POST">
                                <div class="list-group">
                                    <?php foreach ($documents as $doc) { ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="w-50"><?php echo htmlspecialchars($doc['jenis_dokumen']); ?></div>
                                        <a href="<?php echo htmlspecialchars($doc['path']); ?>" target="_blank">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <input type="text" name="catatan" class="form-control form-control-sm w-25" 
                                               value="<?php echo htmlspecialchars($doc['catatan']); ?>" placeholder="Keterangan">
                                        <select name="status_bebas_tanggungan" class="form-control form-control-sm w-25">
                                            <option value="pending" <?php echo $doc['status_bebas_tanggungan'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="sukses" <?php echo $doc['status_bebas_tanggungan'] == 'sukses' ? 'selected' : ''; ?>>Sukses</option>
                                            <option value="gagal" <?php echo $doc['status_bebas_tanggungan'] == 'gagal' ? 'selected' : ''; ?>>Gagal</option>
                                        </select>
                                        <input type="hidden" name="bt_id" value="<?php echo $doc['bt_id']; ?>">
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
