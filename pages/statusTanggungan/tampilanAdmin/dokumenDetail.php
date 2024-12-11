<!-- public function getData()
    {
        if ($this->driver == 'mysql') {
            // MySQL: Query to fetch all data from the table
            return $this->db->query("SELECT * FROM {$this->BebasTanggungan}")->fetch_all(MYSQLI_ASSOC);
        } else {
            // SQL Server: Query to fetch all data from the table
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->BebasTanggungan}");
            $data = [];
            while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    } -->

<?php
// include('../lib/Connection.php');
// session_start();

// // Ambil ID mahasiswa dari request
// $mahasiswa_id = $_GET['id'];

// Query untuk mengambil detail mahasiswa dan dokumen terkait
// $sql = "
//     SELECT 
//         M.nama, M.nim, M.email, M.angkatan, M.nama_kelas,
//         D.jenis_dokumen, BT.status_bebas_tanggungan, BT.catatan, BT.path
//     FROM BebasTanggungan BT
//     JOIN Mahasiswa M ON BT.mahasiswa_id = M.mahasiswa_id
//     JOIN KategoriDokumen D ON BT.kategori_id = D.kategoriDok_id
//     WHERE M.mahasiswa_id = ?
// ";

// $params = [$mahasiswa_id];
// $query = sqlsrv_query($db, $sql, $params);

// if ($query === false) {
//     die(print_r(sqlsrv_errors(), true));
// }

// Ambil data mahasiswa
// $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

// Tampilkan HTML untuk detail mahasiswa dan dokumen
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center font-weight-bold">Surat Keterangan Mahasiswa</h1>
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
                            <div class="list-group">
                                <div class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    <div class="w-75">Dokumen</div>
                                    <div class="w-75">Lihat</div>
                                    <div class="w-50">Keterangan</div>
                                    <div>Status</div>
                                </div>

                                <?php
                                // Tampilkan setiap kategori dokumen terkait
                                $statusList = ["pending", "sukses", "gagal"];
                                while ($row) {
                                    echo "
                                    <div class='list-group-item d-flex justify-content-between align-items-center'>
                                        <div class='w-50'>{$row['jenis_dokumen']}</div>
                                        <i class='fas fa-eye'></i>
                                        <input type='text' class='form-control form-control-sm w-25' placeholder='Keterangan' value='{$row['catatan']}'>
                                        <select class='form-control form-control-sm w-25'>
                                            <option value='pending' " . ($row['status_bebas_tanggungan'] == 'pending' ? 'selected' : '') . ">Pending</option>
                                            <option value='sukses' " . ($row['status_bebas_tanggungan'] == 'sukses' ? 'selected' : '') . ">Sukses</option>
                                            <option value='gagal' " . ($row['status_bebas_tanggungan'] == 'gagal' ? 'selected' : '') . ">Gagal</option>
                                        </select>
                                    </div>";
                                    $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                                }
                                ?>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary" id="saveButton">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>