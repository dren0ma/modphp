<?php 
$name = $_POST['name'];
$users = [
	['name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@gmail.com', 'password' => 'abc123'],
	['name' => 'Juan Smith', 'email' => 'john.smith@bing.com', 'password' => 'zxcvb'],
	['name' => 'John Doe', 'email' => 'john.doe@gmail.com', 'password' => 'qwerty'],
];
foreach ($users as $key => $value) {
	if ($value['name'] === $name) {
		echo "Your name was found";
		break;
	}
}
?>