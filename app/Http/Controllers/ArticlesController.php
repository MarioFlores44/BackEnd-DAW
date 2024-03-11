<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\ArticlesNou;
use Illuminate\Auth\Events\Registered;

class ArticlesController extends Controller
{
    function show() {
        $data = Articles::paginate(5);
        return view('index', ['articles' => $data]);
    }

    function show2() {
        $data = Articles::paginate(5);
        return view('modificar', ['articles' => $data]);
    }

    function create(){
        return view('create');
    }

    function store(Request $request){
        $article = ArticlesNou::create([
            'article' => $request->contingut,
            'user' => auth()->id()
        ]);

        event(new Registered($article));

        return redirect("{{ route('modificar') }}");
    }
}
