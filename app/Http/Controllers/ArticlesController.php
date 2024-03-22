<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\ArticlesNou;
use Illuminate\Auth\Events\Registered;

// Se crea el controlador ArticlesController para manejar las peticiones de la aplicación sobre los artículos.
class ArticlesController extends Controller
{

    // Función para mostrar los artículos en la página principal.	
    function show() {
        $data = Articles::paginate(5);
        return view('index', ['articles' => $data]);
    }

    // Función para mostrar los artículos en la página de edición.
    function show2() {
        $data = Articles::paginate(5);
        return view('modificar', ['articles' => $data]);
    }

    // Función para crear un nuevo artículo.
    function create(){
        return view('create');
    }

    // Función para eliminar un artículo.
    function delete($id){
        $article = Articles::find($id);

        if ($article) {
            $article->delete();
            return redirect()->route('modificar')->with('success', 'Article deleted successfully');
        } else {
            return redirect()->route('modificar')->with('error', 'Article not found');
        }
    }

    // Función para actualizar un artículo.
    function update(Request $request){
        $article = Articles::find($request->id);
    
        if ($article) {
            $article->article = $request->contingut;
            $article->save();
        }
    
        return redirect()->route('modificar');
    }

    // Función para almacenar un artículo.
    function store(Request $request){
        $article = ArticlesNou::create([
            'article' => $request->contingut,
            'user' => auth()->id()
        ]);

        event(new Registered($article));

        return redirect('dashboard');
    }
}
