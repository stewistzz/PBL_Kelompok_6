<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Tanggungan Mahasiswa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../adminlte/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../adminlte/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">

    <!-- css folder assets -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- css folder login -->
    <link rel="stylesheet" href="../assets/css/login/login.css">

    <style>
        .content-wrapper {
            margin-top: 200px; /* Agar konten berada di bawah navbar */
            padding: 20px;
        }

        .header {
            text-align: center;
            color: white;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        table.table {
            margin-top: 20px;
        }

        table.table th {
            background-color: #007bff;
            color: white;
        }

        .status-sukses {
            color: green;
        }

        .status-belum {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-primary navbar-dark fixed-top">
            <!-- Navbar header -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <img src="assets/img/poltek.png" alt="" width="100px">
                    </a>
                </li>
                <li class="nav-item">
                    <p><br>JURUSAN <br> <b><u>TEKNOLOGI INFORMASI</u></b> <br> POLITEKNIK NEGERI MALANG</p>
                </li>
            </ul>
            <!-- Navbar right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <img src="assets/img/jti.png" alt="" width="80px">
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Konten Utama -->
        <div class="content-wrapper">
            <div class="header">
                <h1>Cek Status Tanggungan</h1>
                <p>Jurusan Teknologi Informasi - Politeknik Negeri Malang</p>
            </div>

            <div class="card mx-auto" style="max-width: 800px;">
                <h2 class="text-center">Riwayat Tanggungan Mahasiswa</h2>
                <p><b>Nama:</b> Annisa</p>
                <p><b>NIM:</b> 2341760032</p>

                <!-- Tabel Status -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pembayaran UKT</td>
                            <td class="status-sukses">Sudah Terbayarkan</td>
                        </tr>
                        <tr>
                            <td>Laporan Tugas Akhir / Skripsi</td>
                            <td class="status-sukses">Sudah Terpenuhi</td>
                        </tr>
                        <tr>
                            <td>Surat Bebas Kompen</td>
                            <td class="status-sukses">Sudah Terpenuhi</td>
                        </tr>
                        <tr>
                            <td>Surat Bebas Peminjaman</td>
                            <td class="status-sukses">Sudah Terpenuhi</td>
                        </tr>
                        <tr>
                            <td>Sertifikat TOEIC</td>
                            <td class="status-belum">Belum Terpenuhi</td>
                        </tr>
                        <tr>
                            <td>SKKM</td>
                            <td class="status-sukses">Sudah Terpenuhi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../adminlte/dist/js/demo.js"></script>
</body>

</html>