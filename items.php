<?php 
$item1 = [
	'name' => 'Neapolitan',
	'description' => 'Mozzarella, tomatoes, basil leaves, oregano, olive oil',
	'price' => '500',
	'img' => 'img/pizza.jpg',
	'category' => 'Pizza'
];

$item2 = [
	'name' => 'Pepperoni',
	'description' => 'Mozzarella, provolone, onions, pepperoncini',
	'price' => '500',
	'img' => 'img/pizza.jpg',
	'category' => 'Pizza'
];

$item3 = [
	'name' => 'Spaghetti Bolognese',
	'description' => 'Slow braised beef and tomato',
	'price' => '300',
	'img' => 'img/pasta.jpg',
	'category' => 'Pasta'
];

$item4 = [
	'name' => 'Pomodoro',
	'description' => 'Classic tomato sauce, basil, parmesan',
	'price' => '250',
	'img' => 'img/pasta.jpg',
	'category' => 'Pasta'
];

$item5 = [
	'name' => 'Mushroom Truffle',
	'description' => 'Mushroom, basil, truffle oil fontinella, goat cheese, mozzarella, parmigiano',
	'price' => '600',
	'img' => 'img/pizza3.jpg',
	'category' => 'Pizza'
];

$item6 = [
	'name' => 'Navona',
	'description' => 'Fire Blistered Tomatoes, Marinated Carrots, Shaved Onion, Crispy Bread, Basil Balsamic',
	'price' => '100',
	'img' => 'img/salad.jpg',
	'category' => 'Salad'
];

$items = [$item1, $item2, $item3, $item4, $item5, $item6];

$file = fopen("assets/items.json", "w");								//open json file
fwrite($file, json_encode($items, JSON_PRETTY_PRINT));					//rewrite json file as string
fclose($file);

?>
