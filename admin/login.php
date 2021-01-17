<?php 
require('../function/connect.php');
session_start();
if (isset($_SESSION['admin']) && isset($_COOKIE["adminame"])) {
  header("Location: index.php?id_admin=" . $_SESSION['adminame']);
}


if (isset($_POST['submit'])) {

  $user = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);

  $query = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";

  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["id_admin"] = $row["id_admin"];
    $_SESSION["adminame"] = $row["username"];

    //set up cookie
    setcookie("admid", $row['id_admin'], time() + 7776000);
    setcookie("adminame", $row['username'], time() + 7776000);

    header("Location: index.php?id_admin=" . $_SESSION['id_admin']);
  } else {
    echo "<script>alert('Username Or Password is wrong!'); window.location='login.php'</script>";
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
    <title>GhiNaj</title>
    <style>
     @media only screen and (max-width: 600px) {
        .forms, .waves {
          margin-top: 0px !important;
        }
      }
    </style>
  </head>
  <body>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-color">
        <div class="container">
            <a class="navbar-brand nunito-bold color1" href="../index.php">GhiNaj Shop</a>
        </div>
    </nav>

    <div class="bg-color" style="width: 100%; height: auto;">
        <br>
        <div class="container mt-3">
            <h3 class="nunito-bold">Welcome Back 👋 </h3>
            <h2 class="nunito-light">Login to your admin account</h2>
        </div>
        <br>
    </div>
    <img src="../img/wave.svg" class="waves" style="margin-top: -30px;" alt="">

    <div class="container forms" style="margin-top: -180px; position: relative; z-index: 999">
        <form class="nunito-regular" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <button type="submit" name="submit" class="btn bg-color1 text-white">Submit</button>
        </form>
    
    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>