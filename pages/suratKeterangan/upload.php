<?php
include('../../action/auth.php'); // Pastikan sudah login dan session tersedia
include('../../lib/Connection.php'); // Koneksi ke database

// Pastikan user login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'Mahasiswa') {
    $_SESSION['alert'] = "Unauthorized access.";
    header("Location: ../index.php");
    exit;
}

// Ambil mahasiswa_id dari session
$mahasiswa_id = $_SESSION['user_id'];

// Ambil nilai kategori_id dari form
$kategori_id = isset($_POST['kategori_id']) ? intval($_POST['kategori_id']) : null;

// Tentukan folder tujuan untuk menyimpan file
$uploadDirectory = "documents/";

// Cek jika folder 'documents/' ada, jika tidak buat folder tersebut
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Ambil informasi file
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];

    // Validasi ekstensi file
    $file_ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed_extensions = ["pdf", "doc", "docx", "txt", "png", "jpg"];

    if (!in_array($file_ext, $allowed_extensions)) {
        $_SESSION['alert'] = "Invalid file extension. Only PDF, DOC, DOCX, TXT, PNG, JPG are allowed.";
        header("Location: ../../index.php");
        exit;
    }

    // Validasi ukuran file (maksimal 10MB)
    $maxFileSize = 10 * 1024 * 1024; // 10MB
    if ($fileSize > $maxFileSize) {
        $_SESSION['alert'] = "File is too large. Maximum file size is 10MB.";
        header("Location: ../../index.php");
        exit;
    }

    // Tentukan path file tujuan di server
    $uploadPath = $uploadDirectory . "_" . basename($fileName);

    if (file_exists($uploadPath)) {
        $_SESSION['alert'] = "File already exists.";
        header("Location: ../../index.php");
        exit;
    }

    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        // Simpan path ke database
        $status_bebas_tanggungan = "Pending"; // Default status
        $tanggal_pengajuan = date("Y-m-d");
        // $admin_id = $_SESSION['user_id']; // Ganti sesuai admin default Anda
        $admin_id = 1;

        $sql = "INSERT INTO BebasTanggungan (mahasiswa_id, kategori_id, status_bebas_tanggungan, tanggal_pengajuan, admin_id, path) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$mahasiswa_id, $kategori_id, $status_bebas_tanggungan, $tanggal_pengajuan, $admin_id, $uploadPath];
        $stmt = sqlsrv_query($db, $sql, $params);

        if ($stmt) {
            $_SESSION['alert'] = "File uploaded successfully and data saved to database!";
            header("Location: ../../index.php");
        } else {
            $_SESSION['alert'] = "Error saving to database: " . print_r(sqlsrv_errors(), true);
            header("Location: ../../index.php");
        }
    } else {
        $_SESSION['alert'] = "Error uploading file.";
        header("Location: ../../index.php");
    }
} else {
    $_SESSION['alert'] = "No file uploaded or there was an upload error.";
    header("Location: ../../index.php");
}
?>
