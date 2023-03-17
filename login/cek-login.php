<?php
include '../config/app.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['login'] = $_POST['login'];
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['id_level'] == 1) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = '1';
            header("location:../Admin/admin.php");
        } elseif ($row['id_level'] == 2) {
            header('location:../Res/res.php');
        } elseif ($row['id_level'] == 3) {
            header('location:../user.php');
        } else {
            echo "<script>alert('anda tidak memiliki hak akses')
          document.location='login.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf login gagal, username dan password anda salah.!!')
    document.location='login.php'</script>";
    }
}


// if (isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $_SESSION['login'] = $_POST['login'];

//     $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
//     $cek = mysqli_num_rows($query);

//     if ($cek > 0) {
//         $result = mysqli_fetch_assoc($query);
//         if ($result['id_level'] == '1') {
//             $_SESSION['username'] = $result['username'];
//             $_SESSION['id_level'] = 'admin';
//             echo "<script>alert('Login Berhasil'); location.href = '../admin/admin.php';</script>";
//         } else if ($result['id_level'] == '2') {
//             $_SESSION['username'] = $result['username'];
//             $_SESSION['id_level'] = 'r';
//             echo "<script>alert('Login Berhasil'); location.href = '../res/res.php';</script>";
//         } else if ($result['id_level'] == '3') {
//             $_SESSION['username'] = $result['username'];
//             $_SESSION['id_level'] = 'user';
//             echo "<script>alert('Login Berhasil'); location.href = '../user.php';</script>";
//         } else {
//             echo "<script>alert('Anda Tidak Punya Hak Akses'); location.href = 'login.php';</script>";
//         }
//     } else {
//         echo "<script>alert('Password & username salah'); location.href = 'login.php';</script>";
//     }
// }
