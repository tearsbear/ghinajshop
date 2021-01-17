<?php 
require('../function/connect.php');
require('../function/periksa.php');

//COUNT INCOME
$sql = mysqli_query($conn, "SELECT pesanan.*, SUM(produk.harga) AS income FROM pesanan JOIN produk ON pesanan.id_produk = produk.id_produk");
$rowz = mysqli_fetch_array($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Ghinaj | Admin</title>
    <style>
     @media only screen and (max-width: 600px) {
        .forms, .waves {
          margin-top: 0px !important;
        }

        .headers {
            height: 330px !important;
        }
        .card-income {
            float: left !important;
            margin-top: 20px !important;
        }

        .card-menu {
            height: auto !important;
        }
      }
    </style>
  </head>
  <body>
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light bg-color">
        <div class="container">
            <a class="navbar-brand nunito-bold color1" href="index.php">GhiNaj Shop</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="bg-color headers" style="height: 200px">
    <br>
      <div class="container mt-3">
          <h1 class="nunito-bold text-capitalize">Hello <?php echo $_SESSION['adminame']; ?> 👋 </h1>
          <p style="font-size:20px; font-weight: 300;"><?php echo date('d F Y'); ?></p>
          <div class="float-right card-income" style="margin-top: -100px;">
               <div class="card bg-color" style="width: 300px; border: 2px solid #00cba9; border-radius: 10px;">
                <div class="card-body color1">
                   <p style="font-size:17px; font-weight: 300;">Current Income</p>
                   <h2 class="nunito-regular"><?php echo "Rp. " . number_format($rowz['income'], 0, ".", "."); ?></h2>
                </div>
              </div>
          </div> 
      </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card bg-color1 card-menu" style="border-color: #00cba9; border-radius: 10px; height: 175px;">
                    <div class="card-body text-white">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="bi bi-shop" style="font-size: 80px;"></i>
                                </div>
                                <div class="col mt-4">
                                    <h2 class="nunito-regular">Kelola Produk</h2>
                                    <a href="produk.php" class="btn bg-color color1" style="width: 100px; border-radius: 20px;">VIEW</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-color1 card-menu" style="border-color: #00cba9; border-radius: 10px; height: 175px;">
                    <div class="card-body text-white">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="bi bi-cart4" style="font-size: 80px;"></i>
                                </div>
                                <div class="col mt-4">
                                    <h2 class="nunito-regular">Lihat Pesanan</h2>
                                    <a href="pesanan.php" class="btn bg-color color1" style="width: 100px; border-radius: 20px;">VIEW</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <br>
                <div class="card bg-color1 card-menu" style="border-color: #00cba9; border-radius: 10px; height: 175px;">
                    <div class="card-body text-white">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="bi bi-newspaper" style="font-size: 80px;"></i>
                                </div>
                                <div class="col mt-4">
                                    <h2 class="nunito-regular">Kelola Berita</h2>
                                    <a href="berita.php" class="btn bg-color color1" style="width: 100px; border-radius: 20px;">VIEW</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <br>
                <div class="card bg-color1 card-menu" style="border-color: #00cba9; border-radius: 10px; height: 175px;">
                    <div class="card-body text-white">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="bi bi-play-circle" style="font-size: 80px;"></i>
                                </div>
                                <div class="col mt-4">
                                    <h2 class="nunito-regular">Kelola Video</h2>
                                    <a href="video.php" class="btn bg-color color1" style="width: 100px; border-radius: 20px;">VIEW</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <br>
      <br>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>