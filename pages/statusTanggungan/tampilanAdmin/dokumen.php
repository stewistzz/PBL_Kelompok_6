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