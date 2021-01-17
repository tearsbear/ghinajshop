<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";
require('function/connect.php');


$idp = $_GET['id_produk'];
$nw = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$idp'");
while ($rows = mysqli_fetch_assoc($nw)) {
    $jdn = $rows['name'];
    $hrg= $rows['harga'];
}   


if (isset($_POST['buys'])) {
    $nm = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $ads = mysqli_real_escape_string($conn, $_POST['alamat']);
    $dt = date('Y-m-d');

    $to = $email;
      $subj  = 'GHINAJ SHOP | PRODUCT RECEIPT';
      $msg  = '<p>Hi, ' . $nm . '.</p>
      Terimakasih telah membeli produk dari GhiNaj Shop. <br><br>
      Berikut informasi pembelian kamu:<br>
      - Produk: <br>
        ' . $jdn . ' <br><br>
      
      - Harga: <br>
        Rp. ' . $hrg . '<br><br>

      - Alamat: <br>
        ' . $ads . '<br><br>
      Silahkan Transfer sesuai dengan harga yang diinformasikan ke rekening: <br>
      BCA - 60968293 <br>
      Atas nama: Dwiki Arliansyah  <br><br>
      Terimakasih!<br>
      #HappyShopping  
      ';

      $mail = new PHPMailer;

      //Enable SMTP debugging. 
      $mail->SMTPDebug = false;
      //Set PHPMailer to use SMTP.
      $mail->isSMTP();
      //Set SMTP host name                          
      $mail->Host = "tls://smtp.gmail.com"; //host mail server
      //Set this to true if SMTP host requires authentication to send email
      $mail->SMTPAuth = true;
      //Provide username and password     
      $mail->Username = "ghinajshop@gmail.com";   //nama-email smtp          
      $mail->Password = "dwiki2021";           //password email smtp
      //If SMTP requires TLS encryption then set it
      $mail->SMTPSecure = "tls";
      //Set TCP port to connect to 
      $mail->Port = 587;

      $mail->From = "ghinajshop@gmail.com"; //email pengirim
      $mail->FromName = "GHINAJ SHOP"; //nama pengirim

      $mail->addAddress($to, $nm); //email penerima
      $mail->isHTML(true);
      $mail->Subject = $subj; //subject
      $mail->Body    = $msg; //isi email
       
        if ($mail->send()) {
            $q = mysqli_query($conn, "INSERT INTO pesanan(id_produk, nama, email, alamat, dates) VALUES('$idp', '$nm', '$email', '$ads', '$dt')");
            if($q) {
                echo '<script>alert("Success! Please check your email"); window.location="index.php"</script>';
            } else {
                echo '<script>alert("Failed to buy product!"); window.location="buy.php"</script>';
            }
        } else {
            echo '<script>alert("Failed to send email!"); window.location="buy.php"</script>';
        }
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
                <?php
                    $nws = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$idp'");
                    if(mysqli_num_rows($nws) > 0) {
                    while ($row = mysqli_fetch_assoc($nws)) {
                      $idn = $row['id_produk'];
                      $jd = $row['name'];
                      $img = $row['gambar'];
                      $hr = $row['harga'];
                      $cat = $row['kategori'];

                      $fil = "upload/produk/" . $img;

                      if (file_exists($fil) && $img) {
                        $gambr = "upload/produk/" . $img;
                      }
                    ?>

                    <div class="card mb-3" style="max-width: 540px; height: 200px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?php echo $gambr; ?>" height="200" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body mt-5">
                            <h5 class="card-title"><?php echo $jd; ?></h5>
                            <p class="card-text"><?php echo "Rp. " . number_format($hr, 0, ".", "."); ?></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <br>

                    <?php } ?>

                    <?php } else {
                        echo '<p>Product not found</p>';
                    } ?>


                    <h1 class="nunito-bold" style="margin-top: -10px;">Buy Product</h1>

                    <form class="nunito-regular mt-3" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input name="nama" placeholder="your name" type="text" class="form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" placeholder="your email" type="email" class="form-control" id="exampleInputEmail1" required>
                    </div>

                    <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <textarea name="alamat" placeholder="your address" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                    <button type="submit" name="buys" class="btn bg-color1 text-white">Buy</button>
                    </form>
    </div>

    <br>
    <br>

        
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>