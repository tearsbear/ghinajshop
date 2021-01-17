<?php 
require('../function/connect.php');
require('../function/periksa.php');
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
          <h1 class="nunito-bold text-capitalize">Daftar Pesanan 🛍</h1>
          <p style="font-size:20px; font-weight: 300;"><?php echo date('d F Y'); ?></p>

      </div>
    </div>
    
    <div class="container mt-5">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Pembeli</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nw = mysqli_query($conn, "SELECT pesanan.*,produk.* FROM pesanan JOIN produk ON pesanan.id_produk = produk.id_produk ORDER BY pesanan.id_pesan DESC");
                if(mysqli_num_rows($nw)) {
                while ($rows = mysqli_fetch_assoc($nw)) {
                    $ipn = $rows['id_pesan'];
                    $jdn = $rows['name'];
                    $hrg= $rows['harga'];
                    $pem = $rows['nama'];
                    $mail = $rows['email'];
                    $alm = $rows['alamat'];
                    $dt = $rows['dates'];
            ?>
            <tr>
            <th><?php echo $ipn; ?></th>
            <td><?php echo $jdn; ?></td>
            <td><?php echo "Rp. " . number_format($hrg, 0, ".", "."); ?></td>
            <td><?php echo $pem; ?></td>
            <td><?php echo $mail; ?></td>
            <td><?php echo $alm; ?></td>
            <td><?php echo $dt; ?></td>
            </tr>

            <?php }
            } else {
                echo 'Belum ada pesanan';
            } ?>

        </tbody>
        </table>
    </div>

      <br>
      <br>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>