<?php 
session_start();
error_reporting(0);
include "koneksi.php";
	if ($_SESSION[login]==''){
		include "masuk/login.php";
	}else{
		include "content.php";
	}
?>