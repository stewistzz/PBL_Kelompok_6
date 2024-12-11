<?php
include('lib/Connection.php');

// Ambil data yang dikirimkan melalui POST
$mahasiswa_id = $_POST['mahasiswa_id'];
$catatan = $_POST['catatan'];
$status = $_POST['status'];

// Query untuk memperbarui data status dan catatan dokumen
$sql = "
    UPDATE BebasTanggungan 
    SET catatan = ?, status_bebas_tanggungan = ?
    WHERE mahasiswa_id = ?
";

$params = [$catatan, $status, $mahasiswa_id];
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Data berhasil disimpan.";
?>
