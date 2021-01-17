<?php 
require('function/connect.php');

if (isset($_POST['submit'])) {
    echo "<script>alert('Success!'); window.location='contact.php'</script>";
}
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

    <div class="container mt-5">
        <p class="nunito-regular">Dwiki Arliansyah</p>
        <h1 class="nunito-bold" style="margin-top: -10px;">Contact Us</h1>

        <form class="nunito-regular mt-3" method="post">
           <div class="form-group">
               <label for="exampleInputEmail1">Name</label>
               <input name="name" type="text" class="form-control" id="exampleInputEmail1" required>
           </div>
           <div class="form-group">
               <label for="exampleInputEmail1">Email</label>
               <input name="email" type="email" class="form-control" id="exampleInputEmail1" required>
           </div>
           <div class="form-group">
               <label for="exampleInputPassword1">Subject</label>
               <input name="subject" type="text" class="form-control" id="exampleInputPassword1" required>
           </div>

           <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
           <button type="submit" name="submit" class="btn bg-color1 text-white">Submit</button>
        </form>
    </div>

        
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>