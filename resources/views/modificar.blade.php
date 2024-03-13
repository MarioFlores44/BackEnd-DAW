<!-- Mario Flores -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- feu referència al vostre fitxer d'estils -->
	<title>Logeado</title>
</head>
<body>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
	<div class="contenidor">
		<h1>Articles</h1>
		<form method="get">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
		<a href="{{ route('crear') }}" id="crear">
			Crear
		</a>
		<section class="articles">
			<form method="POST">
                <ul>
                    @foreach ($articles as $article)
                        <li>
                            <input value="{{ $article->id }} - {{ $article->article }}">
                        </li>
						<li>
							<a href="{{ route('update', $article->id) }}" id="editar">
								Editar
							</a>
							<a href="{{ route('delete', $article->id) }}" id="eliminar">
								Eliminar
							</a>
						</li>
                    @endforeach
                </ul>
			</form>
		</section>
	</div>
	<div class="peu2">
        {{ $articles->links() }}
	</div>
</body>
</html>