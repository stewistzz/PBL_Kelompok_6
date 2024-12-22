<?php
include('lib/Connection.php');

if (isset($_POST['bt_id'])) {
    $bt_id = $_POST['bt_id'];

    // Query untuk mengambil data tanggungan
    $sql = "SELECT kategori, status_bebas_tanggungan, catatan 
            FROM BebasTanggungan 
            WHERE bt_id = ?";
    $params = [$bt_id];
    $query = sqlsrv_query($db, $sql, $params);

    $response = [];
    if ($query) {
        while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            $response[] = [
                'kategori' => $row['kategori'],
                'status' => $row['status_bebas_tanggungan'],
                'catatan' => $row['catatan'],
            ];
        }
    }

    echo json_encode($response);
}
?>
