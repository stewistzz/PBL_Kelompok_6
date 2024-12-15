<?php
include('lib/Connection.php');


// Query untuk mengambil data mahasiswa dengan status bebas tanggungan yang sudah diajukan
$sql = "
    SELECT 
        M.mahasiswa_id, 
        M.nama, 
        M.nim
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

<section class="content-header">
    <?php include('layouts/toggle.php'); ?>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-12">
                <h1 class="text-center font-weight-bold text-primary">Daftar Mahasiswa Bebas Tanggungan</h1>
                <p class="text-center text-secondary">Daftar mahasiswa yang telah mengajukan status bebas tanggungan.</p>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tabel Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
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
                                    // echo "<td>
                                    //             <button 
                                    //                 class='btn btn-info btn-sm btn-detail' 
                                    //                 data-id='" . $row['mahasiswa_id'] . "'>
                                    //                 <i class='fas fa-eye'></i> Detail
                                    //             </button>
                                    //         </td>";
                                    echo "<td>
                                                <a href='dokumenDetail.php' 
                                                class='btn btn-info btn-sm'>
                                                    <i class='fas fa-eye'></i> Detail
                                                </a>
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

<section class="content">
    <div id="detailContainer">

    </div>
</section>


<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
    // Pilih semua tombol detail
    const detailButtons = document.querySelectorAll('.btn-detail');

    detailButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const mahasiswaId = this.dataset.id; // Ambil ID Mahasiswa
            const mahasiswaNama = this.closest('tr').querySelector('td:nth-child(2)').textContent; // Ambil Nama Mahasiswa

            if (!mahasiswaId) {
                alert('ID Mahasiswa tidak ditemukan!');
                return;
            }

            // Log ke console untuk pengecekan
            console.log(`Mahasiswa ID: ${mahasiswaId}, Nama: ${mahasiswaNama}`);

            try {
                // Panggil data detail menggunakan fetch
                const response = await fetch(`getDetailMahasiswa.php?id=${mahasiswaId}`);
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.text();
                const detailContainer = document.querySelector('#detailContainer');
                if (detailContainer) {
                    detailContainer.innerHTML = data;
                } else {
                    console.error('Kontainer detail tidak ditemukan di DOM.');
                }
            } catch (error) {
                console.error('Error fetching detail data:', error);
                alert('Terjadi kesalahan saat memuat data detail!');
            }
        });
    });
});

</script> -->

<!-- <script>
    $(document).ready(function() {
        $(".btn-detail").click(function() {
            var mahasiswaId = $(this).data('id'); // Mengambil ID mahasiswa dari atribut data-id

            if (!mahasiswaId) {
                alert('ID Mahasiswa tidak ditemukan!');
                return;
            }

            console.log(mahasiswaId);

            // Menampilkan loader (opsional) saat proses AJAX berjalan
            $('#detailContainer').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Memuat data...</div>');

            // Melakukan request AJAX untuk mengambil data detail mahasiswa
            $.ajax({
                url: 'getDetailMahasiswa.php',  // URL file PHP untuk memproses request
                type: 'GET',
                data: { id: mahasiswaId }, // Kirimkan ID mahasiswa melalui parameter GET
                success: function(response) {
                    // Jika request berhasil, tampilkan data ke dalam container #detailContainer
                    $('#detailContainer').html(response);
                },
                error: function(xhr, status, error) {
                    // Menangani error jika request gagal
                    $('#detailContainer').html('<div class="alert alert-danger">Terjadi kesalahan saat memuat data. Silakan coba lagi.</div>');
                    console.error("Error: " + error);
                }
            });
        });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        // Klik tombol Detail
        $('.btn-detail').click(function() {
            var mahasiswaId = $(this).data('id'); // Ambil ID mahasiswa

            console.log(mahasiswaId);

            $.ajax({
                url: 'get_detail.php', // File PHP yang menghandle request
                type: 'GET',
                data: {
                    id: mahasiswaId
                }, // Kirimkan ID mahasiswa
                success: function(response) {
                    console.log(response);
                    // Tampilkan hasil response ke dalam #detailContainer
                    $('#detailContainer').html(response);
                },
                error: function() {
                    alert("Terjadi kesalahan saat mengambil data.");
                }
            });
        });
    });
</script> -->