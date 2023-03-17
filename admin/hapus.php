<?php include '../config/app.php';

$no_kamar = (int)$_GET['no_kamar'];


if(delete_kamar($no_kamar) > 0){
    echo  "<script>alert('BERHASIL')
    document.location.href = 'data_kamar.php';
    </script>";
} else {
    echo  "<script>alert('gagal')
    document.location.href = 'data_kamar.php';
    </script>";
}


function delete_kamar($no_kamar){

    global $conn;

    $query = "DELETE FROM data_kamar WHERE no_kamar = $no_kamar";

    mysqli_query($conn , $query);

    return mysqli_affected_rows($conn);
}

?>