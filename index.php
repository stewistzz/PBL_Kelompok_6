<?php
include('lib/Session.php');

$session = new Session();
if ($session->get('is_login') !== true) {
  header('Location: login.php');
}

$role = $session->get('role'); // Ambil role dari session
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bebas Tanggungan JTI</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="adminlte/plugins/datatables-
bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="adminlte/plugins/datatables-
responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="adminlte/plugins/datatables-
buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

  <!-- jQuery -->
  <script src="adminlte/plugins/jquery/jquery.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('layouts/header.php');
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <!-- admin -->
      <?php
      if ($role == 'Mahasiswa') {
        include('layouts/sidebarMahasiswa.php');
      } else {
        include('layouts/sidebarAdmin.php');
      }

      ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
      if ($role == 'Mahasiswa') {
        switch (strtolower($page)) {
          case 'dashboard':
            include('pages/mahasiswa/dashboard.php');
            break;
          case 'template':
            include('pages/templateSurat/template.php');
            break;
          case 'upload':
            include('pages/suratKeterangan/surat_keterangan.php');
            break;
          case 'status':
            include('pages/statusTanggungan/tampilMahasiswa/mahasiswa.php');
            break;
            // case 'bukti':
            //   include('pages/cetakTanggungan/mahasiswa.php');
            //   break;
          case 'notifikasi':
            include('pages/notifikasi/detail.php');
            break;
          case 'profile':
            include('pages/profile/profile.php');
            break;
          default:
            include('pages/404.php');
            break;
        }
      } else {
        switch (strtolower($page)) {
          case 'dashboard':
            include('pages/admin/dashboard.php');
            break;
          case 'status':
            include('pages/statusTanggungan/tampilanAdmin/admin.php');
            break;
          case 'akun':
            include('pages/modifData/akun.php');
            break;
          case 'mahasiswa':
            include('pages/modifData/mahasiswa.php');
            break;
          case 'admin':
            include('pages/modifData/admin.php');
            break;
          case 'profile':
            include('pages/profile/profile.php');
            break;
          default:
            include('pages/404.php');
            break;
        }
      }
      ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        
          <div class="card-footer">
            <!-- Footer -->
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php
    include('layouts/footer.php');
    ?>
    <!-- footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <!-- Bootstrap 4 -->
  <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery Validation -->
  <script src="adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="adminlte/plugins/jquery-validation/localization/messages_id.min.js"></script>

  <!-- DataTables & Plugins -->
  <script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
  <!-- <script src="adminlte/dist/js/demo.js"></script> -->
</body>

</html>