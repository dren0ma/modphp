<?php
session_start();

// if (isset($_POST['btnregister'])){
// 	header('location: register.php');
// }

// $users = [
// 	'admin' => 'secret',
// 	'tuitt' => '1234',
// 	'qwerty' => 'fish'
// ];

// echo json_encode($users);

$string = file_get_contents("assets/users.json");
$users = json_decode($string, true);

$username = $_POST['username'];
$password = $_POST['password'];


// if(isset($users[$username])){
// 	if($users[$username] == $password){
// 	}
// 	else {
// 		echo "Incorrect Pasword";
// 	}
// }
// else {
// 	echo "Incorrect Username";
// }

if(isset($users[$username]) && $users[$username] == $password){
	$_SESSION['username'] = $username;
	header('location: menu.php');
} else {
	echo "Incorrect Username/Password";
	echo "please login again <a href='login.php'>here</a>";
}

?>