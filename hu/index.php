<?php session_start(); ?>
<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/Yasuo/config/config.php');
?>
<?php require_once USER_MANAGER; ?>
<?php 
if(!isset($_COOKIE['language'])) {
	$cookie_name = "language";
	$country="HU";
	$cookie_value = $country;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
}else $_COOKIE['language']="HU";
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Yasu - Főoldal</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'css/mdb.min.css?'?>">

 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="<?=PUBLIC_DIR.'js/mdb.min.js?'?>"></script>

	<!-- DataTables CSS -->
	<link href="<?=PUBLIC_DIR.'css/addons/datatables.min.css?'?>" rel="stylesheet">
	<!-- DataTables JS -->
	<script src="<?=PUBLIC_DIR.'js/addons/datatables.min.js?'?>" type="text/javascript"></script>
	<!-- DataTables Select CSS -->
	<link href="<?=PUBLIC_DIR.'css/addons/datatables-select2.min.css?'?>" rel="stylesheet">
	<!-- DataTables Select JS -->
	<script src="<?=PUBLIC_DIR.'js/addons/datatables-select2.min.js?'?>" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'style.css?'.date('YmdHis', filemtime(PUBLIC_DIR.'style.css'))?>">
	<link rel="icon" href="<?=PUBLIC_DIR.'Images/icon.png?'?>">
</head>
<body>
		<header><?php include_once PROTECTED_DIR.'header.php'; ?></header>
		<nav><?php require_once PROTECTED_DIR.'nav.php'; ?></nav>
		<div class="container-fluid">
		<content><?php require_once PROTECTED_DIR.'routing.php'; ?></content>
		</div>
		<footer><?php include_once PROTECTED_DIR.'footer.php'; ?></footer>

</body>
</html>