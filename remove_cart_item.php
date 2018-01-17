<?php
session_start();

$index = $_GET['index'];

if (isset($_SESSION['cart'][$index])){
		unset($_SESSION['cart'][$index]);
	}

header('location: cart.php');
?>