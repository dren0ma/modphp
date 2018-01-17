<?php
session_start();

$index = $_GET['index'];
$quantity = $_POST['itemqty'];

if (isset($_SESSION['cart'][$index])){
	$_SESSION['cart'][$index] += $quantity;
}
else {
	$_SESSION['cart'][$index] = $quantity;	
}


// set isset post for rquests from diff page

// if (isset($_POST['itemqty'])){
// 	$quantity = ;

// 	if (isset($_SESSION['cart'][$index])){
// 		$_SESSION['cart'][$index] += $quantity;
// 	}
// 	else {
// 		$_SESSION['cart'][$index] = $quantity;	
// 	}
// }


header('location: menu.php');

//display_content();
?>