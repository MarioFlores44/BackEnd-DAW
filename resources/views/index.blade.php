<!-- Mario Flores -->
<!-- <?php
 require_once '../controller/index.php';
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- feu referència al vostre fitxer d'estils -->
	<title>Paginació</title>
</head>
<body>
	<div class="contenidor">
		<h1>Articles</h1>
		<form method="get">
			<button name="Login" type="button" onclick="window.location.href='./login.php'">Login</button>
			<button name="Register" type="button" onclick="window.location.href='./register.php'">Register</button>
			<select name="select" class="select" onchange="this.form.submit()">
			<!-- Desplegable para seleccionar cuántos posts por página, y método para que se guarde como seleccionado -->
				<option value="5" <?php if (isset($_GET['select']) && $_GET['select'] == 5) echo 'selected'; ?>>5</option>
				<option value="10" <?php if (isset($_GET['select']) && $_GET['select'] == 10) echo 'selected'; ?>>10</option>
				<option value="15" <?php if (isset($_GET['select']) && $_GET['select'] == 15) echo 'selected'; ?>>15</option>
				<option value="20" <?php if (isset($_GET['select']) && $_GET['select'] == 20) echo 'selected'; ?>>20</option>
				<option value="25" <?php if (isset($_GET['select']) && $_GET['select'] == 25) echo 'selected'; ?>>25</option>
			</select> <br>
		<section class="articles">
			<ul>
					<?php
						mostrarArticles();
					?>
			</ul>
		</section>
	</div>
	<div class="peu">
		<?php
			mostrarPaginacio();
		?>
	</div>
</body>
</html>