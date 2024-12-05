<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Navbar & Tabs</title>

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
        .navbar-line {
            width: 100%;
            /* Lebar 100% */
            height: 20px;
            /* Tinggi garis 30px */
            background-color: yellow;
            /* Warna kuning */
            position: absolute;
            /* top: 60px; */
            /* Posisi garis 30px di bawah navbar */
            left: 0;
            margin-top: 140px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('assets/img/bg.jpeg');
            /* Ganti dengan path gambar background kamu */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            /* Agar background tetap di tempat saat di-scroll */
        }

        body::before {
            content: '';
            /* Membuat elemen pseudo */
            position: absolute;
            /* Menempatkan overlay di atas background */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Hitam dengan 50% opacity */
            z-index: -1;
            /* Agar overlay berada di belakang konten utama */
        }
        
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-primary navbar-dark fixed-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><img src="assets/img/poltek.png" alt="" width="100px"></i></a>
                </li>
                <li class="nav-item">
                    <p><br>JURUSAN <br> <b><u>TEKNOLOGI INFORMASI</u></b> <br> POLITEKNIK NEGERI MALANG</p>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><img src="assets/img/jti.png" alt="" width="80px"></i></a>
                </li>
            </ul>
            <!-- ./wrapper -->
            <div class="navbar-line"></div>
        </nav>


        <!-- /.navbar -->
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