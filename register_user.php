<?php

$username = $_POST['username'];
$password = $_POST['pw'];							//input box name

$string = file_get_contents("assets/users.json");	//open json file
$users = json_decode($string, true);
$users[$username] = $password;						//add index to $users array

$file = fopen("assets/users.json", "w");			//open json file
fwrite($file, json_encode($users, JSON_PRETTY_PRINT));					//rewrite json file as string
fclose($file);




?>