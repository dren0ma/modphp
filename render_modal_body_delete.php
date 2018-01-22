<?php 

$index = $_POST['index'];
// $string = file_get_contents("assets/items.json");
// $items = json_decode($string, true);
require 'connection.php';
$sql = "SELECT * FROM items WHERE id = '$index'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
extract($row);

echo "<div class='row'>";
echo "<div class='col-xs-4-item_display'><img class='imgedit' src='$image'>";
//get pass index to edit.php
echo "<form action='delete.php?index=$index' method='post'>Name: <input type='text' name='name' value='$name'><br>";
echo "Description: <textarea name='description'>$description</textarea><br>";
echo "Price: Php <input name='price' type='number' min=0 value ='$price'<br>";
echo "<br><input type='submit' class='btn btn-success' value='Yes'>";
echo "<a href='menu.php'><input type='button' class='btn btn-danger' data-dismiss='modal' value='No'></a>";
echo "</form></div></div>";


?>