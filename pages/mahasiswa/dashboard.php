<?php
// session_start();
include('lib/Connection.php');
$accountId = $_SESSION['account_id']; // Ambil account_id dari session
$data = [];
$namaMahasiswa = '';

try {
    // Query untuk mendapatkan nama mahasiswa berdasarkan account_id
    $sqlNama = "
        SELECT m.nama 
        FROM Mahasiswa m
        INNER JOIN Account a ON m.account_id = a.account_id
        WHERE a.account_id = ?";
    $paramsNama = [$accountId];
    $queryNama = sqlsrv_query($db, $sqlNama, $paramsNama);

    if ($queryNama === false) {
        throw new Exception('Query error (nama): ' . print_r(sqlsrv_errors(), true));
    }

    // Ambil nama mahasiswa
    if ($rowNama = sqlsrv_fetch_array($queryNama, SQLSRV_FETCH_ASSOC)) {
        $namaMahasiswa = $rowNama['nama'];
    } else {
        $namaMahasiswa = 'Mahasiswa'; // Default jika nama tidak ditemukan
    }

    sqlsrv_free_stmt($queryNama);

    // Query untuk mendapatkan data persyaratan, berkas, dan status
    $sql = " 
        SELECT 
            jd.jenis_dokumen, 
            bt.path, 
            bt.status_bebas_tanggungan as Status
        FROM 
            BebasTanggungan bt
        INNER JOIN 
            Mahasiswa m ON bt.mahasiswa_id = m.mahasiswa_id
        INNER JOIN 
            Account a ON m.account_id = a.account_id
        INNER JOIN 
            KategoriDokumen jd ON bt.kategori_id = jd.kategoriDok_id
        WHERE 
            a.account_id = ?";
    $params = [$accountId];
    $query = sqlsrv_query($db, $sql, $params);

    if ($query === false) {
        throw new Exception('Query error: ' . print_r(sqlsrv_errors(), true));
    }

    // Ambil data
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
    sqlsrv_free_stmt($query);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="medium"></script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="container-fluid px-4 py-8">
        <!-- Content Header -->
        <style>
            .jumbotron {
                background: linear-gradient(135deg, #0056b3, #003366);
                border-radius: 15px;
                color: #fff;
            }
        </style>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <!-- Header Section -->
                    <div class="col-12">
                        <div class="jumbotron bg-dark text-center shadow-sm">
                            <h2 class="display-6"><b>Dashboard Mahasiswa</b></h2>
                            <p class="lead">Pastikan data yang anda kirimkan telah benar dan sesuai.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>

        <!-- Welcome Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title"><b>Selamat datang, <?= htmlspecialchars($namaMahasiswa); ?></b></h3>
<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title "><b>Selamat datang, <?= htmlspecialchars($namaMahasiswa); ?></b></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Persyaratan</th>
                            <th>Berkas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $index => $row): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($row['jenis_dokumen']) ?></td>
                                    <td><a href="pages/suratKeterangan/<?= htmlspecialchars($row['path']) ?>" target="_blank">Lihat Berkas</a></td>
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
                                <td colspan="4" class="text-center">Tidak ada data tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pie Chart Section -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Progress Berkas</h3>
            </div>
            <div class="card-body">
                <div id="pieChart" class="h-80"></div>
                <script>
                    const berkas = {
                        'Belum Dikirim': 2,
                        'Valid': 2,
                        'Belum Valid': 1,
                        'Pending': 1
                    };

                    const chart = echarts.init(document.getElementById('pieChart'));
                    const option = {
                        tooltip: {
                            trigger: 'item',
                            formatter: '{b}: {c} ({d}%)'
                        },
                        series: [{
                            type: 'pie',
                            radius: ['40%', '70%'],
                            data: Object.entries(berkas).map(([name, value]) => ({
                                name, value
                            }))
                        }]
                    };

                    chart.setOption(option);
                </script>
            </div>
        </div>
    </div>
</body>
</html>