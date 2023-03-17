<?php

include '../config/app.php';

$id_kamar = (int)$_GET['no_kamar'];
if (delete_kamar($id_kamar) > 0) {
  echo "<script>
    alert('Data kamar berhasil di hapus');
    document.location.href = 'data_kamar.php';
     </script>";
} else {
  echo "<script>
    alert('data kamar tidak berhasil di hapus);
    document.location.href = 'data_kamar.php';
     </script>";
}

function delete_kamar($id_kamar)
{
    global $conn;


    $query = "DELETE FROM data_kamar WHERE no_kamar = $id_kamar";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
<?php
