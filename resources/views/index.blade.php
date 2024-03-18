<!-- Mario Flores -->

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
		<!-- Botones linkeados -->
		<form method="get">
			<button name="Login" type="button" onclick="window.location.href='{{ route('login') }}'">Login</button>
			<button name="Register" type="button" onclick="window.location.href='{{ route('register') }}'">Register</button>
		</form>
		<!-- Mostramos los artículos -->
		<section class="articles">
			<ul>
				@foreach ($articles as $article)
					<li>
						<p>{{ $article->id }} - {{ $article->article }}</p>
					</li>
				@endforeach
			</ul>
		</section>
	</div>
	<div class="peu">
		{{ $articles->links() }}
	</div>
</body>
</html>