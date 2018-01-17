<?php 

$index = $_POST['index'];
$string = file_get_contents("assets/items.json");
$items = json_decode($string, true);

$img = $items[$index]['img'];
$name = $items[$index]['name'];
$description = $items[$index]['description'];
$price = $items[$index]['price'];

echo "<div class='row'>";
echo "<div class='col-xs-4-item_display'><img class='imgedit' src='$img'>";
//get pass index to edit.php
echo "<form action='edit.php?index=$index' method='post'>Name: <input type='text' name='name' value='$name'><br>";
echo "Description: <textarea name='description'>$description</textarea><br>";
echo "Price: Php <input name='price' type='number' min=0 value ='$price'<br>";
echo "<a href='menu.php'><input type='button' class='btn btn-danger' data-dismiss='modal' value='Cancel'></a>";
echo "<input type='submit' class='btn btn-success' value='Save'>";
echo "</form></div></div>";


?>