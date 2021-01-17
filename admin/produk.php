<?php 
require('../function/connect.php');
require('../function/periksa.php');

//COUNT PRODUCT
  $sqls = mysqli_query($conn, "SELECT COUNT(*) FROM produk");
  $totalProduk = mysqli_fetch_array($sqls);

 //ADD PRODUCT
  if (isset($_POST['add'])) {
    $jd = mysqli_escape_string($conn, $_POST['name']);
    $har = $_POST['harga'];
    $kat = $_POST['kategori'];
    $res = $_FILES['gambar']['name'];
    $tmps = $_FILES['gambar']['tmp_name'];

    $temp = explode(".", $_FILES["gambar"]["name"]);
    $new = round(microtime(true)) . '.' . end($temp);

    $paths = "../upload/produk/" . $new;
    $path = "../upload/produk";

    if (!empty($res) && !is_dir($path)) {
      mkdir("../upload/produk", 0777);
    }

      if (move_uploaded_file($tmps, $paths)) {
        $sql = mysqli_query($conn, "INSERT INTO produk(name, gambar, harga, kategori) VALUES('$jd', '$new', '$har', '$kat')");
        if($sql) {
            echo '<script>alert("Success!"); window.location="produk.php"</script>';
        } else {
            echo '<script>alert("Failed to add product!"); window.location="produk.php"</script>';
        }
      } else {
        echo '<script>alert("Failed to upload image!"); window.location="produk.php"</script>';
      }
  }


//DELETE PRODUK
  if (isset($_POST['del'])) {
    $idn = $_POST['id_produk'];

    $nws = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$idn'");
    while ($row = mysqli_fetch_assoc($nws)) {
      $img = $row['gambar'];

      $fil = "../upload/produk/" . $img;

      if (file_exists($fil) && $img) {
        unlink($fil);
      }
    }

    $not = mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$idn'");
  }  
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
            <a class="navbar-brand nunito-bold color1" href="#">GhiNaj Shop</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color1" href="produk.php">Produk</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesanan.php">Pesanan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="video.php">Video</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berita.php">Berita</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="bg-color headers" style="height: 200px">
    <br>
      <div class="container mt-3">
          <h1 class="nunito-bold text-capitalize">Kelola Produk 🛍</h1>
          <p style="font-size:20px; font-weight: 300;"><?php echo date('d F Y'); ?></p>

          <div class="float-right card-income" style="margin-top: -100px;">
               <div class="card bg-color" style="width: 300px; border: 2px solid #00cba9; border-radius: 10px;">
                <div class="card-body color1">
                   <p style="font-size:17px; font-weight: 300;">Total Produk</p>
                   <h2 class="nunito-regular"><?php echo $totalProduk[0]; ?> items</h2>
                </div>
              </div>
          </div> 
      </div>
    </div>

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">List</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Create</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row mt-3">
                <?php
                    $nws = mysqli_query($conn, "SELECT * FROM produk ORDER BY name ASC");
                    if(mysqli_num_rows($nws) > 0) {
                    while ($row = mysqli_fetch_assoc($nws)) {
                      $idn = $row['id_produk'];
                      $jd = $row['name'];
                      $img = $row['gambar'];
                      $hr = $row['harga'];
                      $cat = $row['kategori'];

                      $fil = "../upload/produk/" . $img;

                      if (file_exists($fil) && $img) {
                        $gambr = "../upload/produk/" . $img;
                      }
                    ?>
                    <div class="col-lg-4">
                    <div class="card">
                        <img src="<?php echo $gambr; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title nunito-bold"><?php echo $jd; ?></h5>
                            <p class="card-text text-muted text-uppercase"><?php echo $cat; ?></p>
                            <a href="#" class="btn color1" style="border: 2px solid #00cba9;"><?php echo "Rp. " . number_format($hr, 0, ".", "."); ?></a>
                            <a href="#" id="<?php echo $idn; ?>" class="btn bg-danger text-white delete">Delete</a>
                        </div>
                    </div>
                    <br>
                    </div>

                    <?php } ?>
                    </div>

                    <?php } else {
                        echo '<p>Belum ada produk</p>';
                    } ?>

            </div>


            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                  <h3 class="nunito-bold">Tambah produk baru</h3>
                  <br>
                   <form class="nunito-regular" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="name" type="text" placeholder="nama produk" class="form-control" id="exampleInputEmail1" required>
                        </div>

                        <label for="exampleInputEmail1">Gambar Produk</label>
                        <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" accept="image/*" name="gambar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input name="harga" type="number" placeholder="harga produk" class="form-control" id="exampleInputPassword1" required>
                        </div>


                        <label for="exampleInputEmail1">Kategori Produk</label>
                        <div class="input-group mb-3">
                            <select name="kategori" class="custom-select" id="inputGroupSelect02" required>
                                <option selected>Choose...</option>
                                <option value="men">Men</option>
                                <option value="ladies">Ladies</option>
                                <option value="kids">Kids</option>
                                <option value="hijab">Hijab</option>
                                <option value="sport">Sport</option>
                                <option value="aksesoris">Akesoris</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>
                        <button type="submit" name="add" class="btn bg-color1 text-white">Submit</button>
                   </form>
            </div>
        </div>
    </div>
    

      <br>
      <br>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>
      $(document).ready(function() {

         $('.delete').on('click', function() {
          if (confirm('Delete this?')) {
            var id = $(this).attr('id');
            $.ajax({
              url: 'produk.php',
              type: 'POST',
              async: false,
              data: {
                'del': 1,
                'id_produk': id
              },
              success: function() {
                window.location.reload()
              }
            });
          } else {
            return false;
          }
        });

      });
    </script>  
  </body>
</html>