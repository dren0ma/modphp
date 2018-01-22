<?php
session_start();

require 'connection.php';

// if (isset($_POST['btnregister'])){
// 	header('location: register.php');
// }

// $users = [
// 	'admin' => 'secret',
// 	'tuitt' => '1234',
// 	'qwerty' => 'fish'
// ];

// echo json_encode($users);

// $string = file_get_contents("assets/users.json");
// $users = json_decode($string, true);

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
// step 1 declare query

$result = mysqli_query($conn, $sql);
// step 2 run query to db


if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result); //step 3  convert result to assoc array
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $row['role'];
	header('location: menu.php');
}
else {
	echo "Incorrect Username/Password";
	echo "please login again <a href='login.php'>here</a>";
}


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

// if(isset($users[$username]) && $users[$username] == $password){
// 	$_SESSION['username'] = $username;
// 	header('location: menu.php');
// } else {
// 	echo "Incorrect Username/Password";
// 	echo "please login again <a href='login.php'>here</a>";
// }

?>