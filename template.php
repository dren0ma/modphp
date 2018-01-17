<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php display_title(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!--   imports jQuery   -->
  <script src="../js/jquery-3.2.1.min.js"></script>

  <!--    imports bootstrap javascript   -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <!--    imports bootstrap css   -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

  <!--    imports bulma css   -->
  <!-- <link rel="stylesheet" type="text/css" href="assets/bulma/bulma.css"> -->

  <link rel="stylesheet" href="assets/style.css">

 
</head>
<body>

<?php require "partials/nav.php"; ?>

<div class='container'>
	<div id="content_area">
		<?php display_content(); ?>
	</div>
	
	<?php require "partials/sidebar.php"; ?>
</div>

<?php require "partials/footer.php"; ?>

</body>
</html>
