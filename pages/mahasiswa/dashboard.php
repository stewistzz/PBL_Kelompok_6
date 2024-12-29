<?php
// session_start();
include('lib/Connection.php');
$accountId = $_SESSION['account_id']; // Ambil account_id dari session
$namaMahasiswa = '';
$dokumenData = [];

try {
    // Cek jika ada aksi penghapusan
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $filePath = urldecode($_GET['id']);

        // Path berkas yang akan dihapus dari server 
        $fileDir = 'pages/suratKeterangan/';
        $fullFilePath = $fileDir . $filePath;

        // Cek jika file ada di server dan hapus file
        if (file_exists($fullFilePath)) {
            unlink($fullFilePath); // Hapus file dari server
        }

        // Query untuk menghapus data dari database
        $sqlDelete = "DELETE FROM dbo.BebasTanggungan WHERE path = ?";
        $paramsDelete = [$filePath];
        $queryDelete = sqlsrv_query($db, $sqlDelete, $paramsDelete);

        if ($queryDelete === false) {
            throw new Exception('Query error (delete): ' . print_r(sqlsrv_errors(), true));
        }
    }

    // Query untuk mendapatkan nama mahasiswa
    $sqlNama = "
        SELECT m.nama 
        FROM dbo.Mahasiswa m
        INNER JOIN dbo.Account a ON m.account_id = a.account_id
        WHERE a.account_id = ?";
    $paramsNama = [$accountId];
    $queryNama = sqlsrv_query($db, $sqlNama, $paramsNama);
 
    if ($queryNama === false) {
        throw new Exception('Query error (nama): ' . print_r(sqlsrv_errors(), true));
    }

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
            COALESCE(bt.path, '') as path, 
            COALESCE(bt.status_bebas_tanggungan, 'Belum Upload') as status_bebas_tanggungan
        FROM 
            dbo.KategoriDokumen jd
        LEFT JOIN 
            dbo.BebasTanggungan bt ON jd.kategoriDok_id = bt.kategori_id
        LEFT JOIN 
            dbo.Mahasiswa m ON bt.mahasiswa_id = m.mahasiswa_id
        LEFT JOIN 
            dbo.Account a ON m.account_id = a.account_id
        WHERE 
            a.account_id = ? OR a.account_id IS NULL";
    $params = [$accountId];
    $query = sqlsrv_query($db, $sql, $params);

    if ($query === false) {
        throw new Exception('Query error: ' . print_r(sqlsrv_errors(), true));
    }

    // Ambil data
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        $dokumenData[$row['jenis_dokumen']] = [
            'status' => $row['status_bebas_tanggungan'],
            'path' => $row['path']
        ];
    }
    sqlsrv_free_stmt($query);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        die();
    }

// Debug: Print dokumenData
error_log('Dokumen Data: ' . print_r($dokumenData, true));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <style>
        .jumbotron {
            background: linear-gradient(135deg, #0056b3, #003366);
            border-radius: 15px;
            color: #fff;
            padding: 2rem;
        }
        #pieChart {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="jumbotron text-center mb-4">
            <h1 class="display-4">Dashboard Mahasiswa</h1>
            <p class="lead">Pastikan data yang anda kirimkan telah benar dan sesuai.</p>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title"><b>Selamat datang, <?= htmlspecialchars($namaMahasiswa); ?></b></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Persyaratan</th>
                            <th>Berkas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dokumenData)): ?>
                            <?php $loop = new stdClass(); $loop->iteration = 1; foreach ($dokumenData as $jenisDokumen => $data): ?>
                                <tr>
                                    <td><?= $loop->iteration++ ?></td>
                                    <td><?= htmlspecialchars($jenisDokumen) ?></td>
                                    <td>
                                        <?php if (!empty($data['path'])): ?>
                                            <a href="pages/suratKeterangan/<?= htmlspecialchars($data['path']) ?>" target="_blank" class="btn btn-sm btn-primary">Lihat Berkas</a>
                                        <?php else: ?>
                                            <span class="text-muted">Belum ada berkas</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $badgeClass = 'bg-secondary';
                                        if ($data['status'] === 'valid') {
                                            $badgeClass = 'bg-success';
                                        } elseif ($data['status'] === 'tidak valid') {
                                            $badgeClass = 'bg-danger';
                                        } elseif ($data['status'] === 'pending') {
                                            $badgeClass = 'bg-warning text-dark';
                                        }
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($data['status']); ?></span>
                                    </td>
                                    <td>
                                        <?php if (!empty($data['path'])): ?>
                                            <a href="?action=delete&id=<?= urlencode($data['path']); ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus berkas ini?')">
                                               Hapus
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Progress Berkas</h3>
            </div>
            <div class="card-body">
                <div id="pieChart"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            try {
                const dokumenData = <?= json_encode($dokumenData) ?>;
                console.log('Data for chart:', dokumenData);

                const getColor = (status) => {
                    switch(status.toLowerCase()) {
                        case 'valid':
                            return '#28a745';
                        case 'tidak valid':
                            return '#dc3545';
                        case 'pending':
                            return '#ffc107';
                        case 'belum upload':
                        default:
                            return '#6c757d';
                    }
                };

                const dataChart = Object.entries(dokumenData).map(([name, info]) => ({
                    name,
                    value: 1,
                    itemStyle: {
                        color: getColor(info.status)
                    }
                }));

                const chart = echarts.init(document.getElementById('pieChart'));
                const option = {
                    tooltip: {
                        trigger: 'item',
                        formatter: function(params) {
                            return `${params.name}: ${dokumenData[params.name].status}`;
                        }
                    },
                    legend: {
                        orient: 'vertical',
                        left: 'left',
                        data: Object.keys(dokumenData)
                    },
                    series: [{
                        name: 'Progress Berkas',
                        type: 'pie',
                        radius: '50%',
                        data: dataChart,
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        },
                        label: {
                            show: true,
                            formatter: '{b}: {c}\n{d}%'
                        }
                    }]
                };

                chart.setOption(option);

                // Responsive chart
                window.addEventListener('resize', function() {
                    chart.resize();
                });
            } catch (error) {
                console.error('Error initializing chart:', error);
            }
        });
    </script>
</body>
</html>