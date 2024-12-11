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
            <!-- Form upload dokumen -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1"> <!-- ID kategori dokumen -->
                            <div class="form-group">
                                <label for="laporanTugasAkhir">Pilih file untuk Laporan Tugas Akhir</label>
                                <input type="file" name="file" id="laporanTugasAkhir" class="form-control-file" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Laporan Tugas Akhir / Skripsi</h5>
                                <button type="submit" name="submit" class="btn btn-warning">Upload</button>
                            </div>
                        </form>
                        <div id="statusMessage"></div>
                        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1"> <!-- ID kategori dokumen -->
                            <div class="form-group">
                                <label for="laporanTugasAkhir">Pilih file untuk Surat Bebas Kompen</label>
                                <input type="file" name="file" id="laporanTugasAkhir" class="form-control-file" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Surat Bebas Kompen</h5>
                                <button type="submit" name="submit" class="btn btn-warning">Upload</button>
                            </div>
                        </form>
                        <div id="statusMessage"></div>
                        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1"> <!-- ID kategori dokumen -->
                            <div class="form-group">
                                <label for="laporanTugasAkhir">Pilih file untuk Surat Bebas Peminjaman</label>
                                <input type="file" name="file" id="laporanTugasAkhir" class="form-control-file" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Surat Bebas Peminjaman</h5>
                                <button type="submit" name="submit" class="btn btn-warning">Upload</button>
                            </div>
                        </form>
                        <div id="statusMessage"></div>
                        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1"> <!-- ID kategori dokumen -->
                            <div class="form-group">
                                <label for="laporanTugasAkhir">Pilih file untuk Sertifikat TOEIC</label>
                                <input type="file" name="file" id="laporanTugasAkhir" class="form-control-file" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Sertifikat TOEIC</h5>
                                <button type="submit" name="submit" class="btn btn-warning">Upload</button>
                            </div>
                        </form>
                        <div id="statusMessage"></div>
                        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kategori_id" value="1"> <!-- ID kategori dokumen -->
                            <div class="form-group">
                                <label for="laporanTugasAkhir">Pilih file untuk SKKM</label>
                                <input type="file" name="file" id="laporanTugasAkhir" class="form-control-file" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">SKKM</h5>
                                <button type="submit" name="submit" class="btn btn-warning">Upload</button>
                            </div>
                        </form>
                        <div id="statusMessage"></div>
                    </div>
                </div>
            </div>

            <!-- Lainnya form upload (sama dengan di atas untuk kategori lain) -->

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