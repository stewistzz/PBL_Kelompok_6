<style>
    .content {
        margin-top: 30px;
    }
</style>

<!-- simpan data tabel -->
<div class="data"></div>

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
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pembayaran UKT</td>
                                        <!-- lihat dokumen -->
                                        <td>
                                            <button type="button" class="btn btn-primary" name="dokumen" id="dokumen">
                                                Lihat Dokumen
                                            </button>
                                        </td>
                                        <!-- end lihat dokumen -->
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control" required="true"></textarea>
                                            <p class="text-danger" id="err_ukt"></p>
                                        </td>
                                        <td>
                                            <select name="status" class="form-control" id="status">
                                                <option value="pending" selected>Pending</option>
                                                <option value="gagal">Gagal</option>
                                                <option value="success">Success</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Laporan Tugas Akhir / Skripsi</td>
                                        <!-- lihat dokumen -->
                                        <td>
                                            <button type="button" class="btn btn-primary" name="dokumen" id="dokumen">
                                                Lihat Dokumen
                                            </button>
                                        </td>
                                        <!-- end lihat dokumen -->
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control" required="true"></textarea>
                                            <p class="text-danger" id="err_akhir"></p>
                                        </td>
                                        <td>
                                            <select name="status" class="form-control" id="status">
                                                <option value="pending" selected>Pending</option>
                                                <option value="gagal">Gagal</option>
                                                <option value="success">Success</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Surat Bebas Kompen</td>
                                        <!-- lihat dokumen -->
                                        <td>
                                            <button type="button" class="btn btn-primary" name="dokumen" id="dokumen">
                                                Lihat Dokumen
                                            </button>
                                        </td>
                                        <!-- end lihat dokumen -->
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control" required="true"></textarea>
                                            <p class="text-danger" id="err_kompen"></p>
                                        </td>
                                        <td>
                                            <select name="status" class="form-control" id="status">
                                                <option value="pending" selected>Pending</option>
                                                <option value="gagal">Gagal</option>
                                                <option value="success">Success</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Surat Bebas Peminjaman</td>
                                        <!-- lihat dokumen -->
                                        <td>
                                            <button type="button" class="btn btn-primary" name="dokumen" id="dokumen">
                                                Lihat Dokumen
                                            </button>
                                        </td>
                                        <!-- end lihat dokumen -->
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control" required="true"></textarea>
                                            <p class="text-danger" id="err_pinjam"></p>
                                        </td>
                                        <td>
                                            <select name="status" class="form-control" id="status">
                                                <option value="pending" selected>Pending</option>
                                                <option value="gagal">Gagal</option>
                                                <option value="success">Success</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Sertifikat TOEIC</td>
                                        <!-- lihat dokumen -->
                                        <td>
                                            <button type="button" class="btn btn-primary" name="dokumen" id="dokumen">
                                                Lihat Dokumen
                                            </button>
                                        </td>
                                        <!-- end lihat dokumen -->
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control" required="true"></textarea>
                                            <p class="text-danger" id="err_toeic"></p>
                                        </td>
                                        <td>
                                            <select name="status" class="form-control" id="status">
                                                <option value="pending" selected>Pending</option>
                                                <option value="gagal">Gagal</option>
                                                <option value="success">Success</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>SKKM</td>
                                        <!-- lihat dokumen -->
                                        <td>
                                            <button type="button" class="btn btn-primary" name="dokumen" id="dokumen">
                                                Lihat Dokumen
                                            </button>
                                        </td>
                                        <!-- end lihat dokumen -->
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control" required="true"></textarea>
                                            <p class="text-danger" id="err_skkm"></p>
                                        </td>
                                        <td>
                                            <select name="status" class="form-control" id="status">
                                                <option value="pending" selected>Pending</option>
                                                <option value="gagal">Gagal</option>
                                                <option value="success">Success</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
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
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        // menampilkan data dari tabel mahasiswa yang telah melakukan upload  
        $('.data').load("indexAdmin.php");
    });

    $("#simpan").click(function() {
    var data = $('.table').serialize();
    var keterangan1 = document.getElementById("err_ukt").value;
    var keterangan2 = document.getElementById("err_akhir").value;
    var keterangan3 = document.getElementById("err_kompen").value;
    var keterangan4 = document.getElementById("err_pinjam").value;
    var keterangan5 = document.getElementById("err_toeic").value;
    var keterangan6 = document.getElementById("err_skkm").value;
    var status = document.getElementById("status").value;

    // ajax
    $.ajax({
            type: 'POST',
            url: "form_action.php",
            data: data,
            dataType: 'json',
            success: function() {
                $('.data').load("form_action.php");
                document.getElementById("id").value = "";
                document.getElementById("form-data").reset();
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });
</script>