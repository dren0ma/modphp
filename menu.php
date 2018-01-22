<?php
//get item list from json file
// $string = file_get_contents("assets/items.json");
// $items = json_decode($string, true);

function display_title(){
	echo "Menu Page";
}

function display_content(){
	// global $items;
	// $categories = array_unique(array_column($items,'category'));

	
	$filter = 'All';
	if(isset($_GET['category'])){
		$filter = $_GET['category'];
	// $filter = isset($_GET['category']) ? $_GET['category'] : 'All';   if/else ternary
	}

require 'connection.php';

	
	echo "<form><select name='category'><option>All</option>";
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$category = $row['name'];

		

		if ($filter == $id) {
			echo "<option selected value='$id'>$category</option>";
		}
		else {
			echo "<option value='$id'>$category</option>";
		}
		// echo $filter == $category ? "<option selected>$category</option>" : "<option>$category</option>";   if/else ternary
	
	

	}
	echo "</select><button class='btn'>Search</button></form>";

/*	echo "string";

	echo "<form action='edit.php?index=$index' method='post'>Name: <input type='text' name='name' value='$name'><br>";
	echo "Description: <textarea name='description'>$description</textarea><br>";
	echo "Price: Php <input name='price' type='number' min=0 value ='$price'<br>";
	echo "<a href='menu.php'><input type='button' class='btn btn-danger' data-dismiss='modal' value='Cancel'></a>";
	echo "<input type='submit' class='btn btn-success' value='Save'>";
	echo "<a href='delete.php?index=$index'><input type='button' class='btn btn-danger' value='Delete'></a>";
	echo "</form></div></div>";*/

$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);

	//foreach item iteration
	echo "<div class='row'>";
	while($item = mysqli_fetch_assoc($result)) {
		$index = $item['id'];
	// foreach ($items as $index => $item) {
		if ($filter == 'All' || $item['category_id'] == $filter) {
			echo "<div class='col-xs-4 item_display'><img src='".$item['image']."'>";
			echo "<h5>".$item['name']."</h5>";
			echo "Price: Php ".$item['price']."<br>";
			
			if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
				echo "<button class='btn btn-primary render_modal_body' data-toggle='modal' data-target='#myModal' data-index='$index'>Edit</button>";
				echo "<button class='btn btn-danger render_modal_body_delete' data-toggle='modal' data-target='#myModalDelete' data-index='$index'>Delete</button>";
			}
			else if (isset($_SESSION['username'])){
				echo "<form action='addtocart.php?index=$index' method='POST'><input type='number' min=1 value='1' name='itemqty'>";
				echo "<button class='btn btn-success cart-button' data-index='$index'>Add to Cart</button></form>";
			}
			echo "</div>";
		}
	} 

	// button inside form will auto submit, set button type=button

	echo "</div>";//foreach item
			//modal
	echo "<div id='myModal' class='modal fade' role='dialog'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
					<h4 class='modal-title'>Modal Header</h4>
				</div>
			
				<div class='modal-body' id='modal-body'>
				</div>
				
				<div class='modal-footer'>
				</div>
			</div>
		</div>
	</div>"; //modal close

	echo "<div id='myModalDelete' class='modal fade' role='dialog'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
					<h4 class='modal-title'>ARE YOU SURE YOU WANT TO DELETE ITEM?!</h4>
				</div>
			
				<div class='modal-body' id='del_modal-body'>
				</div>
				
				<div class='modal-footer'>
				</div>
			</div>
		</div>
	</div>"; //modal close
}	//function close display_content()

require "template.php";

?>

<script type="text/javascript">
	$('.render_modal_body').click(function(){
//ajax post request
		var index = $(this).data('index');
	//url
		// $.post('render_modal_body.php',
	//variable (key-value pair)
		// {index: index},
	//callback/return data
		// function(data){
			// $('#modal-body').html(data);
		// })

		$.ajax ({
			method: 'post',
			url: 'render_modal_body.php',
			data: {
				index: index
			},
			success: function(data){
				$("#modal-body").html(data);
			}
		})

	});

	$('.render_modal_body_delete').click(function(){
		var index = $(this).data('index');

		$.ajax ({
				method: 'post',
				url: 'render_modal_body_delete.php',
				data: {
					index: index
				},
				success: function(data){
					$("#del_modal-body").html(data);
				}
			})
	});

	// $('.cart-button').click(function(){
	// 	var qty = $('.itemqty').val();
	// 	var index = $(this).data('index');

	// 	$.ajax ({
	// 			method: 'post',
	// 			url: 'cart.php',
	// 			data: {
	// 				index: index,
	// 				qty: qty
	// 			},
	// 			success: function(data){
	// 				$("#modal-body").html(data);
	// 			}
	// 		})
	// });
</script>
