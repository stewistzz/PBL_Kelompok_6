<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <!-- Header Section -->
            <div class="col-12">
                <div class="jumbotron bg-light text-center shadow-sm">
                    <h2 class="display-6 text-primary">Upload Dokumen</h2>
                    <p class="lead text-secondary">Pastikan semua file yang diunggah sesuai dengan format dan persyaratan yang berlaku.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Reusable Upload Card -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h5 class="card-title mb-0">Laporan Tugas Akhir / Skripsi</h5>
                    </div>
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1">
                            <div class="form-group">
                                <label for="fileLaporan" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="fileLaporan" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Surat Bebas Kompen -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h5 class="card-title mb-0">Surat Bebas Kompen</h5>
                    </div>
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="2">
                            <div class="form-group">
                                <label for="fileKompen" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="fileKompen" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Surat Bebas Peminjaman -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h5 class="card-title mb-0">Surat Bebas Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="3">
                            <div class="form-group">
                                <label for="filePeminjaman" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="filePeminjaman" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sertifikat TOEIC -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h5 class="card-title mb-0">SSertifikat TOEIC</h5>
                    </div>
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="4">
                            <div class="form-group">
                                <label for="filePeminjaman" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="filePeminjaman" class="form-control" required>
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
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h5 class="card-title mb-0">SKKM</h5>
                    </div>
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="4">
                            <div class="form-group">
                                <label for="filePeminjaman" class="text-secondary">Pilih file</label>
                                <input type="file" name="file" id="filePeminjaman" class="form-control" required>
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



<!-- Tambahkan jQuery dan AJAX Script -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

$('#upload-form').submit(function(e) {
    e.preventDefault(); // Mencegah reload halaman setelah submit form

    var formData = new FormData(this); // Ambil data dari form, termasuk file

    $.ajax({
        type: 'POST',
        url: 'upload.php', // URL untuk mengirimkan data
        data: formData,
        cache: false,
        contentType: false, // Jangan set contentType karena FormData menangani header ini
        processData: false, // Jangan proses data menjadi query string
        beforeSend: function() {
            $('#status').html("<div>Uploading...</div>"); // Tampilkan pesan "Uploading..." sebelum pengiriman
        },
        success: function(response) {
            // Menampilkan respon dari PHP setelah upload berhasil
            $('#status').html("<div>File uploaded successfully: " + response + "</div>");
        },
        error: function(xhr, status, error) {
            // Log response error dari server untuk debugging
            console.log("Error details: ", xhr.responseText);
            console.log("Status: ", status);
            console.log("Error: ", error);

            // Menampilkan pesan error yang lebih informatif dari server
            $('#status').html("<div>Terjadi kesalahan saat mengunggah file. Cek log untuk detail error.</div>");
        }
    });

});

});

</script>