<?php
// Include file header dan footer
include('layouts/header.php');
?>

<div class="content-wrapper">
    <div class="header">
        <h1>Cek Status Tanggungan</h1>
        <p>Jurusan Teknologi Informasi - Politeknik Negeri Malang</p>
    </div>

    <div class="card">
        <h2>Riwayat Tanggungan Mahasiswa</h2>
        <p><b>Nama:</b> Annisa</p>
        <p><b>NIM:</b> 2341760032</p>

        <!-- Tabel Status -->
        <table>
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pembayaran UKT</td>
                    <td class="text-success">Sudah Terbayarkan</td>
                </tr>
                <tr>
                    <td>Laporan Tugas Akhir / Skripsi</td>
                    <td class="text-success">Sudah Terpenuhi</td>
                </tr>
                <tr>
                    <td>Surat Bebas Kompen</td>
                    <td class="text-success">Sudah Terpenuhi</td>
                </tr>
                <tr>
                    <td>Surat Bebas Peminjaman</td>
                    <td class="text-success">Sudah Terpenuhi</td>
                </tr>
                <tr>
                    <td>Sertifikat TOEIC</td>
                    <td class="text-danger">Belum Terpenuhi</td>
                </tr>
                <tr>
                    <td>SKKM</td>
                    <td class="text-success">Sudah Terpenuhi</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
// Include footer
include('layouts/footer.php');
?>
