<?php
session_start();
session_destroy();

if(isset($_COOKIE["admid"]) && isset($_COOKIE["adminame"])){
		setcookie("admid", '', time() - (3600));
		setcookie("adminame", '', time() - (3600));
	}
	
header("location: login.php");
?>