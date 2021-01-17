<?php 
require('../function/connect.php');
require('../function/periksa.php');

$me = $_SESSION['id_admin'];

$q = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin='$me'");
while ($row = mysqli_fetch_assoc($q)) {
  $user = $row['username'];
  $pass = $row['password'];
}

//EDIT ADMIN
if (isset($_POST['edit'])) {
  $mes = $_SESSION['id_admin'];

  $usr = mysqli_escape_string($conn, $_POST['username']);
  $ps = mysqli_escape_string($conn, $_POST['password']);

  $sql = mysqli_query($conn, "UPDATE admin SET username='$usr', password='$ps' WHERE id_admin='$mes'");

  if ($sql) {
    $_SESSION['adminame'] = $usr;
    echo '<script>alert("Success"); window.location="settings.php"</script>';
  } else {
    echo '<script>("Failed"); window.location="settings.php"</script>';
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
          <h1 class="nunito-bold text-capitalize">Edit <?php echo $_SESSION['adminame']; ?> 🧑‍💻</h1>
          <p style="font-size:20px; font-weight: 300;"><?php echo date('d F Y'); ?></p>

      </div>
    </div>
    
    <div class="container mt-5">
        <form class="nunito-regular" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input name="username" type="text" value="<?php echo $user; ?>" class="form-control" id="exampleInputEmail1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="text" value="<?php echo $pass; ?>" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" name="edit" class="btn bg-color1 text-white">Submit</button>
        </form>
    </div>

      <br>
      <br>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>