<?php 
$users = [
	['name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@gmail.com', 'password' => 'abc123'],
	['name' => 'Juan Smith', 'email' => 'john.smith@bing.com', 'password' => 'zxcvb'],
	['name' => 'John Doe', 'email' => 'john.doe@gmail.com', 'password' => 'qwerty'],
];
echo json_encode($users);
?>