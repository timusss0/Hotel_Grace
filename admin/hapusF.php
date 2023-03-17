<?php

include '../config/app.php';

$no_kamar = (int)$_GET['no_kamar'];
if (delete_f($no_kamar) > 0) {
    echo "<script>
    alert('Data fasilitas berhasil di hapus');
    document.location.href = 'fasilitas_kamar.php';
     </script>";
} else {
    echo "<script>
    alert('data fasitas tidak berhasil di hapus);
    document.location.href = 'fasilitas_kamar.php';
     </script>";
}

//fungsi hapus
function delete_f($no_kamar)
{

    global $conn;
    //query hapus data
    $query = "DELETE FROM fasilitas_kamar WHERE no_kamar = $no_kamar";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>