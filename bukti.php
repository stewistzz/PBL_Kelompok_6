<?php 
session_start();

include('lib/Connection.php');

// Query untuk mendapatkan data persyaratan, berkas, dan status
$sql = "
SELECT 
    jd.jenis_dokumen, 
    bt.status_bebas_tanggungan AS Status,
    bt.catatan AS Keterangan
FROM 
    BebasTanggungan bt
INNER JOIN 
    Mahasiswa m ON bt.mahasiswa_id = m.mahasiswa_id
INNER JOIN 
    Account a ON m.account_id = a.account_id
INNER JOIN 
    KategoriDokumen jd ON bt.kategori_id = jd.kategoriDok_id
WHERE 
    a.account_id = ?;
";

$params = [$_SESSION['account_id']];
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    throw new Exception('Query error: ' . print_r(sqlsrv_errors(), true));
}

// Ambil data
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}
sqlsrv_free_stmt($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Download Dokumen</title>
    <style>
        /* Gaya umum untuk halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 24px;
            color: #007bff;
            text-transform: uppercase;
        }

        main {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table thead {
            background-color: #f8f9fa;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .badge-success {
            display: inline-block;
            padding: 5px 10px;
            font-size: 12px;
            color: #fff;
            background-color: #28a745;
            border-radius: 5px;
        }

        .badge-danger {
            display: inline-block;
            padding: 5px 10px;
            font-size: 12px;
            color: #fff;
            background-color: #dc3545;
            border-radius: 5px;
        }

        .text-danger {
            color: #dc3545;
        }

        footer {
            text-align: center;
            margin-top: 30px;
        }

        footer p {
            font-size: 14px;
            color: #555;
        }

        .no-print {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .no-print:hover {
            background-color: #0056b3;
        }

        /* Gaya untuk hasil cetak */
        @media print {
            .no-print {
                display: none;
            }

            header h1 {
                color: #000;
            }
        }
    </style>
    <script>
        function printDocument() {
            window.print();
        }
    </script>
</head>

<body onload="printDocument()">
    <header>
        <h1>Bukti Download Dokumen</h1>
    </header>
    <main>
        <p>Terima kasih telah mengunduh dokumen ini. Silakan simpan halaman ini sebagai bukti.</p>
        <p><strong>Nama:</strong> <?= $_SESSION['nama'] ?></p>
        <p><strong>NIM:</strong> <?= $_SESSION['nim'] ?></p>
        <p><strong>Angkatan:</strong> <?= $_SESSION['angkatan'] ?></p>
        <p><strong>Kelas:</strong> <?= $_SESSION['nama_kelas'] ?></p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                                    <?php if (!empty($data)): ?>
                                        <?php $no = 1; // Nomor urut 
                                        ?>
                                        <?php foreach ($data as $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($row['jenis_dokumen']); ?></td>
                                                <td>
                                                    <?= htmlspecialchars($row['Keterangan'] ?? ''); ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['Status'] === 'sukses'): ?>
                                                        <span class="badge badge-success"><?= htmlspecialchars($row['Status']); ?></span>
                                                    <?php elseif ($row['Status'] === 'gagal'): ?>
                                                        <span class="badge badge-danger"><?= htmlspecialchars($row['Status']); ?></span>
                                                    <?php elseif ($row['Status'] === 'pending'): ?>
                                                        <span class="badge badge-warning"><?= htmlspecialchars($row['Status']); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-info"><?= htmlspecialchars($row['Status'] ?? 'Belum Diproses'); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data dokumen.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
        </table>
    </main>
    <footer>
        <p>© 2024 Sistem Bebas Tanggungan Jurusan TI</p>
        <button class="no-print" onclick="printDocument()">Cetak Ulang</button>
    </footer>
</body>

</html>
