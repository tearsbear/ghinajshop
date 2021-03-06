<?php 
require('function/connect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>GHINAJ SHOP</title>
    <style>
     .cats:hover {
         color: transparent !important;
         text-decoration: none !important;
     }    
     @media only screen and (max-width: 600px) {
        .row-cats {
            display: none;
        }

        .bg-cover {
            margin-top: 15px !important;
        }

        .bg-cat-mob {
            display: block !important;
        }
      }

     @media only screen and (min-width: 600px) {
        body {
            overflow: hidden;
        }
      }
    </style>
  </head>
  <body>
       <!-- As a link -->
    <nav class="navbar navbar-expand-lg bg-color" style="z-index: 2;">
        <div class="container">
            <a class="navbar-brand nunito-bold color1 text-uppercase" href="#">GhiNaj Shop</a>
             <button class="navbar-toggler bg-color1" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-chevron-down"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto nunito-bold text-uppercase" style="padding: 20px;">
                    <li class="nav-item active">
                        <a class="nav-link color1" href="index.php">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color1" href="promo.php">Promo</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color1" href="berita.php">News</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color1" href="video.php">Video</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color1" href="contact.php">Contact</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

      <div class="container">
          <div class="row mt-3">
                <?php
                    $nws = mysqli_query($conn, "SELECT * FROM berita WHERE category='promo' ORDER BY judul ASC");
                    if(mysqli_num_rows($nws) > 0) {
                    while ($row = mysqli_fetch_assoc($nws)) {
                      $idn = $row['id_berita'];
                      $jd = $row['judul'];
                      $img = $row['gambar'];
                      $isi = $row['isi'];
                      $cat = $row['category'];

                      $fil = "upload/berita/" . $img;

                      if (file_exists($fil) && $img) {
                        $gambr = "upload/berita/" . $img;
                      }
                    ?>
                    <div class="col-lg-4">
                    <div class="card">
                        <img src="<?php echo $gambr; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title nunito-bold"><?php echo $jd; ?></h5>
                            <p class="card-text text-muted text-uppercase"><?php echo $isi; ?></p>
                            <a href="promo-view.php?id_promo=<?php echo $idn; ?>" class="btn btn-primary text-capitalize">View more</a>
                        </div>
                    </div>
                    <br>
                    </div>

                    <?php } ?>
                    </div>

                    <?php } else {
                        echo '<p>Belum ada promo</p>';
                    } ?>

     </div>
      </div>

        
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>