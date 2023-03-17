<?php

include 'config/app.php';
$data_pesan = SELECT("SELECT * FROM pesan");


if (isset($_POST['tambah'])) {
  if (create_bukti($_POST) > 0) {
    echo "<script>alert('BERHASIL')
       document.location.href = 'pembayarann.php';
        </script>";
  } else {
    echo "<script>alert('GAGAL')
        document.location.href = 'pembayarann.php';
        </script>";
  }
}

function create_bukti($post)
{
  global $conn;

  $id_pesan = $post['id_pesan'];
  $bukti = upload_file();
  $fotoLama = $post['fotoLama'];

  if ($_FILES['bukti']['error'] == 4) {
    $bukti = $fotoLama;
  } else {
    $bukti = upload_file();
  }
  $query = "UPDATE pesan SET bukti = '$bukti' WHERE id_pesanan = '$id_pesan' ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload_file()
{
  $namaFile   = $_FILES['bukti']['name'];
  $ukuranFile = $_FILES['bukti']['size'];
  $error      = $_FILES['bukti']['error'];
  $tmpName    = $_FILES['bukti']['tmp_name'];



  $extensifileValid   = ['jpg', 'jpeg', 'png'];
  $extensifile        = explode('.', $namaFile);
  $extensifile        = strtolower(end($extensifile));


  if (!in_array($extensifile, $extensifileValid)) {

    echo "<script>
                alert('Format File Tidak Valid');

            </script>";
    die();
  }


  if ($ukuranFile > 2048000) {
    echo "<script>
                alert('Ukuran File Max 2 MB');

            </script>";
    die();
  }



  move_uploaded_file($tmpName, 'Res/img/' . $namaFile);
  return $namaFile;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hotel Bahagia</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet" />

  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css" />
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />


  <!-- Theme style -->
  <link rel="stylesheet" href="Admin/assets//dist/css/adminlte.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="Admin/Admin/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- DataTables -->
  <link rel="stylesheet" href="Admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="Admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="Admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <style>
    #modal .modal-img {
      width: 100%;
    }
  </style>


  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header role="banner">
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.html">Hotel Bahagia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
          <li class="nav-item">
            <a class="nav-link" href="user.php">Tentang kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  </header>
  <!-- END header -->

  <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/Hotel-Bintang-7.jpg)">
    <div class="container">
      <div class="row align-items-center site-hero-inner justify-content-center">
        <div class="col-md-12 text-center">
          <div class="mb-5 element-animate">
            <h1>Pembayaran</h1>
            <p>Silahkan Upload foto bukti pembayaran</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 py-4">
            <h1>Pesanan</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Tamu</th>
                    <th>Tanggal Cek In</th>
                    <th>Tanggal Cek out</th>
                    <th>Nomer Handphone</th>
                    <th>Bukti Transaksi</th>
                    <th>Status</th>
                    <th>Kirim Bukti Transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_pesan as $pesan) : ?>
                    <tr>
                      <td><?= $pesan['nama_tamu'] ?></td>
                      <td><?= $pesan['tanggal_ci'] ?></td>
                      <td><?= $pesan['tanggal_co'] ?></td>
                      <td><?= $pesan['no_hp'] ?></td>

                      <td>
                        <img src="Res/img/<?= $pesan['bukti']; ?>" data-toggle="modal" data-target="#modal" style="width: 100px;">
                      </td>
                      <td>
                        <?php if ($pesan['status'] == 1) { ?>
                          <span class="badge bg-warning">Belum Di konfirmasi</span>
                        <?php } else { ?>
                          <span class="badge bg-primary">Sudah Di konfirmasi</span>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($pesan['status'] == 1) { ?>
                          <span class="btn btn-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Kirim</span>
                        <?php } else { ?>
                          <span class="btn btn-suscces">Sukses</span>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

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
                      <img src="Res/img/<?= $pesan['bukti']; ?>" class="modal-img">
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

              <?php foreach ($data_pesan as $pesan) : ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="id_pesan" value="<?= $pesan['id_pesanan'] ?>">
                          <input type="hidden" name="fotoLama" value="<?= $pesan['bukti']; ?>">
                          <div class="mb-2">
                            <label for="">Id pesan</label>
                            <input type="text" name="id" value="<?= $pesan['id_pesanan'] ?>" readonly class="form-control">
                          </div>
                          <div class="mb-2">
                            <input type="file" name="bukti" class="form-control">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Upload</button>
                      </div>
                      </form>
                    </div>

                  </div>
                </div>
            </div>
          <?php endforeach; ?>


          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->



  <footer class="site-footer">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-3">
          <h3>Nomer Handphone : </h3>
          <p>Melayani 24 jam</p>
          <p class="lead"><a href="tel://">021 986 676 876</a></p>
        </div>
        <div class="col-6">
          <h3>Email : </h3>
          <p>Hotelbahagia@gmail.com</p>
          <p class="lead"><a href="tel://">Hotelbahagia@gmail.com</a></p>
        </div>

        </form>
      </div>
    </div>
    <div class="row justify-content-center py-5">
      <div class="col-md-7 text-center">
        &copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script> Penuh kehormatan dan kasih sayang <i class="fa fa-heart-o" aria-hidden="true"></i> dari <a href="" target=>Hotel bahagia</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </div>
    </div>
    </div>
  </footer>




  <!-- loader -->
  <div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" />
    </svg>
  </div>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>

  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/magnific-popup-options.js"></script>

  <script src="js/main.js"></script>


  <!-- DataTables  & Plugins -->
  <script src="Admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="Admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="Admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="Admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="Admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="Admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="Admin/assets/plugins/jszip/jszip.min.js"></script>
  <script src="Admin/assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="Admin/assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="Admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="Admin/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="Admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="Admin/assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- Page specific script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('#example2').DataTable();
    });
  </script>
</body>

</html>