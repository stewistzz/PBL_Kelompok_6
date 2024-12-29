<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        /* Header */
        .header {
            background: rgb(80, 125, 240); /* Warna biru */
            display: flex;
            align-items: center;
            padding: 20px;
            color: white;
            width: 100%; /* Lebar penuh */
            position:auto;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        /* Gambar logo Polinema di kiri */
        .header .logo-poltek {
            height: 80px; 
            margin-right: 20px; 
            margin-left: 250px; 
        }
        /* Teks Judul */
        .header .title {
            text-align: left; 
            margin: 0;
            flex-grow: 1; /* Agar teks mengisi sisa ruang */
        }
        .header .title h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header .title .underline {
            text-decoration: underline; /* Garis bawah */
        }
        .header .title h2 {
            margin: 0;
            font-size: 16px;
            font-weight: normal;
        }
        /* Gambar logo JTI di kanan */
        .header .logo-jti {
            height: 80px; /* Ukuran logo JTI */
            margin-left: auto; /* Memindahkan logo JTI ke kanan */
        }
        /* Garis bawah header */
        .header-bottom {
            background-color: yellow; /* Garis bawah kuning */
            height: 15px;
            width: 100%; /* Lebar penuh */
            margin-top: 0px; /* Memberikan jarak agar tidak tumpang tindih dengan konten */
        }
    </style>
</head>
<body>
    <header class="header">
        <!-- Gambar kiri Polinema -->
        <img src="assets/img/poltek.png" alt="Logo Polinema" class="logo-poltek">
        
        <!-- Teks Judul -->
        <div class="title">
            <h1>JURUSAN</h1>
            <h1 class="underline">TEKNOLOGI INFORMASI</h1>
            <h2>POLITEKNIK NEGERI MALANG</h2>
        </div>
        <!-- Gambar kanan JTI -->
        <img src="assets/img/jti.png" alt="Logo JTI" class="logo-jti">
    </header>
    <div class="header-bottom"></div>
    
</body>
</html>
