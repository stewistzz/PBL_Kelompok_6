<?php
// session_start();
if (isset($_SESSION['alert'])) {
    echo "<div class='alert'>" . $_SESSION['alert'] . "</div>";
    unset($_SESSION['alert']); // Hapus pesan setelah ditampilkan
}
?>
<!-- Content Header -->
<style>
    .jumbotron {
        background: linear-gradient(135deg, #0056b3, #003366);
        border-radius: 15px;
        color: #fff;
    }

    .card-header h5 {
        font-weight: 600;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <!-- Header Section -->
            <div class="col-12">
                <div class="jumbotron bg-dark text-center shadow-sm">
                    <h2 class="display-6"><b>Upload Dokumen</b></h2>
                    <p class="lead">Pastikan semua file yang diunggah sesuai dengan format dan persyaratan yang berlaku.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Reusable Upload Card -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center">
                        <h5 class="card-title mb-0">Laporan Tugas Akhir / Skripsi</h5>
                    </div>
                    <div class="card-body">
                        <form action="pages/suratKeterangan/upload.php" id="upload-ta" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="6">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- SKKM -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center">
                        <h5 class="card-title mb-0">SKKM</h5>
                    </div>
                    <div class="card-body">
                        <form action="pages/suratKeterangan/upload.php" id="upload-skkm" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="3">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- TOEIC -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center">
                        <h5 class="card-title mb-0">TOEIC</h5>
                    </div>
                    <div class="card-body">
                        <form action="pages/suratKeterangan/upload.php" id="upload-toeic" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- UKT -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center">
                        <h5 class="card-title mb-0">UKT</h5>
                    </div>
                    <div class="card-body">
                        <form action="pages/suratKeterangan/upload.php" id="upload-ukt" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="4">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Kompen -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center">
                        <h5 class="card-title mb-0">Kompen</h5>
                    </div>
                    <div class="card-body">
                        <form action="pages/suratKeterangan/upload.php" id="upload-kompen" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="5">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bebas Pinjam -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-dark text-center">
                        <h5 class="card-title mb-0">Bebas Pinjam</h5>
                    </div>
                    <div class="card-body">
                        <form action="pages/suratKeterangan/upload.php" id="upload-pinjam" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="7">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
