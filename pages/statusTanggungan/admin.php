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

<section class="content">
    <div class="page-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group">
                                <!-- Judul kolom -->
                            <div class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                <div class="w-75">Dokumen</div>
                                <div class="w-75">Lihat</div>
                                <div class="w-50">Keterangan</div>
                                <div>Status</div>
                            </div>
                            <!-- Isi data -->
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-50">Pembayaran UKT</div>
                                    <i class="fas fa-eye"></i>
                                    <input type="text" class="form-control form-control-sm w-25" placeholder="Keterangan">
                                    <button class="btn btn-danger btn-sm">Belum Terbayarkan</button>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-50">Laporan Tugas Akhir / Skripsi</div>
                                    <i class="fas fa-eye"></i>
                                    <input type="text" class="form-control form-control-sm w-25" placeholder="Keterangan">
                                    <button class="btn btn-success btn-sm">Sudah Terpenuhi</button>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-50">Surat Bebas Kompen</div>
                                    <i class="fas fa-eye "></i>
                                    <input type="text" class="form-control form-control-sm w-25" placeholder="Keterangan">
                                    <button class="btn btn-success btn-sm">Sudah Terpenuhi</button>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-50">Surat Bebas Peminjaman</div>
                                    <i class="fas fa-eye"></i>
                                    <input type="text" class="form-control form-control-sm w-25" placeholder="Keterangan">
                                    <button class="btn btn-success btn-sm">Sudah Terpenuhi</button>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-50">Sertifikat TOEIC</div>
                                    <i class="fas fa-eye"></i>
                                    <input type="text" class="form-control form-control-sm w-25" placeholder="Keterangan">
                                    <button class="btn btn-danger btn-sm">Belum Terpenuhi</button>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-50">SKKM</div>
                                    <i class="fas fa-eye"></i>
                                    <input type="text" class="form-control form-control-sm w-25" placeholder="Keterangan">
                                    <button class="btn btn-success btn-sm">Sudah Terpenuhi</button>
                                    
                                </div>
                            </div>
                        </div>
                    <div class="card-footer text-center">
                            <button class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showImage(imagePath) {
    // Setel src dari gambar di modal
    document.getElementById('modalImage').src = imagePath;
    // Tampilkan modal
    $('#imageModal').modal('show');
}
</script>
