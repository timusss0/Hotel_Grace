<?php
include 'header.php';

// if (!isset($_SESSION['login'])) {
//     echo "<script>alert('Untuk halaman ini harus login dahulu')
//     document.location.href = '../login/login.php';
//     </script>";
// }

$datas_kamar = mysqli_query($conn, "SELECT*FROM data_kamar");
$jumlah_kamar = mysqli_num_rows($datas_kamar);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_kamar ?></h3>

                            <p>Kamar tersedia</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <a href="data_kamar.php" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->


                    <!-- Contacts are loaded here -->

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">


                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php include 'footerr.php'; ?>