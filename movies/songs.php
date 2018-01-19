<?php

require 'connection.php';

if (isset($_GET['del_id'])) {
	$id = $_GET['del_id'];
	$sql = "DELETE FROM songs WHERE id = $id";
	mysqli_query($conn, $sql);
	
}
if (isset($_POST['add_song'])){
	$new_title = $_POST['title'];
	$new_length = $_POST['length'];
	$new_genre = $_POST['genre'];

	$sql = "INSERT INTO songs (title, length, genre, album_id)
			VALUES ('$new_title', $new_length, '$new_genre', 1)";
	mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bulma/bulma.css">
</head>
<body>

<h2>Songs</h2>

	<table border=1>
		<tr>
			<th>Title</th>
			<th>Length</th>
			<th>Genre</th>
			<th>Delete?</th>
		</tr>
<?php
	$sql = "SELECT * FROM songs"; 					//query definition
	$result = mysqli_query($conn, $sql);			//run query
	while ($row = mysqli_fetch_assoc($result)) {	//convert to associative array
			$id = $row['id'];
			$title = $row['title'];
			$length = $row['length'];
			$genre = $row['genre'];
			echo "<tr>
					<td>$title</td>
					<td>$length</td>
					<td>$genre</td>
					<td><a href='songs.php?del_id=$id'><button class='button is-danger'>Delete</button></a></td>
			</tr>";
	}
	echo "</table>";		

?>
	<h3 class="title">Add Song:</h3>
	<div class="columns">
		<div class="column is-4">
			<form method="POST" class="field">
				<label class="label">Title:</label><input type="text" name="title" class="input"><br>
				<label class="label">Length:</label><input type="number" name="length" class="input"><br>
				<label class="label">Genre:</label><input type="text" name="genre" class="input"><br>
				<input type="submit" name="add_song" class="button is-primary" value="Save">
			</form>
		</div>
	</div>
</body>
</html>
