<!-- Content Header -->
<section class="content-header">
    <!-- toggle -->
    <?php include('layouts/toggle.php'); ?>
    <!-- toggle -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center font-weight-bold">Surat Keterangan Mahasiswa</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Laporan Tugas Akhir -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="laporanTugasAkhir">Pilih file untuk Laporan Tugas Akhir</label>
                                <input type="file" name="laporanTugasAkhir" id="laporanTugasAkhir" class="form-control-file" required>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Laporan Tugas Akhir / Skripsi</h5>
                            <button class="btn btn-warning">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Surat Bebas Kompen -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="bebasKompen">Pilih file untuk Surat Bebas Kompen</label>
                                <input type="file" name="bebasKompen" id="bebasKompen" class="form-control-file" required>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Surat Bebas Kompen</h5>
                            <button class="btn btn-warning">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Surat Bebas Peminjaman -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="bebasPeminjaman">Pilih file untuk Surat Bebas Peminjaman</label>
                                <input type="file" name="bebasPeminjaman" id="bebasPeminjaman" class="form-control-file" required>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Surat Bebas Peminjaman</h5>
                            <button class="btn btn-warning">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sertifikat TOEIC -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="sertifikatTOEIC">Pilih file untuk Sertifikat TOEIC</label>
                                <input type="file" name="sertifikatTOEIC" id="sertifikatTOEIC" class="form-control-file" required>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Sertifikat TOEIC</h5>
                            <button class="btn btn-warning">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SKKM -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="SKKM">Pilih file untuk SKKM</label>
                                <input type="file" name="SKKM" id="SKKM" class="form-control-file" required>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">SKKM</h5>
                            <button class="btn btn-warning">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
