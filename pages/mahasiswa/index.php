<style>
    /* .content {
        margin-top: 10px;
    } */
</style>

 <!-- Content Header -->
 <section class="content-header">
            <!-- toggle -->
            <?php include('layouts/toggle.php');?>
            <!-- toggle -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="text-center font-weight-bold">Riwayat Bebas Tanggungan</h1>
                    </div>
                </div>
            </div>
    </section>
<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Selamat datang Annisa</b></h3>
                <br>
                <p>Daftar Riwayat Bebas Tanggungan Jurusan oleh Mahasiswa</p>
            </div>
            <div class="card-body">
                <!-- <input type="text" placeholder="Cari Mahasiswa..." class="form-control mb-3 w-50"> -->

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Persyaratan</th>
                            <th>Berkas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pembayaran UKT</td>
                            <td>file.pdf</td>
                            <td><span class="badge bg-success">Sudah Terbayar</span></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-3">
                    <span>Menampilkan 1 dari 280 data</span>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Sebelum</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Selanjutnya</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>