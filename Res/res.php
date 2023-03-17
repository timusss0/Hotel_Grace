<?php include 'header.php';
$pesan_kamar = SELECT("SELECT * FROM pesan");

if (isset($_POST['konfirmasi'])) {
    if (update_kf($_POST) > 0) {
        echo "<script>
    alert('pesanan Berhasil di konfirmasi');
    document.location.href = 'res.php';
        </script>";
    } else {
        echo "<script>
        alert('pesanan gagal di konfirmasi');
        document.location.href = 'res.php';
            </script>";
    }
}



if (isset($_POST['batal'])) {
    if (update_kf($_POST) > 0) {
        echo "<script>
    alert('konfirmasi berhasil di batalkan ');
    document.location.href = 'res.php';
        </script>";
    } else {
        echo "<script>
        alert('konfirmasi gagal di batalkan ');
        document.location.href = 'res.php';
            </script>";
    }
}


function update_kf($post)
{
    global $conn;

    $id_pesan = $post['id_pesan'];
    $status = $post['status'];

    $query = "UPDATE pesan SET status = '$status'  WHERE id_pesanan = '$id_pesan' ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



if (isset($_POST['ubah'])) {
    if (create_ubah($_POST) > 0) {
        echo "<script>alert('Berhasil di Ubah')
      document.location.href = 'data_kamar.php';
      </script>";
    } else {
        echo "<script>alert('Gagal di Ubah')
      document.location.href = 'data_kamar.php';
      </script>";
    }
}

function create_ubah($post)
{
    global $conn;

    $no_kamar = $post['no_kamar'];
    $tipe_kamar = $post['Tipe'];
    $harga = $post['harga'];
    $lantai = $post['lantai'];
    $max_dewasa = $post['max_dewasa'];
    $max_anak = $post['max_anak'];

    $query = "UPDATE data_kamar SET tipe_kamar = '$tipe_kamar' , harga = '$harga' , lantai_kamar ='$lantai' , max_dewasa = ' $max_dewasa' , max_anak = '$max_anak' WHERE no_kamar = '$no_kamar'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Resepsionis</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="container-fluid">
                    <section class="content">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data kamar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Tamu</th>
                                                    <th>Tanggal check in</th>
                                                    <th>Tanggal check out</th>
                                                    <th>Jumlah kamar</th>
                                                    <th>Email</th>
                                                    <th>Tipe kamar</th>
                                                    <th>Bukti</th>
                                                    <th>status</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($pesan_kamar as $pesan) : ?>
                                                    <tr>
                                                        <td> <?= $pesan['nama_tamu']; ?></td>
                                                        <td> <?= $pesan['tanggal_ci']; ?></td>
                                                        <td> <?= $pesan['tanggal_co']; ?></td>
                                                        <td> <?= $pesan['jumlah_kmr']; ?></td>
                                                        <td> <?= $pesan['email']; ?></td>
                                                        <td> <?= $pesan['tipe_kamar']; ?></td>


                                                        <td>
                                                            <img src="img/<?= $pesan['bukti']; ?>" data-toggle="modal" data-target="#modal" style="width: 100px;">
                                                        </td>

                                                        <td>
                                                            <?php if ($pesan['status'] == 1) { ?>
                                                                <span class=" badge bg-warning">Belum dikonfirmasi</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-success">Sudah dikonfirmasi</span>
                                                            <?php }

                                                            ?>
                                                        </td>


                                                        <td width="20%" class="text-center">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id_pesan" value="<?= $pesan['id_pesanan'] ?>">
                                                                <?php if ($pesan['status'] == 1) { ?>
                                                                    <input type="hidden" name="status" value="2">
                                                                    <button type="submit" class="btn btn-primary btn-sm" name="konfirmasi">Konfirmasi</button>
                                                                <?php } else { ?>
                                                                    <input type="hidden" name="status" value="1">
                                                                    <button type="submit" class="btn btn-primary btn-sm" name="batal">Btl Knfrmsi</button>
                                                                <?php }

                                                                ?>

                                                                <a href="hapus_res.php?tanggal_ci=<?= $pesan['id_pesanan']; ?>" onclick="alert('Apakah ingin menghapus data pesanan ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- Modal image -->
                                        <div class="modal fade" id="modal">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <!-- <h4 class="modal-title">Detail foto bukti</h4> -->
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="img/<?= $pesan['bukti']; ?>" class="modal-img">
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- Akhir Modal Image -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>







                    <?php include 'footerr.php'; ?>