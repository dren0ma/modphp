<?php
// $string = file_get_contents("assets/items.json");
// $items = json_decode($string, true);
$total = 0;

function display_title(){
	echo "Cart";
}

function display_content(){
	require 'connection.php';
	global $items;
	global $total;	
	echo "<div class=row>
		<h1 class='totalprice'>Total: Php </h1>
	</div>";

	//foreach item iteration
	
	foreach ($_SESSION['cart'] as $index => $quantity) {
		$sql = "SELECT * FROM items WHERE id = '$index'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		extract($row);							//auto create variables from column_name

		// $img = $row['image'];
		// $name = $row['name'];
		// $description = $row['description'];
		// $price = $row['price'];
			
			
			if (isset($_SESSION['cart'])){
				echo "<div class='col-xs-4 item_display'><img src='".$image."'>";
				echo "<h5>".$name."</h5>";
				echo "Price: Php".$price."<br>";
				echo "Quantity: ".$quantity."<br>";
				echo "<form action='change_qty_cart.php?index=$index' method='POST'><input type='number' min=0 name='changeqty'>";
				echo "<button class='btn btn-primary btn_change_qty'>Change Quantity</button></form>";
				echo "<a href='remove_cart_item.php?index=$index'><button type='button' class='btn btn-danger item_remove'>Remove from cart</button></a>";
			}
			echo "<br><h3>Total: ".$price*$quantity."</h3>";
			echo "</div>";
			$total += $price*$quantity;
			
	} 
	echo "</div>";//foreach item

	echo "<div id='myModalDelete' class='modal fade' role='dialog'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
					<h4 class='modal-title'>Item removed from cart</h4>
				</div>
			
				<div class='modal-body' id='del_modal-body'>
				</div>
				
				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' data-dismiss='modal'>Ok</button>
				</div>
			</div>
		</div>
	</div>"; //modal close



} //display_content();


require "template.php";
?>

<script type="text/javascript">
$('.item_remove').click(function(){
	var index = $(this).data('index');

	$.ajax ({
			method: 'post',
			url: 'remove_cart_item.php',
			data: {
				index: index
			},
			success: function(data){
				$("#del_modal-body").html(data);
			}
	})
});



$(document).ready(function() {
	var tot = '<?php echo $total; ?>'
	$('.totalprice').append(tot);

});

</script>

