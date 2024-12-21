<?php
include('../lib/Connection.php'); // Memasukkan koneksi ke database

// Memeriksa apakah ada data yang dikirimkan melalui POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menangkap data JSON yang dikirim oleh JavaScript
    $data = json_decode($_POST['data'], true);

    // Memeriksa jika decoding berhasil dan data ada
    if ($data) {
        // Proses pembaruan untuk setiap dokumen
        foreach ($data as $item) {
            // Ambil nilai untuk setiap kolom
            $dokumenId = $item['dokumen_id'];
            $status = $item['status'];
            $keterangan = $item['keterangan'];

            // Siapkan query untuk memperbarui status dan keterangan dokumen
            $sql = "
                UPDATE BebasTanggungan
                SET status_bebas_tanggungan = ?, catatan = ?
                WHERE kategori_id = ?
            ";

            // Eksekusi query
            $params = [$status, $keterangan, $dokumenId];
            $query = sqlsrv_query($db, $sql, $params);

            if ($query === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }

        // Kirim respons sukses setelah pembaruan berhasil
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui']);
    } else {
        // Jika data tidak valid
        echo json_encode(['status' => 'error', 'message' => 'Data yang dikirim tidak valid']);
    }
}
?>
