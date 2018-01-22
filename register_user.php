<?php
require 'connection.php';
session_start();

$username = $_POST['username'];			//input box name
$password = sha1($_POST['pw']);			//sha1 hash password

echo "$password";
/*   JSON FORMAT   */
// $string = file_get_contents("assets/users.json");	//open json file
// $users = json_decode($string, true);
// $users[$username] = $password;						//add index to $users array

// $file = fopen("assets/users.json", "w");			//open json file
// fwrite($file, json_encode($users, JSON_PRETTY_PRINT));					//rewrite json file as string
// fclose($file);

/*   JSON FORMAT   */

/*   mySQL FORMAT   */


$sql = "INSERT INTO users (username, password, role) VALUES('$username', '$password', 'user')";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

$_SESSION['username'] = $username;
$_SESSION['role'] = 'regular';
header('location: menu.php');

?>