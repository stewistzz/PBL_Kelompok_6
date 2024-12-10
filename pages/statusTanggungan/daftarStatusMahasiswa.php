<div class="table-responsive">
    <table class="table table-bordered table-striped" id="tableMahasiswa">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Pengajuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT bt_id, nama, nim, tanggal_pengajuan FROM Mahasiswa 
                    INNER JOIN BebasTanggungan ON Mahasiswa.mahasiswa_id = BebasTanggungan.mahasiswa_id";
            $query = sqlsrv_query($db, $sql);

            if ($query) {
                $no = 1;
                while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['nim']}</td>
                            <td>{$row['tanggal_pengajuan']->format('Y-m-d')}</td>
                            <td>
                                <button class='btn btn-info btn-sm btn-detail' data-id='{$row['bt_id']}'>Detail</button>
                            </td>
                          </tr>";
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
    $('.btn-detail').click(function () {
        const bt_id = $(this).data('id');
        
        $.ajax({
            url: 'admin.php',
            type: 'POST',
            data: { bt_id: bt_id },
            dataType: 'json',
            success: function (response) {
                let html = '';
                response.forEach((item, index) => {
                    html += `
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="w-50">${item.kategori}</div>
                            <button class="btn ${item.status === 'Sudah Terpenuhi' ? 'btn-success' : 'btn-danger'} btn-sm">
                                ${item.status}
                            </button>
                            <input type="text" class="form-control form-control-sm w-25" value="${item.catatan || ''}" placeholder="Keterangan">
                        </div>`;
                });

                // Update tampilan detail status
                $('.list-group').html(html);
            },
            error: function (xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            },
        });
    });
});

</script>
