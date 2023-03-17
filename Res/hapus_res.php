<?php
include '../config/app.php';

var_dump('id_pesanan');

$id_pesan = (int)$_GET['id_pesanan'];
if (delete_r($id_pesan > 0)) {
    echo "<script>
    alert('Data pesanan berhasil di hapus');
    document.location.href = 'res.php';
    </script>";
} else {
    echo "<script>
    alert('data pesanan tidak berhasil di hapus);
    document.location.href = 'res.php';
     </script>";
}


function delete_r($id_pesan)
{
    global $conn;

    // $bukti = SELECT("SELECT * FROM pesan WHERE id_pesanan =  $id_pesan")[0];
    // unlink("assets/img/" . $bukti['bukti']);

    $query = "DELETE FROM pesan WHERE id_pesanan = $id_pesan";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
