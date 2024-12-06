<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="adminlte/plugins/datatablesbs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="adminlte/plugins/datatablesresponsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="adminlte/plugins/datatablesbuttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/dashboardAdmin.css">
    <!-- jQuery -->
    <script src="adminlte/plugins/jquery/jquery.min.js"></script>
    <style>
        .content-header {
            /* margin-top: 20px; */
            /* margin-bottom: 10px */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include('layouts/header.php'); ?>
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('layouts/sidebar.php'); ?>
    </div>
    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Content Header -->
        <section class="content-header">
            <!-- toggle -->
            <?php include('layouts/toggle.php');?>
            <!-- toggle -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <tr>
                            <th scope="col">Annisa</th>
                            <th scope="col">/</th>
                            <th scope="col">2341760032</th>
                        </tr>
                        <h4 class="text-left font-weight">Riwayat Tanggungan Mahasiswa</h4>
                        
                    </div>
                </div>
            </div>
        </section>
        <tbody>

            <!-- Main Content -->
            <section class="content">
                <div class="page-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Pembayaran UKT
                                            <span class="badge badge-success">Sudah Terbayarkan</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Laporan Tugas Akhir / Skripsi
                                            <span class="badge badge-success">Sudah Terpenuhi</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Surat Bebas Kompen
                                            <span class="badge badge-success">Sudah Terpenuhi</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Surat Bebas Peminjaman
                                            <span class="badge badge-success">Sudah Terpenuhi</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Sertifikat TOEIC
                                            <span class="badge badge-danger">Belum Terpenuhi</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            SKKM
                                            <span class="badge badge-success">Sudah Terpenuhi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </tbody>
        </div>

        <!-- footer -->
        <?php include('layouts/footer.php'); ?>
    </div>

    <!-- Bootstrap 4 -->
    <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery Validation -->
    <script src="adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="adminlte/plugins/jquery-validation/localization/messages_id.min.js"></script>
    <!-- DataTables & Plugins -->
    <script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="adminlte/plugins/datatablesresponsive/js/dataTables.responsive.min.js"></script>
    <script src="adminlte/plugins/datatablesresponsive/js/responsive.bootstrap4.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="adminlte/dist/js/demo.js"></script>
    <!-- sidebar toggle -->
    <script src="assets/js/sidebarToggle.js"></script>
</body>

</html>