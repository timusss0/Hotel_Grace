<?php include 'config/app.php';

if (isset($_POST['pesan'])) {
  if (create_pesan($_POST) > 0) {
    echo "<script>alert('Berhasil di pesan')
    document.location.href = 'pembayarann.php';
    </script>";
  } else {
    echo "<script>alert('Gagal di pesan')
    document.location.href = 'user.php';
    </script>";
  }
}

function create_pesan($post)
{
  global $conn;

  $check_in = $post['check_in'];
  $check_out = $post['check_out'];
  $jumlah_kamar = $post['jumlah_kamar'];
  $nama_pemesanan = $post['nama_pemesanan'];
  $email = $post['email'];
  $no_hp = $post['no_hp'];
  $nama_tamu = $post['nama_tamu'];
  $tipe = $post['Tipe'];

  $query = "INSERT INTO pesan VALUES (null, '$check_in' , ' $check_out' , '$jumlah_kamar' , '$nama_pemesanan' , '$email' , ' $no_hp ' , '$nama_tamu', '$tipe' , '1' , '1')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
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

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
          <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#tentang">Tentang kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kamar">Kamar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pembayarann.php">Pembayaran</a>
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
            <h1>Selamat Datang Di Web Hotel Bahagia</h1>
            <p>Tempatnya Healing.</p>
            <p><a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pesan</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <!-- Modal -->
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
          <form action="" method="post">
            <div class="mb-2">
              <label for="">Tanggal check in</label>
              <input type="date" class="form-control" name="check_in" required />
            </div>
            <div class="mb-2">
              <label for="">Tanggal check out</label>
              <input type="date" class="form-control" name="check_out" required/>
            </div>
            <div class="mb-2">
              <label for="">Jumlah kamar</label>
              <input type="number" class="form-control" name="jumlah_kamar" required  />
            </div>
            <div class="mb-2">
              <label for="">Nama Pemesan</label>
              <input type="text" class="form-control" name="nama_pemesanan"required />
            </div>
            <div class="mb-2">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" required/>
            </div>
            <div class="mb-2">
              <label for="">No Handphone</label>
              <input type="number" class="form-control" name="no_hp"required />
            </div>
            <div class="mb-2">
              <label for="">Nama tamu</label>
              <input type="text" class="form-control" name="nama_tamu" required/>
            </div>
            <div class="mb-2">
              <label for="Tipe">Tipe kamar</label>
              <select id="Tipe" class="form-control" name="Tipe" required>
                <option selected>Pilih Tipe</option>
                <option value="Superior">Tipe Superior</option>
                <option value="Delaxe">Tipe Delaxe</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="pesan" class="btn btn-primary">Pesan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <section class="site-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <div class="heading-wrap text-center element-animate">

            <h2 class="heading">Tentang Kami</h2>
            <p class="mb-5">
              Kami Di bangun pada tahun 2017 , kami berdiri di kota bandung , kami sangat ingin menjadi tempat penginapan terbaik anda
            </p>

          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
          <img src="Admin/img_kamar/fasilitas.jpg" alt="Image placeholder" class="img-md-fluid" />
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 heading-wrap text-center">
          <h4 class="sub-heading">Kamar </h4>
          <h2 class="heading" id="kamar">Kamar hotel kami</h2>
        </div>
      </div>
      <section class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="media d-block room mb-0">
                <figure>
                  <img src="Admin/img_kamar/kamar3.jpg" alt="Generic placeholder image" class="img-fluid">
                  <div class="overlap-text">
                    <span>
                      Tipe Superior
                      <span class="ion-ios-star"></span>
                      <span class="ion-ios-star"></span>
                      <span class="ion-ios-star"></span>
                    </span>
                  </div>
                </figure>
                <div class="media-body">
                  <h3 class="mt-0"><a href="#">Tipe Superior</a></h3>

                  <p>Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla. </p>

                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="media d-block room mb-0">
                <figure>
                  <img src="Admin/img_kamar/suite.jpg" alt="Generic placeholder image" class="img-fluid">
                  <div class="overlap-text">
                    <span>
                      Tipe Delaxe
                      <span class="ion-ios-star"></span>
                      <span class="ion-ios-star"></span>
                      <span class="ion-ios-star"></span>
                    </span>
                  </div>
                </figure>
                <div class="media-body">
                  <h3 class="mt-0"><a href="#">Tipe Superior</a></h3>

                  <p>Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla. </p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </section>

  <footer class="site-footer">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-3">
          <h3>Nomer Handphone : </h3>
          <p>Melayani 24 jam</p>
          <p class="lead"><a href="tel://">021 986 676 876</a></p>
        </div>
        <div class="">
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
</body>

</html>