<?php
// Tentukan folder tujuan untuk menyimpan file
$uploadDirectory = "uploads/";

// Cek jika folder 'uploads/' ada, jika tidak buat folder tersebut
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
    $allowed_extensions = array("pdf", "doc", "docx", "txt", "png", "jpg");

    // Cek apakah ekstensi file valid
    if (!in_array($file_ext, $allowed_extensions)) {
        echo "Invalid file extension. Only PDF, DOC, DOCX, TXT, PNG, JPG are allowed.";
        exit;
    }

    // Validasi ukuran file (maksimal 10MB)
    $maxFileSize = 10 * 1024 * 1024; // 10MB
    if ($fileSize > $maxFileSize) {
        echo "File is too large. Maximum file size is 10MB.";
        exit;
    }

    // Tentukan path file tujuan di server
    $uploadPath = $uploadDirectory . basename($fileName);

    // Cek jika file sudah ada
    if (file_exists($uploadPath)) {
        echo "File already exists.";
        exit;
    }

    // Pindahkan file dari direktori sementara ke folder tujuan
    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded or there was an upload error.";
}
?>
