<?php
session_start();

date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['adminame']) && !isset($_COOKIE["adminame"])) {
  header("location: login.php");
} else if (!isset($_SESSION['adminame']) && isset($_COOKIE["adminame"])) {
  $_SESSION["id_admin"] = $_COOKIE["admid"];
  $_SESSION["adminame"] = $_COOKIE["adminame"];
} else {

  $from = $_SESSION['id_admin'];
  $getTime = date('Y-m-d H:i');
  $update = mysqli_query($conn, "UPDATE admin SET online='$getTime' WHERE id_user='$from'");
}
?>