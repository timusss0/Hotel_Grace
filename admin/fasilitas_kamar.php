<?php include 'header.php';


$fasiliitas_kamar = SELECT("SELECT * FROM fasilitas_kamar ORDER BY no_kamar DESC");


// tambah
//cek apakah tombol tambah di tekan
if (isset($_POST['tambah'])) {
    if (create_FK($_POST) > 0) {
        echo "<script>
    alert('Data Fasilitas Berhasil Di tambahkan');
    document.location.href = 'fasilitas_kamar.php';
        </script>";
    } else {
        echo "<script>
    alert('Data Fasilitas Tidak Berhasil Di tambahkan');
    document.location.href = 'fasilitas_kamar.php';
    </script>";
    }
}

function create_FK($post)
{
    global $conn;


    $no_kamar = $post['no_kamar'];
    $nama_fasilitas = $post['nama_fasilitas'];
    $fasilitas = $post['fasilitas'];
    $fasilitas_lain = $post['fasilitas_lain'];


    $query = "INSERT INTO fasilitas_kamar VALUES ('$no_kamar' , '$nama_fasilitas' , '$fasilitas' , '$fasilitas_lain')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



if (isset($_POST['ubah'])) {
    if (update_FK($_POST)) {
        echo "<script>
    alert('Data Fasilitas Berhasil Di ubah');
    document.location.href = 'fasilitas_kamar.php';
        </script>";
    } else {
        echo "<script>
    alert('Data Fasilitas Gagal Di ubah');
    document.location.href = 'fasilitas_kamar.php';
        </script>";
    }
}

function update_FK($post)
{
    global $conn;

    $no_kamar = $post['no_kamar'];
    $nama_fasilitas = $post['nama_fasilitas'];
    $fasilitas = $post['fasilitas'];
    $fasilitas_lain = $post['fasilitas_lain'];

    $query = "UPDATE fasilitas_kamar SET  nama_fasilitas = '$nama_fasilitas' , fasilitas = '$fasilitas' , fasilitas_lain = '$fasilitas_lain' WHERE no_kamar = '$no_kamar'";

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
                    <h1 class="m-0">Data fasilitas Kamar</h1>
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
                                        <h3 class="card-title">Fasilitas kamar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <a href="" class="btn btn-primary mb-1" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i>Tambah</a>
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No kamar</th>
                                                    <th>Nama Fasilitas</th>
                                                    <th>Fasilitas lain</th>
                                                    <th>Fasilitas lain</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($fasiliitas_kamar as $kamar) : ?>

                                                    <td><?= $kamar['no_kamar']; ?></td>
                                                    <td><?= $kamar['nama_fasilitas']; ?></td>
                                                    <td><?= $kamar['fasilitas']; ?></td>
                                                    <td><?= $kamar['fasilitas_lain']; ?></td>
                                                    <td width="30%" class="text-center">

                                                        <a href="fasilitas_kamar.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalubah<?= $kamar['no_kamar']; ?>" class="btn btn-success btn-sm"> Ubah</a>
                                                        <a href="fasilitas_kamar.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalhapus<?= $kamar['no_kamar']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>


                                        <!-- modal tambah-->
                                        <div class="modal fade" id="modaltambah">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h4 class="modal-title">Tambah Data Fasilitas Kamar</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="mb-2">
                                                                <label for="no_kamar" class="form-label">No kamar</label>
                                                                <input type="number" class="form-control" name="no_kamar">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="form-label">Nama Fasilitas</label>
                                                                <input type="text" class="form-control" name="nama_fasilitas" placeholder="Nama fasilitas" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="form-label">Nama Fasilitas lain</label>
                                                                <input type="text" class="form-control" name="fasilitas" placeholder="Nama fasilitas" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="form-label">Nama Fasilitas lain</label>
                                                                <input type="text" class="form-control" name="fasilitas_lain" placeholder="Nama fasilitas" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>





                                        <!-- modal ubah -->
                                        <?php foreach ($fasiliitas_kamar as $kamar) : ?>
                                            <div class="modal fade" id="modalubah<?= $kamar['no_kamar']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h4 class="modal-title">Ubah Kamar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="no_kamar" value="<?= $kamar['no_kamar']; ?>">
                                                                <div class="mb-2">
                                                                    <label class="form-label">No kamar</label>
                                                                    <input type="number" class="form-control" name="no_kamar" value="<?= $kamar['no_kamar']; ?>" placeholder="no kamar" required>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label class="form-label">Nama Fasilitas</label>
                                                                    <input type="text" class="form-control" name="nama_fasilitas" value="<?= $kamar['nama_fasilitas']; ?>" placeholder="Nama fasilitas" required>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label class="form-label">Nama Fasilitas lain</label>
                                                                    <input type="text" class="form-control" name="fasilitas" value="<?= $kamar['fasilitas']; ?>" required>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label class="form-label">Nama Fasilitas lain</label>
                                                                    <input type="text" class="form-control" name="fasilitas_lain" value="<?= $kamar['fasilitas_lain']; ?>" required>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                        <!-- modal hapus -->
                                        <?php foreach ($fasiliitas_kamar as $kamar) : ?>
                                            <div class="modal fade" id="modalhapus<?= $kamar['no_kamar']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title">Hapus data Fasilitas??</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin mengapus data Fasilitas ini???</p>
                                                            <a href="hapusF.php?no_kamar=<?= $kamar['no_kamar'] ?>" type="submit" class="btn btn-primary" style="float: right;">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>







                                    </div>

                                </div>

                    </section>
                    <!-- /.content -->

                </div>

                <!-- /.content-wrapper -->
                <?php include 'footerr.php'; ?>