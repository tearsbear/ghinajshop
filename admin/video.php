<?php 
require('../function/connect.php');
require('../function/periksa.php');

//COUNT VIDEO
  $sqls = mysqli_query($conn, "SELECT COUNT(*) FROM video");
  $totalVideo = mysqli_fetch_array($sqls);

 //ADD VIDEO
  if (isset($_POST['add'])) {
    $url = mysqli_escape_string($conn, $_POST['url']);

        $sql = mysqli_query($conn, "INSERT INTO video(url) VALUES('$url')");
        if($sql) {
            echo '<script>alert("Success!"); window.location="video.php"</script>';
        } else {
            echo '<script>alert("Failed to add news!"); window.location="video.php"</script>';
        }
  }


//DELETE VIDEO
  if (isset($_POST['del'])) {
    $idn = $_POST['id_video'];
    $not = mysqli_query($conn, "DELETE FROM video WHERE id_video='$idn'");
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
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesanan.php">Pesanan</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color1" href="video.php">Video</span></a>
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
          <h1 class="nunito-bold text-capitalize">Kelola Video 🎥</h1>
          <p style="font-size:20px; font-weight: 300;"><?php echo date('d F Y'); ?></p>

          <div class="float-right card-income" style="margin-top: -100px;">
               <div class="card bg-color" style="width: 300px; border: 2px solid #00cba9; border-radius: 10px;">
                <div class="card-body color1">
                   <p style="font-size:17px; font-weight: 300;">Total Video</p>
                   <h2 class="nunito-regular"><?php echo $totalVideo[0]; ?> items</h2>
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
                    $nws = mysqli_query($conn, "SELECT * FROM video ORDER BY id_video ASC");
                    if(mysqli_num_rows($nws) > 0) {
                    while ($row = mysqli_fetch_assoc($nws)) {
                      $idn = $row['id_video'];
                      $url = $row['url'];

                    ?>
                    <div class="col-lg-6">
                    <div class="card" style="height: 500px;">
                        <?php echo $url; ?>
                        <div class="card-body">
                            <a href="#" id="<?php echo $idn; ?>" class="btn bg-danger text-white delete">Delete</a>
                        </div>
                    </div>
                    <br>
                    </div>

                    <?php } ?>
                    </div>

                    <?php } else {
                        echo '<p>Belum ada video</p>';
                    } ?>
               </div>


            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                  <h3 class="nunito-bold">Tambah video baru</h3>
                  <br>
                   <form class="nunito-regular" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputPassword1">iFRAME Code from YouTube</label>
                            <textarea name="url" placeholder='<iframe width="100%" height="100%" src="https://www.youtube.com/embed/BVMsRltq2yU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        <p class="text-danger">width & height harus 100%</p>
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
              url: 'video.php',
              type: 'POST',
              async: false,
              data: {
                'del': 1,
                'id_video': id
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