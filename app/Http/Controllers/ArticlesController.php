<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\ArticlesNou;

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
            'title' => $request->contingut,
            'content' => auth()->email()
        ]);

        event(new Registered($article));

        return redirect("{{ route('modificar') }}");
    }
}
