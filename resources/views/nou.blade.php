<!-- Mario Flores -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- feu referència al vostre fitxer d'estils -->
	<title>New</title>
</head>
<body>
	<div class="contenidor">
		<h1><a href="{{ route('modificar') }}">Articles</a></h1>
		<section class="articles">
            <h2>Article nou</h2>
            <form action="{{ route('nou') }}" method="post">
                @csrf
                <input type="text" required>
                <input type="submit" value="Desa">
            </form>
	</div>
</body>
</html>