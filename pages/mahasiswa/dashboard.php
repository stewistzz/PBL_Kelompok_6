<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
  <!-- jQuery -->
  <script src="adminlte/plugins/jquery/jquery.min.js"></script>
  <style>
        body {
            background: url('../PBL_Kelompok_6/assets/img/bg.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif;
            position: relative;
        }
        body::before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color:azure (0.5);
            z-index: -1;
        }
        .sidebar{
            background-color: rgba(255, 255, 255, 0.6);
        }
        .main-sidebar,
        .content-wrapper {
            margin-top: 140px; /* Jarak 200px dari header */
        }
        .sidebar .nav-link,
        .sidebar .nav-link p {
            font-size: 14px;
            color: #000;
        }
        .table td{
            text-align: center;
        }
    </style>
</head>
<?php include('layouts/header.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-blue-primary elevation-4">
        <!-- Brand Logo -- >
        <a href="#" class="brand-link">
            <img src="SIBETA.png" alt="Logo" class="brand-image img-rectangle elevation-3" style="width : 220px;">
            <span class="brand-text font-weight-light">SiBeTa</span>
        </a>

        <!- Sidebar --> 
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Surat Keterangan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>Cek Status Tanggungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>Cetak Bebas Tanggungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>Notifikasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="text-center font-weight-bold">Sistem Bebas Tanggungan</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dashboard Admin</h3>
                    </div>
                    <div class="card-body">
                        <input type="text" placeholder="Cari Mahasiswa..." class="form-control mb-3 w-50">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Status Foto</th>
                                    <th>Status UKT</th>
                                    <th>Status SKKM</th>
                                    <th>File</th>
                                    <th>Waktu Pengajuan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2341760188</td>
                                    <td>Rahmalia Mutia Farda</td>
                                    <td>
                                        <span class="badge bg-success">Valid</span>
                                        <i class="fas fa-eye"></i>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Valid</span>
                                        <i class="fas fa-eye"></i>
                                    </td>
                                    <td><span class="badge bg-danger">Tidak Valid</span></td>
                                    <td><i class="fas fa-edit text-primary"></i></td>
                                    <td>14/06/2024 08:41:54</td>
                                    <td><span class="badge bg-warning">Menunggu Verifikasi</span></td>
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
    </div>
</div>

<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
