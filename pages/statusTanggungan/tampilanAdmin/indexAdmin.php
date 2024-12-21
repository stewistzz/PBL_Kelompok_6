<?php
include('../../../lib/Connection.php');

// Query untuk mengambil data mahasiswa dengan status bebas tanggungan yang sudah diajukan
$sql = "
    SELECT DISTINCT
        M.mahasiswa_id, 
        M.nama, 
        M.nim,
        M.nama_kelas,
        M.angkatan
    FROM BebasTanggungan BT
    JOIN Mahasiswa M ON BT.mahasiswa_id = M.mahasiswa_id
    ORDER BY M.nama ASC
";

$params = [];
$query = sqlsrv_query($db, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<section class="content mt-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tabel Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="mahasiswa">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                                    echo "<tr class='text-center'>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td class='text-left'>" . htmlspecialchars($row['nama']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nama_kelas']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['angkatan']) . "</td>";
                                    echo "<td>
                                                <button 
                                                    class='btn btn-info btn-sm btn-detail' 
                                                    data-id='" . $row['mahasiswa_id'] . "' 
                                                    data-toggle='modal' 
                                                    data-target='#detailModal'>
                                                    <i class='fas fa-eye'></i> Detail
                                                </button>
                                            </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Klik tombol Detail
        $(document).on('click', '.btn-detail', function() {
            var mahasiswa_id = $(this).data('id'); // Ambil mahasiswa_id dari tombol yang diklik

            // Kirim AJAX request ke loadMahasiswa.php
            $.ajax({
                url: 'pages/statusTanggungan/tampilanAdmin/loadMahasiswa.php',
                method: 'GET',
                data: { mahasiswa_id: mahasiswa_id }, // Kirim data mahasiswa_id
                success: function(response) {
                    // Update content pada admin.php dengan data dari loadMahasiswa.php
                    $('#content').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
    });
</script>
