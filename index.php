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
  <body style="background-color: #f7f7f7;">
       <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-transparent" style="z-index: 2;">
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


      <div class="container" style="position: relative; z-index: 9; margin-top: 20px;">
       <p class="text-dark nunito-regular" style="font-size: 25px;">Welcome Back 👋</p>
       <h1 class="color1 nunito-bold" style="font-size: 80px; margin-top: -15px;">Happy <br> Shopping!</h1>
      </div>

      <div class="row row-cats" style="margin-top: 35px;">
           <div class="col-lg-1">
            <center>
                <a href="produk.php?category=ladies" class="text-dark cats">
                    <div class="card bg-ladies shadow-sm bg-cats" style="width: 18rem; border-color: pink;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">👱🏻‍♀️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Ladies</p>
                        </div>
                    </div>
                </a>
            </center>
           </div>
           <div class="col-lg-1" style="margin-left: 170px;">
            <center>
                <a href="produk.php?category=men" class="text-dark cats">
                    <div class="card bg-men shadow-sm bg-cats" style="width: 18rem; border-color: #5fafbb;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">👱🏻‍♂️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Men</p>
                        </div>
                    </div>
                </a>
            </center>
           </div>
           <div class="col-lg-1" style="margin-left: 170px;">
            <center>
                <a href="produk.php?category=hijab" class="text-dark cats">
                    <div class="card bg-hijab shadow-sm bg-cats" style="width: 18rem; border-color: #f17d7d;">
                        <div class="card-body">
                            <!-- <img src="img/icon5.png" alt=""> -->
                            <h1 style="font-size: 162px;">🧕🏻</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Hijab</p>
                        </div>
                    </div>
                </a>
            </center>
           </div>
           <div class="col-lg-1" style="margin-left: 170px;">
            <center>
                <a href="produk.php?category=aksesoris" class="text-dark cats">
                    <div class="card bg-acs shadow-sm bg-cats" style="width: 18rem; border-color: #f7f773;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">⌚️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Accessories</p>
                        </div>
                    </div>
                </a>
            </center>
           </div>
           <div class="col-lg-1" style="margin-left: 170px;">
            <center>
                <a href="produk.php?category=sport" class="text-dark cats">
                    <div class="card bg-sport shadow-sm bg-cats" style="width: 18rem; border-color: #89c1ff;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">🚴🏻‍♂️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Sports</p>
                        </div>
                    </div>
                </a>
            </center>
           </div>
       </div>

       
       <div class="float-right bg-cover" style="margin-top: -595px;">
        <img src="img/covers.png" width="500" alt="" srcset="">
       </div>

    <div class="bg-cat-mob" style="display: none;">
        <div class="row">
            <div class="col-6">
             <center>
                <a href="produk.php?category=ladies" class="text-dark cats">
                    <div class="card bg-ladies shadow-sm bg-cats" style="border-color: pink;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">👱🏻‍♀️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Ladies</p>
                        </div>
                    </div>
                </a>
            </center>
            </div>
            <div class="col-6">
             <center>
                <a href="produk.php?category=men" class="text-dark cats">
                    <div class="card bg-men shadow-sm bg-cats" style="border-color: #5fafbb;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">👱🏻‍♂️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Men</p>
                        </div>
                    </div>
                </a>
            </center>
            </div>
            <div class="col-6">
                <br>
             <center>
                <a href="produk.php?category=men" class="text-dark cats">
                    <div class="card bg-hijab shadow-sm bg-cats" style="border-color: #f17d7d;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">🧕🏻</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Hijab</p>
                        </div>
                    </div>
                </a>
            </center>
            </div>
            <div class="col-6">
                <br>
             <center>
                <a href="produk.php?category=men" class="text-dark cats">
                    <div class="card bg-acs shadow-sm bg-cats" style="border-color: #f7f773;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">⌚️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Accessories</p>
                        </div>
                    </div>
                </a>
            </center>
            </div>
            <div class="col-6">
                <br>
             <center>
                <a href="produk.php?category=men" class="text-dark cats">
                    <div class="card bg-sport shadow-sm bg-cats" style="border-color: #89c1ff;">
                        <div class="card-body">
                            <h1 style="font-size: 162px;">🚴🏻‍♂️</h1>
                            <p class="nunito-bold" style="font-size: 20px;">Sports</p>
                        </div>
                    </div>
                </a>
            </center>
            </div>
        </div>
    </div>   
        
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>