<?php include 'header.php';
$data_kamar = SELECT("SELECT * FROM data_kamar ORDER BY no_kamar DESC");



if (isset($_POST['tambah'])) {
    if (create_tambah($_POST) > 0) {
        echo "<script>alert('Berhasil di tambahkan')
      document.location.href = 'data_kamar.php';
      </script>";
    } else {
        echo "<script>alert('Gagal di tambahkan')
      document.location.href = 'data_kamar.php';
      </script>";
    }
}

function create_tambah($post)
{
    global $conn;

    $no_kamar = $post['no_kamar'];
    $tipe_kamar = $post['Tipe'];
    $harga = $post['harga'];
    $lantai = $post['lantai'];
    $max_dewasa = $post['max_dewasa'];
    $max_anak = $post['max_anak'];

    $query = "INSERT INTO data_kamar VALUES ('$no_kamar' , '$tipe_kamar' , '$harga' , '$lantai' , '$max_dewasa' , '$max_anak')";

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

    $query = "UPDATE data_kamar SET tipe_kamar = '$tipe_kamar' , harga = '$harga' , lantai_kamar ='$lantai' , max_dewasa = '$max_dewasa' , max_anak = '$max_anak' WHERE no_kamar = '$no_kamar'";

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
                    <h1 class="m-0">Data Kamar</h1>
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
                                        <a href="" class="btn btn-primary mb-1" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus"></i>Tambah</a>
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No kamar</th>
                                                    <th>Tipe kamar</th>
                                                    <th>Harga</th>
                                                    <th>Lantai kamar</th>
                                                    <th>Maximal dewasa</th>
                                                    <th>Maximal Anak</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_kamar as $kamar) : ?>

                                                    <td><?= $kamar['no_kamar']; ?></td>
                                                    <td><?= $kamar['tipe_kamar']; ?></td>
                                                    <td><?= $kamar['harga']; ?></td>
                                                    <td><?= $kamar['lantai_kamar']; ?></td>
                                                    <td><?= $kamar['max_dewasa']; ?></td>
                                                    <td><?= $kamar['max_anak']; ?></td>

                                                    <td width="30%" class="text-center">

                                                        <a href="data_kamar.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalubah<?= $kamar['no_kamar']; ?>" class="btn btn-success btn-sm"> Ubah</a>
                                                        <a href="data_kamar.php?no_kamar=<?= $kamar['no_kamar']; ?>" data-toggle="modal" data-target="#modalhapus<?= $kamar['no_kamar']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- Modal -->
                    <div class="modal fade" id="modaltambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title">Tambah Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="mb-2">
                                            <label for="">No kamar</label>
                                            <input type="number" name="no_kamar" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Tipe kamar</label>
                                            <select name="Tipe" id="" class="form-control">
                                                <option>Pilih Tipe</option>
                                                <option value="Superior">Tipe Superior</option>
                                                <option value="Delaxe">Tipe Delaxe</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Harga</label>
                                            <input type="number" name="harga" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Lantai Kamar</label>
                                            <input type="number" name="lantai" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Maximal Dewasa</label>
                                            <input type="number" name="max_dewasa" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Maximal Anak anak</label>
                                            <input type="number" name="max_anak" class="form-control">
                                        </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">kembali</button>
                                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <?php foreach ($data_kamar as $kamar) : ?>
                        <div class="modal fade" id="modalubah<?= $kamar['no_kamar'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ubah Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="mb-2">
                                                <label for="">No kamar</label>
                                                <input type="number" value="<?= $kamar['no_kamar'] ?>" name="no_kamar" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">Tipe kamar</label>
                                                <select name="Tipe" id="" class="form-control">
                                                    <option>Pilih Tipe</option>
                                                    <?php $tipe = $kamar['tipe_kamar'] ?>
                                                    <option value="Superior" <?= $tipe == 'Superior' ? 'selected' : null ?>>Tipe Superior</option>
                                                    <option value="Delaxe" <?= $tipe == 'Delaxe' ? 'selected' : null ?>>Tipe Delaxe</option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="">Harga</label>
                                                <input type="number" value="<?= $kamar['harga'] ?>" name="harga" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">Lantai Kamar</label>
                                                <input type="number" name="lantai" value="<?= $kamar['lantai_kamar'] ?>" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">Maximal Dewasa</label>
                                                <input type="number" name="max_dewasa" value="<?= $kamar['max_dewasa'] ?>" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">Maximal Anak anak</label>
                                                <input type="number" name="max_anak" value="<?= $kamar['max_anak'] ?>" class="form-control">
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">kembali</button>
                                        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <?php endforeach; ?>


                    <!-- modal hapus -->
                    <?php foreach ($data_kamar as $kamar) : ?>
                        <div class="modal fade" id="modalhapus<?= $kamar['no_kamar']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h4 class="modal-title">Hapus data kamar?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin mengapus data kamar ini???</p>
                                        <a href="hapus.php?no_kamar=<?= $kamar['no_kamar'] ?>" type="submit" class="btn btn-primary" style="float: right;">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <?php include 'footerr.php'; ?>