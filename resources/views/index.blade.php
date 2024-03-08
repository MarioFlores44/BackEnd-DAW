<!-- Mario Flores -->
 <?php 
//  require_once '../controller/index.php';
// ?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- feu referència al vostre fitxer d'estils -->
	<title>Paginació</title>
</head>
<body>
	<div class="contenidor">
		<h1>Articles</h1>
		<form method="get">
			<button name="Login" type="button" onclick="window.location.href='{{ route('login') }}'">Login</button>
			<button name="Register" type="button" onclick="window.location.href='{{ route('register') }}'">Register</button>
		<section class="articles">
			<ul>
				@foreach ($articles as $article)
					<li>
						<h2>{{ $article->id }}</h2>
						<p>{{ $article->article }}</p>
					</li>
				@endforeach
			</ul>
		</section>
	</div>
	<div class="peu">
		<?php
			// mostrarPaginacio();
		?>
	</div>
</body>
</html>