
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../adminlte/plugins/datatablesbs4/css/dataTables.bootstrap4.min.css">
    <lin k rel="stylesheet" href="../../adminlte/plugins/datatablesresponsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../adminlte/plugins/datatablesbuttons/css/buttons.bootstrap4.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="../../adminlte/dist/css/adminlte.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboardAdmin.css">

    <style>
        .content-header {
            /* margin-top: 20px; */
            /* margin-bottom: 10px */
        }
        .card-body {
            padding: 20px;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .card {
            margin-bottom: 15px;
            background-color: #e5e5e5;
            border: none;
        }
        .card-title {
            font-size: 1.2em;
            font-weight: bold;
        }
        .info-box-content {
            font-weight: 600;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include('../../layouts/sidebar.php'); ?>
        <!-- Header -->
        <?php include('../../layouts/header.php'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="text-center font-weight-bold">Sistem Bebas Tanggungan</h1>
                            <p class="text-center">Riwayat Tanggungan Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Laporan Tugas Akhir -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan Tugas Akhir / Skripsi</h5>
                                    <button class="btn btn-warning">Upload</button>
                                </div>
                            </div>
                        </div>
                        <!-- Surat Bebas Kompen -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Surat Bebas Kompen</h5>
                                    <button class="btn btn-warning">Upload</button>
                                </div>
                            </div>
                        </div>
                        <!-- Surat Bebas Peminjaman -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Surat Bebas Peminjaman</h5>
                                    <button class="btn btn-warning">Upload</button>
                                </div>
                            </div>
                        </div>
                        <!-- Sertifikat TOEIC -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sertifikat TOEIC</h5>
                                    <button class="btn btn-warning">Upload</button>
                                </div>
                            </div>
                        </div>
                        <!-- SKKM -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">SKKM</h5>
                                    <button class="btn btn-warning">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php include('../../layouts/footer.php'); ?>
    </div>

    <!-- jQuery -->
    <script src="../../adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
