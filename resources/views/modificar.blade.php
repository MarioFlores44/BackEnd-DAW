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
        <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </button>
		<button href="{{ route('crear') }}" id="crear">
			Crear
		</button>
		<section class="articles">
		<ul>
			@foreach ($articles as $article)
				<li>
					<form action="{{ route('update') }}" method="POST">
						@csrf
						{{ $article->id }}
						<input type="hidden" name="id" value="{{ $article->id }}">
						<input class="inputUpdate" type="text" name="contingut" value="{{ $article->article }}">
						<input type="submit" value="Update">
						<button href="{{ route('delete', $article->id) }}" onclick="return confirm('Are you sure?')">Delete</button>
					</form>
				</li>
			@endforeach
		</ul>
		</section>
	</div>
	<div class="peu2">
        {{ $articles->links() }}
	</div>
</body>
</html>