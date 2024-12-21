
<style>
    .content {
        margin-top: 30px;
    }
</style>

<!-- Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Status Dokumen</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokumen</th>
                                    <th>Lihat Dokumen</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="content"></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-primary" name="simpan" id="simpan">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
        <!-- simpan data tabel -->
        <!-- <div class="data"></div> -->
        <div class="data">
            <!-- Konten akan dimuat di sini setelah klik tombol Detail -->
        </div>

    </div>
    </div>
</section>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // menampilkan data dari tabel mahasiswa yang telah melakukan upload  
        $('.data').load("pages/statusTanggungan/tampilanAdmin/indexAdmin.php");

        $('#simpan').on('click', function() {
            // Mengumpulkan data dari setiap baris tabel
            let dataToSave = [];

            $('tr').each(function() {
                let dokumenId = $(this).find('input[name="dokumen_id"]').val(); // Ambil dokumen_id dari hidden input
                let status = $(this).find('#status').val(); // Ambil status
                let keterangan = $(this).find('#keterangan').val(); // Ambil keterangan

                // Pastikan data valid sebelum dimasukkan ke dalam array
                if (dokumenId && status && keterangan) {
                    dataToSave.push({
                        dokumen_id: dokumenId,
                        status: status,
                        keterangan: keterangan
                    });
                }
            });

            // Kirim data ke backend untuk disimpan
            $.ajax({
                url: 'action/statusAdmin.php', // Ganti dengan path yang sesuai
                method: 'POST',
                data: {
                    data: JSON.stringify(dataToSave)
                }, // Kirim data dalam format JSON
                success: function(response) {
                    let result = JSON.parse(response);
                    if (result.status === 'success') {
                        alert(result.message);
                    } else {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghubungi server.');
                }
            });
        });
    });
</script>