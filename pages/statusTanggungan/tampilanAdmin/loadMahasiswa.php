<?php
include('../../../lib/Connection.php');

if (isset($_GET['mahasiswa_id'])) {
    $mahasiswa_id = $_GET['mahasiswa_id']; // Ambil mahasiswa_id dari parameter GET

    // Query untuk mendapatkan data persyaratan, berkas, dan status
    $sql = "
        SELECT 
            jd.kategoriDok_id AS dokumen_id,
            jd.jenis_dokumen, 
            bt.status_bebas_tanggungan AS status,
            bt.catatan AS keterangan,
            bt.path
        FROM 
            BebasTanggungan bt
        INNER JOIN 
            Mahasiswa m ON bt.mahasiswa_id = m.mahasiswa_id
        INNER JOIN 
            Account a ON m.account_id = a.account_id
        INNER JOIN 
            KategoriDokumen jd ON bt.kategori_id = jd.kategoriDok_id
        WHERE 
            m.mahasiswa_id = ?;
    ";

    $params = [$mahasiswa_id];
    $query = sqlsrv_query($db, $sql, $params);

    // Cek jika query gagal
    if ($query === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Ambil data dan tampilkan dalam format HTML
    $no = 1;
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        $dokumen_id = htmlspecialchars($row['dokumen_id']);
        $jenis_dokumen = htmlspecialchars($row['jenis_dokumen']);
        $path = htmlspecialchars($row['path']);

        echo "
        <tr>
            <td>{$no}</td>
            <td>{$jenis_dokumen}</td>
            <td><a href='pages/suratKeterangan/{$path}' target='_blank'>Lihat Berkas</a></td>
            <td>
                <textarea name='keterangan' id='keterangan' class='form-control' required></textarea>
            </td>
            <td>
                <select name='status' class='form-control' id='status'>
                    <option value='pending' selected>Pending</option>
                    <option value='gagal'>Gagal</option>
                    <option value='sukses'>Sukses</option>
                </select>
            </td>
            <input type='hidden' name='dokumen_id' value='{$dokumen_id}' />
        </tr>";
        $no++;
    }

    sqlsrv_free_stmt($query);
} else {
    echo "Data mahasiswa tidak ditemukan.";
}
?>
