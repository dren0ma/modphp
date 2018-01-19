<?php

require 'connection.php';

if (isset($_GET['del_id'])) {
	$id = $_GET['del_id'];
	$sql = "DELETE FROM artists WHERE id = $id";
	mysqli_query($conn, $sql);
	
}
if (isset($_POST['add_artists'])){
	$new_name = $_POST['title'];

	$sql = "INSERT INTO artists (name)
			VALUES ('$new_name')";
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
	<div class="content">
		<div class="columns">
			<div class="column is-4">
			<h2 class="title">Artists</h2>
				<table border=1 class="table">
					<div class="thead">
						<tr>
							<th>Name</th>
							<th>Delete?</th>
						</tr>
					</div>
	<?php
		$sql = "SELECT * FROM artists";					//query definition
		$result = mysqli_query($conn, $sql);			//run query
		while ($row = mysqli_fetch_assoc($result)) {	//convert to associative array
				$id = $row['id'];
				$name = $row['name'];
				echo "<tr>
						<td>$name</td>
						<td><a href='artists.php?del_id=$id'><button class='button is-danger'>Delete</button></a></td>
				</tr>";
		}
	?>
				</table>
			</div>

			<h2 class="title">Add Artist:</h2>
			
			<form method="POST" class="field">
				<label class="label">Name:</label><input type="text" name="name" class="input"><br>
				<input type="submit" name="add_artist" class="button is-primary" value="Save">
			</form>
		</div>
	</div>
</body>
</html>
